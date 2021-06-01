<?php

namespace App\Services\ApprovalApiToken;

use App\Events\sendConfirmEmail;
use App\Models\User;
use App\Services\Contract\ApiService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;

class ApprovalApiTokenService extends ApiService
{
    const STATUS = [1 => 'Not accepted', 2 => 'Accepted', 3 => 'Paused'];

    /**
     * @return Application|Factory|\Illuminate\View\View
     */
    public function list()
    {
        $url = config('constants.api_address') . '/api/v1/api-token/get-list-approval';
        $request = null;
        $method = "GET";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $data = $this->checkAndReturnData($response);//approval-api-token/list
        return view('approval-api-token/list')->with(['data' => isset($data['data']) ? $data['data'] : null, 'status' => self::STATUS]);
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function disableUser($id) {
        $codeDisableUser = Cache::get('codeDisableUser');
        $codeInput       = (int) $_GET['code'];
        $typeAction       = $_GET['type'];

        if ($typeAction !== 'sentmail' && $codeInput === $codeDisableUser && $typeAction === 'submit_code' && $codeInput > 999 && $codeInput <= 9999) {
            // Case Code hợp lệ
            $url      = config('constants.api_address') . '/api/v1/user/delete-user';
            $request  = ['user_id' => $id];
            $method   = "POST";
            $response = $this->sendRequestToAPI($url, $method, $request);
            $data     = $this->checkAndReturnData($response);

            return redirect()
                ->intended('/system-admin/user-management-for-app-chat/list-user-for-control')
                ->with('saved', true);

        } else {
            // Trường hợp sai kết quả và resent
            if ($typeAction === 'submit_code' && $codeInput !== $codeDisableUser  ) {
                $redirect = redirect()->intended('/system-admin/user-management-for-app-chat/list-user-for-control');
                $redirect->with('error_message', __('common.invalid_code'));
                return $redirect;
            } else {
                if ($typeAction === 'sentmail' || $typeAction === 'resent') {
                    $this->sendCode($id);
                }
                View::share('submitCode', 1);
                return view('user-management-for-app-chat/confirm_code');
            }

        }
    }

    public function getConfirmDeleteUser($id){
        $url = config('constants.api_address') . '/api/v1/user/check-status-delete-user';
        $request = ['user_id' => $id];
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $data = $this->checkAndReturnData($response);
        return $data['data'];
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function approvalToken($id)
    {
        $url = config('constants.api_address') . '/api/v1/api-token/approve-token';
        $request = ['id' => $id];
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $this->checkAndReturnData($response);
        return redirect()->intended('/system-admin/user-management-for-app-chat/list')->with('saved', true);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function stopToken($id)
    {
        $url = config('constants.api_address') . '/api/v1/api-token/stop-token';
        $request = ['id' => $id];
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $this->checkAndReturnData($response);
        return redirect()->intended('/system-admin/user-management-for-app-chat/list')->with('saved', true);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function reopenToken($id)
    {
        $url = config('constants.api_address') . '/api/v1/api-token/reopen-token';
        $request = ['id' => $id];
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $this->checkAndReturnData($response);
        return redirect()->intended('/system-admin/user-management-for-app-chat/list')->with('saved', true);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function deleteToken($id)
    {
        $url = config('constants.api_address') . '/api/v1/api-token/delete-token';
        $request = ['id' => $id];
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $request);
        $this->checkAndReturnData($response);
        return redirect()->intended('/system-admin/user-management-for-app-chat/list')->with('deleted', true);
    }

    /**
     * @param $response
     * @return RedirectResponse|mixed
     */
    public function checkAndReturnData($response)
    {
        $data = json_decode($response->getBody()->getContents(), true);
        if ($data['error_code'] != 0) {
            //            abort(500, $data['error_msg']);

        }

        return $data;
    }

    /**
     * @param $dataContentConfirm
     *
     * @return string
     */
    private function reformatEmailContent($dataContentConfirm) {
        $stringReturn = '';
        $dataContentConfirm['delete-rooms'];
        $dataContentConfirm['delete-contact'];

        $stringReturn.= '<h2 style="color:red;">'.__('common.confirm_delete').'</h2>';
        $stringReturn.= '<hr>';
        $stringReturn.= '<h3>Room delete</h3>';
        if(sizeof($dataContentConfirm['delete-rooms']) === 0){
            $stringReturn.= 'No data <br>';
        }else{
            foreach ($dataContentConfirm['delete-rooms'] as $v){
                $stringReturn .= $v.'<br>';
            }
        }
        $stringReturn.= '<hr>';
        $stringReturn.= '<h3>Contact delete</h3>';
        if(sizeof($dataContentConfirm['delete-contact']) === 0){
            $stringReturn.= 'No data <br>';
        }else{
            foreach ($dataContentConfirm['delete-contact'] as $v){
                $stringReturn.= $v.'<br>';
            }
        }

        return $stringReturn;

    }

    private function warningExpired($config) {
        return __('common.expired_code',['time'=>(int)$config/60]);

    }

    private function sendCode($id) {
        $dataContentConfirm = $this->getConfirmDeleteUser($id);
        $contentConfirm = $this->warningExpired(config('laka.time_expired_code'));
        $contentConfirm .= $this->reformatEmailContent($dataContentConfirm);
        (event(new sendConfirmEmail(Auth::user(), ($contentConfirm))));
    }


    /**
     * @param $request
     * @return RedirectResponse|mixed
     * @throws GuzzleException
     */
    public function addAllContacts($request){
        $url =  config('constants.api_address').'/api/v1/contact/add-all-contacts-in-company';

        $request = $request->only(['user_id', 'company_id']);
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $request);

        return $this->checkAndReturnData($response);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|mixed
     * @throws GuzzleException
     */
    public function addToAllRooms( $request)
    {
        $url =  config('constants.api_address').'/api/v1/contact/add-to-all-rooms-by-company';

        $request = $request->only(['user_id', 'company_id']);
        $method = "POST";
        $response = $this->sendRequestToAPI($url, $method, $request);

        return $this->checkAndReturnData($response);
    }
}

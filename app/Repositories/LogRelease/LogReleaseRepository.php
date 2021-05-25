<?php


namespace App\Repositories\LogRelease;


use App\Models\LogRelease;

class LogReleaseRepository
{

    public function addLogRelease($user_id,$user_name,$deploy_server_id, $redmine_id, $version, $environment)
    {

        LogRelease::create([
            'user_id' => $user_id,
            'user_name'=>$user_name,
            'deploy_server_id'=>$deploy_server_id,
            'redmine_id' => $redmine_id,
            'version' => $version,
            'environment' => $environment,
            'release_type' => $this->getReleaseType($redmine_id),
        ]);
        return;
    }

    public function getLogReleaseList()
    {

        return LogRelease::latest()->paginate(1);

    }

    public function getLogReleaseByUserId($user_id)
    {
        $logs = LogRelease::where("user_id", "=", $user_id);

        return $logs->latest()->paginate(1);

    }

    public function searchLogRelease($request)
    {

        $logs = LogRelease::query();
        $field_filter = $request->all();
        $field_not_filter = ["_token"];

        foreach ($field_filter as $field => $value) {
            if (!in_array($field, $field_not_filter) && $value != null && $value!='default') {
                $logs = $logs->where($field, $value);
            }
        }

        return $logs->latest()->paginate(1);
    }

    public function getReleaseType($redmine_id)
    {
        if (LogRelease::where("redmine_id", "=", $redmine_id)->first() == null) {
            return 0;
        } else {
            return 1;
        }
    }
}

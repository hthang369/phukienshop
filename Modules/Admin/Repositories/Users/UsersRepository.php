<?php

namespace Modules\Admin\Repositories\Users;

use App\Models\Users\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Forms\Users\AccountInfoForm;
use Modules\Admin\Forms\Users\ChangePasswordForm;
use Modules\Admin\Forms\Users\UsersForm;
use Modules\Admin\Grids\Users\UsersGrid;
use Modules\Core\Repositories\BaseCoreRepository;
use Vnnit\Core\Permissions\Role;

class UsersRepository extends BaseCoreRepository
{
    protected $presenterClass = UsersGrid::class;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Specify Form class name
     *
     * @return string
     */
    public function form()
    {
        return UsersForm::class;
    }

    public function accountInfoGenerate($route, $actionName, $config = [])
    {
        $modal = [
            'model' => user_get(),
            'route' => $route,
            'action' => $actionName,
            'pjaxContainer' => request()->get('ref'),
        ];

        $modal = array_merge($modal, $config);

        return [$modal, AccountInfoForm::class];
    }

    public function changePasswordGenerate($route, $actionName, $config = [])
    {
        $modal = [
            'route' => $route,
            'action' => $actionName,
            'pjaxContainer' => request()->get('ref'),
        ];

        $modal = array_merge($modal, $config);

        return [$modal, ChangePasswordForm::class];
    }

    public function create(array $attributes)
    {
        $roleVals = $attributes['roles'];
        if (is_string($attributes['roles'])) {
            $roleVals = [$attributes['roles']];
        }
        $attributes['password'] = Hash::make($attributes['password']);
        $listRole = Role::whereIn('level', $roleVals)->pluck('name')->toArray();
        return DB::transaction(function () use ($attributes, $listRole) {
            $user = parent::create(array_filter($attributes));
            $user->syncRoles($listRole);
            return $user;
        });
    }

    public function update(array $attributes, $id)
    {
        $roleVals = $attributes['roles'];
        if (is_string($attributes['roles'])) {
            $roleVals = [$attributes['roles']];
        }
        if (Hash::needsRehash($attributes['password'])) {
            $attributes['password'] = Hash::make($attributes['password']);
        }

        $listRole = Role::whereIn('level', $roleVals)->pluck('name')->toArray();
        return DB::transaction(function () use ($attributes, $id, $listRole) {
            $user = parent::update(array_filter($attributes), $id);
            $user->syncRoles($listRole);
            return $user;
        });
    }
}

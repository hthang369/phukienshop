<?php

namespace Modules\Admin\Entities\Users;

use Vnnit\Core\Entities\BaseModel;

class EmployeeModel extends BaseModel
{
    protected $table = 'employees';

    protected $fillable = [
        'employee_no',
        'first_name',
        'last_name',
        'avatar',
        'birthday',
        'gender',
        'phone_number',
        'email_address'
    ];
}

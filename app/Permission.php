<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $primaryKey = 'user_id';
    protected $table= 'permissions';
    protected $fillable = [
        'registerCourse', 'approveDocuments', 'viewDashboards', 'subscriptionCourse', 'editOwnInfos', 'editOtherInfos', 'deleteUser', 'editPermissions', 'user_id',
    ];
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminUser extends Authenticatable
{
    use Notifiable, HasRoles, SoftDeletes;

    protected $guard_name = 'admin';

    protected $table = 'admin_users';

    protected $fillable = [ 'username', 'password' ];

    protected $hidden = [ 'password', 'remember_token' ];

    protected $dates = ['deleted_at'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}

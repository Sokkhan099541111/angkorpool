<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Employee;
use App\JobAlert;

class User extends Authenticatable
{
    use Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'username', 'email', 'password', 'user_type' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'email', 'email');
    }

    public function employer()
    {
        return $this->hasOne(Employer::class, 'email', 'email');
    }


    /**
     * Get employee's job alerts.
     */
    public function jobAlerts()
    {
        return $this->hasManyThrough(JobAlert::class, Employee::class, 'email', 'employee_id', 'email');
    }

}

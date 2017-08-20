<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\EmployeeExperience;
use App\EmployeeEducation;
use App\Job;
use App\JobAlert;
use ZohoRecruit;

class Employee extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname', 'name', 'email', 'gender',
        'dob', 'marital_status', 'phone_number',
        'address', 'profile_photo',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($user) {
            // Create a new user into Zoho recruit first before saving into local database.
            // ZohoRecruit::setModule('Candidates');
            // ZohoRecruit::insertRecords('
            //     <Candidates>
            //         <row no="1">
            //             <FL val="Source"></FL>
            //             <FL val="Current employer"></FL>
            //             <FL val="First Name">' . $user->name . '</FL>
            //             <FL val="Last Name">' . $user->surname . '</FL>
            //             <FL val="Email">' . $user->email . '</FL>
            //             <FL val="Phone">' . $user->phone_number . '</FL>
            //             <FL val="Mobile">' . $user->phone_number . '</FL>
            //         </row>
            //     </Candidates>
            // ');
        });
    }

    /** Attribute */
    public function getFullNameAttribute()
    {
        return $this->surname . ' ' . $this->name;
    }

    public function getGenderFullAttribute()
    {
        return $this->gender == 'M' ? 'Male' : ($this->gender == 'F' ? 'Female' : null);
    }

    /** Relationship */
    public function experiences()
    {
        return $this->hasMany(EmployeeExperience::class, 'employee_id', 'id')->latest();
    }

    public function educations()
    {
        return $this->hasMany(EmployeeEducation::class, 'employee_id', 'id')->latest();
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'employee_job_applies')->withPivot('applied_date');
    }

    public function jobAlerts()
    {
        return $this->hasMany(JobAlert::class, 'employee_id');
    }
}

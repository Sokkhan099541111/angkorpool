<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Job;
use App\JobIndustry;
use DB;
use Debugbar;

class Employer extends Model
{
    protected $table = 'employers';

    protected $fillable = [
        'email',
        'name',
        'contact_number',
        'fax',
        'industry_id',
        'website',
        'about',
        'street',
        'city',
        'province',
        'post_code',
    ];

    protected static function boot()
    {
        parent::boot();

        DB::listen(function($sql) {
            Debugbar::info($sql);
        });
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function industry()
    {
        return $this->hasOne(JobIndustry::class, 'id', 'industry_id')->select([ 'id', 'name' ]);
    }

    public function getIndustryNameAttribute()
    {
        return $this->industry->name;
    }
}

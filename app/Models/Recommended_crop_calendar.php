<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommended_crop_calendar extends Model
{
    use HasFactory;

    protected $table = 'recommended_crop_calendar';
    public $timestamps = false;
    protected $fillable = [
        'cropping_season_id',
        'timing',
        'category',
        'task_name',
        'addtnl_details',
        'expenses',
        'date',
        'time',
        'temp_details',
        'is_done',
        'timing_type',
        'made_byuser',
        'taskweek_startdate',
        'taskweek_enddate',
        'date_done',
        'activity_dependent',

        'versionNumber',
        'date_updated',
        'is_archived',

        


    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}

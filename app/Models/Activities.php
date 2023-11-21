<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;
    protected $table = 'activities';
    public $timestamps = false;
    protected $fillable = [
        'cropping_season_id',
        'is_done',
        'category',
        'task_name',
        'addtnl_details',
        'expenses',
        'date',
        'time',
        'timing',
        'timing_type',
        'recomtask_id',

        'versionNumber',
        'date_updated',
        'is_archived'

        


    ];

}

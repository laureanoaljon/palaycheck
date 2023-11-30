<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report_bugs extends Model
{
    use HasFactory;
    // protected $table = 'recommended_crop_calendar';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'subject',
        'problem_desc',
        'screenshot_name',
        'created_at',
    ];


    // protected $hidden = [
    //     'created_at',
    //     'updated_at',
    // ];
}

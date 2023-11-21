<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class season_harvest_info extends Model
{
    use HasFactory;

    protected $table = 'season_harvest_info';
    public $timestamps = false;
    protected $fillable = [
        'cropping_season_id',
        'total_sackcount',

        'caretaker_paymentmode',
        'caretakerpayment_inpercent',
        'caretakerpayment_inmoney',

        
        'versionNumber',
        'date_updated',
        'is_archived'


    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cropping_season extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'farm_id',
        'rice_variety',
        'rice_variety_source',
        'rice_variety_linedesig',
        'seeding_date',
        'crop_establishment',
        'totalweight_tobeEstablished',
        'totalExpense_forSeed',

        'is_finished',
        'harvest_date',
        'total_income',
        'netong_income',

        'fert_guide_used',
        //'fert_guide_used_details',




        
        'versionNumber', 
        'date_updated',
        'is_archived',
    ];
}

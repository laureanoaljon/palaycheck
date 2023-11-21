<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities_fert extends Model
{
    use HasFactory;

    // protected $table = 'activities_ferts';
    public $timestamps = false;
    protected $fillable = [
        'recomtask_id',
        'fertilizer_name',
        'fert_quantity',
        'fert_expense',
        'fert_unit_ofmeasure',

        'versionNumber',
        'date_updated',
        'is_archived'

        


    ];
}

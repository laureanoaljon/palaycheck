<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activities_chemical extends Model
{
    use HasFactory;

    protected $table = 'activities_chemical';
    public $timestamps = false;
    protected $fillable = [
        'recomtask_id',
        'chemical_name',
        'chem_quantity',
        'chem_expense',
        'chem_unit_ofmeasure',

        'versionNumber',
        'date_updated',
        'is_archived'

        


    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class season_other_expenses extends Model
{
    use HasFactory;

    // protected $table = 'activities_chemical';
    public $timestamps = false;
    protected $fillable = [
        'cropping_season_id',
        'expense_gas',
        'expense_transportasyon',
        'expense_irigasyon',
        'expense_sako',
        'expense_kuryente',
        'expense_pagkain',
        'expense_repair',

        
        'versionNumber',
        'date_updated',
        'is_archived'


    ];
}

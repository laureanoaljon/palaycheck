<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;


class Farm extends Model
{
    use HasFactory;

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    public $timestamps = false;
    protected $fillable = [
        "user_id",
        "name",
        "region",
        "province",
        "municipality",
        "barangay",
        "addtnl_address",
        "size",
        "water_source",
        "tenurial_status",

        'versionNumber',
        'date_updated',
        'is_archived',
        // "cropping_pattern"
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AddressController extends Controller
{
    public function region(){
        $region = DB::table("refregion")->get();
        if (count($region) == 0) {
            return response()->json(['status' => 'failed','message' => 'No existed record']);
        }else{
            return response()->json(['status'=>'success', 'data' => $region]);
        }
    }
    public function province(){
        $province = DB::table("refprovince")->get();
        if (count($province) == 0) {
            return response()->json(['status' => 'failed','message' => 'No existed record']);
        }else{
            return response()->json(['status'=>'success', 'data' => $province]);
        }
    }
    public function municipality(){
        $municipality = DB::table("refmunicipality")->get();
        if (count($municipality) == 0) {
            return response()->json(['status' => 'failed','message' => 'No existed record']);
        }else{
            return response()->json(['status'=>'success', 'data' => $municipality]);
        }
    }
    public function brgy(){
        $brgy = DB::table("refbrgy")->get();
        if (count($brgy) == 0) {
            return response()->json(['status' => 'failed','message' => 'No existed record']);
        }else{
            return response()->json(['status'=>'success', 'data' => $brgy]);
        }
    }
}

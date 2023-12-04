<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Farm;
use App\Models\Cropping_season;
use App\Models\Recommended_crop_calendar;
use App\Models\Activities;
use App\Models\Activities_fert;
use App\Models\activities_chemical;
use App\Models\season_harvest_info;
use App\Models\season_other_expenses;





class DetailsCheckerController extends Controller
{
    public function user_detailsCheck(Request $request){
        $farm = User::select('first_name','versionNumber', 'date_updated')
            // ->where('id', $request->farm_id)Auth::user()->id
            ->where('id', Auth::user()->id)->orderBy('id', 'desc')->first(); // Use first() to retrieve a single farm or null if not found
        // return Auth::user()->id;
        if ($farm) {
            return response()->json(['status' => 'success', 'user' => $farm]);
        } else {
            return response()->json(['status' => 'fail', 'message' => 'Farm not found']);
        }
    }
    public function farm_detailsCheck(Request $request){
        $farm = Farm::select('name','versionNumber', 'date_updated')->where('id', $request->farm_id)->orderBy('id', 'desc')->first(); // Use first() to retrieve a single farm or null if not found
        if ($farm) {
            return response()->json(['status' => 'success', 'farm' => $farm]);
        } else {
            return response()->json(['status' => 'fail', 'message' => 'Farm not found']);
        }
    }
    public function Cropping_season_detailsCheck(Request $request){
        $Cropping_season = Cropping_season::select('id','farm_id','versionNumber', 'date_updated')->where('id', $request->cropping_season_id)->orderBy('id', 'desc')->first();
        if ($Cropping_season) {
            return response()->json(['status' => 'success', 'Cropping_season' => $Cropping_season]);
        } else {
            return response()->json(['status' => 'fail', 'message' => 'Cropping season not found']);
        }
    }
    public function Recommended_crop_calendar_detailsCheck(Request $request){
        $Recommended_crop_calendar = Recommended_crop_calendar::select('id','cropping_season_id','versionNumber', 'date_updated')->where('id', $request->recommended_crop_calendar_id)->orderBy('id', 'desc')->first();
        if ($Recommended_crop_calendar) {
            return response()->json(['status' => 'success', 'Recommended_crop_calendar' => $Recommended_crop_calendar]);
        } else {
            return response()->json(['status' => 'fail', 'message' => 'Recommended crop calendar not found']);
        }
    }
    public function Activities_detailsCheck(Request $request){
        $Activities = Activities::select('id','cropping_season_id','versionNumber', 'date_updated')->where('id', $request->activities_id)->orderBy('id', 'desc')->first();
        if ($Activities) {
            return response()->json(['status' => 'success', 'Activities' => $Activities]);
        } else {
            return response()->json(['status' => 'fail', 'message' => 'Activities not found']);
        }
    }
    public function Activities_fert_detailsCheck(Request $request){
        $Activities_fert = Activities_fert::select('id','fertilizer_name','versionNumber', 'date_updated')->where('id', $request->Activities_fert_id)->orderBy('id', 'desc')->first(); 
        if ($Activities_fert) {
            return response()->json(['status' => 'success', 'Activities_fert' => $Activities_fert]);
        } else {
            return response()->json(['status' => 'fail', 'message' => 'Activities fert not found']);
        }
    }
    public function activities_chemical_detailsCheck(Request $request){
        $activities_chemical = activities_chemical::select('id','fertilizer_name','versionNumber', 'date_updated')->where('id', $request->activities_chemical_id)->orderBy('id', 'desc')->first();
        if ($activities_chemical) {
            return response()->json(['status' => 'success', 'Activities_chemical' => $activities_chemical]);
        } else {
            return response()->json(['status' => 'fail', 'message' => 'Activities chemical not found']);
        }
    }
    public function season_harvest_info_detailsCheck(Request $request){
        $season_harvest_info = season_harvest_info::select('id','total_sackcount','versionNumber', 'date_updated')->where('id', $request->season_harvest_info_id)->orderBy('id', 'desc')->first();
        if ($season_harvest_info) {
            return response()->json(['status' => 'success', 'Season_harvest' => $season_harvest_info]);
        } else {
            return response()->json(['status' => 'fail', 'message' => 'Season harvest not found']);
        }
    }
    public function season_other_expenses_detailsCheck(Request $request){
        $season_other_expenses = season_other_expenses::select('id','cropping_season_id','versionNumberdexxx', 'date_updated')->where('id', $request->season_other_expenses_id)->orderBy('id', 'desc')->first();
        if ($season_other_expenses) {
            return response()->json(['status' => 'success', 'Season_harvest' => $season_other_expenses]);
        } else {
            return response()->json(['status' => 'fail', 'message' => 'Season harvest not found']);
        }
    }

                                                                // ---------------------------------------------------------------------------------- GET ALL
    public function cropping_season_getAll(){
        // return Auth::user()->id;
        try {
            $data = Cropping_season::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            if ($data->isEmpty()) {
                return response()->json(['status' => 'failed','message' => 'No existed record']);
            }else{
                return response()->json(['status'=>'success', 'data' => $data]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'Server error responses ','message' => $th]);
        }
    }
    public function recommendedCropCalendar_getAll(Request $request){
        // return $request;
        try {
            $data = Recommended_crop_calendar::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            if ($data->isEmpty()) {
                return response()->json(['status' => 'failed','message' => 'No existed record']);
            }else{
                return response()->json(['status'=>'success', 'data' => $data]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'Server error responses ','message' => $th]);
        }
    }
    public function activities_getAll(Request $request){
        try {
            $data = Activities::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            if ($data->isEmpty()) {
                return response()->json(['status' => 'failed','message' => 'No existed record']);
            }else{
                return response()->json(['status'=>'success', 'data' => $data]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'Server error responses ','message' => $th]);
        }
    }

    public function activities_ferts_getAll(Request $request){
        try {
            $data = Activities_fert::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            if ($data->isEmpty()) {
                return response()->json(['status' => 'failed','message' => 'No existed record']);
            }else{
                return response()->json(['status'=>'success', 'data' => $data]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'Server error responses ','message' => $th]);
        }
    }
    public function activities_chem_getAll(Request $request){
        try {
            $data = activities_chemical::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            if ($data->isEmpty()) {
                return response()->json(['status' => 'failed','message' => 'No existed record']);
            }else{
                return response()->json(['status'=>'success', 'data' => $data]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'Server error responses ','message' => $th]);
        }
    }
    public function season_harvest_info_getAll(Request $request){
        try {
            $data = season_harvest_info::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            if ($data->isEmpty()) {
                return response()->json(['status' => 'failed','message' => 'No existed record']);
            }else{
                return response()->json(['status'=>'success', 'data' => $data]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'Server error responses ','message' => $th]);
        }
    }
    public function season_other_expenses_getAll(Request $request){
        try {
            $data = season_other_expenses::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            if ($data->isEmpty()) {
                return response()->json(['status' => 'failed','message' => 'No existed record']);
            }else{
                return response()->json(['status'=>'success', 'data' => $data]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'Server error responses ','message' => $th]);
        }
    }
    
}

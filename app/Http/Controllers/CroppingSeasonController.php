<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cropping_season;
use Illuminate\Support\Facades\Auth;


class CroppingSeasonController extends Controller
{
    public function getAllCropSeason(Request $request){
        // return "Dexter";
        $Cropping_season = Cropping_season::where('farm_id', $request->farm_id)->orderBy('id', 'desc')->get();

        if (count($Cropping_season) == 0) {
            return response()->json(['status' => 'failed','message' => 'No existed record']);
        }else{
            return response()->json(['status'=>'success', 'data' => $Cropping_season]);
        }
    }

    public function addCropSeason(Request $request){
        $request->validate([
            'farm_id' => 'required',
            'rice_variety' => 'required',
            'seeding_date' => 'required',
            'totalweight_tobeEstablished' => 'required',
            'totalExpense_forSeed' => 'required',

        ]);
        $Cropping_season = Cropping_season::insert([
            'user_id' => Auth::user()->id,
            'farm_id' => $request->farm_id,
            'rice_variety' => $request->rice_variety,
            'rice_variety_source' => $request->rice_variety_source,
            'rice_variety_linedesig' => $request->rice_variety_linedesig,
            'seeding_date' => $request->seeding_date,
            'crop_establishment' => $request->crop_establishment,
            'totalweight_tobeEstablished' => $request->totalweight_tobeEstablished,
            'totalExpense_forSeed' => $request->totalExpense_forSeed,

            'is_finished' => $request->is_finished,
            'harvest_date' => $request->harvest_date,
            'total_income' => $request->total_income,
            'netong_income' => $request->netong_income,


            'fert_guide_used' => $request->fert_guide_used,
            //'fert_guide_used_details' => $request->fert_guide_used_details,

            'versionNumber' => $request->versionNumber,
            'date_updated' => $request->date_updated,
            'is_archived' => $request->is_archived,


        ]);

        // return $Cropping_season;

        if (!$Cropping_season) {
            return response()->json(['status' => 'failed','message' => 'Not created']);
        }else{
            //return all farm that has cropping season
            $Cropping_season = Cropping_season::where("farm_id", $request->farm_id)->orderBy('id', 'DESC')->first();
            return response()->json(['status' => 'success','message' => 'Successfully created cropping season','data' => $Cropping_season]);
        }
    }

    public function updateCropSeason(Request $request){
        
        $request->validate([
            'rice_variety' => 'required',
            'rice_variety_source' => 'required',
            'rice_variety_linedesig' => 'required',
            'seeding_date' => 'required',
            'crop_establishment' => 'required',
            'totalweight_tobeEstablished' => 'required',
            'totalExpense_forSeed' => 'required',
            'fert_guide_used' => 'required',
            //'fert_guide_used_details' => 'required',

            
            
        ]);
        $Cropping_season = Cropping_season::where('id',$request->id)->update([
            'rice_variety' => $request->rice_variety,
            'rice_variety_source' => $request->rice_variety_source,
            'rice_variety_linedesig' => $request->rice_variety_linedesig,
            'seeding_date' => $request->seeding_date,
            'crop_establishment' => $request->crop_establishment,
            'totalweight_tobeEstablished' => $request->totalweight_tobeEstablished,
            'totalExpense_forSeed' => $request->totalExpense_forSeed,

            'is_finished' => $request->is_finished,
            'harvest_date' => $request->harvest_date,
            'total_income' => $request->total_income,
            'netong_income' => $request->netong_income,


            'fert_guide_used' => $request->fert_guide_used,
            'versionNumber' => $request->versionNumber,
            'date_updated' => $request->date_updated,
            'is_archived' => $request->is_archived,

        ]);
        if (!$Cropping_season) {
            return response()->json(['status'=>'failed', 'message' => 'Not updated']);
        } else {
            $Cropping_season = Cropping_season::find($request->id);
            return response()->json(['status'=> 'success', 'message' => 'Successfully updated croppping season','data' => $Cropping_season ]);
        }
    }

}

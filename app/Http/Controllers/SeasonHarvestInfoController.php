<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\season_harvest_info;

use Illuminate\Support\Facades\Auth;

// class SeasonInfoController extends Controller
class SeasonHarvestInfoController extends Controller
{
    public function getSeasonHarvestInfo(Request $request){
        try {
            $season_harvest_info = season_harvest_info::where('cropping_season_id', $request->cropping_season_id)->orderBy('id', 'desc')->get();

            if (count($season_harvest_info) == 0) {
                return response()->json(['status' => 'failed','message' => 'No existed record']);
            }else{
                return response()->json(['status'=>'success', 'data' => $season_harvest_info]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);

        }
    }
    public function addSeasonHarvestInfo(Request $request){
        // return $request;;
        try {
            $season_harvest_info = season_harvest_info::insert([
                'user_id' => Auth::user()->id,
                'cropping_season_id' => $request->cropping_season_id,
                'total_sackcount' => $request->total_sackcount,
                'average_sackweight' => $request->average_sackweight,
                'palay_price' => $request->palay_price,
                'caretaker_paymentmode' => $request->caretaker_paymentmode,
                'caretakerpayment_inpercent' => $request->caretakerpayment_inpercent,
                'caretakerpayment_inmoney' => $request->caretakerpayment_inmoney,

                'versionNumber' => $request->versionNumber,
                'date_updated' => $request->date_updated,
                'is_archived' => $request->is_archived

            ]);
            if (!$season_harvest_info) {
                return response()->json(['status' => 'failed','message' => 'Not created']);
            }else{
                $season_harvest_info = season_harvest_info::where("cropping_season_id", $request->cropping_season_id)->orderBy('id', 'DESC')->first();
                return response()->json(['status' => 'success','message' => 'Successfully created season harvest','data' => $season_harvest_info]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);
            // return $th;

        }
    }
    public function updateSeasonHarvestInfo(Request $request){
        try {
            $season_harvest_info = season_harvest_info::where('id',$request->season_harvest_info_id)->update([
                'total_sackcount' => $request->total_sackcount,
                'average_sackweight' => $request->average_sackweight,
                'palay_price' => $request->palay_price,
                'caretaker_paymentmode' => $request->caretaker_paymentmode,
                'caretakerpayment_inpercent' => $request->caretakerpayment_inpercent,
                'caretakerpayment_inmoney' => $request->caretakerpayment_inmoney,

                'versionNumber' => $request->versionNumber,
                'date_updated' => $request->date_updated,
                'is_archived' => $request->is_archived
            ]);
            if (!$season_harvest_info) {
                return response()->json(['status'=>'failed', 'message' => 'Cannot find this season harvest']);
            } else {
                $season_harvest_info = season_harvest_info::find($request->season_harvest_info_id);
                return response()->json(['status'=> 'success', 'message' => 'Successfully updated season harvest','data' => $season_harvest_info ]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);
        }
    }











}

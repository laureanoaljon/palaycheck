<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Activities_fert;
use Illuminate\Support\Facades\Auth;

class ActivitiesFertsController extends Controller
{
    public function getActivitiesFert(Request $request){
        try {
            $Activities_fert = Activities_fert::where('recomtask_id', $request->recomtask_id)->orderBy('id', 'desc')->get();

            if (count($Activities_fert) == 0) {
                return response()->json(['status' => 'failed','message' => 'No existed record']);
            }else{
                return response()->json(['status'=>'success', 'data' => $Activities_fert]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);

        }
    }
    public function addActivitiesFert(Request $request){
        try {
            $Activities_fert = Activities_fert::insert([
                'recomtask_id' => $request->recomtask_id,
                'fertilizer_name' => $request->fertilizer_name,
                'fert_quantity' => $request->fert_quantity,
                'fert_expense' => $request->fert_expense,
                'fert_unit_ofmeasure' => $request->fert_unit_ofmeasure,

                'versionNumber' => $request->versionNumber,
                'date_updated' => $request->date_updated,
                'is_archived' => $request->is_archived

            ]);
            if (!$Activities_fert) {
                return response()->json(['status' => 'failed','message' => 'Not created']);
            }else{
                $Activities_fert = Activities_fert::where("recomtask_id", $request->recomtask_id)->orderBy('id', 'DESC')->first();
                return response()->json(['status' => 'success','message' => 'Successfully created Activities fertilizer','data' => $Activities_fert]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);

        }
    }
    public function updateActivitiesFert(Request $request){
        try {
            $Activities_fert = Activities_fert::where('id',$request->id)->update([
                'fertilizer_name' => $request->fertilizer_name,
                'fert_quantity' => $request->fert_quantity,
                'fert_expense' => $request->fert_expense,
                'fert_unit_ofmeasure' => $request->fert_unit_ofmeasure,

                'versionNumber' => $request->versionNumber,
                'date_updated' => $request->date_updated,
                'is_archived' => $request->is_archived
            ]);
            if (!$Activities_fert) {
                return response()->json(['status'=>'failed', 'message' => 'Cannot find this activities fertlizer']);
            } else {
                $Activities_fert = Activities_fert::find($request->id);
                return response()->json(['status'=> 'success', 'message' => 'Successfully updated activities fertlizer','data' => $Activities_fert ]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);

        }
    }
}

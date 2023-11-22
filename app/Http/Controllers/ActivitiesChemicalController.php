<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\activities_chemical;
use Illuminate\Support\Facades\Auth;

class ActivitiesChemicalController extends Controller
{
    public function getActivitiesChemical(Request $request){
        try {
            $Activities_chemical = Activities_chemical::where('recomtask_id', $request->recomtask_id)->orderBy('id', 'desc')->get();

            if (count($Activities_chemical) == 0) {
                return response()->json(['status' => 'failed','message' => 'No existed record']);
            }else{
                return response()->json(['status'=>'success', 'data' => $Activities_chemical]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);

        }
    }
    public function addActivitiesChemical(Request $request){
        // return $request;
        try {
            $activities_chemical = activities_chemical::insert([
                'user_id' => Auth::user()->id,
                'recomtask_id' => $request->recomtask_id,
                'chemical_name' => $request->chemical_name,
                'chem_quantity' => $request->chem_quantity,
                'chem_expense' => $request->chem_expense,
                'chem_unit_ofmeasure' => $request->chem_unit_ofmeasure,

                'versionNumber' => $request->versionNumber,
                'date_updated' => $request->date_updated,
                'is_archived' => $request->is_archived

            ]);
            if (!$activities_chemical) {
                return response()->json(['status' => 'failed','message' => 'Not created']);
            }else{
                $activities_chemical = activities_chemical::where("recomtask_id", $request->recomtask_id)->orderBy('id', 'DESC')->first();
                return response()->json(['status' => 'success','message' => 'Successfully created Activities chemical','data' => $activities_chemical]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);
            // return $th;

        }
    }
    public function updateActivitiesChemical(Request $request){
        try {
            $activities_chemical = activities_chemical::where('id',$request->id)->update([
                'chemical_name' => $request->chemical_name,
                'chem_quantity' => $request->chem_quantity,
                'chem_expense' => $request->chem_expense,
                'chem_unit_ofmeasure' => $request->chem_unit_ofmeasure,

                'versionNumber' => $request->versionNumber,
                'date_updated' => $request->date_updated,
                'is_archived' => $request->is_archived
            ]);
            if (!$activities_chemical) {
                return response()->json(['status'=>'failed', 'message' => 'Cannot find this activities chemical']);
            } else {
                $activities_chemical = activities_chemical::find($request->id);
                return response()->json(['status'=> 'success', 'message' => 'Successfully updated activities chemical','data' => $activities_chemical ]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);
        }
    }

}

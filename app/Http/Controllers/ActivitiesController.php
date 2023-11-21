<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Activities;
use Illuminate\Support\Facades\Auth;

class ActivitiesController extends Controller
{
    public function getAllActivities(Request $request){
        try {
            $Activities = Activities::where('cropping_season_id', $request->cropping_season_id)->orderBy('id', 'desc')->get();
            if (count($Activities) == 0) {
                return response()->json(['status' => 'failed','message' => 'No existed record']);
            }else{
                return response()->json(['status'=>'success', 'data' => $Activities]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);
        }

    }
    public function addActivity(Request $request){
        // return $request; 
        // $request->validate([
        //     'cropping_season_id' => 'required',
        //     'is_done' => 'required',
        //     'category' => 'required',
        //     // 'activity_name' => 'required',
        //     // 'addtnl_details' => 'required',
        //     // 'expenses' => 'required',
        //     // 'date_time' => 'required',
        // ]);
        
        try {
            $Activities = Activities::insert([
                'cropping_season_id' => $request->cropping_season_id,
                'is_done' => $request->is_done,
                'category' => $request->category,
                'task_name' => $request->task_name,
                'addtnl_details' => $request->addtnl_details,
                'expenses' => $request->expenses,
                'date' => $request->date,
                'time' => $request->time,
                'timing' => $request->timing,
                'timing_type' => $request->timing_type,
                'recomtask_id' => $request->recomtask_id,
    
                'versionNumber' => $request->versionNumber,
                'date_updated' => $request->date_updated,
                'is_archived' => $request->is_archived,
                'user_id' => $request->user_id,
            ]);
            if (!$Activities) {
                return response()->json(['status' => 'failed','message' => 'Not created']);
            }else{
                $Activities = Activities::where("cropping_season_id", $request->cropping_season_id)->orderBy('id', 'DESC')->first();
                return response()->json(['status' => 'success','message' => 'Successfully created Activities','data' => $Activities]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);

        }
        

    }
    public function updateActivity(Request $request){
        // $request->validate([
        //     'cropping_season_id' => 'required',
        //     'is_done' => 'required',
        //     'category' => 'required',
        //     // 'activity_name' => 'required',
        //     // 'addtnl_details' => 'required',
        //     // 'expenses' => 'required',
        //     // 'date_time' => 'required',
        // ]);
        try {
            $Activities = Activities::where('id',$request->id)->update([
                'is_done' => $request->is_done,
                'category' => $request->category,
                'task_name' => $request->task_name,
                'addtnl_details' => $request->addtnl_details,
                'expenses' => $request->expenses,
                'date' => $request->date,
                'time' => $request->time,
                'timing' => $request->timing,
                'timing_type' => $request->timing_type,
                'recomtask_id' => $request->recomtask_id,
    
                'versionNumber' => $request->versionNumber,
                'date_updated' => $request->date_updated,
                'is_archived' => $request->is_archived,
                'user_id' => $request->user_id,

            ]);
            if (!$Activities) {
                return response()->json(['status'=>'failed', 'message' => 'Cannot find this Activities']);
            } else {
                $Activities = Activities::find($request->id);
                return response()->json(['status'=> 'success', 'message' => 'cropping season Edited','data' => $Activities ]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);

        }


    }
    public function deleteCropSeasonActivity(Request $request){
        $Activities =  Activities::find($request->id);
        if (!$Activities) {
            return response()->json(['status'=>'failed', 'message' => 'Cannot find this Activities']);
        } else {
            $Activities->delete();
            return response()->json(['status'=>'success', 'message' => 'Activities Deleted']);
        }
    }

}

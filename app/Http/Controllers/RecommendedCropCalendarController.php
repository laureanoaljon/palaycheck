<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recommended_crop_calendar;
use Illuminate\Support\Facades\Auth;

class RecommendedCropCalendarController extends Controller
{
    public function getRecommendedCropCalendar(Request $request){
        try {
            $Recommended_crop_calendar = Recommended_crop_calendar::where('cropping_season_id', $request->cropping_season_id)->orderBy('id', 'desc')->get();

            if (count($Recommended_crop_calendar) == 0) {
                return response()->json(['status' => 'failed','message' => 'No existed record']);
            }else{
                return response()->json(['status'=>'success', 'data' => $Recommended_crop_calendar]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);

        }
    }

    public function addRecommendedCropCalendar(Request $request){
        // return $request;
        try {
            $Recommended_crop_calendar = Recommended_crop_calendar::insert([
                'cropping_season_id' => $request->cropping_season_id,
                'timing' => $request->timing,
                'category' => $request->category,
                'task_name' => $request->task_name,
                'addtnl_details' => $request->addtnl_details,
                'expenses' => $request->expenses,
                'date' => $request->date,
                'time' => $request->time,
    
                'temp_details' => $request->temp_details,
                'is_done' => $request->is_done,
                'timing_type' => $request->timing_type,
                'made_byuser' => $request->made_byuser,
    
                'taskweek_startdate' => $request->taskweek_startdate,
                'taskweek_enddate' => $request->taskweek_enddate,
                'date_done' => $request->date_done,
                'activity_dependent' => $request->activity_dependent,
                'versionNumber' => $request->versionNumber,
                'date_updated' => $request->date_updated,
                'is_archived' => $request->is_archived,
                
                'user_id' => $request->user_id,

            ]);
    
    
            if (!$Recommended_crop_calendar) {
                return response()->json(['status' => 'failed','message' => 'Not created']);
            }else{
                //return all farm that has Recommended_crop_calendar
                $Recommended_crop_calendar = Recommended_crop_calendar::where("cropping_season_id", $request->cropping_season_id)->orderBy('id', 'DESC')->first();
                return response()->json(['status' => 'success','message' => 'Successfully created recommended crop calendar','data' => $Recommended_crop_calendar]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);
        }

    }

    public function updateRecommendedCropCalendar(Request $request){
        try {
            $Recommended_crop_calendar = Recommended_crop_calendar::where('id',$request->id)->update([
                'timing' => $request->timing,
                'category' => $request->category,
                'task_name' => $request->task_name,
                'addtnl_details' => $request->addtnl_details,
                'expenses' => $request->expenses,
                'date' => $request->date,
                'time' => $request->time,
    
                'temp_details' => $request->temp_details,
                'is_done' => $request->is_done,
                'timing_type' => $request->timing_type,
                'made_byuser' => $request->made_byuser,
    
                'taskweek_startdate' => $request->taskweek_startdate,
                'taskweek_enddate' => $request->taskweek_enddate,
                'date_done' => $request->date_done,
                'activity_dependent' => $request->activity_dependent,
                'versionNumber' => $request->versionNumber,
                'date_updated' => $request->date_updated,
                'is_archived' => $request->is_archived,

                'user_id' => $request->user_id,

            ]);
    
    
            if (!$Recommended_crop_calendar) {
                return response()->json(['status' => 'failed','message' => 'Not created']);
            }else{
                //return all farm that has Recommended_crop_calendar
                $Recommended_crop_calendar = Recommended_crop_calendar::where("id",$request->id)->orderBy('id', 'DESC')->first();
                return response()->json(['status' => 'success','message' => 'Successfully updated recommended crop calendar','data' => $Recommended_crop_calendar]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);
        }
    }
}
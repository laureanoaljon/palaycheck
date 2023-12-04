<?php

namespace App\Http\Controllers;

use App\Models\Report_bugs;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;

class ReportBugsController extends Controller
{
    // public function addReportBugs(Request $request){
    //     try {
    //         // Begin a database transaction
    //         DB::beginTransaction();
        
    //         $imageName = Auth::user()->id . "_" . Str::uuid() . "." . $request->image->getClientOriginalExtension();
        
    //         $Report_bugs = Report_bugs::create([
    //             'user_id' => Auth::user()->id,
    //             'subject' => $request->subject,
    //             'problem_desc' => $request->problem_desc,
    //             'screenshot_name' => $imageName,
    //             'created_at' => now(), // or specify the desired timestamp
    //         ]);
        
    //         if (!$Report_bugs) {
    //             // Rollback the transaction if the record creation fails
    //             DB::rollBack();
    //             return response()->json(['status' => 'failed', 'message' => 'Not created']);
    //         }
        
    //         $result = Storage::disk("public/bug_images")->put($imageName, file_get_contents($request->image));
    //         if ($result !== false) {
    //             // Commit the transaction if both operations succeed
    //             DB::commit();
    //             return response()->json(['status' => 'success', 'message' => 'Successfully created Report_bugs']);
    //         } else {
    //             // Rollback the transaction if file upload fails
    //             DB::rollBack();
    //             return response()->json(['status' => 'failed', 'message' => 'Successfully created Report_bugs but the image did not move successfully']);
    //         }
    //     } catch (\Throwable $th) {
    //         // Rollback the transaction if any exception occurs
    //         DB::rollBack();
    //         return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
    //     }
        
    // } 


    public function addReportBugs(Request $request){
        try {
            // Begin a database transaction
            DB::beginTransaction();
        
            // Validate if an image was uploaded
            $imageName = "";
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = Auth::user()->id . "_" . Str::uuid() . "." . $image->getClientOriginalExtension();
        
                // Store the image in the specified disk
                $result = Storage::disk('public')->put("bug_images/{$imageName}", file_get_contents($image));
        
                if (!$result) {
                    // Rollback the transaction if file upload fails
                    DB::rollBack();
                    return response()->json(['status' => 'failed', 'message' => 'Image upload failed']);
                }
            }
        
            $Report_bugs = Report_bugs::create([
                'user_id' => Auth::user()->id,
                'subject' => $request->subject,
                'problem_desc' => $request->problem_desc,
                'screenshot_name' => $imageName,
                'created_at' => now(), // or specify the desired timestamp
            ]);
        
            if (!$Report_bugs) {
                // Rollback the transaction if the record creation fails
                DB::rollBack();
                return response()->json(['status' => 'failed', 'message' => 'Report creation failed']);
            }
        
            // Commit the transaction if both operations succeed
            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Successfully created Report_bugs']);
        } catch (\Throwable $th) {
            // Rollback the transaction if any exception occurs
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}

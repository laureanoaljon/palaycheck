<?php

namespace App\Http\Controllers;

use App\Models\Report_bugs;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ReportBugsController extends Controller
{
    public function addReportBugs(Request $request){
        try {
            $imageName = Auth::user()->id . "_" . Str::uuid() . "." . $request->image->getClientOriginalExtension();
            
            $Report_bugs = Report_bugs::create([
                'user_id' => Auth::user()->id,
                'subject' => $request->subject,
                'problem_desc' => $request->problem_desc,
                'screenshot_name' => $imageName,
                'created_at' => now(), // or specify the desired timestamp
            ]);
            
            if (!$Report_bugs) {
                return response()->json(['status' => 'failed', 'message' => 'Not created']);
            } else {
                // Storage::disk("public")->put($screenshotName, $yourScreenshotContent);
                Storage::disk("public/bug_images")->put($imageName, file_get_contents($request->image));
        
                return response()->json(['status' => 'success', 'message' => 'Successfully created Report_bugs']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    } 
}

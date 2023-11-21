<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farm;

use Illuminate\Support\Facades\Auth;


class FarmController extends Controller
{

    public function farm(){
        $farms = Farm::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return response()->json(['status'=>'success', 'farms' => $farms]);
    }

    public function create_farm(Request $request){
        // $request->validate([
        //     'user_id' => 'required',
        //     'name' => 'required',
        //     'region' => 'required',
        //     'province' => 'required',
        //     'municipality' => 'required',
        //     'barangay' => 'required',
        //     'addtnl_address' => 'required',
        //     'size' => 'required',
        //     'water_source' => 'required',
        //     'tenurial_status' => 'required',
        //     'cropping_pattern' => 'required',
        // ]);
        // $farm = Farm::insert([
        //     'user_id' => $request->user_id,
        //     'user_id' => Auth::user()->id,
        //     'name' => $request->name,
        //     'region' => $request->region,
        //     'province' => $request->province,
        //     'municipality' => $request->municipality,
        //     'barangay' => $request->barangay,
        //     'addtnl_address' => $request->addtnl_address,
        //     'size' => $request->size,
        //     'water_source' => $request->water_source,
        //     'tenurial_status' => $request->tenurial_status,
        //     'cropping_pattern' => $request->cropping_pattern,
        // ]);

        // if (!$farm) {
        //     return response()->json(['status' => 'failed','message' => 'Not created']);

        // }else{
        //     return response()->json(['status' => 'success','message' => 'Successfully created farm','farm_data' => $farm]);
        // }



        // User::

        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            // 'region' => 'required',
            'province' => 'required',
            'municipality' => 'required',
            'barangay' => 'required',
            // 'addtnl_address' => 'required',
            'size' => 'required',
            'water_source' => 'required',
            'tenurial_status' => 'required',
            // 'cropping_pattern' => 'required',

        ]);
        // return $request;





        try {
            $farm = Farm::create([
                'user_id' => $request->user_id,
                'name' => $request->name,
                // 'region' => $request->region,
                'province' => $request->province,
                'municipality' => $request->municipality,
                'barangay' => $request->barangay,
                'addtnl_address' => $request->addtnl_address,
                'size' => $request->size,
                'water_source' => $request->water_source,
                'tenurial_status' => $request->tenurial_status,
                //'cropping_pattern' => $request->cropping_pattern,

                'versionNumber' => $request->versionNumber,
                'date_updated' => $request->date_updated,
                'is_archived' => $request->is_archived,
            ]);
    
            return response()->json(['status' => 'success','message' => 'Successfully created farm','farm_data' => $farm]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);

        }


    }

    public function update_farm(Request $request){
        $request->validate([
            'name' => 'required',
            // 'region' => 'required',
            'province' => 'required',
            'municipality' => 'required',
            'barangay' => 'required',
            // 'addtnl_address' => 'required',
            'size' => 'required',
            'water_source' => 'required',
            'tenurial_status' => 'required',
            // 'cropping_pattern' => 'required',
        ]);
        $farm = Farm::where('id',$request->id)->update([
            'name' => $request->name,
            // 'region' => $request->region,
            'province' => $request->province,
            'municipality' => $request->municipality,
            'barangay' => $request->barangay,
            'addtnl_address' => $request->addtnl_address,
            'size' => $request->size,
            'water_source' => $request->water_source,
            'tenurial_status' => $request->tenurial_status,
            // 'cropping_pattern' => $request->cropping_pattern,

            'versionNumber' => $request->versionNumber,
            'date_updated' => $request->date_updated,
            'is_archived' => $request->is_archived,
        ]);

        if (!$farm) {
            return response()->json(['status'=>'failed', 'message' => 'Not updated']);
        } else {
            $farm = Farm::find($request->id);
            return response()->json(['status'=> 'success', 'message' => 'Farm Edited','farm' => $farm,
            ]);
        }
    }

    public function delete_farm(Request $request){
        $farm =  Farm::find($request->id);
        if (!$farm) {
            return response()->json(['status'=>'failed', 'message' => 'Cannot find this farm']);
        } else {
            $farm->delete();
            return response()->json(['status'=>'success', 'message' => 'Farm Deleted']);
        }
    }




}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\season_other_expenses;
use Illuminate\Support\Facades\Auth;



class SeasonOtherExpensesController extends Controller
{

    public function getSeasonOtherExpenses(Request $request){
        // return "dex";
        try {
            $season_other_expenses = season_other_expenses::where('cropping_season_id', $request->cropping_season_id)->orderBy('id', 'desc')->get();

            if (count($season_other_expenses) == 0) {
                return response()->json(['status' => 'failed','message' => 'No existed record']);
            }else{
                return response()->json(['status'=>'success', 'data' => $season_other_expenses]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);

        }
    }
    public function addSeasonOtherExpenses(Request $request){
        // return $request;
        try {
            $season_other_expenses = season_other_expenses::insert([
                'user_id' => Auth::user()->id,
                'cropping_season_id' => $request->cropping_season_id,
                'expense_gas' => $request->expense_gas,
                'expense_transportasyon' => $request->expense_transportasyon,
                'expense_irigasyon' => $request->expense_irigasyon,
                'expense_sako' => $request->expense_sako,
                'expense_kuryente' => $request->expense_kuryente,
                'expense_pagkain' => $request->expense_pagkain,
                'expense_repair' => $request->expense_repair,
                'versionNumberdexxx' => $request->versionNumberdexxx,
                'date_updated' => $request->date_updated,
                'is_archived' => $request->is_archived

            ]);
            if (!$season_other_expenses) {
                return response()->json(['status' => 'failed','message' => 'Not created']);
            }else{
                $season_other_expenses = season_other_expenses::where("cropping_season_id", $request->cropping_season_id)->orderBy('id', 'DESC')->first();
                return response()->json(['status' => 'success','message' => 'Successfully created season other expenses','data' => $season_other_expenses]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);
            // return $th;

        }
    }
    public function updateSeasonOtherExpenses(Request $request){
        try {
            $season_other_expenses = season_other_expenses::where('id',$request->season_other_expenses_id)->update([
                'cropping_season_id' => $request->cropping_season_id,
                'expense_gas' => $request->expense_gas,
                'expense_transportasyon' => $request->expense_transportasyon,
                'expense_irigasyon' => $request->expense_irigasyon,
                'expense_sako' => $request->expense_sako,
                'expense_kuryente' => $request->expense_kuryente,
                'expense_pagkain' => $request->expense_pagkain,
                'expense_repair' => $request->expense_repair,
                'versionNumberdexxx' => $request->versionNumberdexxx,
                'date_updated' => $request->date_updated,
                'is_archived' => $request->is_archived
            ]);
            if (!$season_other_expenses) {
                return response()->json(['status'=>'failed', 'message' => 'Cannot find this season other expenses']);
            } else {
                $season_other_expenses = season_other_expenses::find($request->season_other_expenses_id);
                return response()->json(['status'=> 'success', 'message' => 'Successfully updated season other expenses','data' => $season_other_expenses ]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => $th]);
        }
    }
}

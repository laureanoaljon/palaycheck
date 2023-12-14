<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
Use DB;


class AuthController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api', [
            'except' => [
                'login',
                'register',
                'update'
            ]
        ]);
    }

    public function login(Request $request){
        if ($request->key!="dexter") {
            return response()->json(['status' => 'failed','message' => 'you have no rights to access'], 401);
        }
        $request->validate(['username' => 'required', 'password' => 'required']);
        $credentials = $request->only('username', 'password');
        $token = Auth::attempt($credentials);
        if (!$token){
            return response()->json(['status' => 'failed','message' => 'Wrong credentials',], 401);
        }
        $user = Auth::user();
        return response()->json(['status' => 'success','user' => $user,'token' => $token]);
    }
    public function register(Request $request){
        if ($request->key!="75cf74b816f5db6fa8ab8632750110dd") {
            return response()->json(['status' => 'failed','message' => 'you have no rights to access']);
        }
        $validator = $request->validate([
            'password' => 'required|min:8',
            'first_name' => 'required',
            'telepono' => 'required|unique:users',
            'username' => 'required|unique:users',
            'province' => 'required',
            'municipality' => 'required',
            'barangay' => 'required',
        ]);
    



        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'birthdate' => $request->birthdate,
                'sex' => $request->sex,
                'telepono' => $request->telepono,
                // 'email' => $request->email,
                'username' => $request->username,
                'password' => hash::make($request->password),
                'rsbsa_no' => $request->rsbsa_no,
                //'civil_status' => $request->civil_status,
                // 'region' => $request->region,
                'province' => $request->province,
                'municipality' => $request->municipality,
                'barangay' => $request->barangay,
                'addtnl_address' => $request->addtnl_address,
                'is_farmerOrg_member' => $request->is_farmerOrg_member,
                'organization_type' => $request->organization_type,
                'organization_name' => $request->organization_name,
                
                'versionNumber' => $request->versionNumber,
                'date_updated' => $request->date_updated,
                'is_archived' => $request->is_archived,
    
            ]);
            $token = Auth::login($user);
            return response()->json(['status' => 'success','message' => 'User Registered Successfully','user' => $user,'token' => $token]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed','message' => 'Something went wrong', "error" => $th]);
        }
    


        
    }
    public function logout(Request $request){
        return"dexter";
        try {
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                'status' => 'success',
                'message' => 'Logout Success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => ''.$e
            ]);
        }
    }
    public function update(Request $request){
        if ($request->key!="dexter") {
            return response()->json(['status' => 'failed','message' => 'you have no rights to access']);
        }
        $request->validate([
            'first_name' => 'required',
            'first_name' => 'required',
            // 'telepono' => 'required',
            'rsbsa_no' => 'required',
            // 'civil_status' => 'required',
            // 'region' => 'required',
            'password' => 'required',



            'province' => 'required',
            'municipality' => 'required',
            'barangay' => 'required',
            'addtnl_address' => 'required',
        ]);
        $user = User::where('id',$request->id)->update([
            'first_name' => $request->first_name,

            'password' => hash::make($request->password),

            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
            'sex' => $request->sex,
            // 'telepono' => $request->telepono,
            'rsbsa_no' => $request->rsbsa_no,
            // 'civil_status' => $request->civil_status,
            // 'region' => $request->region,
            'province' => $request->province,
            'municipality' => $request->municipality,
            'barangay' => $request->barangay,
            'addtnl_address' => $request->addtnl_address,
            'is_farmerOrg_member' => $request->is_farmerOrg_member,
            'organization_type' => $request->organization_type,
            'organization_name' => $request->organization_name,

            'versionNumber' => $request->versionNumber,
            'date_updated' => $request->date_updated,
            'is_archived' => $request->is_archived,
        ]);
        $user = User::find($request->id);
        return response()->json(['status' => 'success','message' => 'User Updated Successfully','user' => $user]);
    }
    public function refreshToken()
    {
        // return "dexter";
        // try {
        //     $token = JWTAuth::parseToken()->refresh();
        // } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
        //     return response()->json(['error' => 'Token is invalid'], 401);
        // } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
        //     return response()->json(['error' => 'Token has expired'], 401);
        // }
    
        // return response()->json(['new_token' => $token]);
    }

}

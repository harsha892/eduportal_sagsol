<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function showUser() {
        return response()->json(["Hello"]);
    }
    public function createUser(Request $request){
        $type = $request->get("type");
        $company_name = $request->get("company_name");
        $first_name = $request->get("first_name");
        $middle_name = $request->get("middle_name");
        $last_name = $request->get("last_name");
        $email = $request->get("email");
        $password = $request->get("password");
        $phone = $request->get("phone");
        if($type === "admin"){
            return "you are admin";
        } elseif ($type === "vendor"){ 
            return "you are admin";
        } elseif ($type === "recruiter"){
            return "you are recruiter";
        } else {
            return response()->json( [
                "status" => "fail",
                "message" => "type required"
            ] );
        }
    }
    public function doLogin(Request $request) {
       
        $email = $request->get("email");
        $pass = $request->password;

        if(!$email) {
            return response()->json( [
                "status" => "fail",
                "message" => "email required"
            ] );
            
        }

        if(!$pass) {
            return response()->json( [
                "status" => "fail",
                "message" => "password required"
            ] );
            
        }

        // Database checking logic

        return response()->json( [
            "status" => "success",
            "message" => "login success"
        ] );
    }
}

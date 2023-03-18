<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    //

    public function login(Request $request){

        $request->validate([
            "email"=>"required",
            "password"=>"required",
        ]);


        $check = User::all()->where('email',$request->input("email"))->where("password",$request->password)->first();

        if($check){
           
            session([
                "type"=>$check->type,
                "id"=>$check->id,
                "email"=>$check->email,
            ]);

            return redirect("/");
        }else{
            return back()->with("error","login faild");
        }
        
    }

    public function logout(){

        session()->flush();

        return redirect("login");
        
    }
}

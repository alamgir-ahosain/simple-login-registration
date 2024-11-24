<?php

namespace App\Http\Controllers;

use App\Models\userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UserinfoController extends Controller
{
    public function register()
    {

        return view('register');
    }


    public function login()
    {
        return view('login');
    }



    public function home()
    {
        return view('welcome');
    }



    //--------------------------------Registe postt-----------------------------------------
    public function registerPost(Request $request)
    {


        //upload image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);


        
      
        // return back()->with('success','alamgir;YOU DONE IT');


        $userinfo = new userinfo();

        $userinfo->sid = $request->sid;
        $userinfo->name = $request->name;
        $userinfo->email = $request->email;
        $userinfo->image =$imageName;
        
        $userinfo->password = Hash::make($request->password);  

       // $userinfo->save();
        if ($userinfo->save()) {
            return redirect('/login')->with('success', 'User registered successfully!'); // Redirect to login with a success message
        }
        return back()->with('error', 'Something went wrong, please try again!'); // Redirect back with an error message
        
    }


    //---------------------------------  //login part---------------------------------------------
    public function loginPost(Request $request)
    {


        $credential = [

            'email' => $request->email,
            'password' => $request->password,

        ];
        

        if (Auth::attempt($credential)) {
            return redirect('/profile')->with('success', 'welcome home');
        }
        return back()->with('error', 'again');
    }




    //-------------------------------Logout-------------

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

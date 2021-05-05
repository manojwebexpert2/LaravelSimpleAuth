<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Session;

class MainController extends Controller
{
    public function loginnow(Request $req)
    {
        $req->validate([
            "email"=>"required|email",
            "password"=>"required",
        ]);

        $admin=Admin::where("email","=",$req->email)->first();
        if(!$admin)
        {
        return back()->with('fail','no record found');
        }
        else
        {
            if(Hash::check($req->password,$admin->password))
            {
                 Session::put('adminuser',$admin);
                 return redirect('/admin/dashboard');
            }
            else
            {
                return back()->with('fail','wrong password entered');
            }

        }

            

    }
    public function register()
    {
        return view("auth.regsiter");
    }
    public function save(Request $req)
    {
        $req->validate([
            "name"=>"required",
            "email"=>"required|email| unique:admins",
            "password"=>"required",
        ]);
       
        $data=new Admin;
        $data->name=$req->name;
        $data->email=$req->email;
        $data->password=Hash::make($req->password);

        $save=$data->save();
        if($save)
        {
            return back()->with('success','successfuly registered');
        }
        else
        {
            return back()->with('fail','unable to register');
        }
       
    }
    public function logout()
    {
        Session::pull('adminuser');
        return redirect('/auth/login');
    }
}

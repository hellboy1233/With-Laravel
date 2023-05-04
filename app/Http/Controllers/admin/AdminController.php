<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function index(request $request)
    {
        if($request->session()->has('USER_ID')){
            return redirect('admin/dashboard');
        }else{
            return view('admin.login');
        }
        
    }

   
    public function auth(request $r)
    {
        $email=$r->post('email');
        $pass=$r->post('password');
        $cpass=$r->post('cpassword');
        $login_value=$r->post('login_value');
        echo "lskrjglksjlgksjlkh";
        if($login_value==0){
            $table=admin::where(['email'=>$email])->first();
            if($table){
            if(Hash::check($pass,$table->password)){
                    $r->session()->put('USER_ID',$table->id);
                    $r->session()->put('USER_LOG',true);
                    return redirect('admin/dashboard');
            }else{
                $r->session()->flash('err','fillout correct Login details');
                return redirect('admin');
            }
            }else{
                $r->session()->flash('err','fillout correct Login details');
                return redirect('admin');
            }
        }else{
            if($pass==$cpass){
                admin::insert(['email'=>$email,'password'=>Hash::make($pass)]);
                $r->session()->flash('err','successfully registered');
            }else{
                $r->session()->flash('err','password and confirm password should be same');
            }
            

        }
        
        
    }
    public function dash(){
        return view('admin/dash');
    }
    public function logout(request $r){
        $r->session()->forget('USER_ID');
        $r->session()->forget('USER_LOG');
        return redirect('admin');
    }
    

}   
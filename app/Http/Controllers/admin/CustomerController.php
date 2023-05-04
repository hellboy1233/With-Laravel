<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $data['result']=customer::get()->all();
        
        return view('admin.customer',$data);
    }
    public function manage_customer($id="")
    {
        if($id>0){
            $data=customer::where(['id'=>$id])->get();
            $result['status']=$data['0']->status;
            $result['name']=$data['0']->name;
            $result['email']=$data['0']->email;
            $result['mobile']=$data['0']->mobile;
            $result['password']=$data['0']->password;
            $result['address']=$data['0']->address;
            $result['city']=$data['0']->city;
            $result['state']=$data['0']->state;
            $result['zip']=$data['0']->zip;
            $result['company']=$data['0']->company;
            $result['id']=$data['0']->id;
            
        }else{
            $result['status']='0';
            $result['name']='';
            $result['email']='';
            $result['mobile']='';
            $result['password']='';
            $result['address']='';
            $result['city']='';
            $result['state']='';
            $result['zip']='';
            $result['company']='';
            $result['id']='';
            
        }
        return view('admin.manage_customer',$result);

    }

    public function manage_customer_process(request $r)
    {
        $r->validate([
           
           
        ]);
        
        $name=$r->post('name');
        $email=$r->post('email');
        $mobile=$r->post('mobile');
        $password=$r->post('password');
        $address=$r->post('address');
        $city=$r->post('city');
        $state=$r->post('state');
        $zip=$r->post('zip');
        $company=$r->post('company');
        
        
        
        $id=$r->post('id');
        if($id>0){
            customer::where('id',$id)->update([
                'name'=>$name,
                'email'=>$email,
                'mobile'=> $mobile,
                'password'=>$password,
                'address'=>$address,
                'city'=>$city,
                'state'=>$state,
                'zip'=> $zip,
                'company'=>$company,
                
                ]);
            $r->session()->flash('err','record updated'); 
        }else{
            customer::insert([
                'name'=>$name,
                'email'=>$email,
                'mobile'=> $mobile,
                'password'=>$password,
                'address'=>$address,
                'city'=>$city,
                'state'=>$state,
                'zip'=> $zip,
                'company'=>$company,
                'status'=>0,
            ]);
            $r->session()->flash('err','record added successfully');
        }
        
        
       
        return redirect('admin/customer');
    }
    public function delete_customer($id){
        customer::find($id)->delete();
        return redirect('admin/customer');
    }
    public function status_customer($status,$id){
        customer::where('id',$id)->update(['status'=>$status]);
        return redirect('admin/customer');
        
    }
    public function show_customer_detail($id){
        $result['show']=customer::where('id',$id)->get();
        return view('admin.show_customer_detail',$result);
        
    }
    
}

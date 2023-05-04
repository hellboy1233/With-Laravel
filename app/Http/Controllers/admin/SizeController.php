<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\admin\size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $data['result']=size::get()->all();
        
        return view('admin.size',$data);
    }
    public function manage_size($id="")
    {
        if($id>0){
            $data=size::where(['id'=>$id])->get();
            $result['size']=$data['0']->size;
            $result['id']=$data['0']->id;
            
        }else{
            $result['size']='';
           $result['id']='';
        }
        return view('admin.manage_size',$result);

    }

    public function manage_size_process(request $r)
    {
        $r->validate([
            'size'=>'required',
           
        ]);
        
        $size=$r->post('size');
        
        
        $id=$r->post('id');
        if($id>0){
            size::where('id',$id)->update(['size'=>$size]);
            $r->session()->flash('err','record updated'); 
        }else{
            size::insert(['size'=>$size,'status'=>'1']);
            $r->session()->flash('err','record added successfully');
        }
        
        
       
        return redirect('admin/size');
    }
    public function delete_size($id){
        size::find($id)->delete();
        return redirect('admin/size');
    }
    public function status_size($status,$id){
        size::where('id',$id)->update(['status'=>$status]);
        return redirect('admin/size');
        
    }
}

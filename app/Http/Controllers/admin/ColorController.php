<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $data['result']=color::get()->all();
        
        return view('admin.color',$data);
    }
    public function manage_color($id="")
    {
        if($id>0){
            $data=color::where(['id'=>$id])->get();
            $result['color']=$data['0']->color;
            $result['id']=$data['0']->id;
            
        }else{
            $result['color']='';
           $result['id']='';
        }
        return view('admin.manage_color',$result);

    }

    public function manage_color_process(request $r)
    {
        $r->validate([
            'color'=>'required|unique:colors',
           
        ]);
        
        $color=$r->post('color');
        
        
        $id=$r->post('id');
        if($id>0){
            color::where('id',$id)->update(['color'=>$color]);
            $r->session()->flash('err','record updated'); 
        }else{
            color::insert(['color'=>$color,'status'=>'1']);
            $r->session()->flash('err','record added successfully');
        }
        
        
       
        return redirect('admin/color');
    }
    public function delete_color($id){
        color::find($id)->delete();
        return redirect('admin/color');
    }
    public function status_color($status,$id){
        color::where('id',$id)->update(['status'=>$status]);
        return redirect('admin/color');
        
    }
}

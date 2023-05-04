<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\homebanner;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomebannerController extends Controller
{
    public function index()
    {
        $data['result']=homebanner::get()->all();
        
        return view('admin.banner',$data);
    }
    public function manage_banner($id="")
    {
        if($id>0){
            
            $data=homebanner::where(['id'=>$id])->get();
            $result['btn_txt']=$data['0']->btn_txt;
            $result['btn_link']=$data['0']->btn_link;
            $result['id']=$data['0']->id;
           
            $result['b_image']=$data['0']->image;
            
            
        
            
        }else{
            $result['btn_txt']='';
            $result['btn_link']='';
            $result['id']='';
            
            $result['b_image']='';
            

        }
        
        return view('admin.manage_banner',$result);

    }

    public function manage_banner_process(request $r)
    {
        
        $r->validate([
            
            'b_image'=>'required|mimes:jpg,jpeg,png',
        ]);
        
        
        $id=$r->post('id');
        $btn_txt=$r->post('btn_txt');
        $btn_link=$r->post('btn_link');
        
        
        $image=$r->file('b_image');
        $ext=$image->extension();
        $file=time().'.'.$ext;
        $image->storeAs('public/images',$file);
        
        if($id>0){
            $data=homebanner::where(['id'=>$id])->get();
            if(Storage::exists('/public/images/'.$data[0]->banner_img)){
                Storage::delete('/public/images/'.$data[0]->banner_img);      
            }
            banner::where('id',$id)->update([
                'btn_txt'=>$btn_txt,
                'btn_link'=>$btn_link,
                
                'image'=>$file,
                
                ]);
            $r->session()->flash('err','record updated'); 
        }else{
            homebanner::insert([
                'btn_txt'=>$btn_txt,
                'btn_link'=>$btn_link,
                'status'=>1,
                
                'image'=>$file,
                
                ]);
            $r->session()->flash('err','record added successfully');
        }
        
        
       
        return redirect('admin/banner');
    }
    public function delete_banner($id){
        homebanner::find($id)->delete();
        return redirect('admin/banner');
    }
    public function status_banner($status,$id){
        homebanner::where('id',$id)->update(['status'=>$status]);
        return redirect('admin/banner');
        
    }
}

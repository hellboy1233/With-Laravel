<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\brand_master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandMasterController extends Controller
{
    public function index()
    {
        $data['result']=brand_master::get()->all();
        
        return view('admin.brand',$data);
    }
    public function manage_brand($id="")
    {
        if($id>0){
            $data=brand_master::where(['id'=>$id])->get();
            $result['name']=$data['0']->name;
            $result['id']=$data['0']->id;
            if($data['0']->is_home==1){
                $result['is_home_checked']='checked';
            }else{
                $result['is_home_checked']='';
            }
            
        }else{
            $result['name']='';
            $result['id']='';
            $result['is_home_checked']='';
           
        }
        return view('admin.manage_brand',$result);

    }

    public function manage_brand_process(request $r)
    {
        
        $r->validate([
            'name'=>'required|unique:brand_masters,name,'.$r->post('id'),
            'image'=>'mimes:jpg,jpeg,png',
           
        ]);
        $is_home='0';
        if($r->post('is_home')!=null){
            $is_home='1';
        }
        
        $name=$r->post('name');
        $image=$r->file('image');
        $ext=$image->extension();
        $file=time().'.'.$ext;
        $r->file("image")->storeAs('public/images',$file);

        
        $id=$r->post('id');
        
        if($id>0){
           
            $bmi=brand_master::where('id',$id)->get();
           
            if(Storage::exists('/public/images/'.$bmi[0]->image)){
                Storage::delete('/public/images/'.$bmi[0]->image);      
            }
            brand_master::where('id',$id)->update(['name'=>$name,'image'=>$file,'is_home'=>$is_home,]);
            $r->session()->flash('err','record updated'); 
        }else{
            if($r->hasfile('image')){
                brand_master::insert(['name'=>$name,'image'=>$file,'status'=>'1','is_home'=>$is_home,]);
            }else{
                brand_master::insert(['name'=>$name,'image'=>'no image','status'=>'1','is_home'=>$is_home,]);
            }
            
            
            $r->session()->flash('err','record added successfully');
        }
        
        
       
        return redirect('admin/brand');
    }
    public function delete_brand($id){
        brand_master::find($id)->delete();
        return redirect('admin/brand');
    }
    public function status_brand($status,$id){
        brand_master::where('id',$id)->update(['status'=>$status]);
        return redirect('admin/brand');
        
    }
}

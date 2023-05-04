<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\admin\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result']=category::get()->all();
        
        return view('admin.category',$data);
    }
    public function manage_category($id="")
    {
        if($id>0){
            
            $data=category::where(['id'=>$id])->get();
            $result['category_name']=$data['0']->category_name;
            $result['category_slug']=$data['0']->category_slug;
            $result['id']=$data['0']->id;
            $result['parent_category_id']=$data['0']->parent_category_id;
            $result['category_img']=$data['0']->category_img;
            if($data['0']->is_home==1){
                $result['is_home_checked']='checked';
            }else{
                $result['is_home_checked']='';
            }
            
        
            
        }else{
            $result['category_name']='';
            $result['category_slug']='';
            $result['id']='';
            $result['parent_category_id']='';
            $result['category_img']='';
            $result['is_home_checked']='';

        }
        $result['category']=DB::table('categories')->where('status','1')->get();
        return view('admin.manage_category',$result);

    }

    public function manage_category_process(request $r)
    {
        
        $r->validate([
            'category_name'=>'required',
            //.$r->post('id') yesko slug bahek aru column kko slug chai check garxa aba
            'category_slug'=>'required|unique:categories,category_slug,'.$r->post('id'),
            'category_img'=>'required|mimes:jpg,jpeg,png',
        ]);
        $is_home='0';
        if($r->post('is_home')!=null){
            $is_home='1';
        }
        $id=$r->post('id');
        $cname=$r->post('category_name');
        $cslug=$r->post('category_slug');
        $parent_category_id=$r->post('parent_category_id');
        
        $image=$r->file('category_img');
        $ext=$image->extension();
        $file=time().'.'.$ext;
        $image->storeAs('public/images',$file);
        
        if($id>0){
            $data=category::where(['id'=>$id])->get();
            if(Storage::exists('/public/images/'.$data[0]->category_img)){
                Storage::delete('/public/images/'.$data[0]->category_img);      
            }
            category::where('id',$id)->update([
                'category_name'=>$cname,
                'category_slug'=>$cslug,
                'parent_category_id'=>$parent_category_id,
                'category_img'=>$file,
                'is_home'=>$is_home,
                ]);
            $r->session()->flash('err','record updated'); 
        }else{
            category::insert([
                'category_name'=>$cname,
                'category_slug'=>$cslug,
                'status'=>1,
                'parent_category_id'=>$parent_category_id,
                'category_img'=>$file,
                'is_home'=>$is_home,
                ]);
            $r->session()->flash('err','record added successfully');
        }
        
        
       
        return redirect('admin/category');
    }
    public function delete_category($id){
        category::find($id)->delete();
        return redirect('admin/category');
    }
    public function status_category($status,$id){
        category::where('id',$id)->update(['status'=>$status]);
        return redirect('admin/category');
        
    }
    
    

} 
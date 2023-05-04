<?php


namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index()
    {
        $data['result']=tax::get()->all();
        
        return view('admin.tax',$data);
    }
    public function manage_tax($id="")
    {
        if($id>0){
            $data=tax::where(['id'=>$id])->get();
            $result['tax_desc']=$data['0']->tax_desc;
            $result['tax_value']=$data['0']->tax_value;
            $result['id']=$data['0']->id;
            
        }else{
            $result['tax_desc']='';
            $result['tax_value']='';
            $result['id']='';
        }
        return view('admin.manage_tax',$result);

    }

    public function manage_tax_process(request $r)
    {
        
        
        $tax_value=$r->post('tax_value');
        $tax_desc=$r->post('tax_desc');
        $id=$r->post('id');
        if($id>0){
            tax::where('id',$id)->update([
                'tax_value'=>$tax_value,
                'tax_desc'=>$tax_desc,
            ]);
            $r->session()->flash('err','record updated'); 
        }else{
            tax::insert([
                'tax_value'=>$tax_value,
                'status'=>'1',
                
                'tax_desc'=>$tax_desc,
                ]);
            $r->session()->flash('err','record added successfully');
        }
        
        
       
        return redirect('admin/tax');
    }
    public function delete_tax($id){
        tax::find($id)->delete();
        return redirect('admin/tax');
    }
    public function status_tax($status,$id){
        tax::where('id',$id)->update(['status'=>$status]);
        return redirect('admin/tax');
        
    }
}

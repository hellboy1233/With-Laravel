<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $data['result']=coupon::get()->all();
        
        return view('admin.coupon',$data);
    }
    public function manage_coupon($id="")
    {
        if($id>0){
            $data=coupon::where(['id'=>$id])->get();
            $result['title']=$data['0']->title;
            $result['code']=$data['0']->code;
            $result['value']=$data['0']->value;
            $result['id']=$data['0']->id;
            
            $result['value_type']=$data['0']->value_type;
            $result['minimum_order_amt']=$data['0']->minimum_order_amt;
            $result['is_one_time']=$data['0']->is_one_time;
            
        }else{
            $result['title']='';
            $result['code']='';
            $result['value']='';
            $result['id']='';

            $result['value_type']='';
            $result['minimum_order_amt']='';
            $result['is_one_time']='';
        }
        return view('admin.manage_coupon',$result);

    }

    public function manage_coupon_process(request $r)
    {
        $r->validate([
            'title'=>'required',
            //.$r->post('id') yesko code bahek aru column kko slug chai check garxa aba
            'code'=>'required|unique:coupons,code,'.$r->post('id'),
        ]);
        
        $title=$r->post('title');
        $code=$r->post('code');
        $value=$r->post('value');
        $id=$r->post('id');

        $value_type=$r->post('value_type');
        $minimum_order_amt=$r->post('minimum_order_amt');
        $is_one_time=$r->post('is_one_time');
        
        if($id>0){
            coupon::where('id',$id)->update([
                'title'=>$title,
                'code'=>$code,
                'value'=>$value,
                'is_one_time'=>$is_one_time,
                'minimum_order_amt'=>$minimum_order_amt,
                'value_type'=>$value_type,
                ]);
            $r->session()->flash('err','record updated'); 
        }else{
            coupon::insert([
                'title'=>$title,
                'code'=>$code,
                'value'=>$value,
                'status'=>'1',
                'is_one_time'=>$is_one_time,
                'minimum_order_amt'=>$minimum_order_amt,
                'value_type'=>$value_type,
                ]);
            $r->session()->flash('err','record added ');
        }
        
        
       
        return redirect('admin/coupon');
    }
    public function delete_coupon($id){
        coupon::find($id)->delete();
        return redirect('admin/coupon');
    }
    public function status_coupon($status,$id){
        coupon::where('id',$id)->update(['status'=>$status]);
        return redirect('admin/coupon');
        
    }
}

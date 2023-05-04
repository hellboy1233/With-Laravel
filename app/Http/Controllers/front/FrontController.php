<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Notifications\VerifyEmail;
use Crypt;
use Mail;

use Cixware\Esewa\Client;
use Cixware\Esewa\Config;
require '../vendor/autoload.php';



class FrontController extends Controller
{
    
    public function index(request $request)
    {
        
        
        $result['brand']=DB::table('brand_masters')
       ->where(['status'=>'1'])
       ->where(['is_home'=>'1'])
       ->get();

        
       $result['category']=DB::table('categories')
       ->where(['status'=>'1'])
       ->where(['is_home'=>'1'])
       
       ->get();
       

       $result['homebanner']=DB::table('homebanners')
       ->where(['status'=>'1'])
       ->get();


       
       foreach($result['category'] as $prl){
          
           
            $result['prod_list'][$prl->id]=DB::table('products')
            ->where('status','1')
            ->where('category_id',$prl->id)
            ->get();
            
            
            foreach($result['prod_list'][$prl->id] as $pal){
                $result['prod_at_list'][$pal->id]=DB::table('product_attr')
                ->where('product_id',$pal->id)
                ->get();
            }
            
            foreach($result['prod_list'][$prl->id] as $pul){
                
                if($pul->is_featured==1){
                    $result['prod_at2_list'][$pul->id]=DB::table('products')
                    ->where('id',$pul->id)
                    ->get();
                    
                
                } 
                
                
            }   
            
            
            foreach($result['prod_list'][$prl->id] as $pul){
                if($pul->is_discounted==1){
                    $result['prod_at1_list'][$pul->id]=DB::table('products')
                    ->where('id',$pul->id)
                    ->get();
                    
                
                } 
                
                
            }   
            
            foreach($result['prod_list'][$prl->id] as $pul){
                if($pul->is_trading==1){
                    $result['prod_at3_list'][$pul->id]=DB::table('products')
                    ->where('id',$pul->id)
                    ->get();
                    
                
                }  
            }  
            
            
       }
      
   
       return view('front.home',$result);
    } 

    public function category(request $request,$slug)
    {
        $result['category']=DB::table('categories')
       ->where(['category_slug'=>$slug])
       ->get();

       $result['category_data']=DB::table('categories')
       ->where(['status'=>'1'])
       ->get();

       $result['slug']=$slug;
       $sort='';
       $result['default']='';
       $result['starting_price']='';
       $result['ending_price']='';
       $result['coloring']='';
       $colorarr=[];
       if($request->get('sort_value')!=''){  
           $sort=$request->get('sort_value');
       }
       $result['colors_list']=DB::table('colors')->get();
       
        foreach($result['category'] as $prl){
            $query=DB::table('products');
            $query= $query->where('status','1');
            $query= $query->where('category_id',$prl->id);
            $query= $query->leftJoin('product_attr','product_attr.product_id','=','products.id');
            if($sort=='name'){
                $query= $query->orderBy('products.product_name','asc');
                $result['default']='name';
            }
            if($sort=='date'){
                $result['default']='date';
                $query= $query->orderBy('products.id','asc');

            }
            if($sort=='price_desc'){
                $result['default']='price_desc';
                $query= $query->orderBy('product_attr.price','desc');
            }
            if($sort=='price_asc'){
                $result['default']='price_asc';
                $query= $query->orderBy('product_attr.price','asc');
            }
            if($request->get('starting_price')!==null && $request->get('ending_price')!==null){
                $result['starting_price']=$request->get('starting_price');
                $result['ending_price']=$request->get('ending_price');
                if($request->get('starting_price')>0 && $request->get('ending_price')>0){
                    $query=$query->whereBetween('product_attr.price',[$result['starting_price'], $result['ending_price']]);
                }
                
            }
            if($request->get('color_f')!==null){
                $result['coloring']=$request->get('color_f');
                $colorarr=explode(":", $result['coloring']);
                $colorarr=array_filter( $colorarr);
                
                $query=$query->where(['product_attr.color_id'=>$colorarr]);
            }

            $query=$query->select('products.*');
            $query=$query->get();
            $result['colorarr']=$colorarr;
            $result['prod_list']=$query; 
            
        }   
        foreach($result['prod_list'] as $pal){
            $query1=DB::table('product_attr');
            $query1=$query1->where('product_id',$pal->id);
            
            $query1=$query1->get();
            $result['prod_attr_list'][$pal->id]=$query1;
        }
    
        return view('front.category',$result);
    }
    public function product(request $request,$id,$color_id='')
    {
        $presult['product']=DB::table('products')
        ->where('id',$id)
        ->get();

        
        $cid=$presult['product'][0]->category_id;
        $slug=$presult['product'][0]->slug;
        $presult['category']=DB::table('categories')
        ->where('id',$cid)
        ->get();

        $presult['sizeacol']=DB::table('product_attr')
        ->where('product_id',$id)
        ->get();

        
        $presult['images']=DB::table('product_images')
        ->where('product_id',$id)
        ->get();

        $presult['prod_info']=DB::table('products')
        ->where('id',$id)
        ->get();


        $presult['relatedprod']=DB::table('products')
        ->where('category_id',$cid)
        ->where('status',1)
        ->where('slug','!=',$slug)
        ->get();
        
        
        return view('front.product_info',$presult);
    }
    public function add_to_cart(request $request)
    {
        
        if($request->session()->has('FRONT_USER_LOGIN')){
            $uid=$request->session()->get('FRONT_USER_ID');
            $user_type='reg';
        }else{
            echo "hvmhgkgbkhgkhgjgchfxdhjchjhfckhgdcjhvgmjdjchmgcmhgchgchgchchfchfcmhfchfcmgfchgfchcfh";
            $uid=gettemp_user_id();
            $user_type='not_reg';
            echo $uid;

        }
       
        $size_id=$request->post('size_id');
        $color_id=$request->post('color_id');
        $product_id=$request->post('product_id');
        $pqty=$request->post('pqty');


        
        $presult=DB::table('product_attr')
        ->where('product_id',$product_id)
        ->where('color_id',$color_id)
        ->where('size_id',$size_id)
        ->get();
        $product_attr_id=$presult[0]->id;
        $check=DB::table('cart')
        ->where(['product_id'=>$product_id])
        ->where(['user_id'=>$uid])
        ->where(['user_type'=>$user_type])
        ->where(['product_attr_id'=>$product_attr_id])
        ->get();
        if(isset($check[0])){
            $update_id=$check[0]->id;
            if($pqty=='0'){
                DB::table('cart')
                ->where(['id'=>$update_id])
                ->delete();  
                $msg='deleted';
            }else{
                DB::table('cart')
            ->where(['id'=>$update_id])
            ->update(['qty'=>$pqty]);
            $msg= "updated";
            }
            
        }else{
            $id=DB::table('cart')->insertGetId([
                'product_id'=>$product_id,
                'user_id'=>$uid,
                'user_type'=>$user_type,
                'product_attr_id'=>$product_attr_id,
                'qty'=>$pqty,
                'added_on'=>date('y-m-d h-i-s')
            ]);
            $msg= "inserted";
        }
        $results=DB::table('cart')
        ->leftJoin('products','products.id','=','cart.product_id')
        ->leftJoin('product_attr','product_attr.id','=','cart.product_attr_id')
        
        ->where(['user_id'=>$uid])
        ->where(['user_type'=>$user_type])
        ->select('cart.qty','products.id','products.product_name','product_attr.size_id','product_attr.color_id','product_attr.price','product_attr.mrp','product_attr.image')
        ->get();
        return response()->json(['msg'=>$msg,'data'=>$results,'totalitem'=>count($results)]);
    }
    public function add_to_cart2(request $request)
    {
        if($request->session()->has('FRONT_USER_LOGIN')){
            $uid=$request->session()->get('FRONT_USER_ID');
            $user_type='reg';
        }else{
            
            $uid=gettemp_user_id();
            $user_type='not_reg';
            

        }
       
        $size_id=$request->post('size_id');
        $color_id=$request->post('color_id');
        $product_id=$request->post('product_id');
        $pqty=$request->post('pqty');


        
        $presult=DB::table('product_attr')
        ->where('product_id',$product_id)
        ->where('color_id',$color_id)
        ->where('size_id',$size_id)
        ->get();

        $product_attr_id=$presult[0]->id;
        /* $check=DB::table('cart')
        ->where(['product_id'=>$product_id])
        ->where(['user_id'=>$uid])
        ->where(['user_type'=>$user_type])
        ->where(['product_attr_id'=>$product_attr_id])
        ->get();
        if(isset($check[0])){
            $update_id=$check[0]->id;
            if($pqty=='0'){
                DB::table('cart')
                ->where(['id'=>$update_id])
                ->delete();  
                $msg='deleted';
            }else{
                DB::table('cart')
            ->where(['id'=>$update_id])
            ->update(['qty'=>$pqty]);
            $msg= "updated";
            }
            
        }else{

        }
            */
            $id=DB::table('cart')->insertGetId([
                'product_id'=>$product_id,
                'user_id'=>$uid,
                'user_type'=>$user_type,
                'product_attr_id'=>$product_attr_id,
                'qty'=>1,
                'added_on'=>date('y-m-d h-i-s')
            ]);
            $msg= "inserted";
            
        
        
        return response()->json(['msg'=>$msg]);
    }

    
    public function cart(request $request)
    {
        if($request->session()->has('FRONT_USER_LOGIN')){
            $uid=$request->session()->get('FRONT_USER_ID');
            $user_type='reg';
        }else{
            $uid=gettemp_user_id();
            $user_type='not_reg';
            
        }
        $results['carting']=DB::table('cart')
        ->leftJoin('products','products.id','=','cart.product_id')
        ->leftJoin('product_attr','product_attr.id','=','cart.product_attr_id')
        
        ->where(['user_id'=>$uid])
        ->where(['user_type'=>$user_type])
        ->select('cart.qty','products.id','products.product_name','product_attr.size_id','product_attr.color_id','product_attr.price','product_attr.mrp','product_attr.image')
        ->get();
       
        return view('front.cart',$results);
    }

    public function cart_form_qty(request $request){
        $size_id=$request->post('size_id');
        $color_id=$request->post('color_id');
        $product_id=$request->post('product_id');
        $pqty=$request->post('qty');

        if($request->session()->has('FRONT_USER_LOGIN')){
            $uid=$request->session()->get('FRONT_USER_ID');
            $user_type='reg';
        }else{
            $uid=gettemp_user_id();
            $user_type='not_reg';
            
        }

        $presult=DB::table('product_attr')
        ->where('product_id',$product_id)
        ->where('color_id',$color_id)
        ->where('size_id',$size_id)
        ->get();
        $product_attr_id=$presult[0]->id;
        $check=DB::table('cart')
        ->where(['product_id'=>$product_id])
        ->where(['user_id'=>$uid])
        ->where(['user_type'=>$user_type])
        ->where(['product_attr_id'=>$product_attr_id])
        ->get();
        
            $update_id=$check[0]->id;
            DB::table('cart')
            ->where(['id'=>$update_id])
            ->update(['qty'=>$pqty]);
            $msg='updated';
            
            return response()->json(['msg'=>$msg]);
        
    }
    function search(request $request,$str){
        $result['prod_list']=DB::table('products')
            ->where(['status'=>1])
            ->where('product_name','like',"%$str%")
            ->orwhere('product_model','like',"%$str%")
            ->orwhere('short_desc','like',"%$str%")
            ->orwhere('desc','like',"%$str%")
            ->orwhere('slug','like',"%$str%")
            ->orwhere('keywords','like',"%$str%")
            ->get();
            

           
            foreach($result['prod_list'] as $pal){
                $query1=DB::table('product_attr');
                $query1=$query1->where('product_id',$pal->id);
                
                $query1=$query1->get();
                $result['prod_attr_list'][$pal->id]=$query1;
            }
            
   
    return view('front.search',$result);
    }
    function registration(request $request){
        if(session()->has('FRONT_USER_LOGIN')==null){
            return view('front.registration');
            
        }
        return redirect('/');
    }
    function registration_process(request $request){
        $rand_id=rand(111111111,999999999);

        $valid=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|unique:customers,email',
            'mobile'=>'required|numeric|digits:10',
            'password'=>'required',
           
        ]);
        if(!$valid->passes()){
            return response()->json([
                'status'=>'error',
                'error'=>$valid->errors()->toArray()
            ]);
        }else{
            $arr=[
                "name"=>$request->name,
                "email"=>$request->email,
                "mobile"=>$request->mobile,
                "password"=>Crypt::encrypt($request->password),
                "status"=>1,
                "coupon_auth"=>1,
                "is_verify"=>0,
                "rand_id"=>$rand_id,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s"),
            ];
            $query=DB::table('customers')->insert($arr);
            
            if($query){
                $data=['name'=>$request->name,'rand_id'=>$rand_id];
                $user['to']=$request->email;
                Mail::send('front/email_verification',$data,function($msg) use($user){
                    $msg->to($user['to']);
                    $msg->subject('email verification');
                });
                
                return response()->json([
                    'status'=>'success',
                    'msg'=>'to verify your account,please check your email'
                ]); 
                  
            }
        }
    }
    function login_process(request $request){
        
       $email=$request->post('email');
        $password=$request->post('password');
        $remember=$request->post('rememberme');
       $user=DB::table('customers')->where(['email'=>$email])->get();
       
       if(!isset($user[0])){
        return response()->json([
            'status'=>'error',
            'msg'=>'logged fail'
            ]);
            $pass=$user[0]->password;
       
       if(!Crypt::decrypt($pass)==$password){
            return response()->json([
                'status'=>'error',
                'msg'=>'logged fail'
                ]);
       }
        
       }
       if($user[0]->is_verify==0){
        return response()->json([
            'status'=>'success',
            'msg'=>'first verify your gmail account'
            ]);
       }
       if($user[0]->status==0){
        return response()->json([
            'status'=>'success',
            'msg'=>'your account has been deactivated'
            ]);
       }

    
       $request->session()->put('FRONT_USER_LOGIN',true);
        $request->session()->put('FRONT_USER_ID',$user[0]->id);
        $request->session()->put('FRONT_USER_NAME',$user[0]->name);
       
       if( $remember=='on'){
            setcookie('login_email',$email,time()+60*60*24*100);
            setcookie('login_password',$password,time()+60*60*24*100);
       }else{
        setcookie('login_email',$email,time()-60*60);
        setcookie('login_password',$password,time()-60*60);
       }
       
       
       return response()->json([
        'status'=>'success',
        'msg'=>$email
        ]); 
    }
    public function e_verification(request $request, $id){
        $user=DB::table('customers')->where(['rand_id'=>$id])->get();
        if(isset( $user[0])){
            DB::table('customers')->where(['id'=>$user[0]->id])
            ->update(['is_verify'=>1,'rand_id'=>'']);
        }
        return view('front.verification');
    }
    function forgot_process(request $request){
        
        $email=$request->post('email');
        $rand_id=rand(111111111,999999999);
        
       $user=DB::table('customers')->where(['email'=>$email])->get();
       if($user[0]){
        $request->session()->put('FORGOT_PASSWORD_ID',$user[0]->id);
        DB::table('customers')->where(['email'=>$email])->update(['rand_id'=>$rand_id]);
        
            $data=['name'=>$user[0]->name,'rand_id'=>$rand_id];
            $user['to']=$email;
            
            Mail::send('front/lost_verification',$data,function($msg) use($user){
                $msg->to($user['to']);
                $msg->subject('reset password');
            });
            
            return response()->json([
                'status'=>'success',
                'msg'=>'to reset your password,please check your email'
            ]); 
       }else{
        return response()->json([
            'status'=>'error',
            'msg'=>'your email is not registered yet.'
            ]); 
       }
    }
    function reset_password(request $request,$rid){
        $r['random']= $rid;
        return view('front.psssword_reset',$r);
    }
    function reset_new_password_process(request $request){
        $newpass=$request->post('npassword');
        $cpassword=$request->post('cpassword');
        
        if($newpass==$cpassword){
           
                DB::table('customers')->where(['id'=>$request->session()->get(' FORGOT_PASSWORD_ID')])->update([
                    "password"=>Crypt::encrypt($newpass),
                    "rand_id"=>''
                ]);
                session_destroy();
                return response()->json([
                    'status'=>'success',
                    'msg'=>'password updated'
                ]);
           
            
        }else{
            return response()->json([
                'status'=>'error',
                'msg'=>'password should be same'
            ]);
        }
    }
    function checkout(request $request){
        $user=getdatafromcart();
        if($request->session()->has('FRONT_USER_LOGIN')){
            $uid=$request->session()->get('FRONT_USER_ID');
            $user_type='reg';
           
        }else{
            $uid=gettemp_user_id();
            $user_type='not_reg';
            
        }
        $results['customer']=$uid;
        
        if(isset( $user[0])){
            $results['data']=DB::table('cart')
        ->leftJoin('products','products.id','=','cart.product_id')
        ->leftJoin('product_attr','product_attr.id','=','cart.product_attr_id')
        
        ->where(['user_id'=>$uid])
        ->where(['user_type'=>$user_type])
        ->select('cart.qty','products.id','products.product_name','product_attr.size_id','product_attr.color_id','product_attr.price','product_attr.mrp','product_attr.image')
        ->get();
        }
        if(session()->has('FRONT_USER_LOGIN')==true){
                         
            $results['user']="lhidden";
        }else{
            $results['user']='';
        }

        return view('front.checkout',$results);
    }
    
    function apply_coupon_code(request $request){
        $customer= $_POST['customer'];
        $res=DB::table('customers')->where(['id'=>$customer])->get();
        if($res[0]->coupon_auth==1){
            $result=apply_coupon_code($request->post('coupon_code'));
            $result=json_decode($result,true);
            DB::table('customers')->where(['id'=>$customer])->update(['coupon_auth'=>0]);
            return response()->json(['status'=>$result['status'],'msg'=>$result['msg'],'data'=> $result['data'],'data2'=> $result['data2']]); 
            
        }else{
            return response()->json(['msg'=>'you cannot use coupon']);
        }
        
    }
    function user_address_capture(request $request){
        if($request->session()->has('FRONT_USER_LOGIN')){
            $uid=$request->session()->get('FRONT_USER_ID');
            $tamt=$request->post('tamt');
            $couv=DB::table('coupons')->where(['code'=>$request->post('coupon_code')])->get();
            


            $arr=[
                "customer_id"=>$uid,
                "name"=>$request->post('name'),
                "email"=>$request->post('email'),
                "mobile"=>$request->post('mobile'),
                "address"=>$request->post('address'),
                "city"=>$request->post('city'),
                "province"=>$request->post('province'),
                "zip_code"=>$request->post('zip_code'),
                "coupon_code"=>$request->post('coupon_code'),
                "coupon_value"=>$couv[0]->value,
                "order_status"=>1,
                "payment_type"=>$request->post('optionsRadios'),
                "payment_status"=>$request->post('zip_code'),
                "total_amt"=>666,
                "added_on"=>date('Y-m-d H:i:s')
                
            ];
            
            $query=DB::table('orders')->insertGetId($arr);
            $user=getdatafromcart();
            foreach($user as $list){
                $arrl=[
                    'product_id'=>$list->id,
                    'order_id'=>$query,
                    'products_attr_id'=>$list->product_attr_id,
                    'price'=>$list->price,
                    'qty'=>$list->qty
                ];
                DB::table('order_details')->insert($arrl);
            }
            $status="success";
            $msg="order placed Successfully";
            $request->session()->put('FRONT_USER_LOGIN',$uid);
            if($request->post('optionsRadios')=='gateway'){
                $successUrl = 'https://example.com/success.php';
                $failureUrl = 'https://example.com/failed.php';

                // config for development
                $config = new Config($successUrl, $failureUrl);

                // config for production
                $config = new Config($successUrl, $failureUrl, 'b4e...e8c753...2c6e8b', 'production');

                // initialize eSewa client
                $esewa = new Client($config);
                $esewa->process(substr($uid, 0, 16), 100, 10);
            }
           
        }else{
            $status="err";
            $msg="you need to login first";
            
            
        }
        return response()->json(['status'=>$status,'msg'=>$msg]); 
    }
    function final_checkout(request $request){
        if($request->session()->has('FRONT_USER_LOGIN')){
            
            return view('front.final_checkout');
        }else{
            return redirect('/');
        }
    }
    function success(){
        echo "success";
    }
    
    function failure(){
        echo "failure";
    }
    function searchfilter(request $request){
        $keywords=$request->post('search_filter');
        $results['data']=DB::table('products')
        ->where('keywords','like','%'.$keywords.'%')
        ->leftJoin('product_attr','product_attr.product_id','=','products.id')
        
        ->select('products.id','products.category_id','products.product_name','product_attr.size_id','product_attr.qty','product_attr.color_id','product_attr.price','product_attr.mrp','product_attr.image')
        ->get();
        
        return view('front.searchfilter',$results);
    }
}   


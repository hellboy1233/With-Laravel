<?php
 use Illuminate\Support\Facades\DB;
 
function buildtree(){
    $result=DB::table('categories')
    ->where(['status'=>'1'])
    ->where(['is_home'=>'1'])
    ->get();

    $arr =[];
    foreach($result as $row){
      $arr[$row->id]['parent_category_id']=$row->parent_category_id;
      $arr[$row->id]['category_name']=$row->category_name;
      $arr[$row->id]['category_slug']=$row->category_slug;
    }
    
    $str=topnav($arr,0);
    return $str;

}
$html='';

function topnav($arr,$parent,$level=0,$plevel=-1){
  global $html;
  
      foreach($arr as $id=>$data){
        
        if($parent==$data['parent_category_id']){
          if($level>$plevel){
            if($html==''){
              $html.= '<ul class="nav navbar-nav">';
            }else{
              $html.= '<ul class="dropdown-menu">';
            }
          }
          if($level==$plevel){
            
            $html.="</li>";
          }
          $url=url('category', $data['category_slug'],);       
          $html.='<li><a href='.$url.'>'.$data['category_name'].'</a>';
          if($level>$plevel){
            $plevel=$level;
          }
          $level++;
          
          
          topnav($arr,$id,$level,$plevel);
          $level--;
        }
        
      }
      if($level==$plevel){
        $html.="</li></ul>";
    }  
      return $html;
}
function gettemp_user_id(){
 
  if(!session()->has('TEMP_USER_ID')){
    $rand=rand(111111111,999999999);
    echo $rand;
    session()->put('TEMP_USER_ID',$rand);
    return $rand;
    
    
  }else{
    
    return session()->get('TEMP_USER_ID');
  }
}

function getdatafromcart(){
  if(session()->has('FRONT_USER_LOGIN')){
    $uid=session()->get('FRONT_USER_ID');
    $user_type='reg';
  }else{
      $uid=gettemp_user_id();
      $user_type='not_reg';
      
  }
 

  $result=DB::table('cart')
  ->leftJoin('products','products.id','=','cart.product_id')
  ->leftJoin('product_attr','product_attr.id','=','cart.product_attr_id')
  
  ->where(['user_id'=>$uid])
  ->where(['user_type'=>$user_type])
  ->select('cart.qty','cart.product_attr_id','products.id','products.product_name','product_attr.size_id','product_attr.color_id','product_attr.price','product_attr.mrp','product_attr.image')
  ->get();

  return $result;

}
function apply_coupon_code($coupon_code){
  $user=DB::table('coupons')->where(['code'=>$coupon_code])->get();
        if(isset($user[0])){
            if($user[0]->status==1){
                if($user[0]->is_one_time==1){
                    return response()->json([
                        'status'=>'error',
                        'msg'=>'coupon is already used'
                    ]);
                   
                    
                }else{
                    $minimum_order_amt=$user[0]->minimum_order_amt;
                    $getdatafromcart=getdatafromcart();
                    $totalprice=0;
                    foreach($getdatafromcart as $list){
                        $totalprice=$totalprice+($list->price*$list->qty);
                    }
                    if($totalprice>$minimum_order_amt){
                        $status='success';
                        $msg='coupon is applied';
                    }else{
                        return json_encode([
                            'status'=>'error',
                            'msg'=>'you must purchase atleast '.$minimum_order_amt,
                            'data'=>'',
                'data2'=>''
                        ]);
                        
                            
                    }
                }

            }else{
                return json_encode([
                    'status'=>'error',
                    'msg'=>'coupon is deactivated',
                    'data'=>'',
                'data2'=>''
                ]);
                
                 
            }

        }else{
            return json_encode([
                'status'=>'error',
                'msg'=>'invallid coupon',
                'data'=>'',
                'data2'=>''
            ]);
                
             
        }
        
        if($status=='success'){
            if($user[0]->value_type=='value'){
                $totalprice=$totalprice-$user[0]->value;
            }else{
                $totalprice=$totalprice-($totalprice/100*$user[0]->value);
            }
        }
        return json_encode(['status'=>$status,'msg'=>$msg,'data'=> $totalprice,'data2'=>$user[0]->code]);
}

?>
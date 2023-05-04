<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\product;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $data['result']=product::get()->all();
        
        return view('admin.product',$data);
    }
    public function manage_product($id="")
    {
       
        
        if($id>0){
           
            $data=product::where(['id'=>$id])->get();
            $result['product_name']=$data['0']->product_name;
            $result['slug']=$data['0']->slug;
            $result['category']=$data['0']->category_id;
            $result['product_brand']=$data['0']->product_brand;
            $result['product_model']=$data['0']->product_model;
            $result['short_desc']=$data['0']->short_desc;
            $result['desc']=$data['0']->desc;
            $result['keywords']=$data['0']->keywords;
            $result['technical_specification']=$data['0']->technical_specification;

            $result['lead_time']=$data['0']->lead_time;
            $result['taxy']=$data['0']->tax;
            $result['tax_type']=$data['0']->tax_type;
            $result['is_promo']=$data['0']->is_promo;
            $result['is_featured']=$data['0']->is_featured;
            $result['is_discounted']=$data['0']->is_discounted;
            $result['is_trading']=$data['0']->is_trading;


            $result['uses']=$data['0']->uses;
            $result['warranty']=$data['0']->warranty;
            $result['image']=$data['0']->image;
            $result['id']=$data['0']->id;
            $result['tax_value']=$data['0']->tax_value;

            /*for product attribute */
            $result['productarr']=DB::table('product_attr')->where('product_id',$id)->get();
            $result['total']=count($result['productarr']);

            /* */

            /*for product images*/
            
            $results=DB::table('product_images')->where('product_id',$id)->get();
            if(!isset($results[0])){
                $result['productimgarr']['0']['images']='';
                $result['productimgarr']['0']['product_id']='';
            }else{
                $result['productimgarr']=$results;
                
            }

            /*product image ends*/
            
        }else{
            $result['product_name']='';
            $result['slug']='';
            $result['category']='';
            $result['product_brand']='';
            $result['product_model']='';
            $result['short_desc']='';
            $result['desc']='';
            $result['keywords']='';
            $result['technical_specification']='';

            $result['lead_time']='';
            $result['taxy']='';
            $result['tax_type']='';
            $result['is_promo']='';
            $result['is_featured']='';
            $result['is_discounted']='';
            $result['is_trading']='';

            $result['uses']='';
            $result['warranty']='';
            $result['image']='';
            $result['id']='';
            $result['tax_value']='';


            $result['productarr']['0']['sku']='';
            $result['productarr']['0']['price']='';
            $result['productarr']['0']['mrp']='';
            $result['productarr']['0']['qty']='';
            $result['productarr']['0']['color_id']='';
            $result['productarr']['0']['size_id']='';
            $result['productarr']['0']['id']='';
            

            //for product images//
            $result['productimgarr']['0']['images']='';
            $result['productimgarr']['0']['product_id']='';
            $result['productimgarr']['0']['id']='';
            

            //images ends//

            $presult=DB::table('product_attr')->where('product_id',$id)->get();
            $result['total']=count($presult);

        }
        $result['category_list']=DB::table('categories')->where('status','1')->get();
        $result['tax']=DB::table('taxes')->where('status','1')->get();
        $result['size']=DB::table('sizes')->where('status','1')->get();
        $result['color']=DB::table('colors')->where('status','1')->get();
        $result['brand']=DB::table('brand_masters')->where('status','1')->get();
        
        return view('admin.manage_product',$result);

    }

    public function manage_product_process(request $r)
    {
      

        $r->validate([
            'product_name'=>'required',
            'category'=>'required',
            'product_brand'=>'required',
            'product_model'=>'required',
            'short_desc'=>'required',
            'technical_specification'=>'required',
            'uses'=>'required',
            'warranty'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
            'slug.*'=>'required|unique:products,slug,'.$r->post('id'),
            'sku.*'=>'required|unique:product_attr,sku,'.$r->post('id'),
            'paimage.*'=>'required|mimes:jpg,jpeg,png',
            'mrp.*'=>'required',
            'price.*'=>'required',
            'qty.*'=>'required',
        ]);
        
        
        $sku=$r->post('sku');
        $price=$r->post('price');
        $mrp=$r->post('mrp');
        $color=$r->post('color');
        $size=$r->post('size');
        $qty=$r->post('qty');
        $patid=$r->post('patid');
        $primage=$r->file('primage.*');
        $count=count($primage);
        $imgid=$r->post('imgid');
        $primgid=$r->post('primgid');
        

        $product_name=$r->post('product_name');
        $slug=$r->post('slug');
        $category=$r->post('category');
        $product_brand=$r->post('product_brand');
        $product_model=$r->post('product_model');
        $short_desc=$r->post('short_desc');
        $desc=$r->post('desc');
        $technical_specification=$r->post('technical_specification');
        
        $lead_time=$r->post('lead_time');
        $tax=$r->post('tax');
        $tax_type=$r->post('tax_type');
        $is_promo=$r->post('is_promo');
        $is_featured=$r->post('is_featured');
        $is_discounted=$r->post('is_discounted');
        $is_trading=$r->post('is_trading');
        
        $uses=$r->post('uses');
        $warranty=$r->post('warranty');
        $keywords=$r->post('keywords');
        $image=$r->file('image');
        $ext=$image->extension();
        $file=time().'.'.$ext;
        
        $image->storeAs('public/images',$file);

        $id=$r->post('id');
        
        if($id>0){
            $ge=product::where('id',$id)->get();
            if(Storage::exists('/public/images/'.$ge[0]->image)){
                Storage::delete('/public/images/'.$ge[0]->image);      
            }

            //for product images//

            $im=DB::table('product_images')->where('product_id',$id)->get();
            foreach($im as $up){
                if(Storage::exists('/public/images/'.$up->images)){
                    Storage::delete('/public/images/'.$up->images);      
                }
            }
            //product images ends//

            //product attribute images//

            $pa=DB::table('product_attr')->where('product_id',$id)->get();
            foreach($pa as $up){
                if(Storage::exists('/public/images/'.$up->image)){
                    Storage::delete('/public/images/'.$up->image);      
                }    
            }

            //product attribute images/ ends/
            product::where('id',$id)->update([
                'product_name'=>$product_name,
                'slug'=>$slug,
                'category_id'=>$category,
                'product_brand'=>$product_brand,
                'product_model'=>$product_model,
                'short_desc'=>$short_desc,
                'desc'=>$desc,
                'technical_specification'=>$technical_specification,

                'lead_time'=>$lead_time,
                'tax'=>$tax,
                'tax_type'=>$tax_type,
                'is_promo'=>$is_promo,
                'is_featured'=>$is_featured,
                'is_discounted'=>$is_discounted,
                'is_trading'=>$is_trading,

                'uses'=>$uses,
                'keywords'=>$keywords,
                'warranty'=>$warranty,
                'image'=>$file,
                
                

                ]);
                $model=DB::table('product_attr')->where('product_id',$id)->get();
               // $j=count($sku)-count($model);
               $hid=$r->post('hid');
                for($i=0;$i<count($sku);$i++){
                    if($r->hasfile("paimage.$i")){
                        $paimage=$r->file("paimage.$i");
                        $rand=rand('111111111','999999999');
                        $ext=$paimage->extension();
                        $file=$rand.'.'.$ext; 
                        $r->file("paimage.$i")->storeAs('public/images',$file);
                        
                    }
                    if(DB::table('product_attr')->where('id',$patid[$i])->exists()){
                        DB::table('product_attr')->where('id',$model[$i]->id)->update([
                            'sku'=>$sku[$i],
                            'image'=>$file,
                            'price'=>$price[$i],
                            'mrp'=>$mrp[$i],
                            'qty'=>$qty[$i],
                            'color_id'=>$color[$i],
                            'size_id'=>$size[$i]
                            ]); 
                    }else{
                        
                        DB::table('product_attr')->insert(
                            array(
                                'product_id'=>$id,
                                'sku'=>$sku[$i],
                                'image'=>$file,
                                'price'=>$price[$i],
                                'mrp'=>$mrp[$i],
                                'qty'=>$qty[$i],
                                'color_id'=>$color[$i],
                                'size_id'=>$size[$i])
                        );
                    }
                }
                
              /*  for($i=0;$i<count($model);$i++){
                    
                    DB::table('product_attr')->where('id',$model[$i]->id)->update([
                        'sku'=>$sku[$i],'price'=>$price[$i],'mrp'=>$mrp[$i],'qty'=>$qty[$i],'color_id'=>$color[$i],'size_id'=>$size[$i]
                        ]);
                        
                
                }
                
                for($k=$i;$k<=$j;$k++){
                
                    DB::table('product_attr')->insert(
                        array('product_id'=>$id,'sku'=>$sku[$k],'price'=>$price[$k],'mrp'=>$mrp[$k],'qty'=>$qty[$k],'color_id'=>$color[$k],'size_id'=>$size[$k])
                    );
                }
                */ 

                /**for product images */
               
               for($i=0;$i<$count;$i++){
                   
               echo $i;
               echo "<br>";
                    if($r->hasfile("primage.$i")){
                        $primage=$r->file("primage.$i");
                        $rand=rand('111111111','999999999');
                        $ext=$primage->extension();
                        $file=$rand.'.'.$ext;
                        $r->file("primage.$i")->storeAs('public/images',$file);   
                    }
                    if(DB::table('product_images')->where('id',$imgid[$i])->exists()){
                        DB::table('product_images')->where('id',$imgid[$i])->update([
                            'images'=>$file,
                            ]);  
                    }else{
                        DB::table('product_images')->insert(array('product_id'=>$primgid,'images'=>$file));
                    }
                } 
                /**images ends */
            $r->session()->flash('err','record updated'); 
        }else{
            product::insert([
                'product_name'=>$product_name,
                'slug'=>$slug,
                'keywords'=>$keywords,
                'category_id'=>$category,
                'product_brand'=>$product_brand,
                'product_model'=>$product_model,
                'short_desc'=>$short_desc,
                'desc'=>$desc,
                'technical_specification'=>$technical_specification,

                'lead_time'=>$lead_time,
                'tax'=>$tax,
                'tax_type'=>$tax_type,
                'is_promo'=>$is_promo,
                'is_featured'=>$is_featured,
                'is_discounted'=>$is_discounted,
                'is_trading'=>$is_trading,

                'uses'=>$uses,
                'warranty'=>$warranty,
                'image'=>$file,
                'status'=>'1',
                ]);
                $model=DB::table('products')->where('slug',$slug)->get();
                
                $pid=$model[0]->id;
                

                for($i=0;$i<count($sku);$i++){
                    if($r->hasfile("paimage.$i")){
                        $paimage=$r->file("paimage.$i");
                        $rand=rand('111111111','999999999');
                        $ext=$paimage->extension();
                        
                        $file=$rand.'.'.$ext;
                        
                        $r->file("paimage.$i")->storeAs('/public/images',$file);
                    }
                
                    DB::table('product_attr')->insert(
                        array('product_id'=>$pid,'image'=>$file,'sku'=>$sku[$i],'price'=>$price[$i],'mrp'=>$mrp[$i],'qty'=>$qty[$i],'color_id'=>$color[$i],'size_id'=>$size[$i])
                    );
                }
            /**for product images */
            for($i=0;$i<$count;$i++){
                    
                if($r->hasfile("primage.$i")){
                    $primage=$r->file("primage.$i");
                    $rand=rand('111111111','999999999');
                    $ext=$primage->extension();
                    
                    $file=$rand.'.'.$ext;
                    
                    $r->file("primage.$i")->storeAs('public/images',$file);
                    
                }
                
                    
                    DB::table('product_images')->insert(
                        array('product_id'=>$pid,'images'=>$file,)
                    );
                
            } 
            /**images ends */
            

    
            $r->session()->flash('err','record added ');
        }
        
        
       
        return redirect('admin/product');
    }
    public function delete_product($id){
        product::where('id',$id)->delete();
        
        DB::table('product_attr')->where('product_id',$id)->delete();
        DB::table('product_images')->where('product_id',$id)->delete();
        return redirect('admin/product');

        
    }
    public function status_product($status,$id){
        product::where('id',$id)->update(['status'=>$status]);
        return redirect('admin/product');

    }
    public function  delete_product_attr($paid,$pid){
        $pa=DB::table('product_attr')->where('id',$paid)->get();
        if(Storage::exists('/public/images/'.$pa[0]->image)){
            Storage::delete('/public/images/'.$pa[0]->image);      
        }
        DB::table('product_attr')->where('id',$paid)->delete();
        return redirect('admin/product/manage_product/'.$pid);
    
    }
    public function  delete_product_images($paid,$pid){
        $im=DB::table('product_images')->where('id',$paid)->get();
        if(Storage::exists('/public/images/'.$im[0]->images)){
            Storage::delete('/public/images/'.$im[0]->images);      
        }
        DB::table('product_images')->where('id',$paid)->delete();
        return redirect('admin/product/manage_product/'.$pid);
    
    }
    
   
}

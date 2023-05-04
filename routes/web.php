<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\admin\BrandMasterController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\taxController;
use App\Http\Controllers\admin\HomebannerController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\website;

Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');
route::group(['middleware'=>['auth']],function(){
    route::get('admin/dashboard',[AdminController::class,'dash']);
    //for category
    route::get('admin/category',[CategoryController::class,'index']);
    route::get('admin/category/manage_category',[CategoryController::class,'manage_category']);
    route::get('admin/category/manage_category/{id}',[CategoryController::class,'manage_category']);
    route::post('admin/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category-insert');
    route::get('admin/category/delete/{id}',[CategoryController::class,'delete_category']);
    route::get('admin/category/status/{status}/{id}',[CategoryController::class,'status_category']);
    //for coupons
    route::get('admin/coupon',[CouponController::class,'index']);
    route::get('admin/coupon/manage_coupon',[CouponController::class,'manage_coupon']);
    route::get('admin/coupon/manage_coupon/{id}',[CouponController::class,'manage_coupon']);
    route::post('admin/coupon/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('coupon-insert');
    route::get('admin/coupon/delete/{id}',[CouponController::class,'delete_coupon']);
    route::get('admin/coupon/status/{status}/{id}',[CouponController::class,'status_coupon']);

    route::get('admin/size',[SizeController::class,'index']);
    route::get('admin/size/manage_size',[SizeController::class,'manage_size']);
    route::get('admin/size/manage_size/{id}',[SizeController::class,'manage_size']);
    route::post('admin/size/manage_size_process',[SizeController::class,'manage_size_process'])->name('size-insert');
    route::get('admin/size/delete/{id}',[SizeController::class,'delete_size']);
    route::get('admin/size/status/{status}/{id}',[SizeController::class,'status_size']);

    route::get('admin/color',[ColorController::class,'index']);
    route::get('admin/color/manage_color',[ColorController::class,'manage_color']);
    route::get('admin/color/manage_color/{id}',[ColorController::class,'manage_color']);
    route::post('admin/color/manage_color_process',[ColorController::class,'manage_color_process'])->name('color-insert');
    route::get('admin/color/delete/{id}',[ColorController::class,'delete_color']);
    route::get('admin/color/status/{status}/{id}',[ColorController::class,'status_color']);

    route::get('admin/product',[ProductController::class,'index']);
    route::get('admin/product/manage_product',[ProductController::class,'manage_product']);
    route::get('admin/product/manage_product/{id}',[ProductController::class,'manage_product']);
    route::post('admin/product/manage_product_process',[ProductController::class,'manage_product_process'])->name('product-insert');
    route::get('admin/product/delete/{id}',[ProductController::class,'delete_product']);
    route::get('admin/product_attr_delete/{paid}/{pid}',[ProductController::class,'delete_product_attr']);
    route::get('admin/product_images_delete/{piid}/{pid}',[ProductController::class,'delete_product_images']);
    route::get('admin/product/status/{status}/{id}',[ProductController::class,'status_product']);

    route::get('admin/brand',[BrandMasterController::class,'index']);
    route::get('admin/brand/manage_brand',[BrandMasterController::class,'manage_brand']);
    route::get('admin/brand/manage_brand/{id}',[BrandMasterController::class,'manage_brand']);
    route::post('admin/brand/manage_brand_process',[BrandMasterController::class,'manage_brand_process'])->name('brand-insert');
    route::get('admin/brand/delete/{id}',[BrandMasterController::class,'delete_brand']);
    route::get('admin/brand/status/{status}/{id}',[BrandMasterController::class,'status_brand']);

    route::get('admin/tax',[taxController::class,'index']);
    route::get('admin/tax/manage_tax',[taxController::class,'manage_tax']);
    route::get('admin/tax/manage_tax/{id}',[taxController::class,'manage_tax']);
    route::post('admin/tax/manage_tax_process',[taxController::class,'manage_tax_process'])->name('tax-insert');
    route::get('admin/tax/delete/{id}',[taxController::class,'delete_tax']);
    route::get('admin/tax/status/{status}/{id}',[taxController::class,'status_tax']);
    
    route::get('admin/banner',[HomebannerController::class,'index']);
    route::get('admin/banner/manage_banner',[HomebannerController::class,'manage_banner']);
    route::get('admin/banner/manage_banner/{id}',[HomebannerController::class,'manage_banner']);
    route::post('admin/banner/manage_banner_process',[HomebannerController::class,'manage_banner_process'])->name('banner-insert');
    route::get('admin/banner/delete/{id}',[HomebannerController::class,'delete_banner']);
    route::get('admin/banner/status/{status}/{id}',[HomebannerController::class,'status_banner']);

    route::get('admin/customer',[CustomerController::class,'index']);
    route::get('admin/customer/manage_customer',[CustomerController::class,'manage_customer']);
    route::get('admin/customer/show_customer_detail/{id}',[CustomerController::class,'show_customer_detail']);
    route::get('admin/customer/manage_customer/{id}',[CustomerController::class,'manage_customer']);
    route::post('admin/customer/manage_customer_process',[CustomerController::class,'manage_customer_process'])->name('customer-insert');
    route::get('admin/customer/delete/{id}',[CustomerController::class,'delete_customer']);
    route::get('admin/customer/status/{status}/{id}',[CustomerController::class,'status_customer']);

    route::get('admin/logout',[AdminController::class,'logout']);
});
Route::get('/',[FrontController::class,'index']);
Route::get('product/{id}',[FrontController::class,'product']);
Route::post('/add_to_cart',[FrontController::class,'add_to_cart']);
Route::post('/add_to_cart2',[FrontController::class,'add_to_cart2']);

Route::post('/cart_form_qty',[FrontController::class,'cart_form_qty']);
Route::get('/cart',[FrontController::class,'cart']);
Route::get('/category/{slug}/',[FrontController::class,'category']);
Route::get('/registration',[FrontController::class,'registration']);
route::post('/registration_process',[FrontController::class,'registration_process']);
route::post('/login_process',[FrontController::class,'login_process']);

route::post('/forgot_process',[FrontController::class,'forgot_process']);
Route::get('reset_password/{rand_id}',[FrontController::class,'reset_password']);
Route::post('reset_password/reset_new_password_process/',[FrontController::class,'reset_new_password_process']);
route::post('/apply_coupon_code',[FrontController::class,'apply_coupon_code']);
route::post('/user_address_capture',[FrontController::class,'user_address_capture']);
Route::get('final_checkout',[FrontController::class,'final_checkout']);

Route::get('success',[FrontController::class,'success']);
Route::get('failure',[FrontController::class,'failure']);


route::get('logout',function(){
    session()->forget('FRONT_USER_LOGIN');
    session()->forget('FRONT_USER_ID');
    session()->forget('FRONT_USER_Name');
    return redirect ('/');

});
//reset_password
Route::get('e_verification/{rand_id}',[FrontController::class,'e_verification']);
Route::get('checkout',[FrontController::class,'checkout']);
Route::post('searchfilter',[FrontController::class,'searchfilter'])->name('front.seaarch');;




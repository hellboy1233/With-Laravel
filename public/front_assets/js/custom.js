/** 
  * Template Name: Daily Shop
  * Version: 1.0  
  * Template Scripts
  * Author: MarkUps
  * Author URI: http://www.markups.io/

  Custom JS
  

  1. CARTBOX
  2. TOOLTIP
  3. PRODUCT VIEW SLIDER 
  4. POPULAR PRODUCT SLIDER (SLICK SLIDER) 
  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  6. LATEST PRODUCT SLIDER (SLICK SLIDER) 
  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  9. PRICE SLIDER  (noUiSlider SLIDER)
  10. SCROLL TOP BUTTON
  11. PRELOADER
  12. GRID AND LIST LAYOUT CHANGER 
  13. RELATED ITEM SLIDER (SLICK SLIDER)

  
**/

jQuery(function($){


  /* ----------------------------------------------------------- */
  /*  1. CARTBOX 
  /* ----------------------------------------------------------- */
    
     jQuery(".aa-cartbox").hover(function(){
      jQuery(this).find(".aa-cartbox-summary").fadeIn(500);
    }
      ,function(){
          jQuery(this).find(".aa-cartbox-summary").fadeOut(500);
      }
     );   
  
  /* ----------------------------------------------------------- */
  /*  2. TOOLTIP
  /* ----------------------------------------------------------- */    
    jQuery('[data-toggle="tooltip"]').tooltip();
    jQuery('[data-toggle2="tooltip"]').tooltip();

  /* ----------------------------------------------------------- */
  /*  3. PRODUCT VIEW SLIDER 
  /* ----------------------------------------------------------- */    

    jQuery('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
        loading_image: 'demo/images/loading.gif'
    });

    jQuery('#demo-1 .simpleLens-big-image').simpleLens({
        loading_image: 'demo/images/loading.gif'
    });

  /* ----------------------------------------------------------- */
  /*  4. POPULAR PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-popular-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    }); 

  
  /* ----------------------------------------------------------- */
  /*  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-featured-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });
    
  /* ----------------------------------------------------------- */
  /*  6. LATEST PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      
    jQuery('.aa-latest-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */     
    
    jQuery('.aa-testimonial-slider').slick({
      dots: true,
      infinite: true,
      arrows: false,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true
    });

  /* ----------------------------------------------------------- */
  /*  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */  

    jQuery('.aa-client-brand-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  9. PRICE SLIDER  (noUiSlider SLIDER)
  /* ----------------------------------------------------------- */        

    jQuery(function(){
      if($('body').is('.productPage')){
       var skipSlider = document.getElementById('skipstep');
       var lower_price=jQuery('#starting_price').val();
       var upper_price=jQuery('#ending_price').val();
      if(lower_price=='' || upper_price=='' ){
        lower_price=0;
        upper_price=0;
      }
       
        noUiSlider.create(skipSlider, {
            range: {
                'min': 0,
                '10%': 100,
                '20%': 200,
                '30%': 300,
                '40%': 400,
                '50%': 500,
                '60%': 600,
                '70%': 700,
                '80%': 800,
                '90%': 900,
                'max': 1000
            },
            snap: true,
            connect: true,
            start: [lower_price, upper_price]
        });
        // for value print
        var skipValues = [
          document.getElementById('skip-value-lower'),
          document.getElementById('skip-value-upper')
        ];

        skipSlider.noUiSlider.on('update', function( values, handle ) {
          skipValues[handle].innerHTML = values[handle];
        });
      }
    });


    
  /* ----------------------------------------------------------- */
  /*  10. SCROLL TOP BUTTON
  /* ----------------------------------------------------------- */

  //Check to see if the window is top if not then display button

    jQuery(window).scroll(function(){
      if ($(this).scrollTop() > 300) {
        $('.scrollToTop').fadeIn();
      } else {
        $('.scrollToTop').fadeOut();
      }
    });
     
    //Click event to scroll to top

    jQuery('.scrollToTop').click(function(){
      $('html, body').animate({scrollTop : 0},800);
      return false;
    });
  
  /* ----------------------------------------------------------- */
  /*  11. PRELOADER
  /* ----------------------------------------------------------- */

    jQuery(window).load(function() { // makes sure the whole site is loaded      
      jQuery('#wpf-loader-two').delay(200).fadeOut('slow'); // will fade out      
    })

  /* ----------------------------------------------------------- */
  /*  12. GRID AND LIST LAYOUT CHANGER 
  /* ----------------------------------------------------------- */

  jQuery("#list-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").addClass("list");
  });
  jQuery("#grid-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").removeClass("list");
  });


  /* ----------------------------------------------------------- */
  /*  13. RELATED ITEM SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-related-item-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    }); 
    
});

function color_image(img,color){
  jQuery('.simpleLens-big-image-container').html('<a data-lens-image="'+img+'" class="simpleLens-lens-image"><img src="'+img+'" class="simpleLens-big-image"></a>')
  jQuery('#color_id').val(color);
  
}
function color_size(size){
  
  jQuery('.product_color').hide();
  jQuery('.'+size).show();
  jQuery('.size_link').css('border','0px');
  jQuery('#size_'+size).css('border','1px solid black');
  jQuery('#size_id').val(size);
}
function add_to_cart(id,size,color){
  
  jQuery('#pqty').val(jQuery('#quantt'+id).val());
  
  var color_id=jQuery('#color_id').val();
  var size_id=jQuery('#size_id').val();
  if(size===''){
    var checks='aasss';
  }
  if(color===''){
    var checkc='aasss';
  }

  if((size_id==='')&&(checks!=='aasss')){
    alert('select size');
  }
  if((color_id==='')&&(checkc!=='aasss')){
    alert('select color');
  }
  
  jQuery.ajax({
    url:'/add_to_cart',
    data:jQuery('#from_cart').serialize(),
    type:'post',
    success:function(req){
      alert('product'+req.msg);
      var html='';
      var totalprice=0;
      if(req.totalitem==0){
        jQuery('.aa-cart-notify').html(0);
        jQuery('.aa-cartbox-summary').remove(); 
      }else{
        jQuery('.aa-cart-notify').html(req.totalitem)
        html+='<div class="aa-cartbox-summary"><ul>';
        jQuery.each(req.data,function(key,val){
          html+='<li><a class="aa-cartbox-img" href="#"><img src="'+PRODUCTIMAGE+'/'+val.image+'"></a><div class="aa-cartbox-info"><h4><a href="#">'+val.product_name+'</a></h4><p>'+val.qty+' x Rs'+val.price+'</p></div><a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a></li>';
          totalprice=parseInt(totalprice)+(parseInt(req.qty)*parseInt(req.price));
        });
        console.log(totalprice);
        html+='<li><span class="aa-cartbox-total-title">Total</span><span class="aa-cartbox-total-price">Rs'+totalprice+'</span></li>';
        html+='</ul><a class="aa-cartbox-checkout aa-primary-btn" href="javascript:void(0)">Checkout</a></div>';
        
      }
      jQuery('.aa-cartbox-summary').html(html);
      
     
    }
  });
}
function add_to_cart2(id,size,color,qty){
  jQuery('#color_id').val(color);
  jQuery('#size_id').val(size);
  jQuery('#product_id').val(id);
  jQuery('#pqty').val(qty);
  jQuery.ajax({
    url:'/add_to_cart2',
    data:jQuery('#from_cart2').serialize(),
    type:'post',
    success:function(req){
      alert('product '+req.msg);
    }
  });
  
}
function fun_cart(id,size,color,qty,price){
  
  
  jQuery('#pqty').val(jQuery('#quantt'+id).val());
  var  pt =jQuery('#quantt'+id).val(); 
  jQuery('#total_price'+id).html(pt*price);
  
  jQuery('#product_id').val(id);
  jQuery('#size_id').val(size);
  jQuery('#color_id').val(color);
  
  add_to_cart(id,size,color);
  
 /*
  jQuery.ajax({
    url:'/cart_form_qty',
    data:jQuery('#from_cart').serialize(),
    type:'post',
    success:function(req){
      alert('product'+req.msg);
    }
  });*/
  
}
function deleteprod(id,size,color){
  jQuery('#pqty').val(0);
  jQuery('#quantt'+id).val(0);
  
  jQuery('#product_id').val(id);
  jQuery('#size_id').val(size);
  jQuery('#color_id').val(color);
  
  add_to_cart(id,size,color);
  jQuery('#cart_box'+id).remove();
 
}
function sort_by(){
  jQuery('#sort_value').val(jQuery('#sorting').val());
  jQuery('#category_filter').submit();
}
function price_filter(){
  jQuery('#starting_price').val(jQuery('#skip-value-lower').html());
  jQuery('#ending_price').val(jQuery('#skip-value-upper').html());

  jQuery('#category_filter').submit();
}
function color_filter(color,type){
  var color_filter_str=jQuery('#color_f').val();
  if(type==1){
    var new_color_filter_str=color_filter_str.replace(color+':','');
    jQuery('#color_f').val(new_color_filter_str);
  }else{
    jQuery('#color_f').val(color+':'+color_filter_str);
  }
  
  jQuery('#category_filter').submit();
}

function filtering_search(){
  var search_str=jQuery('#search_filter').val();
  console.log(search_str);
  if(search_str!='' && search_str.length>3){
    window.location.href='/search/'+search_str;
  }
}

jQuery('#submit_register').submit(function(e){
  e.preventDefault();
  jQuery.ajax({
    url:'registration_process',
    data:jQuery('#submit_register').serialize(),
    type:'post',
    success:function(result){
      //if only status is typed then we cannot read data in console.
      //but if we parse is we can read data of status ie result.status
      if(result.status=='error'){
        jQuery.each(result.error,function(key,val){
         
        jQuery('.reg'+key).html(val);
        });
        
      }
      if(result.status=='success'){
        

          jQuery('#submit_register').remove();
          jQuery('#success_msg').html(result.msg);
         
        
      }
    }
  });
}); 
    
jQuery('#login_details').submit(function(e){
  let email=jQuery('#email').val();
  jQuery('#ssaa').val(email);
  e.preventDefault();
  jQuery.ajax({
    url:'login_process',
    data:jQuery('#login_details').serialize(),
    type:'post',
    success:function(result){
      
        let string=result.msg;
        console.log(string);
         
        jQuery('#login_warning').html(result.msg);
        jQuery('#customerid').val(string);
        window.location.href=window.location.href;
        
     
    }
  });
}); 
 
function lost(){
  jQuery('#login_form_1').hide();
  jQuery('#forgot_form').show();
}
function showing_login_form(){
  jQuery('#login_form_1').show();
  jQuery('#forgot_form').hide();
}
jQuery('#forgot_pass').submit(function(e){
  e.preventDefault();
  jQuery.ajax({
    url:'forgot_process',
    data:jQuery('#forgot_pass').serialize(),
    type:'post',
    success:function(result){
      jQuery('#pass_rest').html(result.msg);
       
    }
  });
}); 

jQuery('#reset_new_password').submit(function(e){
  e.preventDefault();
  jQuery.ajax({
    url:'reset_new_password_process',
    data:jQuery('#reset_new_password').serialize(),
    type:'post',
    success:function(result){
      
       console.log(result);
    }
  });
}); 

function apply_coupon(customer){
  var coupon_code=jQuery('#coupon_code').val();
  if(coupon_code!=''){
    
    jQuery.ajax({
      url:'apply_coupon_code',
      data: {
        coupon_code: coupon_code,
        customer: customer,
        _token: jQuery("[name='_token']").val()
      },
      //data:'coupon_code='+coupon_code+'&_token='+jQuery("[name='_token']").val(),
      type:'post',
      success:function(result){
        
         if(result.status=='success'){
          jQuery('#coupon_err').html(result.msg);
          jQuery('.totalp').hide();
          jQuery('.totalpac').show();
          
          jQuery('.totalpacv').html(result.data);
          jQuery('.totalpacc').html(result.data2);
         }else{
          jQuery('#coupon_err').html(result.msg);
         }
      }
    });
  }else{
    
    jQuery('#coupon_err').html('please enter coupon code');
  }
}
function remove_coupon(){
  jQuery('.totalpac').hide();
  jQuery('.totalp').show();
  jQuery('#coupon_err').html('coupon code removed');
  jQuery('#coupon_code').val('');
}
jQuery('#user_address').submit(function(e){
  e.preventDefault();
  jQuery.ajax({
    url:'user_address_capture',
    data:jQuery('#user_address').serialize(),
    type:'post',
    success:function(result){
      
       if(result.status=='success'){
         console.log('adgjnl');
        window.location.href='/final_checkout';
       }else{
        console.log('adgjnl2222222222222222222222222222');
        jQuery('#show_status ').html(result.msg);
       }
    }
  });
}); 
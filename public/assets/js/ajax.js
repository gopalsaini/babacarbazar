 
function addToCart(){ 
    $('.add_to_cart').click(function(){
        var newData=true;
        var productId=$(this).data('id');
		$('#addToCartButton'+productId).css('display', 'none');	
        var qty = $("#qty"+productId).val();
        if(qty){
            var qtys = $("#qty"+productId).val();
        }else{
            var qtys="1";
        }
        $.ajax({
            type: "POST",
            dataType:"json",
            url: base_path+'/addtocartform',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
            },
            data:{
                product_id: productId, qty:qtys,       
            },
            beforeSend: function(){
                $('#add_to_cart'+productId).prop('disabled', true);
                
            },
            error:function(xhr,textStatus){
                if (textStatus == 'timeout') {
                    showMsg('warning', xhr.status + ': ' + xhr.statusText);
                    $('#add_to_cart'+productId).prop('disabled', false);
                }else{
                    showMsg('error', xhr.status + ': ' + xhr.statusText);
                    $('#add_to_cart'+productId).prop('disabled', false);
                }
            },
            success: function(data){
				 
                if(data.error){
                    showMsg('error',data.msg);
                }else{ 
					shoppingCartData();	
					showMsg('success',data.msg);
                    if(newData){
                        $('.headerAddToCartShow').html(data.html); 
                        newData=false;
                    }else{
                        $('.headerAddToCartShow').append(data.html); 
                    }
                    if(data.total){
						$('.headerAddToCartShowTotal').html(data.total);
                    }else{
                        $('.ShowTotal').html("0"); 
                    }
                    
                }
               
            }
        }); 
    }); 
}
	//toster
	function showMsg(type,msg){
		if(type=='error'){
			$('.toast-body').html('<i class="fa fa-times-circle red"></i> '+msg);
		}else if(type=='success'){
			$('.toast-body').html('<i class="fa fa-check-circle green"></i> '+msg);
		}else{
			$('.toast-body').html('<i class="fa fa-exclamation-circle warning"></i> '+msg);
		}

		$(".toast").toast({ delay: 5000 });
		$('.toast').toast('show');
	}

	$('.toast').mouseleave(function(){
		$('.toast').toast('hide');
	});


	//form submit
	$("form#test").submit(function(e){
		e.preventDefault();
		
		var formId=$(this).attr('id');
		var formAction=$(this).attr('action');
		var formLoader=$(this).data('loader');
		
		$.ajax({
			url: formAction,
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
			},
			data: new FormData(this),
			type: 'post',
			dataType:'json',
			beforeSend: function(){
				$('#preloader').css('display','inline-block');
				 $('.button_'+formLoader).prop('disabled', true);
			},
			error:function(xhr,textStatus){
				if (textStatus == 'timeout') {
                    showMsg('warning', xhr.status + ': ' + xhr.statusText);
				}else{
					showMsg('error', xhr.status + ': ' + xhr.statusText);
				}
				$('#preloader').css('display','none');
				 $('.button_'+formLoader).prop('disabled', false);
			},
			success: function(data){
				$('.button_'+formLoader).prop('disabled', false);
				$('#preloader').css('display','none');
				
				if(data.error){
					showMsg('error',data.msg);
				}else{
					if(data.orderDone){
						showMsg('success',data.msg);
						location.href=base_path+"/user/thank-you";
					}
					if(data.user_verify){
						showMsg('success',data.msg);
						location.href=session_url;
					}else{
						showMsg('success',data.msg);

						var mobile=$("input[name=mobile]").val();
						$('#last4digit').html(mobile.substring(6,10));

						jQuery('#otpsubmitform').show();
						$("input[name=dig1]").focus();
						jQuery('#regform').hide();
						$('#'+formId)[0].reset();
						var resendOtpTime=30;
						interval= setInterval(() => {
							if(resendOtpTime>0){
								resendOtpTime--;
								$('#timer_left').html("00:"+("0" + resendOtpTime).slice(-2));
							}else{
								$('#timer_left').css('display','none');
								$('.otp_registration_resend').css('display','inline-block');
								clearInterval(interval);
							}
						}, 1000);
					}
				}
				
				
		    },
			cache:false,
			contentType:false,
			processData:false, 
		});
	});
	
	//otp send 
	$(document).ready(function(){
		$(".otp_send").on("click", function () {
			var mobile = $("#mobile").val();
			var formAction =base_path+"/user/sendotp";
			var formdata=new FormData();
			formdata.append('mobile', mobile); 
			if(mobile ==''){
				showMsg('error','Please Enter Mobile Number');
			}else{
				var formId="load_register";
				var formLoader=$(this).data('loader');

				$.ajax({
					url: formAction,
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
					},
					dataType:'json',
					data : formdata,
					type: 'POST',
					beforeSend: function(){
						$('.'+formLoader).css('display','inline-block');
						$('.button_'+formLoader).prop('disabled', true);
						//for resend code
						$('#'+formLoader).css('display','inline-block');
						$('#button_'+formLoader).prop('disabled', true);
					},
					error:function(xhr,textStatus){
						if (textStatus == 'timeout') {
							showMsg('warning', xhr.status + ': ' + xhr.statusText);
						}else{
							showMsg('error', xhr.status + ': ' + xhr.statusText);
						}
						$('.'+formLoader).css('display','none');
						$('.button_'+formLoader).prop('disabled', false);
						//for resend code
						$('#'+formLoader).css('display','none');
						$('#button_'+formLoader).prop('disabled', false);
					},
					success: function(data){ 
						if(data.error){
							showMsg('error',data.msg);
						}else{

							if(data.user_verify){
								showMsg('success',data.msg);
								location.href="/";
							}else{
								showMsg('success',data.msg);
		
								var mobile=$("input[name=mobile]").val();
								$('#last4digit').html(mobile.substring(6,10));
		
								jQuery('#otpsubmitform').show();
								$("input[name=dig1]").focus();
								jQuery('#regform').hide();
								$('#timer_left').css('display','inline-block');
								$('.otp_registration_resend').css('display','none');
								var resendOtpTime=30;
								interval= setInterval(() => {
									if(resendOtpTime>0){
										resendOtpTime--;
										$('#timer_left').html("00:"+("0" + resendOtpTime).slice(-2));
									}else{
										$('#timer_left').css('display','none');
										$('.otp_registration_resend').css('display','inline-block');
										clearInterval(interval);
									}
								}, 1000);
							
						}
					}
						$('.button_'+formLoader).prop('disabled', false);
						$('.'+formLoader).css('display','none');

						//resend code
						$('#button_'+formLoader).prop('disabled', false);
						$('#'+formLoader).css('display','none');
					},
					cache:false,
					contentType:false,
					processData:false,
					timeout: 5000
				});

			}
			
		});
	});

 
	function isNumberKey(evt){  

		//var e = evt || window.event;

		var charCode = (evt.which) ? evt.which : evt.keyCode

		if (charCode != 46 && charCode > 31

		&& (charCode < 48 || charCode > 57))

		return false;

		return true;

	}



 
	$('img').on("error", function() {
	  $(this).attr('src', url+'/assets/images/default-image.jpg');
	});
	
	$('img').on("error", function() {
	  $(this).attr('src', url+'/assets/images/default-image.jpg');
	});

	$(document).ready(function(){
		$('#otpFormShow').click(function() {
		  $('.otpFormShow').toggle();
		});
	});
	
	$(document).ready(function(){ 
		$('#body').on('keyup', 'input', function(e){ 
			var inputs = $('input'); 
			if(e.keyCode == 8){
				var index = inputs.index(this);
				if (index != 0)
					inputs.eq(index - 1).val('').focus();    
			}else{
				if($(this).val().length === this.size){
				inputs.eq(inputs.index(this) + 1).focus();
				}
			}  
		});
	});

	//page scroll ajax
	var notscrolly=true;
	var notEmptyPost=true;
	var newData=true;
	var offset=0;

	function setSortOrder(){
		offset=0;
		notEmptyPost=true;
		newData=true; 
		$('#productScroll').html('');
		getProductData(); 
	}


	$(function() {
		$( "#product-range-slider" ).slider({
			range:true,
			min: 0,
			max: 250,
			values: [ 0,250 ],
			slide: function( event, ui ) {
				$('#min_price').val(ui.values[ 0 ]);
				$('#max_price').val(ui.values[ 1 ]);
				$( "#product-range-amount" ).val( "AED " + ui.values[ 0 ] + " - AED " + ui.values[ 1 ] );
			},
			change: function( event, ui ) {
				$('#min_price').val(ui.values[ 0 ]);
				$('#max_price').val(ui.values[ 1 ]);
				
				setSortOrder();
			},
			
		});
		$( "#product-range-amount" ).val( "AED " + $( "#product-range-slider" ).slider( "values", 0 ) +
		   " - AED " + $( "#product-range-slider" ).slider( "values", 1 ) );
	});

	//short by desc 
	$(".sort_order").click(function() {
		setSortOrder();
	});

	$(document).ready(function(){

	 $(window).scroll(function(){
		var divheight = $('#productScroll').outerHeight();
		
		if(notscrolly==true && notEmptyPost==true && $(window).scrollTop() + $(window).height()/2 >= divheight){   
			
			getProductData();
		}

	 });

	});

	function getProductData(){ 
		var categorySlug=$('#categorySlugid').val();
		var orderBy=$('.sort_order:checked').val();
		var minPrice=$('#min_price').val();
		var maxPrice=$('#max_price').val();
 
		$.ajax({
			url: base_path+'/products',
			dataType: 'json',
			type: 'GET',
			data: {"offset":offset,"limit":"12","category_slug":categorySlug,"sort_order":orderBy,"min_price":minPrice,"max_price":maxPrice},
			beforeSend:function(){
				notscrolly=false;
				$('#preloader').css('display','inline-block');
			},
			error:function(xhr){
				showMsg('error',"Error: " + xhr.status + ": " + xhr.statusText); 
				$('#preloader').css('display','none');
			},
			success: function(response){
				if(response.status){
					if(response.total!='12'){
						notEmptyPost=false;
					}else{
						offset+=12;
					}

					if(newData){
						$('#productScroll').html(response.html); 
						$('#productsTotal').html(response.total);
						newData=false;
					}else{
						$('#productScroll').append(response.html); 
						$('#productsTotal').append(response.total);
					}
					notscrolly=true;
				}
				else{
					$('#productScroll').html(response.html); 
					$('#productsTotal').html(response.total);
				}
				$('#preloader').css('display','none');
			}
		});
	}

	//checkout ajax

	function save_to_cart(cart_id,newQuantity){ 
			var qty = newQuantity;
			if(qty != '0'){
				var qtys = newQuantity;
			}else{
				var qtys="0";
			}
			
			var loader=$('#cartLoader'+cart_id);
			$.ajax({
				type: "POST",
				dataType:"json",
				url: base_path+'/addtocartform',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
				},
				data:{
					product_id: cart_id, qty:qtys,		  
				},
				beforeSend: function(){
					$('#preloader').css('display','inline-block');
				},
				error:function(xhr,textStatus){
					if (textStatus == 'timeout') {
						showMsg('warning', xhr.status + ': ' + xhr.statusText);
						$('#preloader').css('display','none');
					}else{
						showMsg('error', xhr.status + ': ' + xhr.statusText);
						$('#preloader').css('display','none');
					}
				},
				success: function(data){
					
					if(data.error){
						
						showMsg('error',data.msg);
						$('#preloader').css('display','none');
					}else{	
						
						shoppingCartData();
						$('#preloader').css('display','none');		
						showMsg('success',data.msg);
						$('.checkoutCartDelete').html(data.checkoutCartDelete);
						$('.CartDelete').html(data.removecart);  
						$('.headerAddToCartShow').html(data.html); 
						$('.headerAddToCartShowTotal').html(data.total);
						$('.total_amount').html(data.total_amount);
						if(data.discount_amount>0){
							$('.discount_amount').html(data.discount_amount);
						}else{
							$('.discount_amount').html('AED 0.00');
						}
						if(data.total == 0){
							
							location.href=base_path+"/products";
						}
						$('.shipping_charge').html(data.shipping_charge);
						$('#subtotal').html(data.subtotal);
						
					}
					
					
					//cartList();
				}
			}); 
	}
	//get order ajax
	
	function getOrderData(){ 
		$.ajax({
			url: base_path+'/checkout',
			dataType: 'json',
			type: 'GET',
			beforeSend:function(){
				notscrolly=false;
				$('#preloader').css('display','inline-block');
			},
			error:function(xhr){
				showMsg('error',"Error: " + xhr.status + ": " + xhr.statusText); 
				$('#preloader').css('display','none');
			},
			success: function(response){
				if(response.status){
					if(response.total!='12'){
						notEmptyPost=false;
					}else{
						offset+=12;
					}

					if(newData){
						$('#productScroll').append(response.html); 
						$('.checkoutCartDelete').html(response.checkoutCartDelete);
						$('#addaddressget').html(response.address);						
						$("#addaddressget").show(); 
						newData=false;
					}else{
						$('#productScroll').append(response.html); 
						$('.checkoutCartDelete').html(response.checkoutCartDelete);
						$('#addaddressget').html(response.address);						
						$("#addaddressget").show();
					}
					notscrolly=true;
				}
				
				$('#preloader').css('display','none');
			}
		});
	}

	

	

//newsletter form submit
$("form#news").submit(function(e){
	e.preventDefault();
	
	var formId=$(this).attr('id');
	var formAction=$(this).attr('action');
	var formLoader=$(this).data('loader');
	
	$.ajax({
		url: formAction,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
		},
		data: new FormData(this),
		type: 'post',
		dataType:'json',
		beforeSend: function(){
			$('.'+formLoader).css('display','inline-block');
			 $('.button_'+formLoader).prop('disabled', true);
		},
		error:function(xhr,textStatus){
			if (textStatus == 'timeout') {
				showMsg('warning', xhr.status + ': ' + xhr.statusText);
			}else{
				showMsg('error', xhr.status + ': ' + xhr.statusText);
			}
			$('.'+formLoader).css('display','none');
			 $('.button_'+formLoader).prop('disabled', false);
		},
		success: function(data){
			if(data.error){
				showMsg('error',data.msg);
				$('.button_'+formLoader).prop('disabled', false);
					$('.'+formLoader).css('display','none');
			}else{
					showMsg('success',data.msg);
					$('.button_'+formLoader).prop('disabled', false);
					$('.'+formLoader).css('display','none');
					$('#'+formId)[0].reset();
			}
			
		},
		cache:false,
		contentType:false,
		processData:false, 
	});
});


$(document).ready(removeCartData); 
function removeCartData(){
$('.removeCartData').click(function(){
var newData=true;
var productId=$(this).data('product_id');
$.ajax({
    url: base_path+'/remove-cart',
    dataType: 'json',
    type: 'GET',
    data:{"id":productId},
    beforeSend:function(){
         $('#preloader').css('display','inline-block');
    },
    error:function(xhr){
        showMsg('error',"Error: " + xhr.status + ": " + xhr.statusText); 
        $('#preloader').css('display','none');
    },
    success: function(data){
        if(data.error){
            showMsg('error',data.msg);
        }else{              
            showMsg('success',data.msg);
            
            if(newData){
                $('.CartDelete').html(data.removecart); 
				$('.checkoutCartDelete').html(data.checkoutCartDelete); 
                $('.headerAddToCartShow').html(data.html); 
                $('.headerAddToCartShowTotal').html(data.total);
				$('.total_amount').html(data.total_amount);
				if(data.discount_amount>0){
					$('.discount_amount').html(data.discount_amount);
				}else{
					$('.discount_amount').html('AED 0.00');
				}
				$('.shipping_charge').html(data.shipping_charge);
				$('#subtotal').html(data.subtotal);
                newData=false;
            }
			if(data.total == 0){
							
				location.href=base_path+"/products";
			}
            if(data.total){
                $('.ShowTotal').html(data.total); 
				
            }else{
                $('.ShowTotal').html("0"); 
				
            }
        }
		 $('#preloader').css('display','none');
       
    }
});
});
}



$(document).ready(checkoutCartData); 
function checkoutCartData(){
$('.checkoutCartData').click(function(){
var newData=true;
var productId=$(this).data('product_id');
$.ajax({
    url: base_path+'/checkout-cart-delete',
    dataType: 'json',
    type: 'GET',
    data:{"id":productId},
    beforeSend:function(){
         $('#preloader').css('display','inline-block');
    },
    error:function(xhr){
        showMsg('error',"Error: " + xhr.status + ": " + xhr.statusText); 
         $('#preloader').css('display','none');
    },
    success: function(data){
        if(data.error){
            showMsg('error',data.msg);
        }else{              
            showMsg('success',data.msg);
             $('#preloader').css('display','none');
            if(newData){
                $('.CartDelete').html(data.removecart); 
				$('.checkoutCartDelete').html(data.checkoutCartDelete); 
                $('.headerAddToCartShow').html(data.html); 
                $('.headerAddToCartShowTotal').html(data.total);
				$('.total_amount').html(data.total_amount);
				if(data.discount_amount>0){
					$('.discount_amount').html(data.discount_amount);
				}else{
					$('.discount_amount').html('AED 0.00');
				}				
				$('.shipping_charge').html(data.shipping_charge);
				$('#subtotal').html(data.subtotal);
                newData=false;
            }
			if(data.total == 0){
				
				location.href=base_path+"/products";
			}
            if(data.total){
                $('.ShowTotal').html(data.total); 
            }else{
                $('.ShowTotal').html("0"); 
            }
        }
       
    }
});
});
}


//checkout ajax

function save_etopup(topup_id,newQuantity){ 
	var qtys = newQuantity;
	var loader=$('#cartLoader'+topup_id);
	$.ajax({
		type: "POST",
		dataType:"json",
		url: base_path+'/addtotopupform',
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
		},
		data:{
			amount: topup_id, qty:qtys,		  
		},
		beforeSend: function(){
			$('.listingloader').show();
		},
		error:function(xhr,textStatus){
			$('.listingloader').hide();
			if (textStatus == 'timeout') {
				showMsg('warning', xhr.status + ': ' + xhr.statusText);
			}else{
				showMsg('error', xhr.status + ': ' + xhr.statusText);
			}
		},
		success: function(data){
			
			if(data.error){
				$('.listingloader').hide();
				showMsg('error',data.msg);
			}else{				
				$('.listingloader').hide();
				$('#etopup').html(data.html);
			}
			
			
			//cartList();
		}
	}); 
}


//get blogs scroll 
var notscrolly=true;
var notEmptyPost=true;
var newData=true;
var offset=0;


$(document).ready(function(){
 $(window).scroll(function(){
	var divheight = $('#productScroll').outerHeight();
	if(notscrolly==true && notEmptyPost==true && $(window).scrollTop() + $(window).height()/2 >= divheight){   
		getblogsData();
	}
 });
});

function getblogsData(){ 
	var tagSlug=$('#tagSlug').val();
	var cateSlug=$('#cateSlug').val();
	$.ajax({
		url: base_path+'/blogs',
		dataType: 'json',
		type: 'GET',
		data: {"offset":offset,"limit":"12","tagSlug":tagSlug,"cateSlug":cateSlug},
		beforeSend:function(){
			notscrolly=false;
			$('.listingloader').show();
		},
		error:function(xhr){
			showMsg('error',"Error: " + xhr.status + ": " + xhr.statusText); 
			$('.listingloader').hide();
		},
		success: function(response){
			if(response.status){
				if(response.total!='12'){
					notEmptyPost=false;
				}else{
					offset+=12;
				}
				if(newData){
					$('#productScroll').html(response.html); 
					newData=false;
				}else{
					$('#productScroll').append(response.html); 
				}
				notscrolly=true;
			}
			$('.listingloader').hide();
		}
	});
}

	//live search  Blog
	$('#searchBlog').on('keyup',function(){
		$value=$(this).val();
		$.ajax({
		type: 'POST',
		url: base_path+'/blog-search',
		datatype: "html",
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
		},
		data: {search: $value},
		success: function(data){
			console.log(data);
			if(data){
			$('.search_blog').html(data);
			$('.searchDisplayBlog').show();
			}else{
				$('.search_blog').html('');
				$('.searchDisplayBlog').hide();
			}
		}
		});
	});

	//google login 
	function Google_signIn(googleUser) {
		var profile = googleUser.getBasicProfile();
		var register_type = 2;
		var data = {name: profile.getName(),email: profile.getEmail(),register_type: register_type};
		socialLogin_data(data);
	}
	//facebook login 
	window.fbAsyncInit = function() {
		// FB JavaScript SDK configuration and setup
		FB.init({
		  appId      : '156538796538077', // FB App ID
		  cookie     : true,  // enable cookies to allow the server to access the session
		  xfbml      : true,  // parse social plugins on this page
		  version    : 'v3.2' // use graph api version 2.8
		});
		// Check whether the user already logged in
		
	};
	
	// Load the JavaScript SDK asynchronously
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	
	// Facebook login with JavaScript SDK
	function fbLogin() {
		FB.login(function (response) {
			if (response.authResponse) {
				// Get and display the user profile data
				getFbUserData();
			} else {
				document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
			}
		}, {scope: 'email'});
	}
	
	// Fetch the user profile data from facebook
	function getFbUserData(){
		FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
		function (response) {
			var data = {name: response.first_name+' '+response.last_name,email: response.email,register_type:'3'};
			socialLogin_data(data);
		});
	}
	

	function socialLogin_data(data)
	{	
		$.ajax({
			type: "POST",
			dataType: 'json',
			data: data,
			url: base_path+'/social-login',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
			},
			beforeSend:function(){
             $('#preloader').css('display','inline-block');
			},
			error:function(xhr){
				showMsg('error',"Error: " + xhr.status + ": " + xhr.statusText); 
				 $('#preloader').css('display','none');
			},
			success: function(data) {
				$('#preloader').css('display','none');
				if(data.error)
				{
					showMsg('error',data.msg);
					
				}else{
					showMsg('success',data.msg);
					location.href=session_url;
					var auth2 = gapi.auth2.getAuthInstance();
					auth2.signOut().then(function () {
					});
				}
			}
		});
	}

//shoppingcart order ajax
function shoppingCartData(){ 
    $.ajax({
        url: base_path+'/shopping-cart',
        dataType: 'json',
        type: 'GET',
        beforeSend:function(){
            notscrolly=false;
             $('#preloader').css('display','inline-block');
        },
        error:function(xhr){
            showMsg('error',"Error: " + xhr.status + ": " + xhr.statusText); 
             $('#preloader').css('display','none');
        },
        success: function(response){
            if(response.status){
                if(response.total!='12'){
                    notEmptyPost=false;
                }else{
                    offset+=12;
                }

                if(newData){
                    $('.CartDelete').html(response.html); 
					$('.headerAddToCartShowTotal').html(response.total);
                    $('.total_amount').html(response.total_amount); 
					if(response.discount_amount>0){
						$('.discount_amount').html(response.discount_amount);
					}else{
						$('.discount_amount').html('AED 0.00');
					}
					$('.shipping_charge').html(response.shipping_charge);
					$('#subtotal').html(response.subtotal);
					
					$('#addaddressget').html(response.address);
                    if(response.total == 0){
							
						location.href=base_path+"/products";
					}
					newData=false;
                }else{
                    $('.CartDelete').html(response.html);
                    $('.total_amount').html(response.total_amount);
					if(response.discount_amount>0){
						$('.discount_amount').html(response.discount_amount);
					}else{
						$('.discount_amount').html('AED 0.00');
					}
					$('.shipping_charge').html(response.shipping_charge);
					$('#subtotal').html(response.subtotal);	
					$('#addaddressget').html(response.address);						
								
                }
                if(response.total){
                    $('.ShowTotal').html(response.total); 
                }else{
                    $('.ShowTotal').html("0"); 
                }
				if(response.total == 0){
							
					location.href=base_path+"/products";
				}
                notscrolly=true;
            }
             $('#preloader').css('display','none');
        }
    });
}


$(document).ready(addToWishlist); 
function addToWishlist(){ 
    $('.add_to_wishlist').click(function(){
        var newData=true;
        var productId=$(this).data('product_id');
        var qtys="1";
        $.ajax({
            type: "POST",
            dataType:"json",
            url: base_path+'/add-to-wishlist',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
            },
            data:{
                product_id: productId, qty:qtys,       
            },
            beforeSend: function(){
                $('#add_to_wishlist'+productId).prop('disabled', true);
				$('#preloader').css('display','inline-block');
            },
            error:function(xhr,textStatus){
                if (textStatus == 'timeout') {
                    showMsg('warning', xhr.status + ': ' + xhr.statusText);
                    $('#add_to_wishlist'+productId).prop('disabled', false);
					$('#preloader').css('display','none');
                }else{
                    showMsg('error', xhr.status + ': ' + xhr.statusText);
                    $('#add_to_wishlist'+productId).prop('disabled', false);
					$('#preloader').css('display','none');
                }
            },
            success: function(data){
                if(data.error){
					$('#preloader').css('display','none');
					$('#add_to_wishlist'+productId).prop('disabled', false);
                    showMsg('error',data.msg);
					location.href="/login";
                }else{ 
					if(data.add){
					$('#add_to_wishlist'+productId).removeClass("fa-heart-o");				
					$('#add_to_wishlist'+productId).addClass("fa-heart");
					$('#wish-added'+productId).addClass("wish-added");					
					}else{
						$('#add_to_wishlist'+productId).addClass("fa-heart-o");				
						$('#add_to_wishlist'+productId).removeClass("fa-heart");
						$('#wish-added'+productId).removeClass("wish-added");				
					}
					//$('#add_to_wishlist'+productId).html('<i class="fa fa-heart" aria-hidden="true"></i>'); 					
					$('#add_to_wishlist'+productId).prop('disabled', false);
					$('#preloader').css('display','none');
					showMsg('success',data.msg);
                }
                
            }
        }); 
    }); 
}



$(document).ready(removeWishlistData); 
function removeWishlistData(){ 
	$('.removeWishlistData').click(function(){
		var productId=$(this).data('product_id');
		$.ajax({
			url: base_path+'/remove-wishlist',
			dataType: 'json',
			type: 'GET',
			data:{"id":productId},
			beforeSend:function(){
				$('#preloader').css('display','inline-block');
			},
			error:function(xhr){
				showMsg('error',"Error: " + xhr.status + ": " + xhr.statusText); 
				$('#preloader').css('display','none');
			},
			success: function(data){
				if(data.error){
					showMsg('error',data.msg);
					$('#preloader').css('display','none');
				}else{ 
					$('#preloader').css('display','none');			
					$('.wishlist').html(data.html);            
					showMsg('success',data.msg);
					

				}
			   
			}
		});
	});
}


//newsletter form submit
function addressupdate(){
$("form#address").submit(function(e){
	e.preventDefault();
	
	var formId=$(this).attr('id');
	var formAction=$(this).attr('action');
	var formLoader=$(this).data('loader');
	
	$.ajax({
		url: formAction,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
		},
		data: new FormData(this),
		type: 'post',
		dataType:'json',
		beforeSend: function(){
			$('#preloader').css('display','inline-block');
			$('.button_'+formLoader).prop('disabled', true);
		},
		error:function(xhr,textStatus){
			if (textStatus == 'timeout') {
				showMsg('warning', xhr.status + ': ' + xhr.statusText);
			}else{
				showMsg('error', xhr.status + ': ' + xhr.statusText);
			}
			$('#preloader').css('display','none');
			$('.button_'+formLoader).prop('disabled', false);
		},
		success: function(data){
			if(data.error){
				showMsg('error',data.msg);
				$('.button_'+formLoader).prop('disabled', false);
				$('#preloader').css('display','none');
			}else{
				$('.myModalAddress').modal('hide');
				$('.AddressModel').modal('hide');
				userAddressData();
				showMsg('success',data.msg);
				$('.button_'+formLoader).prop('disabled', false);
				$('#preloader').css('display','none');
				shoppingCartData();
				$('#'+formId)[0].reset();
			    $("#addform").show();
				$("#addaddressget").show();
				
				
			}
			
		},
		cache:false,
		contentType:false,
		processData:false, 
	});
});
}
	//get order ajax
	
	function userAddressData(){ 

		$.ajax({
			url: base_path+'/user/profile',
			dataType: 'json',
			type: 'GET',
			beforeSend:function(){
				notscrolly=false;
				$('#preloader').css('display','inline-block');
			},
			error:function(xhr){
				a
				showMsg('error',"Error: " + xhr.status + ": " + xhr.statusText); 
				$('#preloader').css('display','none');
			},
			success: function(response){
			 
				if(response.error){
					$('#preloader').css('display','none');
				}else{ 
					$('#addressRender').html(response.address);						
				}
				$('#preloader').css('display','none');
			}
				
		});
	}

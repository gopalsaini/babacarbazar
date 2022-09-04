@extends('layouts.app')
@push('custom_css')
<link href="{{ asset('public/css/chatbox.css')}}" rel="stylesheet" type="text/css"/>
<style>
.chat_with {
    visibility: hidden;
	position: absolute;
}
.chat-avatar{
	width: 50px;
	height: 50px;
	object-fit: cover;
}
.media-body h6, .media-body small, .media-body p{
	color:#111;
}
.list-group-item.list-group-item-action.rounded-0{
	background-color:#e4e4e4;
}

.rounded-0.active .media-body h6, .rounded-0.active .media-body small, .rounded-0.active .media-body p{
	color:inherit;
}
.rounded-0.active{
	background-color:#80be80 !important;
	color:#fff;
	border-color: #80be80;
}
</style>
@endpush
@section('content')

<br><br><br>
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y bg">
<div class="container">

	<!--Chat Section-->
	  <div class="row rounded-lg overflow-hidden shadow">
		<!-- Users box-->
		<div class="col-md-4 px-0">
		  <div class="bg-white">
	
			<!--<div class=" px-4 py-2 ">
			  <p class="h5 mb-0 py-1">Recent</p>
			</div>-->
		<form id="chat" action="{{url('/message')}}" class="form-signin" method="post" accept-charset="utf-8">
			<div class="messages-box">
			  <div class="list-group rounded-0">
				  @if(count($users)==0)
					<p style="margin-left: 25px;">User not available</p>
				  @else
					@php $sr = "1"; @endphp
					@foreach($users as $user )
						@if($user->id != Auth::id())
							<label style="cursor:pointer" id="{{$sr}}" class=" chat-open list-group-item list-group-item-action rounded-0 @if($sr == 1) active @endif">
								<input type="radio" @if($sr == 1) checked @endif class="chat_with" value="{{$user->id}}" name="chatwith" >
								<div class="media align-items-center"><img src="@if(!empty($user->logo)) {{asset('public/assets/images/user/logo.png')}} @else  {{asset('public/assets/images/user/logo.png')}} @endif" alt="user" class="rounded-circle border chat-avatar">
									<div class="media-body ml-3">
									  <div class="d-flex align-items-center justify-content-between mb-1">
										<h6 class="mb-0">{{$user->email}}</h6><small class="small font-weight-bold" id="newMessage{{$user->id}}"></small>
									  </div>
									  <p class="font-italic mb-0 text-small" id="firebaseMessage{{$user->id}}"></p>
									</div>
								</div>
							</label>
						@endif
						@php $sr++; @endphp
					@endforeach
				  @endif
			  </div>
			</div>
		  </div>
		</div>
		<!-- Chat Box-->
		
		<!--- mobile Userprofile -->
			<div class="chat-sec">
				<div class="userprofile-inner-sec">
					<div class="content-boxpage">
						<div class="box-header d-flex justify-content-between align-items-center">
							<div class="title-box"> Chat</div>
							<div class="close-box"><i class="fas fa-times"></i></div>
						</div>
						<div class="col-md-12  px-0" style="overflow: scroll;height: 500px;">
						  <div class="px-4 py-5 chat-box bg-white chatroom" id="">
							
						  </div>
						  
						  <!-- Typing area -->
						
							<div class="input-group">
							  <input type="text" name="message" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
							  <div class="input-group-append">
								<button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
							  </div>
							</div>
					
						</div>
					</div>
				</div>
			</div>
			<!--- 
		
		
		<div class="col-md-8  px-0 chat-desck-option" style="overflow: scroll;height: 500px;">
		  <div class="px-4 py-5 chat-box bg-white chatroom" id="">
			
		  </div>
		  
		 
		
			<div class="input-group">
			  <input type="text" name="message" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
			  <div class="input-group-append">
				<button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
			  </div>
			</div>
		</form>
	
		</div>
	  </div>
	-->

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<br><br>
@endsection

@push('custom_js')

<script>
$(document).ready(function() {
    $('.chat-open').click(function() {
        $('.chat-sec').addClass('user-profile-active');
    });
    $('.close-box').click(function() {
        $('.chat-sec').removeClass('user-profile-active');
    });
});
</script>


	<script>	 
        // Retrieve Firebase Messaging object.
        const messaging = firebase.messaging();
        // Add the public key generated from the console here.
        messaging.getToken({ vapidKey:"BA19whVR69s5eoNWob-0WY4vlwuPDlnbx3AjSkIV52xvTdarn7i7ZJB_6V45lzp7gts74vbCpBMmB1qtoYqn_vo"});


        function sendTokenToServer(fcm_token) {
            const user_id = "@if(Auth::id()) {{Auth::id()}} @else {{Session::get('admin_id')}} @endif";
            //console.log($user_id);
            axios.post('/save-token', {
                fcm_token, user_id
            })
                .then(res => {
                    console.log(res);
                })

        }

        function retreiveToken(){
            messaging.getToken().then((currentToken) => {
                if (currentToken) {
                    sendTokenToServer(currentToken);
                    // updateUIForPushEnabled(currentToken);
                } else {
                    // Show permission request.
                    //console.log('No Instance ID token available. Request permission to generate one.');
                    // Show permission UI.
                    //updateUIForPushPermissionRequired();
                    //etTokenSentToServer(false);
                    alert('You should allow notification!');
                }
            }).catch((err) => {
                console.log(err.message);
                // showToken('Error retrieving Instance ID token. ', err);
                // setTokenSentToServer(false);
            });
        }
		
		
        retreiveToken();
        messaging.onTokenRefresh(()=>{
            retreiveToken();
        });

        messaging.onMessage((payload)=>{
			const noteTitle = payload.notification.title;
			const noteOptions = {
				body: payload.notification.body,
				icon: payload.notification.icon,
				
			};
			new Notification(noteTitle, noteOptions);
			//location.reload();
			console.log(payload);
			getChatData(payload.data.mesage, payload.data.sender_name);
			//getChatData();
        });

    </script>
	<script>
	//short by desc 
	$(".chat_with").click(function() {
		$('.list-group-item').removeClass('active');
		var pid = $(this).parent().attr('id');
		$('#'+pid).addClass('active');
		getChatData();
		$('.chatroom').scrollTop($(document).height());
		
	});
	
	getChatData();
	function getChatData(firebaseMessage,id){
	var chatWith=$('.chat_with:checked').val();
		$.ajax({
			url: "{{url('/message')}}",
			dataType: 'json',
			data:{id:chatWith},
			type: 'GET',
			beforeSend:function(){
			},
			error:function(xhr){
				//sweetAlertMsg('error',"Error: " + xhr.status + ": " + xhr.statusText); 
			},
			success: function(response){
				if(response){
					$('.chatroom').scrollTop($(document).height());
					$('.chatroom').html(response.html); 
					$('#firebaseMessage'+id).html(firebaseMessage); 
					if(firebaseMessage){
						$('#newMessage'+id).html('New message'); 
					}
				}
			}
		});
	}
	
	//newsletter form submit

$("form#chat").submit(function(e){
	e.preventDefault();
	var formId=$(this).attr('id');
	var formAction=$(this).attr('action');
	$.ajax({
		url: formAction,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
		},
		data: new FormData(this),
		type: 'post',
		dataType:'json',
		beforeSend: function(){
		},
		error:function(xhr,textStatus){
			if (textStatus == 'timeout') {
				//sweetAlertMsg('warning', xhr.status + ': ' + xhr.statusText);
			}else{
				//sweetAlertMsg('error', xhr.status + ': ' + xhr.statusText);
			}
		},
		success: function(data){
			getChatData();
			$('#'+formId)[0].reset();
			$('.chatroom').scrollTop($(document).height());
			$('.chatroom').html(data.html);
		},
		cache:false,
		contentType:false,
		processData:false, 
	});
});

	</script>
	
	
@endpush

@if(count($chatlist)==0)

    @php 
    	$msg = "Please select user";
    
    @endphp
	<p>{{$msg}}</p>
@else
	@foreach($chatlist as $chats )
	
		@if($chats->sender_id==$user_id)
		<!-- Reciever Message-->
			<div class="media  ml-auto mb-3">
			  <div class="media-body">{{$chats->sender_name}}
				<div class="bg-primary rounded py-2 px-3 mb-2">
				  <p class="text-small mb-0 text-white">{{$chats->message}}</p>
				</div>
				<p class="small text-muted">{{date('h:i', strtotime($chats->created_at))}} | {{date('M-y', strtotime($chats->created_at))}}</p>
			  </div>
			</div>
		@else
			<div class="media mb-3">
				<img src="@if(!empty($userto->logo)) {{asset('public/assets/images/user/logo.png')}} @else  {{asset('public/assets/images/user/logo.png')}} @endif" alt="user" width="50" class="rounded-circle">{{$chats->sender_name}}
				  <div class="media-body ml-3">
					<div class="bg-light rounded py-2 px-3 mb-2">
					  <p class="text-small mb-0 text-muted">{{$chats->message}} </p>
					</div>
					<p class="small text-muted">{{date('h:i', strtotime($chats->created_at))}} | {{date('M-y', strtotime($chats->created_at))}}</p>
				  </div>
			</div>
		@endif
	@endforeach	 
@endif
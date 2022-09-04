@extends('layouts.app')

@section('content')
<style>
.abcRioButton {

    background-color: #4682b4!important;
}
</style>
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <!-- delete Modal 
					<div class="form-group row">

						<div class="col-md-3 offset-md-3">
							<div class="g-signin2 " data-longtitle="true" data-onsuccess="Google_signIn" data-theme="light" data-width="160"></div>

						</div>
						<div class="col-md-3 " style="margin-top: 10px;">
							<a href="javascript:void(0);" onclick="fbLogin()" id="fbLink" class="abcRioButton for-angkle " style="padding: 10px;"><i class="fab fa-facebook" aria-hidden="true" ></i> Sign in with Facebook</span></a>

						</div>
					</div>
					<div class="form-group row">

						<div class="col-md-6 offset-md-3 text-center">
							Or
						</div>
					</div>
					-->
                    <form method="POST" action="{{ route('register-user') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-6 offset-md-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter Username"  onkeypress="return /[a-zA-Z ]/i.test(event.key)">
                                <br>
                                
                                <input id="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus placeholder="Enter Mobile no." pattern="^\d{10}$" min="10" maxLength="10" onkeypress="return /[0-9 ]/i.test(event.key)">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                           <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection


@push('custom_js')

<script>

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
		  appId      : '570876544128879', // FB App ID
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
	
</script>

@endpush
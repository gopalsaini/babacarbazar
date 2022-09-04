@extends('layouts.app')
@push('custom_css')

<style>
	.owl-nav{
		display: none;
	}
	.owl-dots{
		display: none;
	} 
</style>

@endpush
@section('content')
<br><br><br><br>
        <div class="main-container">
            <div class="container">
                <div class="row clearfix">


					<br><br><br>
                    <div class="col-md-12">
					                   <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%&amp;height=400&amp;hl=en&amp;q=baba motors alwar&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.fnfgo.com/">FNF Mods</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>
						<br><br><br>
                        <div class="contact-form">
                            <h5 class="list-title gray mt-0">
                                <strong>Contact Us</strong>
                            </h5>

                            <form id="test" class="form-horizontal" method="post" action="{{url('contact-form')}}">
								@csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group required">
                                                <input required id="first_name" name="name" type="text" placeholder="Full Name" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group required">
                                                <input required id="subject" name="subject" type="text" placeholder="Enter Subject" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group required">
                                                <input required id="mobile" name="mobile" type="text" placeholder="Enter mobile number" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group required">
                                                <input required id="email" name="email" type="text" placeholder="Email Address" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group required">
                                                <textarea required class="form-control" id="message" name="message" placeholder="Message" rows="7"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

@push('custom_js')
<script>
//newsletter form submit
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
			if(data.error){
				showMsg('error',data.msg);
				$('.button_'+formLoader).prop('disabled', false);
				$('#preloader').css('display','none');
			}else{
        $('#preloader').css('display','none');
        $('#contactUser').modal('hide');
        $('.modal-backdrop').css('display','none');
        
				showMsg('success',data.msg);
				$('#'+formId)[0].reset();
			}
			
		},
		cache:false,
		contentType:false,
		processData:false, 
	});
});
</script>

@endpush

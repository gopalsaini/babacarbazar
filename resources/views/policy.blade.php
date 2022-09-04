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

        <br><br><br>
        <div class="main-container">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="contact-form">
                            <h5 class="list-title gray mt-0">
                                <strong>Privacy Policy</strong>
                            </h5>
							<p>{!! $policy->info_desc !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

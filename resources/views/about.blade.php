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


@section('meta_title', 'Used Car in Alwar at Affordable Price | Baba Car Bazar')
@section('meta_description', 'Baba car bazar brings a super market of used car in Alwar. So, buy now certified Pre-owned second hand car in your city Alwar.')
@section('meta_keywords', 'Baba Motors in Alwar. Second Hand Car Dealers with Address, Contact Number, Photos, Maps. View Baba Motors,')


@section('content')

        <br><br><br>
        <div class="main-container">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="contact-form">
                            <h5 class="list-title gray mt-0">
                                <strong>About Us</strong>
                            </h5>
							<p>{!! $about->info_desc !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

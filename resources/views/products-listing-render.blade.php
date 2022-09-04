@foreach($products as $product)

<div class="item-list">
    <!-- SubCategory <div class="cornerRibbons red"> <a href="#"> Sold Out</a> </div>-->
    <div class="row">
        <div class="col-sm-2 col-12 no-padding photobox">
            <div class="add-image">
                <a href="{{url('product')}}/{{$product->id}}"> 
                @php $images = explode(',',$product->images); @endphp
                    <img class="lazyload img-thumbnail no-margin"
                        src="{{asset('public/uploads/products')}}/{{$images[0]}}" alt="{{$product->title}} " style="height: height: 100%;"> 
                </a>
            </div>
        </div>
        <div class="col-sm-7 col-12 add-desc-box">
            <div class="items-details">
				<h3 class="item-price">
                    Rs. {{$product->price}}
				</h3>
                <h5 class="add-title">
                    <a href="{{url('product')}}/{{$product->id}}">{{$product->year}} {{$product->title}} {{$product->model_title}} </a>
                </h5> 
				<span class="category">
					<a href="#" class="info-link">
						<i class="fas fa-map-marker-alt"></i> {{$product->loc_name}}
					</a>&nbsp;&raquo;&nbsp;
					<a href="#"
						class="info-link">
						Km:{{$product->km_drive}}
					</a>
				</span>
            </div>
            
        </div>
        <div class="col-sm-3 col-12 text-left price-box" style="white-space: nowrap;">
            
			<span class="item-location">
				<i class="fa fa-calendar"></i>&nbsp;
				<a href="#" class="info-link">
					{{date('d-M', strtotime($product->created_at))}}, 
				</a>
			</span>
			<span class="item-location">
				<i class="fas fa-user"></i>&nbsp;
				<a href="" class="info-link">
				{{$product->owners}}
				</a>
			</span> 			
           &nbsp;
		   
           @php $active = ""; @endphp 
            @if(!empty($wishlist))
                @foreach($wishlist as $wish)
                @if($wish->product_id == $product->id)
                    @php $active = "wishlistActive"; @endphp 

                @endif

                @endforeach

            @endif
            <a data-product_id="{{$product->id}}" data-tip="add to wishlist" data-dir="addWishlist"  class="add-to-wishlist btn btn-default btn-sm add_to_wishlist" > <i class="fa fa-heart {{$active}}" id="add_to_wishlist{{$product->id}}"></i><span> </span>
            </a>
        </div>
    </div>
</div>

@endforeach

<script>
addToWishlist();
</script>
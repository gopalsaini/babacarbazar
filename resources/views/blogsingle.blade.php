@extends('layouts.app') @push('custom_css') 

<link href="{{ asset('public/assets/assets/plugins/bxslider/jquery.bxslider.css')}}"rel="stylesheet"/>
<link href="https://unpkg.com/xzoom/dist/xzoom.css" />

    
        <style>
       .slider-wrapper {
        display: flex;
        position: relative;
        width: 100%;
        height: 40vw;
        max-height: 500px;
        min-height: 300px;
        background: #ddd;
        overflow: hidden;
      }

      .slider-wrapper ul {
        list-style: none;
        margin: 0;
        padding: 0;
      }

      /* slider-img */
      ul.slider-img {
        display: flex;
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        transition: 0.5s;
      }

      ul.slider-img li {
        flex: 1 0 100%;
      }

      ul.slider-img li img {
        width: 100%;
        height: 100%;
        object-fit: contain;
      }

      /* slider-arrow */
      ul.slider-arrow {
        position: relative;
        color: #fff;
        font-size: 2rem;
        display: flex;
        justify-content: space-between;
        height: 100%;
        width: 100%;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
      }

      @media screen and (min-width: 768px) {
        ul.slider-arrow {
          font-size: 2.5rem;
        }
      }

      ul.slider-arrow li {
        display: flex;
        align-items: center;
        cursor: pointer;
        height: 100%;
        padding: 0 15px;
        opacity: 0.4;
        transition: 0.5s;
      }

      ul.slider-arrow li:hover {
        opacity: 1;
      }

      /* slider-dot */
      .slider-dot {
        position: absolute;
        bottom: 15px;
        display: flex;
        justify-content: center;
        align-items: flex-end;
        width: 100%;
        color: #fff;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
      }

      .slider-dot li {
        cursor: pointer;
        margin: 0 8px;
        font-size: 0.6rem;
        opacity: 0.4;
      }

      .slider-dot li.active {
        opacity: 1;
      }

      @media screen and (min-width: 768px) {
        .slider-dot li {
          margin: 0 12px;
          font-size: 0.95rem;
        }
      }
    </style>
   
<style>
        #default {
            text-align: center;
        }
    </style>
<style type="text/css">
    .btn-primaryz {
        background-color: white;

    }
img.xzoom{
    width: 100% !important;
}
.btnz {
    background-color: white;
}
.owl-dots{
    display: none;
}
</style>
<style>
@media screen and (max-width: 767px){
.ads-img-v2 #bx-pager {
    position: inherit!important;
}
}

.block-cell .rating {
    padding: 2px !important;
    width: 130px !important;
}

.block-cell .rating .reviews-widget span.icon-star,
.block-cell .rating .reviews-widget span.icon-star-empty {
    margin-top: 5px !important;
    font-size: 14px !important;
    margin-right: -9px !important;
}

.block-cell .rating .reviews-widget .rating-label {
    margin-top: 0 !important;
    font-size: 10px !important;
    text-transform: none !important;
}

.block-cell .rating .reviews-widget span.icon-star,
.block-cell .rating .reviews-widget span.icon-star-empty {
    color: #ffc32b;
}
</style>
<style>
.krajee-default.file-preview-frame:hover:not(.file-preview-error) {
    box-shadow: 0 0 5px 0 #666666;
}
</style>
<style type="text/css">
.items-details .tab-content {
    padding-top: 5px;
    padding-bottom: 5px;
}

.items-details .well {
    margin-bottom: 0;
    border: 0;
    background-color: #fafafa;
}

#item-reviews {
    margin-top: 0;
}

#item-reviews>div {
    padding: 0 10px;
}

/* Enhance the look of the textarea expanding animation */
.reviews-widget .animated {
    -webkit-transition: height 0.2s;
    -moz-transition: height 0.2s;
    transition: height 0.2s;
}

.reviews-widget .stars {
    margin: 20px 0;
    font-size: 24px;
    color: #ffc32b;
}

.reviews-widget .stars a {
    color: #ffc32b;
}

.reviews-widget .comments span.icon-star,
.reviews-widget .comments span.icon-star-empty {
    margin-top: 5px;
    font-size: 16px;
    margin-right: -8px;
}

.reviews-widget .comments .rating-label {
    margin-top: 5px;
    font-size: 16px;
    margin-left: 4px;
}

@media (min-width: 576px) {
    #post-review-box .form-group {
        margin-bottom: 0;
    }

    #post-review-box .form-control {
        width: 100%;
    }
}
</style>
<style>
.reviews-widget span.icon-star,
.reviews-widget span.icon-star-empty {
    margin-top: 5px;
    font-size: 18px;
    margin-right: -9px;
}

.reviews-widget .rating-label {
    margin-top: 5px;
    font-size: 16px;
    margin-left: 6px;
}

.reviews-widget span.icon-star,
.reviews-widget span.icon-star-empty {
    color: #ffc32b;
}
</style>
<style>
.bx-wrapper {
    margin-bottom: 20px;
}
</style>
<style>
.reviews-widget>span.icon-star,
.reviews-widget>span.icon-star-empty {
    margin-top: 5px;
    font-size: 16px;
    margin-right: -8px;
}

.reviews-widget>span.rating-label {
    margin-top: 5px;
    font-size: 14px;
    margin-left: 4px;
}

.reviews-widget>span.icon-star,
.reviews-widget>span.icon-star-empty {
    color: #ffc32b;
}

.featured-list-slider span {
    display: inline;
}

.featured-list-slider .reviews-widget>span.icon-star,
.featured-list-slider .reviews-widget>span.icon-star-empty {
    margin-top: 5px;
    font-size: 16px;
    margin-right: -8px;
}

.featured-list-slider .reviews-widget>span.rating-label {
    margin-top: 5px;
    font-size: 12px;
    margin-left: 4px;
}

.bx-controls {
    display: none;
}

.wishlistActive {
    color: red;
}
</style> @endpush 


@section('meta_title', $blog->meta_title)
@section('meta_description', $blog->meta_keywords)
@section('meta_keywords', $blog->meta_description)


@section('content') <div class="h-spacer"></div>
@if(!Auth::id())
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <a href="{{url('login')}}">
                    <strong>Login</strong>
                </a> for faster access to the best deals. <a href="{{url('register')}}">
                    <strong>Click here</strong>
                </a> if you don't have an account.
            </div>
        </div>
    </div>
</div>
@endif
<div class="main-container">
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb" role="navigation" class="pull-left">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{url('/')}}">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Blog </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                {{$blog->title}}
                            </a>
                        </li>
                    </ol>
                </nav>
                <div class="pull-right backtolist">
                    <a href="{{url('/')}}">
                        <i class="fa fa-angle-double-left"></i> Back to Results </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 page-content col-thin-right">
                <div class="inner inner-box items-details-wrapper pb-0">
                    <h2 class="enable-long-words">
                        <strong>
                            <a href="#" title="Vacation For Conservation Volunteer Position"> {{$blog->title}} </a>
                        </strong>
                    </h2>
                    <span class="info-row">
                        <span class="date">
                           <i class="fa fa-calendar"></i>
                            <span style="cursor: help;" data-toggle="popover" data-trigger="hover"
                                data-placement="bottom" data-content="Jul 17th, 2021 at 10:34">
                                    {{date('d-M', strtotime($blog->updated_at))}}</span>
                        </span>&nbsp; <span class="category">
                            
							<p></p>
                    <div class="col-md-12">
                        
                        <div class="slider-wrapper" id="slider">
                            <ul class="slider-img">
                               
                                <li>
                                    <img src="{{ asset('public/uploads/blogs/'. $blog->image)}}" alt="" />
                                </li>
                                
                            </ul>
                        </div>
    
                    </div>
                    
                    <br><br>
                    <div class="items-details">
                        
                        <!-- Tab panes -->
                        <div class="tab-content p-3 mb-3" id="itemsDetailsTabsContent">
                            <div class="tab-pane show active" id="item-details" role="tabpanel"
                                aria-labelledby="item-details-tab">
                                <div class="row">
                                    <div
                                        class="items-details-info col-md-12 col-sm-12 col-12 enable-long-words from-wysiwyg">
                                        
                                        <hr>
                                        <!-- Description -->
                                        <div class="row">
                                            <div class="col-12 detail-line-content">
                                                <p>{!! $blog->blog_desc !!}</p>
                                            </div>
                                        </div>
                                        <!-- Custom Fields -->
                                    </div>
                                    <br>&nbsp; <br>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                <!--/.items-details-wrapper-->
            </div>
            <!--/.page-content-->
            
        </div>
    </div>
</div>

@endsection

@push('custom_js')

<script src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
<script src="https://hammerjs.github.io/dist/hammer.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js"></script>

<script>
    (function ($) {
        $(document).ready(function () {
            $('.xzoom, .xzoom-gallery').xzoom({ zoomWidth: 400, title: true, tint: '#333', Xoffset: 15 });
            $('.xzoom2, .xzoom-gallery2').xzoom({ position: '#xzoom2-id', tint: '#ffa200' });
            $('.xzoom3, .xzoom-gallery3').xzoom({ position: 'lens', lensShape: 'circle', sourceClass: 'xzoom-hidden' });
            $('.xzoom4, .xzoom-gallery4').xzoom({ tint: '#006699', Xoffset: 15 });
            $('.xzoom5, .xzoom-gallery5').xzoom({ tint: '#006699', Xoffset: 15 });

            //Integration with hammer.js
            var isTouchSupported = 'ontouchstart' in window;

            if (isTouchSupported) {
                //If touch device
                $('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function () {
                    var xzoom = $(this).data('xzoom');
                    xzoom.eventunbind();
                });

                $('.xzoom, .xzoom2, .xzoom3').each(function () {
                    var xzoom = $(this).data('xzoom');
                    $(this).hammer().on("tap", function (event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        var s = 1, ls;

                        xzoom.eventmove = function (element) {
                            element.hammer().on('drag', function (event) {
                                event.pageX = event.gesture.center.pageX;
                                event.pageY = event.gesture.center.pageY;
                                xzoom.movezoom(event);
                                event.gesture.preventDefault();
                            });
                        }

                        xzoom.eventleave = function (element) {
                            element.hammer().on('tap', function (event) {
                                xzoom.closezoom();
                            });
                        }
                        xzoom.openzoom(event);
                    });
                });

                $('.xzoom4').each(function () {
                    var xzoom = $(this).data('xzoom');
                    $(this).hammer().on("tap", function (event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        var s = 1, ls;

                        xzoom.eventmove = function (element) {
                            element.hammer().on('drag', function (event) {
                                event.pageX = event.gesture.center.pageX;
                                event.pageY = event.gesture.center.pageY;
                                xzoom.movezoom(event);
                                event.gesture.preventDefault();
                            });
                        }

                        var counter = 0;
                        xzoom.eventclick = function (element) {
                            element.hammer().on('tap', function () {
                                counter++;
                                if (counter == 1) setTimeout(openfancy, 300);
                                event.gesture.preventDefault();
                            });
                        }

                        function openfancy() {
                            if (counter == 2) {
                                xzoom.closezoom();
                                $.fancybox.open(xzoom.gallery().cgallery);
                            } else {
                                xzoom.closezoom();
                            }
                            counter = 0;
                        }
                        xzoom.openzoom(event);
                    });
                });

                $('.xzoom5').each(function () {
                    var xzoom = $(this).data('xzoom');
                    $(this).hammer().on("tap", function (event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        var s = 1, ls;

                        xzoom.eventmove = function (element) {
                            element.hammer().on('drag', function (event) {
                                event.pageX = event.gesture.center.pageX;
                                event.pageY = event.gesture.center.pageY;
                                xzoom.movezoom(event);
                                event.gesture.preventDefault();
                            });
                        }

                        var counter = 0;
                        xzoom.eventclick = function (element) {
                            element.hammer().on('tap', function () {
                                counter++;
                                if (counter == 1) setTimeout(openmagnific, 300);
                                event.gesture.preventDefault();
                            });
                        }

                        function openmagnific() {
                            if (counter == 2) {
                                xzoom.closezoom();
                                var gallery = xzoom.gallery().cgallery;
                                var i, images = new Array();
                                for (i in gallery) {
                                    images[i] = { src: gallery[i] };
                                }
                                $.magnificPopup.open({ items: images, type: 'image', gallery: { enabled: true } });
                            } else {
                                xzoom.closezoom();
                            }
                            counter = 0;
                        }
                        xzoom.openzoom(event);
                    });
                });

            } else {
                //If not touch device

                //Integration with fancybox plugin
                $('#xzoom-fancy').bind('click', function (event) {
                    var xzoom = $(this).data('xzoom');
                    xzoom.closezoom();
                    $.fancybox.open(xzoom.gallery().cgallery, { padding: 0, helpers: { overlay: { locked: false } } });
                    event.preventDefault();
                });

                //Integration with magnific popup plugin
                $('#xzoom-magnific').bind('click', function (event) {
                    var xzoom = $(this).data('xzoom');
                    xzoom.closezoom();
                    var gallery = xzoom.gallery().cgallery;
                    var i, images = new Array();
                    for (i in gallery) {
                        images[i] = { src: gallery[i] };
                    }
                    $.magnificPopup.open({ items: images, type: 'image', gallery: { enabled: true } });
                    event.preventDefault();
                });
            }
        });
    })(jQuery);
</script>

<script>
        // Determine the total amount of images in the carousel.
        let sliderCount = $("#slider").find(".slider-img li img").length;
        // Load images into the carousel
        let sliderImg = $("#slider").find(".slider-img");
        // Define the navigation arrows and pagination bullets.
        let sliderArrow = `<ul class="slider-arrow"><li class="arrow-left" role="button"><i class="fas fa-chevron-left"></i></li><li class="arrow-right" role="button"><i class="fas fa-chevron-right"></i></li></ul>`;
        let sliderDotLi = "";
        for (let i = 0; i < sliderCount; i++) {
            sliderDotLi += `<li><i class="fas fa-circle"></i></li>`;
        }
        let sliderDot = `<ul class="slider-dot">${sliderDotLi}</ul>`;
        $("#slider").append(sliderArrow + sliderDot);

        let activeDefaultCount = $(".slider-dot li.active").length;
        if (activeDefaultCount != 1) {
            $(".slider-dot li")
                .removeClass()
                .eq(0)
                .addClass("active");
        }
        let sliderIndex = $(".slider-dot li.active").index();
        sliderImg.css("left", -sliderIndex * 100 + "%");

        // switch between images
        function sliderPos() {
            sliderImg.css("left", -sliderIndex * 100 + "%");
            $(".slider-dot li")
                .removeClass()
                .eq(sliderIndex)
                .addClass("active");
        }

        $(".arrow-right").click(function() {
            sliderIndex >= sliderCount - 1 ? (sliderIndex = 0) : sliderIndex++;
            sliderPos();
        });

        $(".arrow-left").click(function() {
            sliderIndex <= 0 ? (sliderIndex = sliderCount - 1) : sliderIndex--;
            sliderPos();
        });

        $(".slider-dot li").click(function() {
            sliderIndex = $(this).index();
            sliderPos();
        });

        let goSlider = setInterval(() => {
            $(".arrow-right").click();
        }, 3000);

        $("#slider").on({
            mouseenter: () => {
                clearInterval(goSlider);
            },
            mouseleave: () => {
                goSlider = setInterval(() => {
                    $(".arrow-right").click();
                }, 3000);
            }
        });
    </script>
@endpush
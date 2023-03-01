@extends('layouts.main') 
@section('css')
<style>

</style>

<link href="{{ URL::asset('public/frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<!------------breadcrumbs-------->
<section class="breadcrumbs about-page">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <div class="breadcrumbs-content">
                    <h1>Product Details</h1>
                    <ul class="list-unstyled mb-0">
                        <li class="list-inline-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="list-inline-item">|</li>
                        <li class="list-inline-item">Product Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>   
</section>
<!---------//end breadcrumbs---->
<!-- product details -->
<section class="product-part hg_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="image-box">
                    <img src="{{ URL::asset('public/uploads/product/'.$product_detail->photo) }}" class="main-pro-image" alt="">
                </div>
            </div>
            @csrf
            <div class="col-sm-6">
                <div class="pro-des">
                    <h3>{{$product_detail->name}}</h3>
                    <p class="price-range"> <span>₹{{$product_detail->price}}</span></p>
                    <?php
                    $addonCategories=explode(",",$product_detail->addon_categories);
                    foreach($addonCategories as $i=> $ac){
                        
                        $data=App\Models\AddonCategory::where('id',$ac)->where('status','=', '1')->first();
                    ?>

                    <p class="main-des"><b>Addon Categories:</b> {{$data->name}}</p>
                    <?php
                        $addons=explode(",",$data->addons);
                        $name=[];
                        foreach($addons as $i=> $addon){
                            
                            $data=App\Models\Addon::where('id',$addon)->where('status','=', '1')->first();
                            
                            $name[$i]=$data->name;
                        }

                        $retrnvalue=implode(",",$name);
                    ?>
                    @if(isset($retrnvalue))
                    <p class="main-des"><b>Addons for {{$data->name}}:</b> {{$retrnvalue}}</p>
                    @endif
                    <?php  

                    }
                    ?>
                    
                </div>  
            </div>
        </div>
    </div>
</section> 







@stop
@section('js')
<script src="{{ URL::asset('public/frontend/js/owl.carousel.js') }}"></script>
<script src="{{ URL::asset('public/frontend/js/owl.carousel.min.js') }}"></script>
<!--<script src="http://owlgraphic.com/owlcarousel/owl-carousel/owl.carousel.js"></script>-->
<script>

                                $(document).ready(function () {
                                    $(".carousel_se_02_carousel").owlCarousel({
                                        items: 4,
                                        nav: false,
                                        loop: true,
                                        autoPlay: true,
                                        autoplayTimeout: 1000,
                                        mouseDrag: true,
                                        responsiveClass: true,
                                        navText: ['', ''],
                                        responsive: {
                                            0: {
                                                items: 1,
                                            },
                                            480: {
                                                items: 2,
                                            },
                                            767: {
                                                items: 3,
                                            },
                                            992: {
                                                items: 3,
                                            },
                                            1200: {
                                                items: 4,
                                            },
                                        },
                                    });
                                });

</script>

@endsection
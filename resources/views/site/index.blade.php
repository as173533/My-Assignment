@extends('layouts.main')

@section('css')

@stop 

@section('content')
<!------------breadcrumbs-------->
<section class="breadcrumbs about-page">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <div class="breadcrumbs-content">
                    <h1>All Products</h1>
                    <ul class="list-unstyled mb-0">
                        <li class="list-inline-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="list-inline-item">|</li>
                        <li class="list-inline-item">All Products</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>   
</section>
<!---------//end breadcrumbs---->

<section class="shop-part hg_section">
    <div class="container">
        <div class="row">
            @csrf
            @forelse($products as $product)
            <div class="col-sm-4">
                <div class="product-main-box">
                    <a href="{{Route('product-details',['id'=>base64_encode($product->id)])}}" class="product-link">
                        <div class="product-image">
                            <img src="{{ URL::asset('public/uploads/product/'.$product->photo) }}" class="pictutes" alt="" />
                        </div>
                        <div class="product-details">
                            
                            <h4>{{$product->name}}</h4>
                            <p class="item-price"> <span>₹{{$product->price	}}</span></p>
                            
                        </div>
                    </a>
                </div>
            </div>
            @empty
            @endforelse

            
        </div>
    </div>
</section>    
<!--end shop-->

@stop

@section('js')

@stop    
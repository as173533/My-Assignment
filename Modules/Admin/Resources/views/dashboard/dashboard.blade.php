@extends('admin::layouts.main')

@section('content')

@php
use Illuminate\Support\Str;
@endphp
<div class="clearfix">
    <div class="dash-bottom-part">
        <div class="bottom-part-1">
            <div class="col-sm-12">
                <h1 class="dash_heading">DASHBOARD</h1>
                <div class="row">
                    
                    
                    
                    <div class="col-lg-3 col-sm-6 col-cst-4">
                        <a href="{{route('admin-addon-cat-index')}}">
                            <div class="inner-box d-flex align-items-center gradient-bg-1">
                                <div class="media justify-content-between align-items-center d-flex">
                                    <div class="media-left">
                                        <h1>{{isset($total_addon_categories)?$total_addon_categories:'0'}}</h1>
                                        <h2>TOTAL ADDON CATEGORY</h2>
                                    </div>
                                    <div class="media-right">
                                        <i class="fa fa-sitemap" style="font-size: 5em; color: #4DBC36;" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div> 
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-cst-4">
                        <a href="{{route('admin-blog-index')}}">
                            <div class="inner-box d-flex align-items-center gradient-bg-1">
                                <div class="media justify-content-between align-items-center d-flex">
                                    <div class="media-left">
                                        <h1>{{isset($total_Product)?$total_Product:'0'}}</h1>
                                        <h2>TOTAL PRODUCT</h2>
                                    </div>
                                    <div class="media-right">
                                        <i class="fa fa-product-hunt" style="font-size: 5em; color: #4DBC36;" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div> 
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-cst-4">
                        <a href="{{route('admin-addon-index')}}">
                            <div class="inner-box d-flex align-items-center gradient-bg-1">
                                <div class="media justify-content-between align-items-center d-flex">
                                    <div class="media-left">
                                        <h1>{{isset($total_addon)?$total_addon:'0'}}</h1>
                                        <h2>TOTAL ADDON</h2>
                                    </div>
                                    <div class="media-right">
                                        <i class="fa fa-sitemap" style="font-size: 5em; color: #4DBC36;" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div> 
                        </a>
                    </div>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@stop
<?php
$routeArray = app('request')->route()->getAction();
$controllerAction = class_basename($routeArray['controller']);
list($controller, $action) = explode('@', $controllerAction);
?>
<!-------- Mobile view menu section -------->
<div class="mobile-view">
    <div class="logo-sec">
        <div class="clearfix d-flex">
            <div class="col-xs-6 col-6">
                <a href="{{ Route('admin-profile') }}">
                    <!-- <img src="{{ URL::asset('public/backend/images/dash_logo.png') }}" alt="" class="img-responsive"> -->
                    <h2 style="font-size:20px;color:#fff;">MY ASSIGNMENT</h2>
                </a>
            </div>
            <div class="col-xs-6 col-6 text-right">
                <a href="javascript:void(0);" id="MobilesidebarToggle" class="bgr-mnu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26.855" height="13.913" viewBox="0 0 26.855 13.913"><defs><style>.b{fill: #0070c0;}</style></defs><g transform="translate(0 -3)"><path class="b" d="M7.238,124.886H1.109a1.109,1.109,0,1,1,0-2.218H7.238a1.109,1.109,0,1,1,0,2.218Zm0,0" transform="translate(0 -113.82)"/><path class="a" d="M25.736,2.218H1.119A1.109,1.109,0,1,1,1.119,0H25.736a1.109,1.109,0,1,1,0,2.218Zm0,0" transform="translate(0 3)"/><path class="a" d="M16.37,247.55H1.109a1.109,1.109,0,0,1,0-2.218H16.37a1.109,1.109,0,0,1,0,2.218Zm0,0" transform="translate(0 -230.636)"/></g></svg>
                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="mobile-menu-link" style="display: none;">
        <ul>
            <li class="{{ ($controller=='DashboardController') ? 'active' : '' }}"><a href="{{ Route('admin-dashboard') }}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
            
            
            

            <li class="{{ ($controller=='AddonCategoryController') ? 'active' : '' }}"><a href="{{Route('admin-addon-cat-index')}}"><i class="fa fa-sitemap" aria-hidden="true"></i>Addon Category</a></li>
            <li class="{{ ($controller=='ProductController') ? 'active' : '' }}"><a href="{{ Route('admin-products') }}"><i class="fa fa-product-hunt"></i> Product</a></li>
            <li class="{{ ($controller=='AddonController') ? 'active' : '' }}"><a href="{{ Route('admin-addon-index') }}"><i class="fa fa-sitemap"></i> Addon</a></li>
            <li><a href="{{ Route('admin-logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
        <div class="top-right-btn">      
            <ul class="list-inline header-top pull-right">
                <li>
                    <a href="#" class="icon-info">
                        <i class="dash_menu_icon_7"></i>
                        <span class="label label-primary"></span>
                    </a>
                </li>
                <li class="">
                    <div class="dropdown dash-drop">
                        <span data-toggle="dropdown" aria-expanded="false">
                            <img class="img-responsive rounded-circle headr-prof-pic" src="{{URL::asset('public/uploads/user/'.Auth::guard('backend')->user()->image)}}" onerror="this.src='{{ URL::asset('public/backend/images/user.jpg') }}';" alt="">
                                <h1>{{!empty(Auth::guard('backend')->user()->full_name)?Auth::guard('backend')->user()->full_name:'Admin'}} <i class="icofont-caret-down"></i></h1>
                        </span>
                        <ul class="dropdown-menu nw-drp">
                            <li><a href="{{ Route('admin-profile') }}" data-original-title="" title=""><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Profile</a></li>
                            <li><a href="{{ Route('admin-logout') }}" data-original-title="" title=""><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-------- End Mobile view menu section -------->

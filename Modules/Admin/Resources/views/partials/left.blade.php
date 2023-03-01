<?php
$routeArray = app('request')->route()->getAction();
$controllerAction = class_basename($routeArray['controller']);
list($controller, $action) = explode('@', $controllerAction);
?>

<div class="user-left-side">
    <div class="side-bar-menu">      
        <!--<a href="#" class="big-logo"><img src="{{ URL::asset('assets/backend/images/dash_logo.png') }}" class="img-responsive"></a>-->
        <a href="{{ Route('admin-dashboard') }}" class="big-logo">
            <!-- <img src="{{ URL::asset('public/frontend/images/logo.png') }}" class="img-responsive"> -->
            <h2 style="font-size:20px;color:#fff;">MY ASSIGNMENT</h2>
        </a>
        <!--<a href="{{ Route('admin-dashboard') }}" class="big-logo">odisha_one</a>-->
        <a href="javascript:void(0);" class="berger" id="sidebarToggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="26.855" height="13.913" viewBox="0 0 26.855 13.913"><defs><style>.a{fill:#8898aa;}</style></defs><g transform="translate(0 -3)"><path class="a" d="M7.238,124.886H1.109a1.109,1.109,0,1,1,0-2.218H7.238a1.109,1.109,0,1,1,0,2.218Zm0,0" transform="translate(0 -113.82)"/><path class="a" d="M25.736,2.218H1.119A1.109,1.109,0,1,1,1.119,0H25.736a1.109,1.109,0,1,1,0,2.218Zm0,0" transform="translate(0 3)"/><path class="a" d="M16.37,247.55H1.109a1.109,1.109,0,0,1,0-2.218H16.37a1.109,1.109,0,0,1,0,2.218Zm0,0" transform="translate(0 -230.636)"/></g></svg>
            <div class="clearfix"></div>
        </a>
    </div>
    <h1 class="left_top_menu_heading">MENU</h1>
    <ul>
        <li class="{{ ($controller=='DashboardController') ? 'active' : '' }}"><a href="{{ Route('admin-dashboard') }}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
        
        
        

        <li class="{{ ($controller=='AddonCategoryController') ? 'active' : '' }}"><a href="{{Route('admin-addon-cat-index')}}"><i class="fa fa-sitemap" aria-hidden="true"></i>Addon Category</a></li>
        <li class="{{ ($controller=='ProductController') ? 'active' : '' }}"><a href="{{ Route('admin-products') }}"><i class="fa fa-product-hunt"></i> Product</a></li>
        <li class="{{ ($controller=='AddonController') ? 'active' : '' }}"><a href="{{ Route('admin-addon-index') }}"><i class="fa fa-sitemap"></i> Addon</a></li>
       <li><a href="{{ Route('admin-logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>

    </ul>
</div>

@if(in_array($controller, ['SettingsController','EmailNotificationController','CmspageController','CmsController','FaqController']))
<script>
    $(window).on('load', function () {
        $('#accordion-menu').trigger('click');
        $('#accordion-menus').trigger('click');
    });
</script>
@endif


		
<div class="site-mobile-menu site-navbar-target">
	<div class="site-mobile-menu-header">
		<div class="site-mobile-menu-close mt-3">
		<span class="icon-close2 js-menu-toggle"></span>
		</div>
	</div>
	<div class="site-mobile-menu-body"></div>
</div>
<header class="site-navbar js-sticky-header site-navbar-target" role="banner">
	<div class="container">
		<div class="row align-items-center position-relative">
			<div class="site-logo">
				<a href="{{route('/')}}" class="logo-img">

				</a>
			</div>
			<div class="col-12">
				<nav class="site-navigation text-center ml-auto mr-auto" role="navigation">
				<ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
					<li>
						<a href="{{route('index')}}" class="nav-link {{(in_array(\Request::route()->getName(),['/']))?'active':''}}">MY ASSIGNMENT</a>
					</li>
					
				</ul>
				</nav>
				
			</div>
			<div class="toggle-button d-inline-block d-lg-none">
				<a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black">
				<span class="icon-menu h3"></span>
				</a>
			</div>
		</div>
	</div>
</header>
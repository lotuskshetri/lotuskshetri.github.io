	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-sm navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="rounded-sm navbar-brand logo_h cursor-not-allowed pointer-events-none" href=""><img src="{{asset('home-page-assets/img/logo1.webp')}}" alt="Tech Tonic" wire:navigate></a>
					<button class="rounded-sm navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="rounded-sm navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item {{ request()->is('/') ? 'active':''}}"><a class="nav-link " href="/" wire:navigate>Home</a></li>
							<li class="nav-item {{ request()->is('/about-us') ? 'active':''}}"><a class="nav-link" href="/about-us" wire:navigate>About Us</a></li>
							<li class="nav-item {{ request()->is('/categories') ? 'active':''}}"><a class="nav-link" href="/categories" wire:navigate>Categories</a></li>
							<li class="nav-item {{ request()->is('/products') ? 'active':''}}"><a class="nav-link" href="/products" wire:navigate>Products</a></li>
							<!-- <li class="nav-item {{ request()->is('/contact') ? 'active':''}}"><a class="nav-link" href="/contact-us" wire:navigate>Contact</a></li> -->
							<li class="nav-item {{ request()->is('/cart') ? 'active':''}}"><a class="cart nav-link" href="/cart" role="button" wire:navigate>Cart&nbsp;&nbsp;<span class="ti-bag"><span class="py-0.5 px-1.5 rounded-full text-xs font-medium bg-blue-50 border border-blue-200 text-blue-600">{{$total_count}}</span></span></a></li>
							@guest
							<li class="nav-item {{ request()->is('/login') ? 'active':''}}"><a class="cart nav-link" href="/login" role="button" wire:navigate>Login&nbsp;&nbsp;<span class="ti-user"></span></a></li>
							@endguest
							@auth
							<li class="nav-item submenu dropdown ">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="/my-orders" role="button" wire:navigate>My Orders</a></li>
									<li class="nav-item"><a class="nav-link" href="/logout" role="button" wire:navigate>Logout</a></li>
								</ul>
							</li>
							@endauth
						</ul>

					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- End Header Area -->

<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Katen - Minimal Blog & Magazine HTML Theme</title>
	<meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

	<!-- STYLES -->
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('frontend/css/simple-line-icons.css') }}" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css" media="all">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- preloader -->


<!-- site wrapper -->
<div class="site-wrapper">

	<div class="main-overlay"></div>

	<!-- header -->
	<header class="header-default">
		<nav class="navbar navbar-expand-lg">
			<div class="container-xl">
				<!-- site logo -->
				<a class="navbar-brand" href="{{ route('frontend.home') }}"><img src="{{ asset('frontend/images/logo.svg') }}" alt="logo" /></a> 

				<div class="collapse navbar-collapse">
					<!-- menus -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="{{ route('frontend.home') }}">Home</a>
							
						</li>
						
                        @foreach ($category as $category)
                        <li class="nav-item {{ count($category->categories) > 0 ? 'dropdown' : '' }}">
							<a class="nav-link {{ count($category->categories) > 0 ? 'dropdown-toggle' : '' }}" href="{{ route('frontend.post', $category) }}">{{ $category->title }}</a>
							<ul class="dropdown-menu">
                                
                                @foreach ($category->categories as $subcategories)
                                <li><a class="dropdown-item" href="{{ route('frontend.sub_post', $subcategories) }}">{{ $subcategories->title }}</a></li>
                                @endforeach
								
							</ul>
						</li>
                        @endforeach
						
						<li class="nav-item">
							<a class="nav-link" href="contact.html">Contact</a>
						</li>
                        <li class="nav-item">
                           
							@auth
                             <a class="nav-link" href="{{ route('login') }}">profile</a>
        
                            @else
                            <a class="nav-link" href="{{ route('login') }}">Login/Register</a>
                            @endauth

						</li>
					</ul>
				</div>

				<!-- header right section -->
				<div class="header-right">
					<!-- social icons -->
					<ul class="social-icons list-unstyled list-inline mb-0">
						<li class="list-inline-item"><a href="index.html#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"><a href="index.html#"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="index.html#"><i class="fab fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="index.html#"><i class="fab fa-pinterest"></i></a></li>
						<li class="list-inline-item"><a href="index.html#"><i class="fab fa-medium"></i></a></li>
						<li class="list-inline-item"><a href="index.html#"><i class="fab fa-youtube"></i></a></li>
					</ul>
					<!-- header buttons -->
					<div class="header-buttons">
						<button class="search icon-button">
							<i class="icon-magnifier"></i>
						</button>
						<button class="burger-menu icon-button">
							<span class="burger-icon"></span>
						</button>
					</div>
				</div>
			</div>
		</nav>
	</header>

<!---body---->

@yield('content');





	<!-- instagram feed -->
	<div class="instagram">
		<div class="container-xl">
			<!-- button -->
			<a href="index.html#" class="btn btn-default btn-instagram">@Katen on Instagram</a>
			<!-- images -->
			<div class="instagram-feed d-flex flex-wrap">
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="index.html#">
						<img src="images/insta/insta-1.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="index.html#">
						<img src="images/insta/insta-2.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="index.html#">
						<img src="images/insta/insta-3.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="index.html#">
						<img src="images/insta/insta-4.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="index.html#">
						<img src="images/insta/insta-5.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="index.html#">
						<img src="images/insta/insta-6.jpg" alt="insta-title" />
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container-xl">
			<div class="footer-inner">
				<div class="row d-flex align-items-center gy-4">
					<!-- copyright text -->
					<div class="col-md-4">
						<span class="copyright">© 2021 Katen. Template by ThemeGer.</span>
					</div>

					<!-- social icons -->
					<div class="col-md-4 text-center">
						<ul class="social-icons list-unstyled list-inline mb-0">
							<li class="list-inline-item"><a href="index.html#"><i class="fab fa-facebook-f"></i></a></li>
							<li class="list-inline-item"><a href="index.html#"><i class="fab fa-twitter"></i></a></li>
							<li class="list-inline-item"><a href="index.html#"><i class="fab fa-instagram"></i></a></li>
							<li class="list-inline-item"><a href="index.html#"><i class="fab fa-pinterest"></i></a></li>
							<li class="list-inline-item"><a href="index.html#"><i class="fab fa-medium"></i></a></li>
							<li class="list-inline-item"><a href="index.html#"><i class="fab fa-youtube"></i></a></li>
						</ul>
					</div>

					<!-- go to top button -->
					<div class="col-md-4">
						<a href="index.html#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Back to Top</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div><!-- end site wrapper -->

<!-- search popup area -->
<div class="search-popup">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>
	<!-- content -->
	<div class="search-content">
		<div class="text-center">
			<h3 class="mb-4 mt-0">Press ESC to close</h3>
		</div>
		<!-- form -->
		<form class="d-flex search-form">
			<input name="search_text" id="searchbutton" class="form-control me-2" type="search" placeholder="Search and press enter ..." aria-label="Search">
			<button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
		</form>

            <ul style="list-style: none; margin-top: 20px" id="searchresult" class="text-center">
                {{-- <li class="border-bottom py-3">
                    <div class="row" style="align-items: center">
                        <div class="col-lg-3">
                            <img src="{{ asset('storage/upload/hello.png') }}" alt="">
                        </div>
                        <div class="col-lg-9">
                            <h5><a href="">Lorem ipsum dolor neque temporibus!</a></h5>
                        </div>
                    </div>
                </li> --}}
            </ul>
	</div>
</div>

<!-- canvas menu -->
<div class="canvas-menu d-flex align-items-end flex-column">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>

	<!-- logo -->
	<div class="logo">
		<img src="images/logo.svg" alt="Katen" />
	</div>

	<!-- menu -->
	<nav>
		<ul class="vertical-menu">
			<li class="active">
				<a href="index.html">Home</a>
				<ul class="submenu">
					<li><a href="index.html">Magazine</a></li>
					<li><a href="personal.html">Personal</a></li>
					<li><a href="personal-alt.html">Personal Alt</a></li>
					<li><a href="minimal.html">Minimal</a></li>
					<li><a href="classic.html">Classic</a></li>
				</ul>
			</li>
			<li><a href="category.html">Lifestyle</a></li>
			<li><a href="category.html">Inspiration</a></li>
			<li>
				<a href="index.html#">Pages</a>
				<ul class="submenu">
					<li><a href="category.html">Category</a></li>
					<li><a href="blog-single.html">Blog Single</a></li>
					<li><a href="blog-single-alt.html">Blog Single Alt</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</li>
			<li><a href="contact.html">Contact</a></li>
		</ul>
	</nav>

	<!-- social icons -->
	<ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
		<li class="list-inline-item"><a href="index.html#"><i class="fab fa-facebook-f"></i></a></li>
		<li class="list-inline-item"><a href="index.html#"><i class="fab fa-twitter"></i></a></li>
		<li class="list-inline-item"><a href="index.html#"><i class="fab fa-instagram"></i></a></li>
		<li class="list-inline-item"><a href="index.html#"><i class="fab fa-pinterest"></i></a></li>
		<li class="list-inline-item"><a href="index.html#"><i class="fab fa-medium"></i></a></li>
		<li class="list-inline-item"><a href="index.html#"><i class="fab fa-youtube"></i></a></li>
	</ul>
</div>

<!-- JAVA SCRIPTS -->
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/slick.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>

<script>

        $('#searchbutton').on('keyup', function(){

            let value = $(this).val();

                // console.log(value);

                if(value.length > 1 ){

                    $.ajax({
                    method: 'GET',
                    url: "{{ route('frontend.search.post') }}",
                    data: {search_text: value},
                    success: function(d) {
                    
                        let results = JSON.parse(d)

                        // console.log(result);

                        let posts = []

                        results.forEach(result => {

                        let data = `
                        <li class="border-bottom py-3" style="list-style: none;">
                            <div class="row" style="align-items: center">
                                <div class="col-lg-3">
                                    <img src="{{ asset('storage/') }}/${result.image}" alt="">
                                </div>
                                <div class="col-lg-9">
                                    <h5><a href="">${result.title}</a></h5>
                                </div>
                            </div>
                        </li>
                            `;

                        posts.push(data)
                            
                        }); 

                        $('#searchresult').html(posts)

                    },
                    error: function(error){

                        $('#searchresult').html(`<h3 style="color:red;">${error.responseText}</h3>`)

                    }

                });

                }else{

                    $('#searchresult').html('')
                }
                  
        })

</script>

</body>
</html>
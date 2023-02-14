@extends('layouts.frontendapp')

@section('content')
<!-- hero section -->
<section id="hero">

    <div class="container-xl">

        <div class="row gy-4">

            <div class="col-lg-8">
                     <!-- featured post large -->
                <div class="post featured-post-lg">
                    <div class="details clearfix">
                        <a href="category.html" class="category-badge">@isset($first)
                           {{  $first->category->title }}
                        @endisset</a>
                        <h2 class="post-title"><a href="blog-single.html">@isset($first)
                            {{ $first->title }}
                        @endisset</a></h2>
                        <ul class="meta list-inline mb-0">
                            <li class="list-inline-item"><a href="index.html#">@isset($first)
                                {{ $first->user->name }}
                            @endisset</a></li>
                            <li class="list-inline-item">@isset($first)
                                {{ carbon\Carbon::parse($first->created_at)->format('d M Y') }}
                            @endisset</li>
                        </ul>
                    </div>
                    <a href="blog-single.html">
                        <div class="thumb rounded">
                            <div class="inner data-bg-image"data-bg-image="{{ asset('storage/'. $first->image) }}"></div>
                        </div>
                    </a>
                </div>

            </div>

            <div class="col-lg-4">

                <!-- post tabs -->
                <div class="post-tabs rounded bordered">
                    <!-- tab navs -->
                    <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
                        <li class="nav-item" role="presentation"><button aria-controls="popular" aria-selected="true" class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab" role="tab" type="button">Popular</button></li>
                        <li class="nav-item" role="presentation"><button aria-controls="recent" aria-selected="false" class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab" role="tab" type="button">Recent</button></li>
                    </ul>
                    <!-- tab contents -->
                    <div class="tab-content" id="postsTabContent">
                        <!-- loader -->
                        <div class="lds-dual-ring"></div>
                        <!-- popular posts -->
                        <div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular" role="tabpanel">
                          
                            <!-- post -->

                            @forelse ($posts as $post)
                            <div class="post post-list-sm circle">
                                <div class="thumb circle">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->title }}" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">{{ $post->title }}</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">{{ $post->created_at }}</li>
                                    </ul>
                                </div>
                            </div>
                            @empty
                                
                            @endforelse
                           
                        </div>
                        <!-- recent posts -->
                        <div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
                          
                            <!-- post -->

                            @forelse ($posts as $post)
                            <div class="post post-list-sm circle">
                                <div class="thumb circle">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->title }}" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">{{ $post->title }}</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">{{ $post->created_at }}</li>
                                    </ul>
                                </div>
                            </div>
                            @empty
                                
                            @endforelse
                           
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>

<!-- section main content -->
<section class="main-content">
    <div class="container-xl">

        <div class="row gy-4">

            <div class="col-lg-8">

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Editor’s Pick</h3>
                    <img src="{{ asset('frontend/images/wave.svg') }}" class="wave" alt="wave" />
                </div>

                <div class="padding-30 rounded bordered">
                    <div class="row gy-5">
                        <div class="col-sm-6">
                            <!-- post -->
                            <div class="post">
                                <div class="thumb rounded">
                                    <a href="category.html" class="category-badge position-absolute">@isset($first)
                                        {{ $first->category->title }}
                                    @endisset</a>
                                    <span class="post-format">
                                        <i class="icon-picture"></i>
                                    </span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="@isset($first)
                                            {{ asset('storage/'. $first->image) }}
                                            @endisset" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <ul class="meta list-inline mt-4 mb-0">
                                    <li class="list-inline-item"><a href="index.html#"><img src="https://api.dicebear.com/5.x/bottts/svg?size=32&seed=happy" class="author" alt="author"/>@isset($first)
                                        {{ $first->user->name }}
                                    @endisset</a></li>
                                    <li class="list-inline-item">@isset($first)
                                        {{ $first->created_at->diffforhumans() }}
                                    @endisset</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">@isset($first)
                                    {{ $first->title }}
                                @endisset</a></h5>
                                <p class="excerpt mb-0">@isset($first)
                                    {!! $first->content !!}
                                @endisset</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- post -->
                           @foreach ($postall as $spost)
                           <div class="post post-list-sm square">
                            <div class="thumb rounded">
                                <a href="blog-single.html">
                                    <div class="inner">
                                        <img src="{{ asset('storage/'. $spost->image) }}" alt="post-title" />
                                    </div>
                                </a>
                            </div>
                            <div class="details clearfix">
                                <h6 class="post-title my-0"><a href="blog-single.html">{{ $spost->title }}</a></h6>
                                <ul class="meta list-inline mt-1 mb-0">
                                    <li class="list-inline-item">{{ Carbon\Carbon::parse($spost->create_at)->format('d M Y') }}</li>
                                </ul>
                            </div>
                        </div>
                           @endforeach
                        </div>
                    </div>
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- horizontal ads -->
                <div class="ads-horizontal text-md-center">
                    <span class="ads-title">- Sponsored Ad -</span>
                    <a href="index.html#">
                        <img src="{{ asset('frontend/images/ads/ad-750.png') }}" alt="Advertisement" />
                    </a>
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Trending</h3>
                    <img src="{{ asset('frontend/images/wave.svg') }}" class="wave" alt="wave" />
                </div>

                <div class="padding-30 rounded bordered">
                    <div class="row gy-5">
                        <div class="col-sm-6">
                            <!-- post large -->
                            <div class="post">
                                <div class="thumb rounded">
                                    <a href="category.html" class="category-badge position-absolute">@isset($Trending)
                                        {{ $Trending->category->title }}
                                    @endisset</a>
                                    <span class="post-format">
                                        <i class="icon-picture"></i>
                                    </span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="@isset($Trending)
                                            {{ asset('storage/'. $Trending->image) }}
                                            @endisset" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <ul class="meta list-inline mt-4 mb-0">
                                    <li class="list-inline-item"><a href="index.html#"><img src="https://api.dicebear.com/5.x/bottts/svg?size=32&seed=happy" class="author" alt="author"/>@isset($Trending)
                                        {{ $Trending->user->name }}
                                    @endisset</a></li>
                                    <li class="list-inline-item">@isset($Trending)
                                        {{ carbon\Carbon:: parse($Trending->created_at)->format('d M Y') }}
                                    @endisset</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">@isset($Trending)
                                    {{ $Trending->title }}
                                @endisset</a></h5>
                                <p class="excerpt mb-0">@isset($Trending)
                                    {!! $Trending->content !!}
                                @endisset</p>
                            </div>

                            @foreach ($trending_all as $trending)
                                    <!-- post -->
                            <div class="post post-list-sm square before-seperator">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="@isset($trending_all)
                                            {{ asset('storage/'. $trending->image) }}
                                                
                                            @endisset" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">@isset($trending)
                                        {{ $trending->title }}
                                    @endisset</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">@isset($trending)
                                            {{ carbon\Carbon:: parse($trending->created_at)->format('d M Y') }}
                                        @endisset</li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        
                        </div>
                        <div class="col-sm-6">
                            <!-- post large -->
                            <div class="post">
                                <div class="thumb rounded">
                                    <a href="category.html" class="category-badge position-absolute">@isset($Trending_old)
                                        {{ $Trending_old->category->title }}
                                    @endisset</a>
                                    <span class="post-format">
                                        <i class="icon-earphones"></i>
                                    </span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="@isset($Trending_old)
                                            {{ asset('storage/'. $Trending_old->image) }}
                                            @endisset" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <ul class="meta list-inline mt-4 mb-0">
                                    <li class="list-inline-item"><a href="index.html#"><img src="https://api.dicebear.com/5.x/bottts/svg?size=32&seed=happy" class="author" alt="author"/>@isset($Trending_old)
                                        {{ $Trending_old->user->name }}
                                    @endisset</a></li>
                                    <li class="list-inline-item">@isset($Trending_old)
                                        {{ carbon\Carbon::parse($Trending_old->created_at)->format('d M Y') }}
                                    @endisset</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">@isset($Trending_old)
                                    {{ $Trending_old->title }}
                                @endisset</a></h5>
                                <p class="excerpt mb-0">@isset($Trending_old)
                                    {!! $Trending_old->content !!}
                                @endisset</p>
                            </div>
                          

                            @foreach ($trending_all_old as $trendings_all_old)
                                    <!-- post -->
                            <div class="post post-list-sm square before-seperator">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="@isset($trendings_all_old)
                                            {{ asset('storage/'. $trendings_all_old->image) }}
                                            @endisset" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">@isset($trendings_all_old)
                                        {{ $trendings_all_old->title }}
                                    @endisset</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">@isset($trendings_all_old)
                                            {{ carbon\carbon::parse($trendings_all_old->created_at)->format('d M Y') }}
                                        @endisset</li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Inspiration</h3>
                    <img src="{{ asset('frontend/images/wave.svg') }}"lass="wave" alt="wave" />
                    <div class="slick-arrows-top">
                        <button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                        <button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
                    </div>
                </div>

                <div class="row post-carousel-twoCol post-carousel">

                    @foreach ($insprations as $inspration)
                          <!-- post -->
                    <div class="post post-over-content col-md-6">
                        <div class="details clearfix">
                            <a href="category.html" class="category-badge">@isset($inspration)
                                {{ $inspration->category->title }}
                            @endisset</a>
                            <h4 class="post-title"><a href="blog-single.html">Want To Have A More Appealing Tattoo?</a></h4>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><a href="index.html#">@isset($inspration)
                                    {{ $inspration->user->name }}
                                @endisset</a></li>
                                <li class="list-inline-item">@isset($inspration)
                                    {{ carbon\Carbon::parse($inspration->created_at)->format('d M Y') }}
                                @endisset</li>
                            </ul>
                        </div>
                        <a href="blog-single.html">
                            <div class="thumb rounded">
                                <div class="inner">
                                    <img src="@isset($inspration)
                                    {{ asset('storage/'. $inspration->image) }}
                                    @endisset" alt="thumb" />
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                  
                 
                   
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Latest Posts</h3>
                    <img src="{{ asset('frontend/images/wave.svg') }}" class="wave" alt="wave" />
                </div>

                <div class="padding-30 rounded bordered">

                    <div class="row">

                        <div class="col-md-12 col-sm-6">

                            @foreach ($latest_all as $latest)
                                  <!-- post -->
                            <div class="post post-list clearfix">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="@isset($latest)
                                            {{ asset('storage/'. $latest->image) }}
                                            @endisset" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="meta list-inline mb-3">
                                        <li class="list-inline-item"><a href="index.html#"><img src="https://api.dicebear.com/5.x/bottts/svg?size=32&seed=happy" class="author" alt="author"/>{{ $latest->user->name }}</a></li>
                                        <li class="list-inline-item"><a href="index.html#">{{ $latest->category->title }}</a></li>
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                    <h5 class="post-title"><a href="blog-single.html">{{ $latest->title }}</a></h5>
                                    <p class="excerpt mb-0">{!! $latest->content !!}</p>
                                    <div class="post-bottom clearfix d-flex align-items-center">
                                        <div class="social-share me-auto">
                                            <button class="toggle-button icon-share"></button>
                                            <ul class="icons list-unstyled list-inline mb-0">
                                                <li class="list-inline-item"><a href="index.html#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li class="list-inline-item"><a href="index.html#"><i class="fab fa-twitter"></i></a></li>
                                                <li class="list-inline-item"><a href="index.html#"><i class="fab fa-linkedin-in"></i></a></li>
                                                <li class="list-inline-item"><a href="index.html#"><i class="fab fa-pinterest"></i></a></li>
                                                <li class="list-inline-item"><a href="index.html#"><i class="fab fa-telegram-plane"></i></a></li>
                                                <li class="list-inline-item"><a href="index.html#"><i class="far fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="more-button float-end">
                                            <a href="blog-single.html"><span class="icon-options"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                          
                        </div>
                        
                    </div
                    >
                    <!-- load more button -->
                    <div class="text-center">
                        <button class="btn btn-simple">Load More</button>
                    </div>

                </div>

            </div>
            <div class="col-lg-4">

                <!-- sidebar -->
                <div class="sidebar">
                    <!-- widget about -->
                    <div class="widget rounded">
                        <div class="widget-about data-bg-image text-center" data-bg-image="images/map-bg.png">
                            <img src="{{ asset('frontend/images/logo.svg') }}" alt="logo" class="mb-4" />
                            <p class="mb-4">Hello, We’re content writer who is fascinated by content fashion, celebrity and lifestyle. We helps clients bring the right content to the right people.</p>
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="index.html#"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="index.html#"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="index.html#"><i class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="index.html#"><i class="fab fa-pinterest"></i></a></li>
                                <li class="list-inline-item"><a href="index.html#"><i class="fab fa-medium"></i></a></li>
                                <li class="list-inline-item"><a href="index.html#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- widget popular posts -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Popular Posts</h3>
                            <img src="{{ asset('frontend/images/wave.svg') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">


                            @foreach ($posts as $post)
                                   <!-- post -->
                            <div class="post post-list-sm circle">
                                <div class="thumb circle">
                                    <span class="number">3</span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('storage/'. $post->image) }}" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">{{ $post->title }}</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">1
                                        <li class="list-inline-item">{{ carbon\Carbon::parse($spost->created_at)->format('d M Y') }}</li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>		
                    </div>

                    <!-- widget categories -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Explore Topics</h3>
                            <img src="{{ asset('frontend/images/wave.svg') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <ul class="list">

                                @foreach ($category as $scategory)
                                <li><a href="index.html#">{{ $scategory->title }}</a><span>({{ $scategory->categories->count() }})</span></li>
                                @endforeach
                            </ul>
                        </div>
                        
                    </div>

                    <!-- widget newsletter -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Newsletter</h3>
                            <img src="{{ asset('frontend/images/wave.svg') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <span class="newsletter-headline text-center mb-3">Join 70,000 subscribers!</span>
                            <form>
                                <div class="mb-2">
                                    <input class="form-control w-100 text-center" placeholder="Email address…" type="email">
                                </div>
                                <button class="btn btn-default btn-full" type="submit">Sign Up</button>
                            </form>
                            <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a href="index.html#">Privacy Policy</a></span>
                        </div>		
                    </div>

                    <!-- widget post carousel -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Celebration</h3>
                            <img src="{{ asset('frontend/images/wave.svg') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <div class="post-carousel-widget">
                            
                                @foreach ($posts as $post)
                                     <!-- post -->
                                <div class="post post-carousel">
                                    <div class="thumb rounded">
                                        <a href="{{ route('frontend.post', $post) }}" class="category-badge position-absolute">How to</a>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('storage/'. $post->image) }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">{{ $post->title }}</a></h5>
                                    <ul class="meta list-inline mt-2 mb-0">
                                        <li class="list-inline-item"><a href="index.html#">{{ $post->user->name }}</a></li>
                                        <li class="list-inline-item">{{ carbon\Carbon::parse($spost->created_at)->format('d M Y') }}</li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                            <!-- carousel arrows -->
                            <div class="slick-arrows-bot">
                                <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                                <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
                            </div>
                        </div>		
                    </div>

                    <!-- widget advertisement -->
                    <div class="widget no-container rounded text-md-center">
                        <span class="ads-title">- Sponsored Ad -</span>
                        <a href="{{ route('frontend.home') }}" class="widget-ads">
                            <img src="{{ asset('frontend/images/ads/ad-360.png') }}" alt="Advertisement" />	
                        </a>
                    </div>

                    <!-- widget tags -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Tag Clouds</h3>
                            <img src="{{ asset('frontend/images/wave.svg') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                        
                           
                           @foreach ($tags as $tag)

                           <a href="{{ route('frontend.home') }}" class="tag"> #trending </a>
                           {{-- <a href="{{ route('frontend.home') }}" class="tag">  {{ print_r(json_decode($tag)->name->en) }}</a> --}}
                           @endforeach
                        </div>		
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>
@endsection

	

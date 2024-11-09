@extends('templates.index')

@push('style')
    <link href="{{ asset('template/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" media="all">
    <!-- banner-slider -->
    <link href="{{ asset('template/css/jquery.slidey.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    @if (Auth::check())
        <p>{{ Auth::user()->name }} - {{ Auth::user()->role_name }}</p>
    @else
        <p>Not logged in</p>
    @endif
    <div id="slidey" style="display:none;">
        <ul>
            @foreach ($filmSlidey as $film)
                <li><img src="{{ $film->poster }}" alt="{{ $film->title }}">
                    <p class='title'>{{ $film->title }}</p>
                    <p class='description'>{{ $film->sinopsis }}</p>
                </li>
            @endforeach
        </ul>
    </div>
    <script src="{{ asset('template/js/jquery.slidey.js') }}"></script>
    <script src="{{ asset('template/js/jquery.dotdotdot.min.js') }}"></script>
    <script type="text/javascript">
        $("#slidey").slidey({
            interval: 8000,
            listCount: 5,
            autoplay: false,
            showList: true
        });
        $(".slidey-list-description").dotdotdot();
    </script>
    <!-- //banner -->
    <!-- banner-bottom -->
    <div class="banner-bottom">
        <div class="container">
            <div class="w3_agile_banner_bottom_grid">
                <div id="owl-demo" class="owl-carousel owl-theme">
                    @for ($data = 0; $data < $films->count(); $data++)
                        <div class="item">
                            <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                <a href="{{ route('movies.show', $films[$data]->id) }}"
                                    class="hvr-shutter-out-horizontal"><img src="{{ asset($films[$data]->poster) }}"
                                        title="album-name" alt=" " />
                                    <div class="w3l-action-icon">
                                        <i class="fa fa-play-circle" aria-hidden="true"></i>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="w3l-movie-text">
                                        <h6><a
                                                href="{{ route('movies.show', $films[$data]->id) }}">{{ $films[$data]->title }}</a>
                                        </h6>
                                    </div>
                                    <div class="mid-2">
                                        <p>{{ $films[$data]->year }}</p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-half-o"
                                                            aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </li>


                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                @if ($films[$data]->year == now()->year)
                                    <div class="ribben two">
                                        <p>NEW</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <!-- //banner-bottom -->
    <div class="general_social_icons">
        <nav class="social">
            <ul>
                <li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
                <li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
                <li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
                <li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>
            </ul>
        </nav>
    </div>
    <!-- general -->
    <div class="general">
        <h4 class="latest-text w3_latest_text">Featured Movies</h4>
        <div class="container">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab"
                            aria-controls="home" aria-expanded="true">Featured</a></li>
                    <li role="presentation"><a href="#imdb" role="tab" id="imdb-tab" data-toggle="tab"
                            aria-controls="imdb" aria-expanded="false">Recently Added</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                        <div class="w3_agile_featured_movies">
                            @for ($data = 0; $data < $filmFutured->count(); $data++)
                                <div class="col-md-2 w3l-movie-gride-agile">
                                    <a href="{{ route('movies.show', $filmFutured[$data]->id) }}"
                                        class="hvr-shutter-out-horizontal"><img
                                            src="{{ asset($filmFutured[$data]->poster) }}" title="album-name"
                                            alt=" " />
                                        <div class="w3l-action-icon">
                                            <i class="fa fa-play-circle" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                    <div class="mid-1">
                                        <div class="w3l-movie-text">
                                            <h6><a
                                                    href="{{ route('movies.show', $filmFutured[$data]->id) }}">{{ $filmFutured[$data]->title }}</a>
                                            </h6>
                                        </div>
                                        <div class="mid-2">
                                            <p>{{ $filmFutured[$data]->year }}</p>
                                            <div class="block-stars">
                                                <ul class="w3l-ratings">
                                                    <li><a href="#"><i class="fa fa-star"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-half-o"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o"
                                                                aria-hidden="true"></i></a></li>


                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    @if ($filmFutured[$data]->year == now()->year)
                                        <div class="ribben two">
                                            <p>NEW</p>
                                        </div>
                                    @endif
                                </div>
                            @endfor
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="imdb" aria-labelledby="imdb-tab">
                        <div class="w3_agile_featured_movies">
                            @for ($data = 0; $data < $filmRecentAdded->count(); $data++)
                                <div class="col-md-2 w3l-movie-gride-agile">
                                    <a href="{{ route('movies.show', $filmRecentAdded[$data]->id) }}"
                                        class="hvr-shutter-out-horizontal"><img
                                            src="{{ asset($filmRecentAdded[$data]->poster) }}" title="album-name"
                                            alt=" " />
                                        <div class="w3l-action-icon">
                                            <i class="fa fa-play-circle" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                    <div class="mid-1">
                                        <div class="w3l-movie-text">
                                            <h6><a
                                                    href="{{ route('movies.show', $filmRecentAdded[$data]->id) }}">{{ $filmRecentAdded[$data]->title }}</a>
                                            </h6>
                                        </div>
                                        <div class="mid-2">
                                            <p>{{ $filmRecentAdded[$data]->year }}</p>
                                            <div class="block-stars">
                                                <ul class="w3l-ratings">
                                                    <li><a href="#"><i class="fa fa-star"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-half-o"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o"
                                                                aria-hidden="true"></i></a></li>


                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    @if ($filmRecentAdded[$data]->year == now()->year)
                                        <div class="ribben two">
                                            <p>NEW</p>
                                        </div>
                                    @endif
                                </div>
                            @endfor
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //general -->
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('template/js/easing.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->
    <script src="{{ asset('template/js/owl.carousel.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds

                items: 5,
                itemsDesktop: [640, 5],
                itemsDesktopSmall: [414, 4]

            });

        });
    </script>
@endpush

@extends('template')

@section('title', 'Blog')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/article/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/article/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/article/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/article/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/article/xl.css') }}" media="screen and (min-width: 1200px)">
@endsection

@section('content-container')
    <div class="tab-slider-nav mt-5">
        <ul class="tab-slider-tabs list-unstyled p-0 border">
            <li class="d-inline-block text-center tab-slider-trigger tab-article active" rel="tab1">Article</li>
            <li class="d-inline-block text-center tab-slider-trigger tab-activity" rel="tab2">Activity</li>
            <li class="d-inline-block text-center tab-slider-trigger tab-promo" rel="tab3">Promo</li>
        </ul>
    </div>

    <div class="tab-slider-container">
        <div id="tab1" class="tab-slider-body mb-5 mb-sm-5 mb-md-5 mb-lg-5 mb-xl-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <ul class="list-unstyled p-0">
                        @foreach($blogs as $blog)
                            <li class="{{ $loop->last ? 'mt-4' : '' }}">
                                <div class="blog">
                                    <div class="card">
                                        <div class="row no-gutters">
                                            <div class="col-md-4 col-lg-5 col-xl-4">
                                                <a href="#" class=""><img src="{{ $blog->image }}" alt="" class="w-100 h-100"></a>
                                            </div>
                                            <div class="col-md-8 col-lg-7 col-xl-8 align-self-center">
                                                <div class="card-body">
                                                    <a href="#" class="text-decoration-none text-body"><h6 class="card-title font-weight-bold m-0">{{ $blog->name }}</h6></a>
                                                    <p class="card-text my-2 small">{{ substr(strip_tags($blog->body), 0, 100) }}{{ strlen(strip_tags($blog->body)) > 100 ? "..." : "" }}</p>
                                                    <div class="row mt-3">
                                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 align-self-center">
                                                            <p class="card-text m-0"><small class="text-muted">Updated at {{ date('D, j F Y', strtotime($blog->updated_at)) }}</small></p>
                                                        </div>
                                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 align-self-center clearfix">
                                                            <a href="#" class="btn btn-sm bg-881a1b float-right">Read More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="new-article mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0">
                        <h6 class="font-weight-bold text-danger">New Article</h6>
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                @foreach($blogs as $index => $blog)
                                    <tr>
                                        <td class="small" style="width: 1rem;">{{ $index + 1 }}</td>
                                        <td class="small">{{ $blog->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <hr class="mt-0">
                        </div>
                    </div>

                    <div class="popular-article mt-4 mt-sm-4 mt-md-4 mt-lg-4 mt-xl-4">
                        <h6 class="font-weight-bold text-danger">Popular Article</h6>
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                @foreach($blogs as $index => $blog)
                                    <tr>
                                        <td class="small" style="width: 1rem;">{{ $index + 1 }}</td>
                                        <td class="small">{{ $blog->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <hr class="mt-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="tab2" class="tab-slider-body mb-5 mb-sm-5 mb-md-5 mb-lg-5 mb-xl-5">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="row no-gutters" style="height: 15rem;">
                                <div class="col-md-8 col-lg-7 col-xl-7 align-self-center">
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-body"><h6 class="card-title font-weight-bold text-black-50 m-0">{{ $blog->name }}</h6></a>
                                        <p class="card-text text-black-50 mt-2">{{ substr(strip_tags($blog->body), 0, 150) }}{{ strlen(strip_tags($blog->body)) > 150 ? "..." : "" }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-5 col-xl-5">
                                    <a href="#" class=""><img src="{{ $blog->image }}" alt="" class="w-100 h-100"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="tab3" class="tab-slider-body mb-5 mb-sm-5 mb-md-5 mb-lg-5 mb-xl-5"></div>
    </div>
@endsection

@section('scripts')
    <script>
        $("document").ready(function () {
            $(".tab-slider-body").hide();
            $(".tab-slider-body:first").show();
        });

        $(".tab-slider-nav li").click(function () {
            $(".tab-slider-body").hide();

            let activeTab = $(this).attr("rel");

            $("#" + activeTab).fadeIn();

            if ($(this).attr("rel") == "tab2") {
                $('.tab-slider-tabs').addClass('slide');
                $('.tab-slider-tabs').removeClass('slide3');
            } else if ($(this).attr("rel") == "tab3") {
                $('.tab-slider-tabs').addClass('slide3');
                $('.tab-slider-tabs').removeClass('slide');
            } else {
                $('.tab-slider-tabs').removeClass('slide');
                $('.tab-slider-tabs').removeClass('slide3');
            }

            $(".tab-slider-nav li").removeClass("active");
            $(this).addClass("active");
        });
    </script>
@endsection
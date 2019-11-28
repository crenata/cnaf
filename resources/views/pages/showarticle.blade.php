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
    <div class="my-5">
        <nav aria-label="breadcrumb" class="mt-4 bg-white">
            <ol class="breadcrumb bg-white pl-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-danger">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Article</li>
            </ol>
        </nav>

        <div class="tab-slider-body mb-5 mb-sm-5 mb-md-5 mb-lg-5 mb-xl-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <div class="text-center">
                        <h5 class="font-weight-bold">{{ $blog->name }}</h5>
                        <p class="m-0 small">{{ date('D, j F Y', strtotime($blog->created_at)) }}</p>
                        <img src="{{ $blog->image }}" alt="" class="img-fluid mt-4">
                    </div>
                    <div class="content mt-4">{!! $blog->body !!}</div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="new-article mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0">
                        <h6 class="font-weight-bold text-danger">New Article</h6>
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                @foreach($newBlogs as $index => $new)
                                    <tr>
                                        <td class="small" style="width: 1rem;">{{ $index + 1 }}</td>
                                        <td class="small"><a href="{{ route('article.show', $new->slug) }}" class="text-decoration-none text-body">{{ $new->name }}</a></td>
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
                                @foreach($populars as $index => $popular)
                                    <tr>
                                        <td class="small" style="width: 1rem;">{{ $index + 1 }}</td>
                                        <td class="small"><a href="{{ route('article.show', $popular->slug) }}" class="text-decoration-none text-body">{{ $popular->name }}</a></td>
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
    </div>
@endsection

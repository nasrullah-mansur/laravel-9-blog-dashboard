@extends('front.leyout.layout')

@push('custom_page_css')

<style>
    .custom-contact {
        padding: 50px 0 30px;
    }
</style>

    <style>
        {!! $page->css !!}
    </style>
@endpush


@push('custom_page_js')
    <script>
        {!! $page->javascript !!}
    </script>
@endpush

@section('content')
<!-- Page banner start -->
<div class="page-banner" style="background-image: url({{ asset('front/images/banner-bg.jpg') }});">
    <div class="container">
        <h2>{{ $page->name }}</h2>
    </div>
</div>
<!-- Page banner end -->


<section class="custom-contact">
    <div class="container">
        {!! $page->html !!} 
    </div>
</section>
@endsection
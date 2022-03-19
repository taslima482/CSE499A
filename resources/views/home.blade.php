@extends('layouts.web')

@section('custom_styles')

@endsection

@section('content')


    {{-- Main Banner  --}}
    @include('web.home-page.main-banner')

    {{-- Search Area  --}}
    @include('web.home-page.search-area')

    {{-- Why choose us  --}}
    @include('web.home-page.why-choose-us')

    {{-- Category  --}}
    {{-- @include('web.home-page.category') --}}

    {{-- Jobs  --}}
    @include('web.home-page.scholarship')

    {{-- Top Companies  --}}
    @include('web.home-page.top-companies')

    {{-- Looking for job  --}}
    @include('web.home-page.looking-for-job')

    {{-- featured candidates  --}}
    {{-- @include('web.home-page.featured-candidates') --}}

    {{-- Counter Section  --}}
    {{-- @include('web.home-page.counter-section') --}}

    {{-- testimonial  --}}
    {{-- @include('web.home-page.testimonial') --}}

    {{-- pricing plan  --}}
    {{-- @include('web.home-page.pricing-plan') --}}

    {{-- News-Article-Blog  --}}
    {{-- @include('web.home-page.news') --}}

@endsection

@section('custom_js')

@endsection
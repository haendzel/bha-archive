{{--
  Template Name: About Template
--}}

@php $banner = get_field('banner', 'options') @endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                @include('partials.page-title-about')
            </div>
        </div>
        <div class="row pb-6">
            <div class="col-lg-6">
                <h3 class="py-0 my-0" data-aos="fade-in">{{ get_field('title') }}</h3>
            </div>
            <div class="col-lg-6">
                <p class="py-0 my-0" data-aos="fade-in">{{ get_field('description') }}</p>
            </div>
        </div>
    </div>

    <div class="banner-waves mb-5" data-aos="fade-in" style="background-image: url(' {{ $banner }} ')"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="fw-bold">{{ get_field('title_2') }}</h3>
            </div>
        </div>

        <div class="row py-3">
            <div class="col-lg-6" data-aos="fade-in">
                <h3 class="py-0 my-0">{!! get_field('desc_1') !!}</h3>
            </div>
            <div class="col-lg-6" data-aos="fade-in">
                <p class="py-0 my-0">{!! get_field('desc_2') !!}</p>
            </div>
        </div>

    </div>


    <div class="container">
        <div class="row pt-3 pb-5">
            <div class="col">
                <div class="wp-block-image" data-aos="fade-in">
                    <figure>
                        <img src="{{ get_field('image') }}" width="100%" height="auto" alt="" />
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-in">
                <h3 class="fw-bold">{{ get_field('title_3') }}</h3>
            </div>
        </div>

        <div class="row">
            @php $sponsors = get_field('sponsors') @endphp
            @foreach ($sponsors as $item)
                <div class="col-lg-3">
                    <img src="{{ $item['logo'] }}" alt="{{ $item['url'] }}" data-aos="fade-in" />
                </div>
            @endforeach
        </div>
    </div>
@endsection

{{--
  Template Name: Submit Template
--}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                @include('partials.page-title-submit')
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8" data-aos="fade-in">
                {!! do_shortcode('[contact-form-7 id="61" title="Contact form"]') !!}
            </div>
        </div>
    </div>
@endsection

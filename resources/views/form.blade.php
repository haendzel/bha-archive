{{--
  Template Name: Submit Template
--}}

@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.page-title')
    </div>

    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                {!! do_shortcode('[contact-form-7 id="61" title="Contact form"]') !!}
            </div>
        </div>
    </div>
@endsection

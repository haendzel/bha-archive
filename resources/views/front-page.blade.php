{{--
  Template Name: Front Page Template
--}}

@extends('layouts.app')

@php $banner = get_field('banner', 'options') @endphp

@section('content')
    @while (have_posts())
        @php the_post() @endphp
        <section class="front-page-section">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="front-page-section__content">
                            @include('partials.content-page')

                            <div class="submit-cta neuebit-font">
                                Submit
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="banner-waves" style="background-image: url(' {{ $banner }} ')"></div>
    @endwhile
@endsection

@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php the_post() @endphp
        <section class="front-page-section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        @include('partials.page-header')
                    </div>
                </div>
            </div>
        </section>
        @include('partials.content-page')
    @endwhile
@endsection

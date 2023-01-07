@php $banner = get_field('banner', 'options') @endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.page-header')
    </div>

    <div class="banner-waves" style="background-image: url(' {{ $banner }} ')"></div>

    <div class="container">

        @if (!have_posts())
            <div class="alert alert-warning">
                {{ __('Sorry, no results were found.', 'sage') }}
            </div>
            {!! get_search_form(false) !!}
        @endif

    </div>

    <div class="categories">
        <div class="container">
            <div class="categories-inner">
                <div class="index-title d-flex flex-row align-items-center justify-content-between">
                    @svg('drop', 'drop-svg me-3')
                    <h2 class="neuebit-font">Index</h2>
                </div>
                <div class="tags">
                    @php
                        $categories = get_categories([
                            'orderby' => 'name',
                            'order' => 'ASC',
                            'hide_empty' => true,
                            'taxonomy' => 'category',
                        ]);
                    @endphp

                    <div class="category is-active me-3" id="allFilter" onclick='window.location.reload()'>
                        <a class="btn btn-black" href="#">{{ __('#All', 'bha') }}
                        </a>
                    </div>

                    @foreach ($categories as $cat)
                        @if ($cat->term_id !== 1 && $cat->term_id !== 18)
                            @php echo '<div class="category me-3" data-category="' . $cat->term_id . '"><a class="btn btn-black" href="' . get_category_link($cat->term_id) . '" ' . 'data-category="' . $cat->name .'">' . '#' . $cat->name .  '</a></div>';  @endphp
                        @endif
                    @endforeach

                    <div class="category me-3" id="moreTags">
                        <a class="btn btn-black" href="#">... </a>
                    </div>

                    <div class="category me-0" id="sortBy">
                        <select class="dropdown-sortby" name="sort-posts" id="sortbox"
                            onchange="document.location.href=location.href+this.options[this.selectedIndex].value;">
                            <option value="">Sort by &nbsp; ↓</option>
                            <option value="&orderby=date&order=DESC">Newest</option>
                            <option value="&orderby=date&order=ASC">Oldest</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            @while (have_posts())
                @php the_post() @endphp
                @include('partials.content-' . get_post_type())
            @endwhile

            {!! get_the_posts_navigation() !!}
        </div>

    </div>

    <div class="submit-cta neuebit-font">
        Submit
    </div>
@endsection

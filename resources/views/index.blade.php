@php $banner = get_field('banner', 'options') @endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.page-header')
    </div>

    <div class="banner-waves" style="background-image: url(' {{ $banner }} ')"></div>

    <div class="container">
        <div class="row py-6">
            <div class="col-lg-6">
                <h3 class="py-0 my-0">{{ get_field('title', 'options') }}</h3>
            </div>
            <div class="col-lg-6">
                <p class="py-0 my-0">{{ get_field('description', 'options') }}</p>
            </div>
        </div>
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

                    <div class="category is-active me-3" id="allFilter">
                        <a class="btn btn-black" href="{{ home_url('/') }}">{{ __('#All', 'bha') }}
                        </a>
                    </div>

                    @foreach ($categories as $cat)
                        @if ($cat->term_id !== 1)
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
            <div class="accordions pt-6">
                @php $count = 1; @endphp
                @while (have_posts())
                    @php the_post() @endphp
                    @include('partials.content-' . get_post_type(), ['index' => $count])
                    @php $count++ @endphp
                @endwhile

                @if (!have_posts())
                    <h3>{{ __('Sorry, no results were found.', 'sage') }}</h3>
                @endif

                {!! get_the_posts_navigation() !!}
            </div>
        </div>

    </div>

    @php $page = get_page_by_title('Submit') @endphp

    <a href="{{ get_the_permalink($page) }}" class="submit-cta neuebit-font d-block">
        Submit
    </a>
@endsection

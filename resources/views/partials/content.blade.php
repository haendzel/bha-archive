@php $category = get_the_category(); @endphp
@php $post_id = get_the_ID(); @endphp

@php $counter = 1; @endphp
@php $postCount = 0; @endphp


<article @php post_class() @endphp>
    <header>
        <div class="archive-item accordion-tab row d-flex flex-row align-items-start" data-aos="fade-in">
            <div class="col-lg-2">
                <div class="btn btn-outline">
                    <h2>
                        @if ($index < 10)
                            {{ '00' . $index }}
                        @elseif ($index < 100)
                            {{ '0' . $index }}
                        @else
                            {{ $index }}
                        @endif
                    </h2>
                </div>
            </div>
            <div class="col-lg-8 archive-item__title">
                <h3 class="entry-title mb-3"><a>{!! get_the_title() !!}</a></h3>
                <div class="entry-summary">
                    @php the_excerpt() @endphp
                </div>
                <div class="d-flex flex-row">
                    @if (!empty($category[0]))
                        <div class="category me-3">
                            <a href="{{ get_category_link($category[0]->term_id) }}"
                                class="btn btn-black btn-black__small">#{{ $category[0]->cat_name }}
                            </a>
                        </div>
                    @endif
                    @if (!empty($category[1]))
                        <div class="category me-3">
                            <a href="{{ get_category_link($category[1]->term_id) }}"
                                class="btn btn-black btn-black__small">#{{ $category[1]->cat_name }}
                            </a>
                        </div>
                    @endif
                    @if (!empty($category[2]))
                        <div class="category me-3">
                            <a href="{{ get_category_link($category[2]->term_id) }}"
                                class="btn btn-black btn-black__small">#{{ $category[2]->cat_name }}
                            </a>
                        </div>
                    @endif
                    @if (!empty($category[3]))
                        <div class="category me-3">
                            <a href="{{ get_category_link($category[3]->term_id) }}"
                                class="btn btn-black btn-black__small">#{{ $category[2]->cat_name }}
                            </a>
                        </div>
                    @endif
                    @if (!empty($category[4]))
                        <div class="category me-3">
                            <a href="{{ get_category_link($category[4]->term_id) }}"
                                class="btn btn-black btn-black__small">#{{ $category[2]->cat_name }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-2 archive-item__year">
                <h3>{{ get_the_date('Y') }}</h3>
            </div>
        </div>
        <div class="accordion-panel">
            <div class="col-lg-8 offset-lg-2">

                {{ the_content() }}
            </div>
        </div>
    </header>
</article>

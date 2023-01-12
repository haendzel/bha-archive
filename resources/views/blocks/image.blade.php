{{--
  Title: Dithering Image
  Description: Zdjęcie dithering
  Category: formatting
  Icon: format-image
  Keywords: image dithering photo zdjecie fotka fota obrazek
  Mode: edit
  PostTypes: post
  EnqueueStyle: styles/main.css
  EnqueueScript: scripts/main.js
--}}

@php $image = get_field('image') @endphp

<a href="{{ get_field('image')['url'] }}" class="glightbox wp-block-image d-inline-block"
    data-gallery="gallery{{ get_the_ID() }}">
    <img src="{{ get_field('image')['url'] }}" alt="image" />
</a>

{{-- data-gallery="gallery{{ get_the_ID() }}" --}}

import '../js/accordion';
import 'jquery.ripples';
import GLightbox from 'glightbox';
import AOS from 'aos';

export default {
  init() {

    const customLightboxHTML = `<div id="glightbox-body" class="glightbox-container">
    <div class="gloader visible"></div>
    <div class="goverlay"></div>
    <div class="gcontainer">
    <div id="glightbox-slider" class="gslider"></div>
    <button class="gbtn gprev slider-button-prev social-ellipsis social-ellipsis-btn prev-gallery-btn mr-1" tabindex="1" aria-label="Previous">
    <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.57794 22.2965L5.57794 25.0779L11.1559 25.0779L11.1559 27.8593L16.7186 27.8593L16.7186 30.6609L22.2966 30.6609L22.2966 33.4372L27.8593 33.4372L27.8593 36.2186L33.4372 36.2186L33.4372 39L39 39L39 1.51021e-06L33.4372 1.0239e-06L33.4372 2.79655L27.8593 2.79655L27.8593 5.57793L22.2966 5.57793L22.2966 8.35931L16.7186 8.35931L16.7186 11.1559L11.1559 11.1559L11.1559 13.9372L5.57794 13.9372L5.57794 16.7186L3.45811e-06 16.7186L2.97047e-06 22.2965L5.57794 22.2965Z" fill="white"/>
</svg>

</button>
<button class="gbtn gnext slider-button-next social-ellipsis social-ellipsis-btn next-gallery-btn" tabindex="0" aria-label="Next"><svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M33.4221 16.7034V13.9221H27.8441V11.1407H22.2814V8.33908H16.7034V5.56276H11.1407V2.78138H5.56276V0H0V39H5.56276V36.2034H11.1407V33.4221H16.7034V30.6407H22.2814V27.8441H27.8441V25.0628H33.4221V22.2814H39V16.7034H33.4221Z" fill="white"/>
</svg>

</button>
    <button class="gclose gbtn social-ellipsis social-ellipsis-btn close-gallery-btn" tabindex="2" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="11.707" height="11.707" viewBox="0 0 11.707 11.707">
    <g id="Group_1835" data-name="Group 1835" transform="translate(-1853.146 -47.146)">
      <line id="Line_211" data-name="Line 211" x2="11" y2="11" transform="translate(1853.5 47.5)" fill="none" stroke="#181818" stroke-width="1"/>
      <line id="Line_212" data-name="Line 212" x1="11" y2="11" transform="translate(1853.5 47.5)" fill="none" stroke="#181818" stroke-width="1"/>
    </g>
  </svg>
  </button>
    </div>
    </div>`;
                  const lightbox = GLightbox({
                    lightboxHTML: customLightboxHTML,
                    touchNavigation: true,
                    loop: true,
                  });

                  lightbox.on('open', () => {
                    const elements = document.querySelectorAll('.glightbox-container');
                    console.log(elements)
                    if(elements[1]) {
                      elements[1].remove();
                    }
                  });

    AOS.init({
      startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
      duration: 800, // values from 0 to 3000, with step 50ms
      once: true,
    });

    $(document).ready(function() {
      try {
        $('.bha-title-image').ripples({
          resolution: 512,
          dropRadius: 40, //px
          perturbance: 0.05,
        });

        $('.bha-title-subpage').ripples({
          resolution: 512,
          dropRadius: 40, //px
          perturbance: 0.05,
        });
      }
      catch (e) {
        $('.error').show().text(e);
      }
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

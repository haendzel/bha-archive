<header class="banner">
    <div class="container">
        <div class="d-flex flex-row justify-content-between align-items-center">
            <a class="brand" href="{{ home_url('/') }}">
                @svg('logo', 'logo-svg')
                Blue Humanities Archive
            </a>
            <nav class="nav-primary d-flex align-items-center flex-row justify-content-start">
                @if (has_nav_menu('primary_navigation'))
                    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
                @endif
                <div class="menu-item">
                    <a href="#" target="_blank">
                        Follow
                    </a>
                </div>
                {!! get_search_form() !!}
            </nav>
        </div>
    </div>
</header>

<script>
    // store some global variables that will get updated below
    var img,
        canvas,
        ctx,
        width,
        height,
        seed,
        data,
        breakpoint = 1200, // brightness required to create a white pixel
        seed = 0, // initial time value
        step = 32, // amount to increate time value each frame
        blur = 2; // amount to blur input image before grabbing data

    // initialize the canvas and then draw the first frame
    function init() {
        img = document.querySelector('img');
        width = img.width;
        height = img.height;
        // initialize the canvas for drawing the image
        canvas = document.createElement('canvas');
        canvas.width = width;
        canvas.height = height;
        // initialize the drawing context
        ctx = canvas.getContext('2d');
        ctx.filter = 'blur(' + blur + 'px)';
        ctx.drawImage(img, 0, 0, width, height);
        data = ctx.getImageData(0, 0, width, height).data;
        ctx.filter = 'none';
        document.querySelector('#images').appendChild(canvas);
        // start the drawing
        draw();
    }

    // for a great introduction to the core algorithm behind dithering, see:
    // http://www.tannerhelland.com/4660/dithering-eleven-algorithms-source-code/
    function draw() {
        seed = (seed + step) % breakpoint;

        for (var y = 0; y < Math.ceil(height); y++) {
            // initialize the loss for each row
            var lineBrightness = seed;
            for (var x = 0; x < Math.ceil(width); x++) {
                // find the true pixel value at coordinate x, y; then round that val
                var offset = (y * width + x) * 4,
                    r = data[offset + 0],
                    g = data[offset + 1],
                    b = data[offset + 2],
                    brightness = 0.34 * r + 0.5 * g + 0.16 * b;

                lineBrightness += brightness;
                if (lineBrightness > breakpoint) {
                    var color = 'white';
                    lineBrightness -= breakpoint / 2;
                } else {
                    var color = 'black';
                }

                ctx.fillStyle = color;
                ctx.fillRect(x, y, 1, 1);
            }
        }

        requestAnimationFrame(draw);
    }

    // polyfill raf
    window.requestAnimFrame = (function() {
        return window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            function(callback) {
                window.setTimeout(callback, 1000 / 60);
            };
    })();
</script>

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

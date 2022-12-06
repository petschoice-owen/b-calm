<div class="top-navigation">
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a href="/" class="logo-link">
                    <img src="<?php the_field('header_logo', 'option'); ?>" class="logo-image lazyload" alt="Logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php wp_nav_menu( array( 
                        'theme_location'    => 'header_menu', 
                        'container'         => false,
                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'menu_class'        => 'navbar-nav'
                    )); ?>
                    <!-- <ul class="navbar-nav">
                        <li class="menu-item">
                            <a href="#" data-href="#cbd_oil" class="nav-link">CBD Oil</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" data-href="#how_it_works" class="nav-link">How It Works</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" data-href="#faqs" class="nav-link">FAQs</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" data-href="#instructions" class="nav-link">Instructions</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" data-href="#treats" class="nav-link">B-Calm Treats</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" data-href="#contact" class="nav-link">Contact Us</a>
                        </li>
                    </ul> -->
                </div>
            </div>
        </nav>
    </div>
</div>
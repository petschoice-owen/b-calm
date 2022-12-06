<div class="top-navigation">
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a href="/" class="logo-link">
                    <img src="<?php the_field('header_logo', 'option'); ?>" class="logo-image lazyload" alt="Logo" />
                </a>
                <div class="account">
                    <div class="holder user-holder">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-user.png" class="icon-user" alt="" />
                        <a class="user-link" href="/my-account" title="Account"></a>
                    </div>
                    <div class="holder cart-holder">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-cart.png" class="icon-cart" alt="" />
                        <?php echo do_shortcode("[woo_cart_but]"); ?>
                    </div>
                </div>
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
                        'menu_class'        => 'navbar-nav navbar-nav-account'
                    )); ?>
                </div>
            </div>
        </nav>
    </div>
</div>
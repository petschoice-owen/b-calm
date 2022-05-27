    <div id="<?php the_field('section_id_footer', 'option'); ?>" class="footer-section" style="background-color: #fcfcfc;">
        <div class="container">
            <h1 class="text-center"><?php the_field('heading_footer', 'option'); ?></h1>
            <div class="box-wrapper">
                <?php if( have_rows('background_images_footer', 'option') ): ?>
                    <div class="overlay-wrapper">
                        <?php while( have_rows('background_images_footer', 'option') ) : the_row();
                            $top_left_image = get_sub_field('top_left_image', 'option');
                            $top_right_image = get_sub_field('top_right_image', 'option');
                            $bottom_left_image = get_sub_field('bottom_left_image', 'option');
                            $bottom_right_image = get_sub_field('bottom_right_image', 'option'); ?>
                            <img src="<?php echo $top_left_image; ?>" class="overlay-image overlay-image-top overlay-image-left" alt="" />
                            <img src="<?php echo $top_right_image; ?>" class="overlay-image overlay-image-top overlay-image-right" alt="" />
                            <img src="<?php echo $bottom_left_image; ?>" class="overlay-image overlay-image-bottom overlay-image-left" alt="" />
                            <img src="<?php echo $bottom_right_image; ?>" class="overlay-image overlay-image-bottom overlay-image-right" alt="" />
                        <?php endwhile; ?>
                    </div>
                    <?php else :
                endif; ?>                
                <div class="wrapper">
                    <div class="image-wrapper">
                        <img src="<?php the_field('logo_footer', 'option'); ?>" alt="" />
                    </div>
                    <div class="items">
                        <div class="item item-full">
                            <div class="icon-wrapper">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-pin.png" alt="" />
                            </div>
                            <p><?php the_field('address_footer', 'option'); ?></p>
                        </div>
                        <?php if( get_field('number_footer', 'option') ): ?>
                            <div class="item item-half">
                                <div class="icon-wrapper">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-telephone.png" alt="" />
                                </div>
                                <p><a href="#" class="phone-number"><?php the_field('number_footer', 'option'); ?></a></p>
                            </div>
                        <?php endif; ?>
                        <?php if( get_field('email_footer', 'option') ): ?>
                            <div class="item item-half">
                                <div class="icon-wrapper">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-mail.png" alt="" />
                                </div>
                                <p><a href="mailto:<?php the_field('email_footer', 'option'); ?>"><?php the_field('email_footer', 'option'); ?></a></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if( have_rows('social_media', 'option') ): ?>
                        <div class="social">
                            <?php while( have_rows('social_media', 'option') ) : the_row();
                                $social_media_image = get_sub_field('social_media_image', 'option');
                                $social_media_link = get_sub_field('social_media_link', 'option'); ?>
                                <a href="<?php echo $social_media_link; ?>"><img src="<?php echo $social_media_image; ?>" alt="" /></a>
                            <?php endwhile; ?>
                        </div>
                        <?php else :
                    endif; ?>               
                </div>
            </div>
            <div class="copyright">
                <?php wp_nav_menu( array( 
                    'theme_location'    => 'footer_menu', 
                    'container'         => false,
                    'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'menu_class'        => 'footer-links'
                )); ?>
                <!-- <ul class="footer-links d-none">
                    <li><a href="#">Terms and Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                </ul> -->
                <?php if( get_field('copyright_footer', 'option') ): ?>
                    <p><?php the_field('copyright_footer', 'option'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>
</html>
<?php
/**
 * The template for displaying any single post.
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-default">
        <section class="hero hero-default">
            <div class="hero-background" style="background-image: url(<?php the_field('background_image_hero_default'); ?>);"></div>
            <div class="container">
                <div class="wrapper">
                    <h1 class="heading dashed"><?php the_field('heading_default'); ?></h1>
                </div>
            </div>
        </section>
        <section class="content" style="background-image: url(<?php the_field('background_image_content_default'); ?>);">
            <div class="container">
                <div class="wrapper" style="background-image: url(<?php the_field('background_image_content_wrapper_default'); ?>);">
                    <div class="holder">
                        <?php the_field('text_content_default'); ?>
                        <?php if ( have_posts() ) : ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php the_content(); ?>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <h1 class="404">Nothing has been posted like that yet.</h1>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'product-range.php'; ?>
    </main>
<?php get_footer(); ?>
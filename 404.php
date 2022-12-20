<?php
/**
*** The template for displaying 404 pages (not found)
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-404">
		<section class="hero hero-title">
            <div class="container container-narrow">
				<h1 class="text-center"><strong><?php the_field('404_title', 'option'); ?></strong></h1>
            </div>
        </section>
		<section class="content-404">
            <div class="container container-narrow">
				<span class="text-404">404</span>
                <div class="wrapper text-center">
					<?php the_field('404_content', 'option'); ?>
                </div>
            </div>
        </section>
		<?php include 'product-range.php'; ?>
    </main>
<?php get_footer(); ?>
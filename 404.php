<?php
/**
*** The template for displaying 404 pages (not found)
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-404">
		<section class="content" style="background-image: url(<?php the_field('background_image_hero_404', 'option'); ?>);">
			<div class="container">
				<div class="wrapper">
					<div class="image-wrapper">
						<img src="<?php the_field('image_hero_404', 'option'); ?>" alt="404 image" />
					</div>
					<div class="text-wrapper">
						<h1><?php the_field('heading_404', 'option'); ?></h1>
						<?php if( have_rows('buttons_404', 'option') ): ?>
							<div class="button-wrapper">
								<?php while( have_rows('buttons_404', 'option') ) : the_row();
									$button_text = get_sub_field('button_text', 'option');
									$button_link = get_sub_field('button_link', 'option'); ?>
									<a href="<?php echo $button_link; ?>" class="btn-brown"><?php echo $button_text; ?></a>
								<?php endwhile;
								else : ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<?php include 'product-range.php'; ?>
    </main>
<?php get_footer(); ?>
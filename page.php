<?php
/**
 * The template for displaying any single post.
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-default">
        <section class="content">
            <div class="container">
                <div class="wrapper">
					<br />
                    <h1 class="section-title"><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>
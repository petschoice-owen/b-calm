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
                    <?php the_content(); ?>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>
<?php
/**
*** Template Name: Home Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-home">
        <section id="<?php the_field('section_id_hero'); ?>" class="calming-spray" style="background-color: #12483b">
            <img src="<?php the_field('overlay_image_hero'); ?>" class="image-overlay" alt="" />
            <div class="container">
                <div class="wrapper">
                    <div class="image-wrapper">
                        <img src="<?php the_field('section_image_background_hero'); ?>" class="background" alt="" />
                        <img src="<?php the_field('section_image_hero'); ?>" class="featured" alt="" />
                    </div>
                    <div class="text-wrapper">
                        <h1 class=""><?php the_field('heading_hero'); ?></h1>
                        <?php if( have_rows('checklist_hero') ): ?>
                            <ul class="checklist checklist-white ">
                                <?php while( have_rows('checklist_hero') ) : the_row();
                                    $item = get_sub_field('item'); ?>
                                    <li class="medium-text"><?php echo $item; ?></li>
                                <?php endwhile; ?>
                            </ul>
                            <?php else :
                        endif; ?>
                        <?php if( have_rows('button_hero') ): ?>
                            <div class="button-holder">
                                <?php while( have_rows('button_hero') ) : the_row();
                                    $button_text = get_sub_field('button_text', 'option');
                                    $button_link = get_sub_field('button_link', 'option'); ?>
                                    <a href="#<?php echo $button_link; ?>" class="btn-gold-outline"><?php echo $button_text; ?></a>
                                <?php endwhile; ?>
                            </div>
                            <?php else :
                        endif; ?> 
                    </div>
                </div>
            </div>
        </section>
        <section id="<?php the_field('section_id_cbd_oil'); ?>" class="cbd-oil section-alternate" style="background-color: #fcfcfc;">
            <img src="<?php the_field('overlay_image_cbd_oil'); ?>" class="image-overlay" alt="" />
            <div class="container">
                <div class="wrapper">
                    <div class="text-wrapper">
                        <h1 class=""><?php the_field('heading_cbd_oil'); ?></h1>
                        <p class="medium-text medium-text-margin-top"><?php the_field('text_content_cbd_oil'); ?></p>
                    </div>
                    <div class="image-wrapper">
                        <img src="<?php the_field('section_image_cbd_oil'); ?>" class="plain-image" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <section id="<?php the_field('section_id_hiw'); ?>" class="how-it-works section-alternate section-alternate-inverted" style="background-color: #d5a940;">
            <img src="<?php the_field('overlay_image_hiw'); ?>" class="image-overlay" alt="" />
            <div class="container">
                <div class="wrapper">
                    <div class="image-wrapper">
                        <img src="<?php the_field('section_image_hiw'); ?>" class="plain-image" alt="" />
                    </div>
                    <div class="text-wrapper">
                        <h1 class=""><?php the_field('heading_hiw'); ?></h1>
                        <p class="medium-text medium-text-margin-top "><?php the_field('text_content_hiw'); ?></p>
                    </div>
                </div>
            </div>
        </section>
        <section id="<?php the_field('section_id_safe'); ?>" class="is-it-safe" style="background-color: #fcfcfc;">
            <div class="container">
                <div class="wrapper">
                    <!-- <h1><?php // the_field('heading_safe'); ?></h1> -->
                    <!-- <p class="medium-text medium-text-margin-top"> -->
                    <p class="medium-text"><?php the_field('text_content_safe'); ?></p>
                    <div class="image-holder">
                        <img src="<?php the_field('section_image_safe'); ?>" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <section id="<?php the_field('section_id_faqs'); ?>" class="faqs" style="background-color: #12483b;">
            <img src="<?php the_field('overlay_image_faqs'); ?>" class="image-overlay" alt="" />
            <div class="container">
                <div class="wrapper">
                    <h1><?php the_field('heading_faqs'); ?></h1>
                    <p class="medium-text medium-text-margin-top"><?php the_field('text_content_faqs'); ?></p>
                </div>
                <div class="accordion" id="accordion_custom">
                    <?php if( have_rows('accordion_faqs') ): ?>
                        <?php $counter = 1; ?>
                        <?php while( have_rows('accordion_faqs') ) : the_row();
                            $accordion_title = get_sub_field('accordion_title');
                            $accordion_content = get_sub_field('accordion_content'); ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="accordion_heading_<?php echo $counter; ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion_collapse_<?php echo $counter; ?>" aria-expanded="false" aria-controls="accordion_collapse_<?php echo $counter; ?>"><?php echo $accordion_title; ?></button>
                                </h2>
                                <div id="accordion_collapse_<?php echo $counter; ?>" class="accordion-collapse collapse" aria-labelledby="accordion_heading_<?php echo $counter; ?>" data-bs-parent="#accordion_custom">
                                    <div class="accordion-body">
                                        <?php echo $accordion_content; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php $counter++; ?>
                        <?php endwhile; 
                        else :
                    endif; ?>
                </div>
            </div>
        </section>
        <section id="<?php the_field('section_id_instructions'); ?>" class="instructions" style="background-color: #fcfcfc;">
            <img src="<?php the_field('overlay_image_instructions_top'); ?>" class="image-overlay image-overlay-left" alt="" />
            <img src="<?php the_field('overlay_image_instructions_bottom'); ?>" class="image-overlay image-overlay-right" alt="" />
            <div class="container">
                <h1 class="text-center"><?php the_field('heading_instructions'); ?></h1>
                <div class="items">
                    <?php if( have_rows('item_instructions') ): ?>
                        <?php while( have_rows('item_instructions') ) : the_row();
                            $image = get_sub_field('image');
                            $text_content = get_sub_field('text_content'); ?>
                            <div class="item">
                                <div class="item-wrapper">
                                    <div class="icon-wrapper">
                                        <img src="<?php echo $image; ?>" alt="" />
                                    </div>
                                    <p><?php echo $text_content; ?></p>
                                </div>
                            </div>
                        <?php endwhile;
                        else :
                    endif; ?>
                </div>
            </div>
        </section>
        <section id="<?php the_field('section_id_treats'); ?>" class="treats" style="background-color: #d5a940;">
            <div class="container">
                <div class="wrapper text-wrapper">
                    <h1><?php the_field('heading_treats'); ?></h1>
                    <br />
                </div>
                <?php if( have_rows('content_treats') ):
                    while ( have_rows('content_treats') ) : the_row();
                        if( get_row_layout() == 'content_treats_text_editor' ):
                            $text_content = get_sub_field('text_content'); ?>
                            <div class="wrapper text-wrapper">
                                <h5><?php the_sub_field('text_content'); ?></h5>
                            </div>
                        <?php elseif( get_row_layout() == 'content_treats_image_checklist' ): 
                            $image = get_sub_field('image'); ?>
                            <div class="wrapper image-checklist-wrapper">
                                <div class="image-wrapper image-coming-soon image-coming-soon-top">
                                    <img src="<?php echo $image; ?>" alt="" />
                                </div>
                                <ul class="checklist-wrapper checklist-small checklist-small-green">
                                    <?php if( have_rows('checklist') ): ?>
                                        <?php while( have_rows('checklist') ) : the_row();
                                            $item = get_sub_field('item'); ?>
                                            <li><?php echo $item; ?></li>
                                        <?php endwhile;
                                        else :
                                    endif; ?>
                                </ul>
                            </div>
                        <?php endif;
                    endwhile;
                else :
                endif; ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>
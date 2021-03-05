<?php

if ( have_rows( 'content' ) ) :
    while ( have_rows( 'content' ) ) : the_row();
        switch ( get_row_layout() ) :
            case 'title_description_repeater':
                get_template_part( 'template-parts/flexible-modules/title-description-repeater' );
            case 'work_from_home_box':
                get_template_part( 'template-parts/flexible-modules/work-from-home-box' );
                break;
            case 'button':
                 get_template_part( 'template-parts/flexible-modules/button' );
                 break;    
            case 'hidden_h1_title':
                get_template_part( 'template-parts/flexible-modules/hidden-h1-title' );
                break;    
            case 'section_header':
                get_template_part( 'template-parts/flexible-modules/section-header' );
                break;
            case 'single_divider':
                get_template_part( 'template-parts/flexible-modules/single_divider' );
                break;
            case 'quote_banner':
                get_template_part( 'template-parts/flexible-modules/quote_banner' );
                break;
            case 'paragraph_select':
                get_template_part( 'template-parts/flexible-modules/paragraph_select' );
                break;
            case 'images_list_with_titles_underneath':
                get_template_part( 'template-parts/flexible-modules/images_list_with_titles_underneath' );
                break;
            case 'image_with_paragraphs':
                get_template_part( 'template-parts/flexible-modules/image-with-paragraphs' );
                break;
            case 'reviews_section':
                get_template_part( 'template-parts/flexible-modules/reviews_section' );
                break;
            case 'icon_and_text_rows':
                get_template_part( 'template-parts/flexible-modules/icon_and_text_rows' );
                break;
            case 'title_image':
                get_template_part( 'template-parts/flexible-modules/title-image' );
                break;
            case 'title_button_form':
                get_template_part( 'template-parts/flexible-modules/title-button-form' );
                break;
            case 'title_description':
                get_template_part( 'template-parts/flexible-modules/title-description' );
                break;
            case 'card_with_image_and_background':
                get_template_part( 'template-parts/flexible-modules/card-with-image-and-background' );
                break;
            case 'image_with_text_and_button':
                get_template_part( 'template-parts/flexible-modules/image-with-text-and-button' );
                break;
            case 'image_with_text_and_button_vertically_aligned':
                get_template_part( 'template-parts/flexible-modules/image-with-text-and-button-vertically-aligned' );
                break;
            case 'colored_background':
                get_template_part( 'template-parts/flexible-modules/colored-background' );
                break;
            case 'testimonials_slider':
                get_template_part( 'template-parts/flexible-modules/testimonials-slider' );
                break;
            case 'columns_with_small_images':
                get_template_part( 'template-parts/flexible-modules/columns-with-small-images' );
                break;
            case 'columns_with_small_images_no_grid':
                get_template_part( 'template-parts/flexible-modules/columns-with-small-images-no-grid' );
                break;
            case 'columns_with_alternating_images_and_button':
                get_template_part( 'template-parts/flexible-modules/columns-with-alternating-images-and-button' );
                break;
            case 'columns_with_alternating_images_full_width':
                get_template_part( 'template-parts/flexible-modules/columns-with-alternating-images-full-width' );
                break;
            case 'cards_grid':
                get_template_part( 'template-parts/flexible-modules/cards-grid' );
                break;
            case 'columns_with_text_and_border':
                get_template_part( 'template-parts/flexible-modules/columns-with-text-and-border' );
                break;
            case 'slider':
                get_template_part( 'template-parts/flexible-modules/slider' );
                break;
            case 'images_list_with_title':
                get_template_part( 'template-parts/flexible-modules/images-list-with-title' );
                break;
            case 'logos_list_with_button':
                get_template_part( 'template-parts/flexible-modules/logos_list_with_button' );
                break;
            case 'icon_title_description_repeater':
                get_template_part( 'template-parts/flexible-modules/icon_title_description_repeater' );
                break;
            case 'team':
                get_template_part( 'template-parts/flexible-modules/team' );
                break;
            case 'events_listing':
                get_template_part( 'template-parts/flexible-modules/event' );
                break;
            case 'awards_listing':
                get_template_part( 'template-parts/flexible-modules/award' );
                break;
            case 'customer_stories_listing':
                get_template_part( 'template-parts/flexible-modules/customer-stories' );
                break;
            case 'cards_with_links':
                get_template_part( 'template-parts/flexible-modules/cards-with-links' );
                break;
            case 'two_sides_section':
                get_template_part( 'template-parts/flexible-modules/two-sides-section' );
                break;
            case 'columns_with_image_title_subtitle_and_text':
                get_template_part( 'template-parts/flexible-modules/columns-with-image-title-subtitle-and-text' );
                break;
            case 'posts_with_specific_categories':
                get_template_part( 'template-parts/flexible-modules/posts-with-specific-categories' );
                break;
            case 'form_with_image':
                get_template_part( 'template-parts/flexible-modules/form-with-image' );
                break;
            case 'form_with_text':
                get_template_part( 'template-parts/flexible-modules/form-with-text' );
                break;
            case 'video_with_title':
                get_template_part( 'template-parts/flexible-modules/video-with-title' );
                break;
            case 'post_title_text_image':
                get_template_part( 'template-parts/flexible-modules/post/post-title-text-image' );
                break;
            case 'post_quote':
                get_template_part( 'template-parts/flexible-modules/post/post-quote' );
                break;
            case 'post_statistics':
                get_template_part( 'template-parts/flexible-modules/post/post-statistics' );
                break;
            case 'post_contact_sales_and_file':
                get_template_part( 'template-parts/flexible-modules/post/post-contact-sales-and-file' );
                break;
            case 'post_featured_articles':
                get_template_part( 'template-parts/flexible-modules/post/post-featured-articles' );
                break;
            case 'text_and_image_banner':
                get_template_part( 'template-parts/flexible-modules/text_and_image_banner' );
                break;
            case 'lp_title_section':
                get_template_part( 'template-parts/flexible-modules/lp_title_section' );
                break;
            case 'lp_form_section':
                get_template_part( 'template-parts/flexible-modules/lp_form_section' );
                break;
            case 'lp_learn_more':
                get_template_part( 'template-parts/flexible-modules/lp_learn_more' );
                break;
            case 'lp_form_with_image_background':
                get_template_part( 'template-parts/flexible-modules/lp_form_with_image_background' );
                break;
            case 'lp_form_with_colored_background':
                get_template_part( 'template-parts/flexible-modules/lp_form_with_colored_background' );
                break;
            case 'colored_background_with_badges':
                get_template_part( 'template-parts/flexible-modules/colored_background_with_badges' );
                break;
            case 'statistics':
                get_template_part( 'template-parts/flexible-modules/statistics' );
                break;
        endswitch;
    endwhile;
    wp_reset_postdata();
else : // fallback in case there is no element in ACF or if we are using the default editor (blog)
    /* Start the Loop */
    while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content/content', 'page' );
    endwhile; // End of the loop.
endif;

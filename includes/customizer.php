<?php
/**
 * Ideabox Theme Customizer support
 *
 * @package WordPress
 * @subpackage Ideabox
 * @since Ideabox 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @since Ideabox 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ideabox_customize_register($wp_customize) {

    $wp_customize->get_section('header_image')->priority = 29;
    $wp_customize->get_section('static_front_page')->priority = 31;
    $wp_customize->get_section('nav')->priority = 31;

    /** ===============
     * Extends CONTROLS class to add textarea
     */
    class ideabox_customize_textarea_control extends WP_Customize_Control {

        public $type = 'textarea';

        public function render_content() {
            ?>

            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5" style="width:98%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>

            <?php
        }

    }

    // Displays a list of categories in dropdown
    class WP_Customize_Dropdown_Categories_Control extends WP_Customize_Control {

        public $type = 'dropdown-categories';

        public function render_content() {
            $dropdown = wp_dropdown_categories(
                    array(
                        'name' => '_customize-dropdown-categories-' . $this->id,
                        'echo' => 0,
                        'hide_empty' => false,
                        'show_option_none' => '&mdash; ' . __('Select', 'ideabox') . ' &mdash;',
                        'hide_if_empty' => false,
                        'selected' => $this->value(),
                    )
            );

            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown);

            printf(
                    '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>', $this->label, $dropdown
            );
        }

    }

    // Add new section for theme layout and color schemes
    $wp_customize->add_section('ideabox_theme_layout_settings', array(
        'title' => __('Color Scheme', 'ideabox'),
        'priority' => 32,
    ));


    // Add color scheme options

    $wp_customize->add_setting('ideabox_color_scheme', array(
        'default' => 'blue',
        'sanitize_callback' => 'ideabox_sanitize_color_scheme_option',
    ));

    $wp_customize->add_control('ideabox_color_scheme', array(
        'label' => 'Color Schemes',
        'section' => 'ideabox_theme_layout_settings',
        'default' => 'red',
        'type' => 'radio',
        'choices' => array(
            'blue' => __('Blue', 'ideabox'),
            'red' => __('Red', 'ideabox'),
            'green' => __('Green', 'ideabox'),
            'yellow' => __('Yellow', 'ideabox'),
            'purple' => __('Purple', 'ideabox'),
            'orange' => __('Orange', 'ideabox'),
            'brown' => __('Brown', 'ideabox'),
            'pink' => __('Pink', 'ideabox'),
        ),
    ));


    // Add new section for custom favicon settings
    $wp_customize->add_section('ideabox_custom_favicon_setting', array(
        'title' => __('Custom Favicon', 'ideabox'),
        'priority' => 63,
    ));


    $wp_customize->add_setting('custom_favicon');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'custom_favicon', array(
        'label' => 'Custom Favicon',
        'section' => 'ideabox_custom_favicon_setting',
        'settings' => 'custom_favicon',
        'priority' => 1,
            )
            )
    );

    // Add new section for custom favicon settings
    $wp_customize->add_section('ideabox_tracking_code_setting', array(
        'title' => __('Tracking Code', 'ideabox'),
        'priority' => 64,
    ));

    $wp_customize->add_setting('tracking_code', array('default' => '',
        'sanitize_callback' => 'ideabox_sanitize_text',
        'sanitize_js_callback' => 'ideabox_sanitize_escaping',
    ));

    $wp_customize->add_control(new ideabox_customize_textarea_control($wp_customize, 'tracking_code', array(
        'label' => __('Tracking Code', 'ideabox'),
        'section' => 'ideabox_tracking_code_setting',
        'settings' => 'tracking_code',
        'priority' => 2,
    )));


  
    // Add new section for slider settings
    $wp_customize->add_section('home_featured_setting', array(
        'title' => __('Home Featured', 'ideabox'),
        'priority' => 37,
    ));
    
    $wp_customize->add_setting('ideabox_home_slider_color', array(
        'default' => '#009cee',
        'sanitize_callback' => 'ideabox_sanitize_hex_color',
        'sanitize_js_callback' => 'ideabox_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ideabox_home_slider_color', array(
        'label' => 'Section Background color',
        'section' => 'home_featured_setting',
        'settings' => 'ideabox_home_slider_color',
        'priority' => 1,
            )
    ));
    
    $wp_customize->add_setting('slider_background_image', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_background_image', array(
        'label' => 'Slider Background Image',
        'section' => 'home_featured_setting',
        'settings' => 'slider_background_image',
        'priority' => 2,
            )
            )
    );

    
    $wp_customize->add_setting('home_featured_left', array('default' => '',
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ideabox_customize_textarea_control($wp_customize, 'home_featured_left', array(
        'label' => __('Home Featured Left', 'ideabox'),
        'section' => 'home_featured_setting',
        'settings' => 'home_featured_left',
        'priority' => 5,
    )));
    
    $wp_customize->add_setting('home_featured_right', array('default' => '',
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ideabox_customize_textarea_control($wp_customize, 'home_featured_right', array(
        'label' => __('Home Featured Right', 'ideabox'),
        'section' => 'home_featured_setting',
        'settings' => 'home_featured_right',
        'priority' => 5,
    )));  
        
    
    // Add new section for Home Featured One settings
    $wp_customize->add_section('home_featured_one_setting', array(
        'title' => __('Home Featured #1', 'ideabox'),
        'priority' => 40,
    ));


    $wp_customize->add_setting('home_featured_one', array(
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_featured_one', array(
        'label' => __('Icon', 'ideabox'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_featured_one',
        'priority' => 1,
    ));
    
    // home Title
    $wp_customize->add_setting('home_title_one', array(
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_one', array(
        'label' => __('Title', 'ideabox'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_title_one',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_one', array('default' => '',
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ideabox_customize_textarea_control($wp_customize, 'home_description_one', array(
        'label' => __('Description', 'ideabox'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_description_one',
        'priority' => 3,
    )));

   
    // Add new section for Home Featured Two settings
    $wp_customize->add_section('home_featured_two_setting', array(
        'title' => __('Home Featured #2', 'ideabox'),
        'priority' => 42,
    ));


     $wp_customize->add_setting('home_featured_two', array(
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_featured_two', array(
        'label' => __('Icon', 'ideabox'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_featured_two',
        'priority' => 1,
    ));

    // home Title
    $wp_customize->add_setting('home_title_two', array(
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_two', array(
        'label' => __('Title', 'ideabox'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_title_two',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_two', array('default' => '',
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ideabox_customize_textarea_control($wp_customize, 'home_description_two', array(
        'label' => __('Description', 'ideabox'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_description_two',
        'priority' => 3,
    )));

  
    // Add new section for Home Featured Three settings
    $wp_customize->add_section('home_featured_three_setting', array(
        'title' => __('Home Featured #3', 'ideabox'),
        'priority' => 45,
    ));


     $wp_customize->add_setting('home_featured_three', array(
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_featured_three', array(
        'label' => __('Icon', 'ideabox'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_featured_three',
        'priority' => 1,
    ));

    // home Title
    $wp_customize->add_setting('home_title_three', array(
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_three', array(
        'label' => __('Title', 'ideabox'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_title_three',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_three', array('default' => '',
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ideabox_customize_textarea_control($wp_customize, 'home_description_three', array(
        'label' => __('Description', 'ideabox'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_description_three',
        'priority' => 3,
    )));
    
    if (class_exists('Easy_Digital_Downloads')) {
        $wp_customize->add_section('ideabox_edd_options', array(
            'title' => __('Easy Digital Downloads', 'ideabox'),
            'description' => __('All other EDD options are under Dashboard => Downloads.', 'ideabox'),
            'priority' => 48,
        ));

        // enable featured products on front page?
        $wp_customize->add_setting('ideabox_edd_front_featured_products', array(
            'default' => 0,
            'sanitize_callback' => 'ideabox_sanitize_checkbox',
        ));
        $wp_customize->add_control('ideabox_edd_front_featured_products', array(
            'label' => __('Show featured products on Front Page', 'ideabox'),
            'section' => 'ideabox_edd_options',
            'priority' => 10,
            'type' => 'checkbox',
        ));

        // store front/archive item count
        $wp_customize->add_setting('ideabox_store_front_featured_count', array(
            'default' => 3,
            'sanitize_callback' => 'ideabox_sanitize_integer',
        ));
        $wp_customize->add_control('ideabox_store_front_featured_count', array(
            'label' => __('Number of Featured Products', 'ideabox'),
            'section' => 'ideabox_edd_options',
            'settings' => 'ideabox_store_front_featured_count',
            'priority' => 15,
        ));

        // store front/downloads archive headline
        $wp_customize->add_setting('ideabox_edd_store_archives_title', array(
            'default' => __('Latest Products', 'ideabox'),
            'sanitize_callback' => 'ideabox_sanitize_text'
        ));
        $wp_customize->add_control('ideabox_edd_store_archives_title', array(
            'label' => __('Featured Products Title', 'ideabox'),
            'section' => 'ideabox_edd_options',
            'settings' => 'ideabox_edd_store_archives_title',
            'priority' => 20,
        ));
        // store front/downloads archive description
        $wp_customize->add_setting('ideabox_edd_store_archives_description', array(
            'default' => null,
            'sanitize_callback' => 'ideabox_sanitize_text',
        ));
        $wp_customize->add_control(new ideabox_customize_textarea_control($wp_customize, 'ideabox_edd_store_archives_description', array(
            'label' => __('Featured Products Description', 'ideabox'),
            'section' => 'ideabox_edd_options',
            'settings' => 'ideabox_edd_store_archives_description',
            'priority' => 25,
        )));
        // read more link
        $wp_customize->add_setting('ideabox_edd_view_details', array(
            'default' => __('View Details', 'ideabox'),
            'sanitize_callback' => 'ideabox_sanitize_text',
        ));
        $wp_customize->add_control('ideabox_edd_view_details', array(
            'label' => __('Product Details Text', 'ideabox'),
            'section' => 'ideabox_edd_options',
            'settings' => 'ideabox_edd_view_details',
            'priority' => 30,
        ));
        
        
        $wp_customize->add_setting('ideabox_edd_store_link_text', array(
            'sanitize_callback' => 'sanitize_text_field',
            ));
        
        $wp_customize->add_control('ideabox_edd_store_link_text', array(
            'label' => __('Store Link Text', 'tatva'),
            'section' => 'ideabox_edd_front_page_options',
            'settings' => 'ideabox_edd_store_link_text',
            'priority' => 40,
        ));
        // sotre link
        $wp_customize->add_setting('ideabox_edd_store_link_url', array('default' => __('', 'tatva'),
            'sanitize_callback' => 'sanitize_text_field',
            ));
        
        $wp_customize->add_control('ideabox_edd_store_link_url', array(
            'label' => __('Store Page Link URL', 'tatva'),
            'section' => 'ideabox_edd_front_page_options',
            'settings' => 'ideabox_edd_store_link_url',
            'priority' => 45,
        ));
        
        $wp_customize->add_setting('store_page_title', array(
            'sanitize_callback' => 'ideabox_sanitize_text'
        ));
        $wp_customize->add_control('store_page_title', array(
            'label' => __('Store Title', 'ideabox'),
            'section' => 'ideabox_edd_options',
            'settings' => 'store_page_title',
            'priority' => 50,
        ));
        // store front/downloads archive description
        $wp_customize->add_setting('store_page_description', array(
            'default' => null,
            'sanitize_callback' => 'ideabox_sanitize_text',
        ));
        $wp_customize->add_control(new ideabox_customize_textarea_control($wp_customize, 'store_page_description', array(
            'label' => __('Store Description', 'ideabox'),
            'section' => 'ideabox_edd_options',
            'settings' => 'store_page_description',
            'priority' => 55,
        )));
        
        // store front/archive item count
        $wp_customize->add_setting('ideabox_store_front_count', array(
            'default' => 9,
            'sanitize_callback' => 'ideabox_sanitize_integer',
        ));
        $wp_customize->add_control('ideabox_store_front_count', array(
            'label' => __('Store Item Count', 'ideabox'),
            'section' => 'ideabox_edd_options',
            'settings' => 'ideabox_store_front_count',
            'priority' => 60,
        ));
    }
    
    /* Front CTA */
    $wp_customize->add_section('ideabox_front_cta_options', array(
        'title' => __('CTA Settings', 'ideabox'),
        'description' => __('Settings for displaying featured cta on Front Page', 'ideabox'),
        'priority' => 52,
    ));
    
    $wp_customize->add_setting('ideabox_cta_section_check', array(
        'default' => 0,
        'sanitize_callback' => 'ideabox_sanitize_checkbox',
    ));
    $wp_customize->add_control('ideabox_cta_section_check', array(
        'label' => __('Show CTA Front Page', 'ideabox'),
        'section' => 'ideabox_front_cta_options',
        'priority' => 1,
        'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting('ideabox_cta_color', array(
        'default' => '#009cee',
        'sanitize_callback' => 'ideabox_sanitize_hex_color',
        'sanitize_js_callback' => 'ideabox_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ideabox_cta_color', array(
        'label' => 'Section Background color',
        'section' => 'ideabox_front_cta_options',
        'settings' => 'ideabox_cta_color',
        'priority' => 2,
            )
    ));
    
    $wp_customize->add_setting('cta_title', array(
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('cta_title', array(
        'label' => __('Title', 'ideabox'),
        'section' => 'ideabox_front_cta_options',
        'settings' => 'cta_title',
        'priority' => 4,
    ));
      
     $wp_customize->add_setting('ideabox_cta', array('default' => '',
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ideabox_customize_textarea_control($wp_customize, 'ideabox_cta', array(
        'label' => __('Text/HTML', 'ideabox'),
        'section' => 'ideabox_front_cta_options',
        'settings' => 'ideabox_cta',
        'priority' => 6,
    )));
    
    $wp_customize->add_setting('cta_link_text', array(
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('cta_link_text', array(
        'label' => __(' Link Text', 'ideabox'),
        'section' => 'ideabox_front_cta_options',
        'settings' => 'cta_link_text',
        'priority' => 15,
    ));

    $wp_customize->add_setting('cta_link_url', array('default' => __('', 'ideabox'),
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('cta_link_url', array(
        'label' => __('Link URL', 'ideabox'),
        'section' => 'ideabox_front_cta_options',
        'settings' => 'cta_link_url',
        'priority' => 16,
    ));


    // Add new section for displaying Featured Posts on Front Page
    $wp_customize->add_section('ideabox_front_page_post_options', array(
        'title' => __('Featured Posts', 'ideabox'),
        'description' => __('Settings for displaying featured posts on Front Page', 'ideabox'),
        'priority' => 54,
    ));

    // enable featured posts on front page?
    $wp_customize->add_setting('ideabox_front_featured_posts_check', array(
        'default' => 1,
        'sanitize_callback' => 'ideabox_sanitize_checkbox',
    ));
    $wp_customize->add_control('ideabox_front_featured_posts_check', array(
        'label' => __('Show featured posts on Front Page', 'ideabox'),
        'section' => 'ideabox_front_page_post_options',
        'priority' => 1,
        'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting('ideabox_blog_background_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'ideabox_sanitize_hex_color',
        'sanitize_js_callback' => 'ideabox_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ideabox_blog_background_color', array(
        'label' => 'Section Background color',
        'section' => 'ideabox_front_page_post_options',
        'settings' => 'ideabox_blog_background_color',
        'priority' => 2,
            )
    ));
    
    // post Title
    $wp_customize->add_setting('ideabox_post_title', array(
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('ideabox_post_title', array(
        'label' => __('Section Title', 'ideabox'),
        'section' => 'ideabox_front_page_post_options',
        'settings' => 'ideabox_post_title',
        'priority' => 3,
    ));
    
    $wp_customize->add_setting('ideabox_post_description', array('default' => '',
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ideabox_customize_textarea_control($wp_customize, 'ideabox_post_description', array(
        'label' => __('Description', 'ideabox'),
        'section' => 'ideabox_front_page_post_options',
        'settings' => 'ideabox_post_description',
        'priority' => 5,
    )));

    // select number of posts for featured posts on front page
    $wp_customize->add_setting('ideabox_front_featured_posts_count', array(
        'default' => 3,
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('ideabox_front_featured_posts_count', array(
        'label' => __('Number of posts to display', 'ideabox'),
        'section' => 'ideabox_front_page_post_options',
        'settings' => 'ideabox_front_featured_posts_count',
        'priority' => 20,
    ));
    // select category for featured posts 
    $wp_customize->add_setting('ideabox_front_featured_posts_cat', array('default' => 0,));
    $wp_customize->add_control(new WP_Customize_Dropdown_Categories_Control($wp_customize, 'ideabox_front_featured_posts_cat', array(
        'label' => __('Post Category', 'ideabox'),
        'section' => 'ideabox_front_page_post_options',
        'type' => 'dropdown-categories',
        'settings' => 'ideabox_front_featured_posts_cat',
        'priority' => 30,
    )));

        
     // Add new section for Social Icons
    $wp_customize->add_section('social_icon_setting', array(
        'title' => __('Social Icons', 'ideabox'),
        'priority' => 62,
    ));

    // link url
    $wp_customize->add_setting('facebook_link_url', array('default' => __('', 'ideabox'),
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('facebook_link_url', array(
        'label' => __('Facebook URL', 'ideabox'),
        'section' => 'social_icon_setting',
        'settings' => 'facebook_link_url',
        'priority' => 1,
    ));

    // link url
    $wp_customize->add_setting('twitter_link_url', array('default' => __('', 'ideabox'),
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('twitter_link_url', array(
        'label' => __('Twitter URL', 'ideabox'),
        'section' => 'social_icon_setting',
        'settings' => 'twitter_link_url',
        'priority' => 2,
    ));

    // link url
    $wp_customize->add_setting('googleplus_link_url', array('default' => __('', 'ideabox'),
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('googleplus_link_url', array(
        'label' => __('Google Plus URL', 'ideabox'),
        'section' => 'social_icon_setting',
        'settings' => 'googleplus_link_url',
        'priority' => 3,
    ));

    // link url
    $wp_customize->add_setting('pinterest_link_url', array('default' => __('', 'ideabox'),
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('pinterest_link_url', array(
        'label' => __('Pinterest URL', 'ideabox'),
        'section' => 'social_icon_setting',
        'settings' => 'pinterest_link_url',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('github_link_url', array('default' => __('', 'ideabox'),
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('github_link_url', array(
        'label' => __('Github URL', 'ideabox'),
        'section' => 'social_icon_setting',
        'settings' => 'github_link_url',
        'priority' => 5,
    ));

    // link url
    $wp_customize->add_setting('youtube_link_url', array('default' => __('', 'ideabox'),
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('youtube_link_url', array(
        'label' => __('Youtube URL', 'ideabox'),
        'section' => 'social_icon_setting',
        'settings' => 'youtube_link_url',
        'priority' => 6,
    ));
    
    $wp_customize->add_setting('dribbble_link_url', array('default' => __('', 'ideabox'),
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('dribbble_link_url', array(
        'label' => __('Dribble URL', 'ideabox'),
        'section' => 'social_icon_setting',
        'settings' => 'dribbble_link_url',
        'priority' => 7,
    ));
    
    $wp_customize->add_setting('tumblr_link_url', array('default' => __('', 'ideabox'),
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('tumblr_link_url', array(
        'label' => __('Tumblr URL', 'ideabox'),
        'section' => 'social_icon_setting',
        'settings' => 'tumblr_link_url',
        'priority' => 8,
    ));
    
    $wp_customize->add_setting('flickr_link_url', array('default' => __('', 'ideabox'),
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('flickr_link_url', array(
        'label' => __('Flickr URL', 'ideabox'),
        'section' => 'social_icon_setting',
        'settings' => 'flickr_link_url',
        'priority' => 9,
    ));
    
    $wp_customize->add_setting('vimeo_link_url', array('default' => __('', 'ideabox'),
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('vimeo_link_url', array(
        'label' => __('Vimeo URL', 'ideabox'),
        'section' => 'social_icon_setting',
        'settings' => 'vimeo_link_url',
        'priority' => 10,
    ));
    
    $wp_customize->add_setting('linkedin_link_url', array('default' => __('', 'ideabox'),
        'sanitize_callback' => 'ideabox_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('linkedin_link_url', array(
        'label' => __('Linkedin URL', 'ideabox'),
        'section' => 'social_icon_setting',
        'settings' => 'linkedin_link_url',
        'priority' => 11,
    ));
    
    // Add footer text section
    $wp_customize->add_section('ideabox_footer', array(
        'title' => 'Footer Text', // The title of section
        'priority' => 65,
    ));

    $wp_customize->add_setting('ideabox_footer_footer_text', array(
        'default' => null,
        'sanitize_js_callback' => 'ideabox_sanitize_escaping',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new ideabox_customize_textarea_control($wp_customize, 'ideabox_footer_footer_text', array(
        'section' => 'ideabox_footer', // id of section to which the setting belongs
        'settings' => 'ideabox_footer_footer_text',
    )));


    // Add custom CSS section
    $wp_customize->add_section('ideabox_custom_css', array(
        'title' => 'Custom CSS', // The title of section
        'priority' => 80,
    ));

    $wp_customize->add_setting('ideabox_custom_css', array(
        'default' => '',
        'sanitize_callback' => 'ideabox_sanitize_custom_css',
        'sanitize_js_callback' => 'ideabox_sanitize_escaping',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new ideabox_customize_textarea_control($wp_customize, 'ideabox_custom_css', array(
        'section' => 'ideabox_custom_css', // id of section to which the setting belongs
        'settings' => 'ideabox_custom_css',
    )));



    //remove default customizer sections
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('colors');

    // add post message for various customizer settings 
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
}

add_action('customize_register', 'ideabox_customize_register');



/*
 * 
 * sanitize Text field
 * 
 * @since Ideabox 1.0
 * 
 */

function ideabox_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}


/*
 * Sanitize numeric values 
 * 
 * @since Ideabox 1.0
 */

function ideabox_sanitize_integer($input) {
    if (is_numeric($input)) {
        return intval($input);
    }
}

/*
 * Escaping for input values
 * 
 * @since Ideabox 1.0
 */

function ideabox_sanitize_escaping($input) {
    $input = esc_attr($input);
    return $input;
}

/*
 * Sanitize Custom CSS 
 * 
 * @since Ideabox 1.0
 */

function ideabox_sanitize_custom_css($input) {
    $input = wp_kses_stripslashes($input);
    return $input;
}

/*
 * Sanitize Checkbox input values
 * 
 * @since Ideabox 1.0
 */

function ideabox_sanitize_checkbox($input) {
    if ($input) {
        $output = '1';
    } else {
        $output = false;
    }
    return $output;
}

/*
 * Sanitize color scheme options 
 * 
 * @since Ideabox 1.0
 */

function ideabox_sanitize_color_scheme_option($colorscheme_option) {
    if (!in_array($colorscheme_option, array('blue', 'red', 'green', 'yellow', 'purple', 'orange', 'brown', 'pink'))) {
        $colorscheme_option = 'blue';
    }

    return $colorscheme_option;
}


/*
 * Sanitize Hex Color for 
 * Background Color options
 * 
 * @since Ideabox 1.0
 */

function ideabox_sanitize_hex_color($color) {
    if ($unhashed = sanitize_hex_color_no_hash($color)) {
        return '#' . $unhashed;
    }
    return $color;
}

/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Ideabox 1.0
 */
function ideabox_customize_preview_js() {
    wp_enqueue_script('ideabox_customizer', get_template_directory_uri() . '/includes/js/customizer.js', array('customize-preview'), rand(), true);
}

add_action('customize_preview_init', 'ideabox_customize_preview_js');

function ideabox_header_output() {
    ?>
    <!--Customizer CSS--> 
    <style type="text/css">
    <?php echo esc_attr(get_theme_mod('ideabox_custom_css')); ?>
    </style> 
    <!--/Customizer CSS-->
    <?php
}

// Output custom CSS to live site
add_action('wp_head', 'ideabox_header_output');

function ideabox_footer_tracking_code() {
    echo get_theme_mod('tracking_code');
}

add_action('wp_footer', 'ideabox_footer_tracking_code');

/**
 * Change theme colors based on theme options from customizer.
 *
 * @since Ideabox 1.0
 */
function ideabox_background_image() {
    
    $background_slider = get_theme_mod('slider_background_image');
    $background_testimonial = get_theme_mod('testimonial_background_image');

    // If we get this far, we have custom styles.
    ?>
    <style type="text/css" id="ideabox-background-image-css">
        
    <?php if (get_theme_mod('slider_background_image')) { ?>
            .slider-wrapper{
                background-image:url('<?php echo $background_slider ?>');
            }
    <?php } ?>
            
    <?php if (get_theme_mod('testimonial_background_image')) { ?>
            .testimonial-area{
                background-image:url('<?php echo $background_testimonial ?>');
            }
    <?php } ?>
    
    </style>

    <?php
}

add_action('wp_head', 'ideabox_background_image');

/**
 * Change theme background colors based on theme options from customizer.
 *
 * @since Ideabox 1.0
 */
function ideabox_background_color() {

    $background_slider = get_theme_mod('ideabox_home_slider_color');
    $background_portfolio = get_theme_mod('ideabox_portfolio_background_color');
    $background_blog = get_theme_mod('ideabox_blog_background_color');
    $background_team = get_theme_mod('ideabox_team_background_color');
    $background_video = get_theme_mod('ideabox_video_color');
    $background_gallery = get_theme_mod('ideabox_gallery_color');
    $background_testimonial = get_theme_mod('ideabox_testimonial_color');
    $background_cta = get_theme_mod('ideabox_cta_color');
    $background_contact = get_theme_mod('ideabox_contact_color');

    // If we get this far, we have custom styles.
    ?>

    <style type="text/css" id="ideabox-background-color-css">
    <?php if (get_theme_mod('ideabox_home_slider_color')) { ?>
            .slider-wrapper{
                background:<?php echo $background_slider ?>;
            }
    <?php } ?>
                    
    <?php if (get_theme_mod('ideabox_portfolio_background_color')) { ?>
            .portfolio-area{
                background:<?php echo $background_portfolio ?>;
            }
    <?php } ?>
                
    <?php if (get_theme_mod('ideabox_blog_background_color')) { ?>
            .blog-area{
                background:<?php echo $background_blog ?>;
            }
    <?php } ?>
                
    <?php if (get_theme_mod('ideabox_team_background_color')) { ?>
            .team-member-area{
                background:<?php echo $background_team ?>;
            }
    <?php } ?>
                
    <?php if (get_theme_mod('ideabox_video_color')) { ?>
        .home-video-area{
            background:<?php echo $background_video ?>;
        }
    <?php } ?>
        
    <?php if (get_theme_mod('ideabox_gallery_color')) { ?>
            .gallery-area{
                background:<?php echo $background_gallery ?>;
            }
    <?php } ?>
            
    <?php if (get_theme_mod('ideabox_testimonial_color')) { ?>
            .testimonial-area{
                background:<?php echo $background_testimonial ?>;
            }
    <?php } ?>
            
    <?php if (get_theme_mod('ideabox_cta_color')) { ?>
            .cta-area{
                background:<?php echo $background_cta ?>;
            }
    <?php } ?>
            
     <?php if (get_theme_mod('ideabox_contact_color')) { ?>
            .contact-area{
                background:<?php echo $background_contact ?>;
            }
    <?php } ?>
            
    </style>

    <?php
}

add_action('wp_head', 'ideabox_background_color');

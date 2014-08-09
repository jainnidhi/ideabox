/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

jQuery(document).ready(function($) {
    // Site title and description.
    wp.customize('blogname', function(value) {
        value.bind(function(to) {
            $('.site-title a').text(to);
        });
    });
    wp.customize('blogdescription', function(value) {
        value.bind(function(to) {
            $('.site-description').text(to);
        });
    });
    wp.customize('facebook_link_url', function(value) {
        value.bind(function(to) {
            $('.superb-fb a').attr('href', to);
        });
    });
    wp.customize('twitter_link_url', function(value) {
        value.bind(function(to) {
            $('.social-links .superb-twitter a').attr('href', to);
        });
    });
    wp.customize('googleplus_link_url', function(value) {
        value.bind(function(to) {
            $('.social-links .superb-gplus a').attr('href', to);
        });
    });
    wp.customize('pinterest_link_url', function(value) {
        value.bind(function(to) {
            $('.social-links .superb-pinterest a').attr('href', to);
        });
    });
    wp.customize('github_link_url', function(value) {
        value.bind(function(to) {
            $('.social-links .superb-github a').attr('href', to);
        });
    });
    wp.customize('youtube_link_url', function(value) {
        value.bind(function(to) {
            $('.social-links .superb-youtube a').attr('href', to);
        });
    });
    wp.customize('slider_one', function(value) {
        value.bind(function(to) {
            $('#slider1 img').attr('src', to);
        });
    });
    wp.customize('slider_title_one', function(value) {
        value.bind(function(to) {
            $('#slider1 .flex-caption h2').text(to);
        });
    });
    wp.customize('slider_one_description', function(value) {
        value.bind(function(to) {
            $('#slider1 .flex-caption p').text(to);
        });
    });
    wp.customize('slider_one_link_url', function(value) {
        value.bind(function(to) {
            $('#slider1 .flex-caption .slider-button').attr('href', to);
        });
    });
    wp.customize('slider_one_link_text', function(value) {
        value.bind(function(to) {
            $('#slider1 .flex-caption .slider-button').text(to);
        });
    });

    wp.customize('slider_two', function(value) {
        value.bind(function(to) {
            $('#slider2 img').attr('src', to);
        });
    });
    wp.customize('slider_title_two', function(value) {
        value.bind(function(to) {
            $('#slider2 .flex-caption h2').text(to);
        });
    });
    wp.customize('slider_two_description', function(value) {
        value.bind(function(to) {
            $('#slider2 .flex-caption p').text(to);
        });
    });
    wp.customize('slider_two_link_url', function(value) {
        value.bind(function(to) {
            $('#slider2 .flex-caption .slider-button').attr('href', to);
        });
    });
    wp.customize('slider_two_link_text', function(value) {
        value.bind(function(to) {
            $('#slider2 .flex-caption .slider-button').text(to);
        });
    });

    wp.customize('slider_three', function(value) {
        value.bind(function(to) {
            $('#slider3 img').attr('src', to);
        });
    });
    wp.customize('slider_title_three', function(value) {
        value.bind(function(to) {
            $('#slider3 .flex-caption h2').text(to);
        });
    });
    wp.customize('slider_three_description', function(value) {
        value.bind(function(to) {
            $('#slider3 .flex-caption p').text(to);
        });
    });
    wp.customize('slider_three_link_url', function(value) {
        value.bind(function(to) {
            $('#slider3 .flex-caption .slider-button').attr('href', to);
        });
    });
    wp.customize('slider_three_link_text', function(value) {
        value.bind(function(to) {
            $('#slider3 .flex-caption .slider-button').text(to);
        });
    });

    wp.customize('slider_four', function(value) {
        value.bind(function(to) {
            $('#slider4 img').attr('src', to);
        });
    });
    wp.customize('slider_title_four', function(value) {
        value.bind(function(to) {
            $('#slider4 .flex-caption h2').text(to);
        });
    });
    wp.customize('slider_four_description', function(value) {
        value.bind(function(to) {
            $('#slider4 .flex-caption p').text(to);
        });
    });
    wp.customize('slider_four_link_url', function(value) {
        value.bind(function(to) {
            $('#slider4 .flex-caption .slider-button').attr('href', to);
        });
    });
    wp.customize('slider_four_link_text', function(value) {
        value.bind(function(to) {
            $('#slider4 .flex-caption .slider-button').text(to);
        });
    });

    wp.customize('slider_five', function(value) {
        value.bind(function(to) {
            $('#slider5 img').attr('src', to);
        });
    });
    wp.customize('slider_title_five', function(value) {
        value.bind(function(to) {
            $('#slider5 .flex-caption h2').text(to);
        });
    });
    wp.customize('slider_five_description', function(value) {
        value.bind(function(to) {
            $('#slider5 .flex-caption p').text(to);
        });
    });
    wp.customize('slider_five_link_url', function(value) {
        value.bind(function(to) {
            $('#slider5 .flex-caption .slider-button').attr('href', to);
        });
    });
    wp.customize('slider_five_link_text', function(value) {
        value.bind(function(to) {
            $('#slider5 .flex-caption .slider-button').text(to);
        });
    });

    wp.customize('tagline_title', function(value) {
        value.bind(function(to) {
            $('.business-tagline h3').text(to);
        });
    });
    wp.customize('tagline_description', function(value) {
        value.bind(function(to) {
            $('.business-tagline p').text(to);
        });
    });

    wp.customize('home_title_one', function(value) {
        value.bind(function(to) {
            $('.home-featured-one h3').text(to);
        });
    });

    wp.customize('home_description_one', function(value) {
        value.bind(function(to) {
            $('.home-featured-one p').text(to);
        });
    });

    wp.customize('home_title_two', function(value) {
        value.bind(function(to) {
            $('.home-featured-two h3').text(to);
        });
    });

    wp.customize('home_description_two', function(value) {
        value.bind(function(to) {
            $('.home-featured-two p').text(to);
        });
    });

    wp.customize('home_title_three', function(value) {
        value.bind(function(to) {
            $('.home-featured-three h3').text(to);
        });
    });

    wp.customize('home_description_three', function(value) {
        value.bind(function(to) {
            $('.home-featured-three p').text(to);
        });
    });

    wp.customize('video_title', function(value) {
        value.bind(function(to) {
            $('.video-content h3').text(to);
        });
    });

    wp.customize('video_description', function(value) {
        value.bind(function(to) {
            $('.video-content p').text(to);
        });
    });

    wp.customize('video_code_title', function(value) {
        value.bind(function(to) {
            $('.video-code h3').text(to);
        });
    });

    wp.customize('home_video', function(value) {
        value.bind(function(to) {
            $('.video-code').text(to);
        });
    });

    wp.customize('ideabox_team_title', function(value) {
        value.bind(function(to) {
            $('.team-member-area h3').text(to);
        });
    });

    wp.customize('team_description', function(value) {
        value.bind(function(to) {
            $('.team-member-area p').text(to);
        });
    });
    
    wp.customize('gallery_title', function(value) {
        value.bind(function(to) {
            $('.gallery-title').text(to);
        });
    });
    
    wp.customize('ideabox_gallery', function(value) {
        value.bind(function(to) {
            $('.gallery-wrap').text(to);
        });
    });

    wp.customize('tslider_one', function(value) {
        value.bind(function(to) {
            $('#tslider1 img').attr('src', to);
        });
    });
    wp.customize('tslider_one_description', function(value) {
        value.bind(function(to) {
            $('#tslider1 p').text(to);
        });
    });

    wp.customize('client_name_one', function(value) {
        value.bind(function(to) {
            $('#tslider1 .client-name a').text(to);
        });
    });
    wp.customize('client_name_url_one', function(value) {
        value.bind(function(to) {
            $('#tslider1 .client-name a').attr('href', to);
        });
    });

    wp.customize('tslider_two', function(value) {
        value.bind(function(to) {
            $('#tslider2 img').attr('src', to);
        });
    });
    wp.customize('tslider_two_description', function(value) {
        value.bind(function(to) {
            $('#tslider2 p').text(to);
        });
    });
    wp.customize('client_name_two', function(value) {
        value.bind(function(to) {
            $('#tslider2 .client-name a').text(to);
        });
    });
    wp.customize('client_name_url_two', function(value) {
        value.bind(function(to) {
            $('#tslider2 .client-name a').attr('href', to);
        });
    });
    wp.customize('tslider_three', function(value) {
        value.bind(function(to) {
            $('#tslider3 img').attr('src', to);
        });
    });
    wp.customize('tslider_three_description', function(value) {
        value.bind(function(to) {
            $('#tslider3 p').text(to);
        });
    });
    wp.customize('client_name_three', function(value) {
        value.bind(function(to) {
            $('#tslider3 .client-name a').text(to);
        });
    });
    wp.customize('client_name_url_three', function(value) {
        value.bind(function(to) {
            $('#tslider3 .client-name a').attr('href', to);
        });
    });
    wp.customize('tslider_four', function(value) {
        value.bind(function(to) {
            $('#tslider4 img').attr('src', to);
        });
    });
    wp.customize('tslider_four_description', function(value) {
        value.bind(function(to) {
            $('#tslider4 p').text(to);
        });
    });
    wp.customize('client_name_four', function(value) {
        value.bind(function(to) {
            $('#tslider4 .client-name a').text(to);
        });
    });
    wp.customize('client_name_url_four', function(value) {
        value.bind(function(to) {
            $('#tslider4 .client-name a').attr('href', to);
        });
    });

    wp.customize('ideabox_portfolio_title', function(value) {
        value.bind(function(to) {
            $('.home-portfolio-title h3').text(to);
        });
    });
    wp.customize('portfolio_description', function(value) {
        value.bind(function(to) {
            $('.home-portfolio-title p').text(to);
        });
    });
    
    wp.customize('ideabox_portfolio_page_title', function(value) {
        value.bind(function(to) {
            $('.portfolio-page h1').text(to);
        });
    });
    wp.customize('portfolio_page_description', function(value) {
        value.bind(function(to) {
            $('.portfolio-page p').text(to);
        });
    });

    wp.customize('cta_title', function(value) {
        value.bind(function(to) {
            $('.cta-title').text(to);
        });
    });
    wp.customize('ideabox_cta', function(value) {
        value.bind(function(to) {
            $('.cta-wrapper').text(to);
        });
    });
     wp.customize('cta_link_url', function(value) {
        value.bind(function(to) {
            $('.cta-button').attr('href', to);
        });
    });
    wp.customize('cta_link_text', function(value) {
        value.bind(function(to) {
            $('.cta-button').text(to);
        });
    });    

    wp.customize('ideabox_post_title', function(value) {
        value.bind(function(to) {
            $('.home-post-title h3').text(to);
        });
    });
    wp.customize('ideabox_post_description', function(value) {
        value.bind(function(to) {
            $('.home-post-title p').text(to);
        });
    });

    wp.customize('contact_title', function(value) {
        value.bind(function(to) {
            $('.home-contact-form h3').text(to);
        });
    });
    wp.customize('contact_description', function(value) {
        value.bind(function(to) {
            $('.home-contact-form .description').text(to);
        });
    });

    wp.customize('ideabox_contact_form', function(value) {
        value.bind(function(to) {
            $('.contact-form-wrapper').text(to);
        });
    });

    wp.customize('map_title', function(value) {
        value.bind(function(to) {
            $('.contact-map h3').text(to);
        });
    });

    wp.customize('home_map', function(value) {
        value.bind(function(to) {
            $('.map-code').text(to);
        });
    });

    wp.customize('contact_email', function(value) {
        value.bind(function(to) {
            $('.contact-details #email').text(to);
        });
    });

    wp.customize('contact_phone', function(value) {
        value.bind(function(to) {
            $('.contact-details #phone').text(to);
        });
    });
    wp.customize('ideabox_footer_footer_text', function(value) {
        value.bind(function(to) {
            $('.site-info').text(to);
        });
    });
    // Header text color.
    wp.customize('header_textcolor', function(value) {
        value.bind(function(to) {
            if ('blank' === to) {
                $('.site-title, .site-description').css({
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                });
            } else {
                $('.site-title, .site-description').css({
                    'clip': 'auto',
                    'color': to,
                    'position': 'relative'
                });
            }
        });
    });
});

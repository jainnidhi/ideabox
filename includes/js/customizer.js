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

    wp.customize('home_featured_left', function(value) {
        value.bind(function(to) {
            $('.home-featured-left').text(to);
        });
    });

    wp.customize('home_featured_right', function(value) {
        value.bind(function(to) {
            $('.home-featured-right').text(to);
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

    wp.customize('ideabox_edd_store_archives_title', function(value) {
        value.bind(function(to) {
            $('.front-featured-products .store-title').text(to);
        });
    });
    wp.customize('ideabox_edd_store_archives_description', function(value) {
        value.bind(function(to) {
            $('.front-featured-products .description').text(to);
        });
    });

    wp.customize('ideabox_edd_store_link_url', function(value) {
        value.bind(function(to) {
            $('.store-button .button').attr('href', to);
        });
    });
    wp.customize('ideabox_edd_store_link_text', function(value) {
        value.bind(function(to) {
            $('.store-button .button').text(to);
        });
    });

    wp.customize('store_page_title', function(value) {
        value.bind(function(to) {
            $('.store-template .store-title').text(to);
        });
    });
    wp.customize('store_page_description', function(value) {
        value.bind(function(to) {
            $('.store-description').text(to);
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

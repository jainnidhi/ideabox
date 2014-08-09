/* 
 * This file contains calls to various javascript files
 * 
 * Editing this file might lead to some broken theme features.
 * 
 */

/* Add a custom back to top button */
jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });


    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    });
    
    
   jQuery(function() {
        jQuery('.featured-products').mixItUp();
    });
    
});

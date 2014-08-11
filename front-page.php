<?php
/**
 * 
 * Description: Displays a full-width front page. The front page template provides an optional
 * featured section that allows for highlighting a key message. It can contain up to 2 widget areas,
 * in one or two columns. These widget areas are dynamic so if only one widget is used, it will be
 * displayed in one column. If two are used, then they will be displayed over 2 columns.
 * There are also four front page only widgets displayed just beneath the two featrued widgets. Like the
 * featured widgets, they will be displayed in anywhere from one to four columns, depending on
 * how many widgets are active.
 * 
 * The front page template also displays EDD featured products and featured posts 
 * depending on the settings from Theme Customizer 
 *
 * @package Ideabox
 * @since Ideabox 1.0
 */
get_header();
?>


<section class="slider-wrapper clearfix">
    <div class="container slider-block">
        <div class="row">
      <div class="col-lg-12">
          <div class="home-featured-left col-lg-6">
              <?php if(get_theme_mod('home_featured_left')) { ?>
              <?php echo get_theme_mod('home_featured_left'); ?>
              <?php } else { ?>
              <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/slider-1.jpg" alt="first-slider-image"/>
              <?php } ?>
          </div>
          <div class="home-featured-right col-lg-6">
              <?php if(get_theme_mod('home_featured_right')) { ?>
              <?php echo get_theme_mod('home_featured_right'); ?>
              <?php } else { ?>
              <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'ideabox') ?></p>
              <?php } ?>
          </div>
          
      </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.slider-wrapper -->

 <section class="home-featured-area">
     <div class="container">
         <div class="row">
        
            <div class="home-featured clearfix">
                <div class="home-featured-one col-lg-4 col-md-4 col-sm-4 col-xs-12" data-scroll-reveal="enter from the bottom after 0.2s">
                    <div class="featured">
                    <?php if ( get_theme_mod('home_featured_one') !='' ) {  ?>
                     <div class="featured-image"><?php echo get_theme_mod('home_featured_one'); ?></div>
                    <?php } else {  ?>
                     <div class="featured-image"><i class="fa-th-large fa"></i></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_one') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_one')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Our Products', 'ideabox') ?></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_one') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_one')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Showcase your best quality products on home page to grab visitor&rsquo;s attention.', 'ideabox') ?> </p>
                                           <?php } ?>

                    </div>
                </div>

                <div class="home-featured-two col-lg-4 col-md-4 col-sm-4 col-xs-12" data-scroll-reveal="enter from the bottom after 0.2s">
                    <div class="featured">
                    <?php if ( get_theme_mod('home_featured_two') !='' ) {  ?>
                     <div class="featured-image"><?php echo get_theme_mod('home_featured_two'); ?></div>
                    <?php } else {  ?>
                     <div class="featured-image"><i class="fa-gittip fa"></i></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_two') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_two')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Our Services', 'ideabox') ?></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_two') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_two')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Show your multiple services that will explore your website among the audience.', 'ideabox') ?> </p>
                                           <?php } ?>

                    </div>
                </div>


                <div class="home-featured-three col-lg-4 col-md-4 col-sm-4 col-xs-12" data-scroll-reveal="enter from the bottom after 0.2s">
                    <div class="featured">
                    <?php if ( get_theme_mod('home_featured_three') !='' ) {  ?>
                     <div class="featured-image"><?php echo get_theme_mod('home_featured_three'); ?></div>
                    <?php } else {  ?>
                     <div class="featured-image"><i class=" fa-twitter fa"></i></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_three') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_three')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Our Clients', 'ideabox') ?></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_three') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_three')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Show testimonials of your clients that will build the trust among the audience.', 'ideabox') ?> </p>
                                           <?php } ?>

                    </div>
                </div>
               
            </div>
         </div><!-- /.row -->
     </div> <!-- /.container -->
    </section><!-- end home featured area -->
   
    
    <?php if(get_theme_mod('ideabox_cta_section_check')) { ?>
    <div class="cta-area">
        <div class="container cta-wrap">
            <div class="row">
                <div class="cta-left col-lg-6">
                    <?php if ( get_theme_mod('cta_title') !='' ) {  ?><h3 class="cta-title"><?php echo esc_html(get_theme_mod('cta_title')); ?></h3>

                          <?php } else {  ?> <h3 class="cta-title"><?php esc_html_e('CTA Title', 'ideabox') ?></h3>
                                   <?php } ?>
             
                        <div class="cta-wrapper">
                                 <?php if ( get_theme_mod('ideabox_cta') !='' ) {  ?> 
                                  <?php echo do_shortcode(get_theme_mod('ideabox_cta')); ?>
                                 <?php } else { ?>
                                 <?php esc_html_e('You can add your cta text here.', 'ideabox'); ?> 
                                   <?php } ?>
                         </div>
                </div>
                <div class="cta-right col-lg-6">
                    <?php if ( get_theme_mod('cta_link_url') !='' && get_theme_mod('cta_link_text') !=''  ) {  ?>
                            <a class="cta-button" href="<?php echo esc_url(get_theme_mod('cta_link_url')); ?>">
                              <?php echo esc_html(get_theme_mod('cta_link_text')); ?>
                            </a>
                    <?php } else { ?>
                           <a class="cta-button" href="#">
                              <?php esc_html_e('Read More', 'ideabox'); ?>
                            </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    
  <?php get_template_part('content', 'frontproducts'); ?>         
<?php
get_footer();
?>
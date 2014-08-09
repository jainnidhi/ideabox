<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Ideabox
 */
?>

<?php if(!is_front_page() && !is_single() && !is_page_template( 'template-store.php' ) && !is_page_template( 'checkout-template.php' )) { ?>
			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->
<?php } ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="row">
                    <div class="site-footer-inner-wrap">
                        <?php
                                // Count how many footer sidebars are active so we can work out how many containers we need
                                $footerSidebars = 0;
                                for ($x = 1; $x <= 4; $x++) {
                                    if (is_active_sidebar('sidebar-footer' . $x)) {
                                        $footerSidebars++;
                                    }
                                }

                                // If there's one or more one active sidebars, create a row and add them
                                if ($footerSidebars > 0) {
                                    ?>
                                   
                                        <?php
                                        // Work out the container class name based on the number of active footer sidebars
                                        $containerClass = "col-sm-" . 12 / $footerSidebars;

                                    // Display the active footer sidebars
                                    for ($x = 1; $x <= 4; $x++) {
                                        if (is_active_sidebar('sidebar-footer' . $x)) {
                                            ?>
                                            <div id="<?php echo 'footer-widget' . $x; ?>" class="<?php echo $containerClass ?>">
                                                <div class="widget-area" role="complementary">
                                            <?php dynamic_sidebar('sidebar-footer' . $x); ?>
                                          </div>
                                      </div> <!-- /.col.<?php echo $containerClass ?> -->
                              <?php }
                          }
                                }
                          ?>
				

			</div>
                    <div class="contact-details">
                        <ul><?php if ( get_theme_mod('contact_email') !='' ) {  ?><li id="email"><?php echo esc_html(get_theme_mod('contact_email')); ?></li>

                          <?php } else {  ?> <li id="email"> <?php esc_html_e('hello@ideaboxcreations.com', 'ideabox') ?></li>
                                   <?php } ?>

                          <?php if ( get_theme_mod('contact_phone') !='' ) {  ?><li id="phone"><?php echo esc_html(get_theme_mod('contact_phone')); ?></li>

                          <?php } else {  ?> <li id="phone"><?php esc_html_e('0294-678456', 'ideabox') ?></li>
                                   <?php } ?>
                          </ul>
                    </div>
                   
			<div class="site-footer-inner col-lg-12">

				<div class="site-info">
				
                                        <?php if(get_theme_mod('ideabox_footer_footer_text')) { ?>
                                        <?php echo esc_html(get_theme_mod('ideabox_footer_footer_text')); ?>
                                        <?php } else { ?>
                                        <p>
                                            <a href="<?php $ideabox_theme = wp_get_theme(); echo $ideabox_theme->get( 'ThemeURI' ); ?>">
                                                <?php _e('Ideabox WordPress theme by IdeaBox', 'ideabox'); ?>
                                            </a>
                                        </p>
                                        <?php } ?>
                                        
				</div><!-- close .site-info -->

			</div>
		</div>
            
	</div><!-- close .container -->
</footer><!-- close #colophon -->
<span class="top"><a class="back-to-top"><i class="fa fa-arrow-up"></i></a></span>
            
  
<?php wp_footer(); ?>

</body>
</html>
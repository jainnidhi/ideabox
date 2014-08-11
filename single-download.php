<?php get_header(); ?>
<div class="product-summary">
    <div class="container">
        <div class="row">
            <h2 class="title"><?php the_title(); ?></h2>
                <div class="summary"><?php the_excerpt(); ?></div>

                <?php if (function_exists('edd_price')) { ?>
                     <div class="product-buttons clearfix">
                 <?php if (!edd_has_variable_prices(get_the_ID())) { ?>
                         <?php echo edd_get_purchase_link(get_the_ID(), __('Add to Cart','ideabox'), 'button'); ?>
                     <?php } ?>

                     <a class="demo-button" href="<?php 
                         $ideabox_demo_button = get_post_meta( get_the_ID(), '_download_demo_link', true );
                         // check if the custom field has a value
                         if( ! empty( $ideabox_demo_button ) ) {
                           echo $ideabox_demo_button;
                         } 
                         ?>"> View Demo
                     </a>
                 </div><!--end .product-buttons-->
             <?php } ?>   
                 <div class="product-image">
                     <?php the_post_thumbnail('product-image-large'); ?>
                 </div>
        </div>
    </div>
</div>

<div class="main-content">
	<div class="container">
		<div class="row">
                  
        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>
                      
                        
                <?php if (is_active_sidebar('sidebar_shop')) { ?>
                    <div class="col-lg-8 main-content-inner">
                    <?php } else { ?>
                        <div class="col-lg-12 last main-content-inner">
                        <?php } ?> 
                       
                            <div id="post-<?php the_ID(); ?>" <?php post_class('entry product-content'); ?>>
                                
                                 <?php the_content(__('Read the rest of this entry &raquo;','ideabox')); ?>
                         
                            </div><!--end .product-content.entry-->
                           
                <?php endwhile; ?>

            <?php else : ?>

                <div class="entry product-content not-found">

                    <h2 class="title"><?php _e('Not Found','ideabox'); ?></h2>
                    <p><?php _e('Sorry, but you are looking for something that is not here.','ideabox'); ?></p>
                    <?php get_search_form(); ?>

                </div><!--end .product-content.entry-->


            <?php endif; ?>
                <?php get_sidebar('shop'); ?>
                </div><!-- /.row -->
	</div><!-- close .container -->
    </div><!-- close .main-content -->
    

        
    <?php get_footer(); ?>
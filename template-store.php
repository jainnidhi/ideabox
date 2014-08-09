<?php
/**
 * Template Name: Store
 * 
 * A custom store page template to display product grid
 * Requires Easy Digital Downloads plugin to be activated
 * 
 * @package : SmartShop
 * @version : 1.0
 * @since : 1.0 
 * 
 */
get_header(); ?>


<div class="main-content">
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner store-template col-lg-12">
                            <h2 class="store-title"><?php the_title(); ?></h2>
        <?php
        $current_page = get_query_var('paged');
        $per_page = intval(get_theme_mod('ideabox_store_front_count'));
        $offset = $current_page > 0 ? $per_page * ($current_page - 1) : 0;
        $product_args = array(
            'post_type' => 'download',
            'posts_per_page' => $per_page,
            'offset' => $offset
        );
        $products = new WP_Query($product_args);
        ?>
        <?php if ($products->have_posts()) : $i = 1; ?>
            <?php while ($products->have_posts()) : $products->the_post(); ?>

                <div id="post-<?php the_ID(); ?>" class="col-lg-4 product<?php if ($i % 4 == 0) { echo ' last'; } ?>">


                    
                    <div class="product-image">
                        <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('product-image'); ?>
                        </a>
                           
                    </div>
                    <div class="product-info">
                        <a href="<?php the_permalink(); ?>">
                            <h2 class="title"><?php the_title(); ?></h2>
                        </a>
                        <?php the_excerpt(); ?>
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
                    </div>
                </div><!--end .product-->
                    <?php $i+=1; ?>
                <?php endwhile; ?>

            <div class="pagination">
                <?php
                $big = 999999999; // need an unlikely intege					
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $products->max_num_pages
                ));
                ?>
            </div>
        <?php else : ?>
                <h2 class="title"><?php _e('Not Found', 'ideabox'); ?></h2>
                <p><?php _e('Sorry, but you are looking for something that is not here.', 'ideabox'); ?></p>
                <?php get_search_form(); ?>

<?php endif; ?>
    </div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->

<?php get_footer(); ?>

<?php
/**
 * The template for displaying featured products on Front Page 
 *
 * @package Ideabox
 * @since Ideabox 1.0
 */
?>

<?php
if (class_exists('Easy_Digital_Downloads')) {

    // check if user has enabled featured products for front page
    if (get_theme_mod('ideabox_edd_front_featured_products')) {  ?>
<section class="front-featured-products">
    <div class="container">
        <div class="row">
        <div class="store-info">
            <?php if (get_theme_mod('ideabox_edd_store_archives_title')) { ?>
                <h2 class="store-title"><?php echo esc_html(get_theme_mod('ideabox_edd_store_archives_title')); ?></h2>
            <?php } else { ?>
                <h2 class="store-title"><?php esc_html_e('Latest Products', 'ideabox'); ?></h2>
            <?php } ?>
                
                <?php if (get_theme_mod('ideabox_edd_store_archives_description')) { ?>
                <div class="store-description">
                    <p class="description"><?php echo esc_html(get_theme_mod('ideabox_edd_store_archives_description')); ?></p>
                </div>
                <?php } else { ?>
                <p class="description">You can add here product description.</p>
                <?php } ?>
        </div>
            
            <ul id="filters">
                    <?php
                        $terms = get_terms('download_category');
                        $count = count($terms);
                            echo '<li><a href="javascript:void(0)" data-filter="all" class="filter active">All</a></li>';
                        if ( $count > 0 ){

                            foreach ( $terms as $term ) {

                                $termname = strtolower($term->name);
                                $termname = str_replace(' ', '-', $termname);
                                $slug = $term->slug;
                                echo '<li><a href="javascript:void(0)" class="filter" data-filter=".'.$slug.'">'.$term->name.'</a></li>';
                            }
                        }
                    ?>
                </ul>

        <div id="home-featured">
            <div class="featured-products clearfix">

                <?php
                if (class_exists('Easy_Digital_Downloads')) {
                    $per_page = absint(get_theme_mod('ideabox_store_front_featured_count'));
                    $product_args = array(
                        'post_type' => 'download',
                        'posts_per_page' => $per_page,
                        'tax_query' => array (
        					array ( 
					            'taxonomy' => 'download_category',
					            'field' => 'slug',
					            'terms' => 'wporg',
					            'operator' => 'NOT IN'
						        )
    						)
                    );
                    $products = new WP_Query($product_args);
                    ?>
            <?php if ($products->have_posts()) : $i = 1; ?>
                <?php while ($products->have_posts()) : $products->the_post(); ?>
                
                <?php 
                    $terms = get_the_terms( $post->ID, 'download_category' );	
                    if ( $terms && ! is_wp_error( $terms ) ) : 

                        $links = array();

                        foreach ( $terms as $term ) {
                            $links[] = $term->slug;
                        }

                        $tax_links = join( " ", str_replace(' ', '-', $links));          
                        $tax = strtolower($tax_links);
                    else :	
                        $tax = '';					
                    endif; 
                     $containerClass = $tax; 
                     ?>
                            <div class="col-lg-4 product all mix<?php if ($i % 3 == 0) { echo ' last'; } ?> <?php echo $containerClass; ?>">

                                <div class="product-image">
                                    <a href="<?php the_permalink(); ?>">
                                         <?php the_post_thumbnail('product-image'); ?>
                                    </a>
                                    
                                    <div class="product-info">
                                            <h3 class="title">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>

                                        <div class="product-description">
                                            <?php the_excerpt(); ?>
                                        </div> <!-- end .product-description -->
                                       
                                    </div>
                                </div>

                            </div><!--end .product-->
                            <?php $i+=1; ?>
                        <?php endwhile; ?>
                    <?php else : ?>

                             <h2 class="title"><?php _e('Not Found','ideabox'); ?></h2>
                    <p><?php _e('Sorry, but you are looking for something that is not here.','ideabox'); ?></p>
                    <?php get_search_form(); ?>
            <?php endif; ?>
        <?php } ?>
            </div> <!--end #featured-products -->

        </div> <!-- end #home-featured -->
        <?php if (get_theme_mod('ideabox_edd_store_link_url') && get_theme_mod('ideabox_edd_store_link_text') ) { ?>
        <p class="store-button"><a class="button" href="<?php echo esc_url(get_theme_mod('ideabox_edd_store_link_url')); ?>"><?php echo esc_html(get_theme_mod('ideabox_edd_store_link_text')); ?></a></p>
        <?php } else { ?>
        <p class="store-button"><a class="button" href=""><?php _e('Browse All Products','ideabox') ?></a></p>
        <?php } ?>
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
    <?php
    } // end EDD enabled check
} // end EDD Plugin activation check 
?>

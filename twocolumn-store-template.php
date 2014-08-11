<?php
/**
 * Template Name: Two Column Store
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
                            <?php if(get_theme_mod('store_page_title')) { ?>
                            <h2 class="store-title"><?php echo get_theme_mod('store_page_title'); ?></h2>
                            <?php } else { ?>
                            <h2 class="store-title"><?php esc_html_e('Store', 'ideabox'); ?></h2>
                            <?php } ?>
                            
                            <?php if(get_theme_mod('store_page_description')) { ?>
                            <p class="store-description"><?php echo get_theme_mod('store_page_description'); ?></p>
                            <?php } else { ?>
                            <p class="store-description"><?php esc_html_e('Store Description Block.', 'ideabox'); ?></p>
                            <?php } ?>
                            
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
        <div class="store-products">
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
           
                <div id="post-<?php the_ID(); ?>" class="col-lg-6 product mix all<?php if ($i % 4 == 0) { echo ' last'; } ?> <?php echo $containerClass; ?>">


                    
                    <div class="product-image">
                        <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                        </a>
                           
                    </div>
                    <div class="product-info">
                        <a href="<?php the_permalink(); ?>">
                            <h2 class="title"><?php the_title(); ?></h2>
                        </a>
                        <?php the_excerpt(); ?>
                         
                    </div>
                </div><!--end .product-->
                    <?php $i+=1; ?>
                <?php endwhile; ?>

            <div class="pagination col-lg-12">
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
            </div>
    </div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->

<?php get_footer(); ?>

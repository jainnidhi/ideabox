<?php
/**
 * The template for displaying featured portfolio on Front Page 
 *
 * @package Ideabox
 * @since Ideabox 1.0
 */
?>

<?php
// Start a new query for displaying featured posts on Front Page

if (get_theme_mod('ideabox_front_featured_portfolio_check')) {
    $featured_count = intval(get_theme_mod('ideabox_front_featured_portfolio_count'));

    $featured_portfolio_args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => $featured_count,
        'post__not_in' => get_option('sticky_posts'),
    );
    $featuredportfolio = new WP_Query($featured_portfolio_args);
    ?>
<section class="portfolio-area">
    <div class="container portfolio-wrapper">
        <div class="row">
    <div class="home-portfolio-title-area" id="portfolio-title">
            <div class="home-portfolio-title section-title">
                 <?php if ( get_theme_mod('ideabox_portfolio_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('ideabox_portfolio_title')); ?></h3>
                  <?php } else {  ?> <h3 class="title"><?php esc_html_e('Recent Portfolio', 'ideabox') ?></h3>
                           <?php } ?>
                  
                   <?php if ( get_theme_mod('portfolio_description') !='' ) {  ?>
                            <p><?php echo esc_html(get_theme_mod('portfolio_description')); ?></p>
                                     <?php } else { ?>
                                    <p><?php esc_html_e('This is the Portfolio Description block.', 'ideabox') ?> </p>
                                            <?php } ?>
            </div>
    </div>
            
            <ul id="filters">
                    <?php
                        $terms = get_terms('portfolio_category');
                        $count = count($terms);
                            echo '<li><a href="javascript:void(0)" data-filter="all" class="filter active">All</a></li>';
                        if ( $count > 0 ){

                            foreach ( $terms as $term ) {

                                $termname = strtolower($term->name);
                                $termname = str_replace(' ', '-', $termname);
                                echo '<li><a href="javascript:void(0)" class="filter" data-filter=".'.$termname.'">'.$term->name.'</a></li>';
                            }
                        }
                    ?>
                </ul>
     

            <div id="featured-portfolio" class="clearfix">
                <div class="portfolio-wrap clearfix">
                
                <?php if ($featuredportfolio->have_posts()) : $i = 1; ?>

                    <?php while ($featuredportfolio->have_posts()) : $featuredportfolio->the_post(); ?>
                    <?php 
                    $terms = get_the_terms( $post->ID, 'portfolio_category' );	
                    if ( $terms && ! is_wp_error( $terms ) ) : 

                        $links = array();

                        foreach ( $terms as $term ) {
                            $links[] = $term->name;
                        }

                        $tax_links = join( " ", str_replace(' ', '-', $links));          
                        $tax = strtolower($tax_links);
                    else :	
                        $tax = '';					
                    endif; 
                     $containerClass = $tax; 
                     ?>
                                     
                        <div class="home-featured-portfolio all mix col-lg-3 col-md-3 col-sm-6 col-xs-12 <?php echo $containerClass; ?>">

                            <div class="featured-portfolio-content">

                                <a href="<?php the_permalink(); ?>">
                                    <div class="portfolio-featured-image">
                                    <?php the_post_thumbnail('post_portfolio_thumb'); ?>
                                    </div>
                                   
                                </a>
                               
                            </div> <!--end .featured-post-content -->

                           
                        </div><!--end .home-featured-portfolio-->
                  
                        <?php $i+=1; ?>

                    <?php endwhile; ?>

                <?php else : ?>

                    <h2 class="center"><?php esc_html_e('Not Found', 'ideabox'); ?></h2>
                    <p class="center"><?php esc_html_e('Sorry, but you are looking for something that is not here', 'ideabox'); ?></p>
                    <?php get_search_form(); ?>
                <?php endif; ?>
           </div>         
        </div> <!-- /#featured-portfolio -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
      
<?php
} 

 if (!get_theme_mod('ideabox_front_featured_portfolio_check') && !get_theme_mod('ideabox_hide_sample_portfolio')) 
    { // end Featured portfolio query  ?>
    
<section class="portfolio-area">
    <div class="container portfolio-wrapper">
        <div class="row">
    <div class="home-portfolio-title-area" id="portfolio-title">
            <div class="home-portfolio-title section-title">
                <h3 class="title"><?php esc_html_e('Recent Portfolio', 'ideabox') ?></h3>
                    <p><?php esc_html_e('This is the Portfolio Description block.', 'ideabox') ?> </p>
            </div>
    </div>
            
            
            <ul id="filters">
                <li><a href="javascript:void(0)" data-filter="all" class="filter active">All</a></li>
                <li><a href="javascript:void(0)" class="filter" data-filter=".web">Web</a></li>
                <li><a href="javascript:void(0)" class="filter" data-filter=".design">Design</a></li>
                <li><a href="javascript:void(0)" class="filter" data-filter=".development">Development</a></li>
            </ul>
   

            <div id="featured-portfolio" class="clearfix">
                <div class="portfolio-wrap clearfix">
                  
                        <div class="home-featured-portfolio col-lg-3 col-md-3 col-sm-6 col-xs-12 all mix development" id="portfolio-one">
                             <div class="featured-portfolio-content">
                                <a href="#">
                                    <img class="attachment-post_feature_thumb" src="<?php echo get_template_directory_uri(); ?>/includes/images/port-1.jpg" alt="portfolio-1"/>
                                   
                                </a>
                            </div> <!--end .featured-post-content -->
                        </div><!--end .home-featured-portfolio-->
                        
                        
                        <div class="home-featured-portfolio col-lg-3 col-md-3 col-sm-6 col-xs-12 all mix design web" id="portfolio-two">
                            <div class="featured-portfolio-content">
                                <a href="#">
                                    <img class="attachment-post_feature_thumb" src="<?php echo get_template_directory_uri(); ?>/includes/images/port-2.jpg" alt="portfolio-2"/>
                                   
                                </a>
                            </div> <!--end .featured-post-content -->
                        </div><!--end .home-featured-portfolio-->
                        
                        <div class="home-featured-portfolio col-lg-3 col-md-3 col-sm-6 col-xs-12 all mix web" id="portfolio-three">
                            <div class="featured-portfolio-content">
                                <a href="#">
                                    <img class="attachment-post_feature_thumb" src="<?php echo get_template_directory_uri(); ?>/includes/images/port-3.jpg" alt="portfolio-3"/>
                                   
                                </a>
                            </div> <!--end .featured-post-content -->
                        </div><!--end .home-featured-portfolio-->
                        
                         <div class="home-featured-portfolio col-lg-3 col-md-3 col-sm-6 col-xs-12 all mix Development Design" id="portfolio-four">
                            <div class="featured-portfolio-content">
                                <a href="#">
                                    <img class="attachment-post_feature_thumb" src="<?php echo get_template_directory_uri(); ?>/includes/images/port-4.jpg" alt="portfolio-4"/>
                                    
                                </a>
                            </div> <!--end .featured-post-content -->
                        </div><!--end .home-featured-portfolio-->
                  
           </div>         
        </div> <!-- /#featured-portfolio -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
<?php } ?>

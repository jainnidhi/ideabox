<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Ideabox
 */
?>

</div><!-- close .main-content-inner -->

<div class="sidebar col-sm-12 col-md-4">

    <?php // add the class "panel" below here to wrap the sidebar in Bootstrap style ;) ?>
    <div class="sidebar-padder">

        <?php do_action('before_sidebar'); ?>
        <?php if (!dynamic_sidebar('sidebar-1')) : ?>

            <aside id="search" class="widget widget_search">
                <?php get_search_form(); ?>
            </aside>

            <aside id="archives" class="widget widget_archive">
                <h3 class="widget-title"><?php _e('Archives', 'ideabox'); ?></h3>
                <ul>
                    <?php wp_get_archives(array('type' => 'monthly')); ?>
                </ul>
            </aside>

            <aside id="meta" class="widget widget_meta">
                <h3 class="widget-title"><?php _e('Meta', 'ideabox'); ?></h3>
                <ul>
                    <?php wp_register(); ?>
                    <li><?php wp_loginout(); ?></li>
                    <?php wp_meta(); ?>
                </ul>
            </aside>
           

        <?php endif; ?>
         <?php if (is_active_sidebar('sidebar_shop')) { ?>
                <div class="right-sidebar">
                    <?php dynamic_sidebar('sidebar_shop'); ?>
                </div><!--end .col grid_4_of_12-->
            <?php } ?>

    </div><!-- close .sidebar-padder -->

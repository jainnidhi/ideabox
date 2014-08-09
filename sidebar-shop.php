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

        <?php if (is_active_sidebar('sidebar_shop')) { ?>
              
                    <?php dynamic_sidebar('sidebar_shop'); ?>
              
            <?php } ?>

    </div><!-- close .sidebar-padder -->

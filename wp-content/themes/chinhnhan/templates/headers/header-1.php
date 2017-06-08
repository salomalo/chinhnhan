<?php
/**
 * The template Header
 *
 *
 * @author 		KuteTheme
 * @package 	THEME/WooCommerce
 * @version     KuteTheme 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<!-- HEADER -->
<div id="header" class="header style1">
    
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <div class="container main-header">
        <div class="row">
            <div class="col-xs-12 col-sm-3 logo">
                <?php echo kt_get_logo(); ?>
            </div>
            <div class="header-search-box <?php echo kt_is_wc() ? 'col-xs-7 col-sm-7' : 'col-xs-9'; ?>">
				<div>
				<?php echo do_shortcode('[yith_woocommerce_ajax_search]​'); ?>
				</div>
                
				<div>
				<img alt="Hotline" src="<?php echo esc_url(THEME_URL . '/images/hotline.png') ?>" class="hotline" />
				</div>
				
            </div>
            <?php 
                if( kt_is_wc() ): 
                    do_action('kt_mini_cart');
                endif; 
             ?>
			 <?php kt_topbar_menu();?>
        </div>
		
       
    
    </div>
    <!-- END MANIN HEADER -->
    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <?php do_action( 'kt_show_menu_option_1' ); ?>
            <!-- userinfo on top-->
            <div id="form-search-opntop">
            </div>
            <?php if( kt_is_wc() ):  ?>
            <!-- CART ICON ON MMENU -->
            <div id="shopping-cart-box-ontop">
                <i class="fa fa-shopping-cart"></i>
                <div class="shopping-cart-box-ontop-content"></div>
            </div>
            <?php endif;?>
        </div>
    </div>
    <div class="container">
        <div class="divider main-bg"></div>
    </div>
</div>
<!-- end header -->
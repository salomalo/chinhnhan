<?php 
$args = array(
  'show_option_all' => __( 'All Categories', 'kutetheme' ),
  'taxonomy'    => 'product_cat',
  'class'      => 'select-category',
  'hide_empty'  => 0,
  'orderby'     => 'name',
  'order'       => "asc",
  'tab_index'   => true,
  'hierarchical' => true
);
$kt_used_header = kt_option('kt_used_header',1);
?>
<?php if( $kt_used_header == 12 || $kt_used_header == 13  ):?>
<form class="form-inline woo-search" method="get" action="<?php echo esc_url( home_url( '/' ) ) ?>">
  
  <div class="form-group input-serach">
    <input type="hidden" name="post_type" value="product" />
    <input value="<?php echo esc_attr( get_search_query() );?>" type="text" name="s"  placeholder="<?php esc_attr_e( 'Bạn cần tìm gì....', 'kutetheme' ); ?>" />
    <i class="hide close-form fa fa-times"></i>
  </div>
  
  <div class="form-group form-category">
    <?php wp_dropdown_categories( $args ); ?>
  </div>
  <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
</form>
<?php else:?>
 <?php echo do_shortcode('[yith_woocommerce_ajax_search]​'); ?>
<?php endif;?>
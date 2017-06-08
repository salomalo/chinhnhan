<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package KuteTheme
 * @subpackage Kute_Theme
 * @since KuteTheme 1.0
 */

get_header();


// Start the loop.
while ( have_posts() ) : the_post();
    $id = get_the_ID();
endwhile;

// Default option
$kt_sidebar_are = kt_option( 'kt_sidebar_are', 'left' );

// Page option
$kt_page_layout = kt_get_post_meta( $id, 'kt_page_layout', '' );
$kt_show_page_breadcrumb = kt_get_post_meta( $id, 'kt_show_page_breadcrumb', 'show' );

if( $kt_page_layout != "" ){
    $kt_sidebar_are = $kt_page_layout;
}

$sidebar_are_layout = 'sidebar-'.$kt_sidebar_are;

if( $kt_sidebar_are == "left" || $kt_sidebar_are == "right" ){
    $col_class = "main-content col-xs-12 col-sm-8 col-md-9";
}else{
    $col_class = "main-content page-full-width col-sm-12";
}
?>
<div id="primary" class="content-area <?php echo esc_attr( $sidebar_are_layout );?>">
    <main id="main" class="site-main">
        <?php
        if( $kt_show_page_breadcrumb == 'show' ) {
            breadcrumb_trail();
        }
        ?>
        <div class="row">
            <div class="<?php echo esc_attr($col_class);?>">


                <form method="post" class="register">

                    <?php do_action( 'woocommerce_register_form_start' ); ?>

                   

                        <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                            <label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
                        </p>

                    

                    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                        <label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
                        <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
                    </p>

                   

                        <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                            <label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />
                        </p>

                    

                    <!-- Spam Trap -->
                    <div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" autocomplete="off" /></div>

                    <?php do_action( 'woocommerce_register_form' ); ?>
                    <?php do_action( 'register_form' ); ?>

                    <p class="woocomerce-FormRow form-row">
                        <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                        <input type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" />
                    </p>

                    <?php do_action( 'woocommerce_register_form_end' ); ?>

                </form>
            </div>
            <?php if( $kt_sidebar_are != 'full' ){ ?>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="sidebar">
                        <?php get_sidebar();?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>

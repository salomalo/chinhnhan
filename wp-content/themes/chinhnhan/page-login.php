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

                <form method="post" class="login">

                    <?php do_action( 'woocommerce_login_form_start' ); ?>

                    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                        <label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
                    </p>
                    <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                        <label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
                        <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
                    </p>

                    <?php do_action( 'woocommerce_login_form' ); ?>

                    <p class="form-row">
                        <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                        <input type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
                        <label for="rememberme" class="inline">
                            <input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
                        </label>
                    </p>
                    <p class="woocommerce-LostPassword lost_password">
                        <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
                    </p>

                    <?php do_action( 'woocommerce_login_form_end' ); ?>

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

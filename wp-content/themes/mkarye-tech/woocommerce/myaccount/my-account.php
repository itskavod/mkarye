<?php
/**
 * My Account page override to support a unified left sidebar dashboard column
 *
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="mmt-dashboard-sidebar">
    <?php
    /**
     * My Account sidebar header (profile card & logo)
     */
    do_action( 'woocommerce_before_account_navigation' );
    ?>

    <nav class="woocommerce-MyAccount-navigation">
        <ul>
            <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                <li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
                    <a href="<?php echo esc_url( wc_get_endpoint_url( $endpoint, '', wc_get_page_permalink( 'myaccount' ) ) ); ?>"><?php echo esc_html( $label ); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <?php do_action( 'woocommerce_after_account_navigation' ); ?>
</div>

<div class="woocommerce-MyAccount-content">
    <?php
    /**
     * My Account content.
     */
    do_action( 'woocommerce_account_content' );
    ?>
</div>

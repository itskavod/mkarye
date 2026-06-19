<?php
/**
 * My Account Dashboard
 *
 * Shows the first page on the My Account area.
 *
 * @package WooCommerce/Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$current_user = wp_get_current_user();
$order_count  = 0;
if ( function_exists( 'wc_get_customer_order_count' ) ) {
    $order_count = wc_get_customer_order_count( $current_user->ID );
}

$fav_count = 0;
if ( function_exists( 'mmt_get_favorites' ) ) {
    $fav_count = count( mmt_get_favorites() );
}

?>

<div class="mmt-dashboard-welcome-banner">
    <div class="mmt-banner-text">
        <h3>Welcome back, <?php echo esc_html( $current_user->display_name ); ?>!</h3>
        <p>Access your billing details, track active orders, manage your shipping addresses, and customize your profile settings from your secure client portal.</p>
    </div>
    <div class="mmt-banner-action">
        <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="mmt-btn-primary">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <path d="M16 10a4 4 0 0 1-8 0"></path>
            </svg>
            Shop Products
        </a>
    </div>
</div>

<div class="mmt-dashboard-grid">
    <!-- Orders Card -->
    <a href="<?php echo esc_url( wc_get_endpoint_url( 'orders' ) ); ?>" class="mmt-dashboard-card">
        <div class="mmt-card-icon-wrapper">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <path d="M16 10a4 4 0 0 1-8 0"></path>
            </svg>
        </div>
        <h4 class="mmt-card-title">Your Orders</h4>
        <p class="mmt-card-desc">Track active shipments, view order history, and download receipts. You have <strong><?php echo esc_html( $order_count ); ?></strong> past or active orders.</p>
        <span class="mmt-card-link">
            View Orders
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </span>
    </a>

    <!-- Addresses Card -->
    <a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address' ) ); ?>" class="mmt-dashboard-card">
        <div class="mmt-card-icon-wrapper">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
            </svg>
        </div>
        <h4 class="mmt-card-title">Billing & Shipping</h4>
        <p class="mmt-card-desc">Configure your shipping destination and billing contacts to ensure smooth delivery of your medical hardware orders.</p>
        <span class="mmt-card-link">
            Manage Addresses
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </span>
    </a>

    <!-- Favorites Card -->
    <a href="<?php echo esc_url( wc_get_endpoint_url( 'favorites' ) ); ?>" class="mmt-dashboard-card">
        <div class="mmt-card-icon-wrapper">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
            </svg>
        </div>
        <h4 class="mmt-card-title">Favorites List</h4>
        <p class="mmt-card-desc">Access your wishlist and quickly add saved medical equipment items to cart. You have <strong><?php echo esc_html( $fav_count ); ?></strong> saved items.</p>
        <span class="mmt-card-link">
            View Favorites
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </span>
    </a>

    <!-- Profile Settings Card -->
    <a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-account' ) ); ?>" class="mmt-dashboard-card">
        <div class="mmt-card-icon-wrapper">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
        </div>
        <h4 class="mmt-card-title">Security & Info</h4>
        <p class="mmt-card-desc">Keep your client account secure. Change your account email, display name, and update your portal password credentials.</p>
        <span class="mmt-card-link">
            Update Profile
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </span>
    </a>
</div>

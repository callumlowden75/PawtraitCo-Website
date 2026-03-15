<?php
/**
 * Plugin Name: Pawtrait Co — Cart Handler
 * Description: Loads cart from URL params on checkout page
 * Drop this file into wp-content/mu-plugins/
 */
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_loaded', function() {
    if ( empty( $_GET['pawtrait_add'] ) ) return;

    if ( function_exists( 'wc_load_cart' ) ) {
        wc_load_cart();
    }

    if ( ! function_exists( 'WC' ) || ! WC()->cart ) return;

    $digital_id = intval( $_GET['pawtrait_add'] );
    $print_id   = isset( $_GET['pawtrait_print'] ) ? intval( $_GET['pawtrait_print'] ) : 0;

    // Clear cart and add fresh items
    WC()->cart->empty_cart();
    WC()->cart->add_to_cart( $digital_id );

    if ( $print_id > 0 ) {
        $parent_id = wp_get_post_parent_id( $print_id );
        if ( $parent_id ) {
            // Variation: pass parent ID + variation ID
            WC()->cart->add_to_cart( $parent_id, 1, $print_id );
        } else {
            // Simple product fallback
            WC()->cart->add_to_cart( $print_id );
        }
    }

    // Save session so cart persists
    if ( WC()->session ) {
        WC()->session->save_data();
    }

    // Redirect to clean checkout URL (no query params)
    wp_safe_redirect( wc_get_checkout_url() );
    exit;
}, 5 );

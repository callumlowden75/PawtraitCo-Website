<?php
/**
 * Plugin Name: Pawtrait Co — Checkout Styles
 * Description: Clean, professional checkout styling for Pawtrait Co
 * Drop this file into wp-content/mu-plugins/
 */
if ( ! defined( 'ABSPATH' ) ) exit;

// Load styles on checkout page (page ID 3659)
// No is_checkout() check — CSS is scoped to body.page-id-3659 so it only applies there
add_action( 'wp_head', function() {
    if ( ! is_page( 3659 ) ) return;
    ?>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
      /* ── Reset & Base ─────────────────────────────── */
      body.page-id-3659 {
        background: #f7f7f7 !important;
        font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif !important;
        color: #1a1a1a !important;
      }

      /* Hide theme header/footer for distraction-free checkout */
      body.page-id-3659 .site-header,
      body.page-id-3659 .ast-above-header,
      body.page-id-3659 .ast-below-header,
      body.page-id-3659 .site-footer,
      body.page-id-3659 .ast-footer-overlay,
      body.page-id-3659 #ast-scroll-top,
      body.page-id-3659 .ast-above-header-wrap,
      body.page-id-3659 .ast-below-header-wrap,
      body.page-id-3659 .ast-mobile-header-wrap {
        display: none !important;
      }

      /* ── Pawtrait Co header bar ───────────────────── */
      body.page-id-3659 .site-content::before,
      body.page-id-3659 #site-content::before {
        content: 'PAWTRAIT CO';
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 64px;
        background: #0E0E12;
        color: #DFB86A;
        font-family: 'Bebas Neue', 'DM Sans', sans-serif;
        font-size: 1.4rem;
        letter-spacing: 0.12em;
      }

      /* Hide page title */
      body.page-id-3659 .entry-title,
      body.page-id-3659 .page-title,
      body.page-id-3659 .ast-archive-description {
        display: none !important;
      }

      /* ── Page container ───────────────────────────── */
      body.page-id-3659 .site-content,
      body.page-id-3659 #site-content {
        max-width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
      }

      body.page-id-3659 .ast-container {
        max-width: 960px !important;
        margin: 0 auto !important;
        padding: 40px 24px 60px !important;
      }

      body.page-id-3659 .woocommerce {
        max-width: 960px;
        margin: 0 auto;
      }

      /* ── Section headings ─────────────────────────── */
      body.page-id-3659 h3 {
        font-family: 'DM Sans', sans-serif !important;
        font-size: 1.25rem !important;
        font-weight: 600 !important;
        color: #1a1a1a !important;
        letter-spacing: -0.01em;
        margin-bottom: 20px !important;
        padding-bottom: 12px;
        border-bottom: 1px solid #e5e5e5;
      }

      /* ── Form fields ──────────────────────────────── */
      body.page-id-3659 .form-row label {
        font-size: 0.85rem !important;
        font-weight: 500 !important;
        color: #444 !important;
        margin-bottom: 6px !important;
      }

      body.page-id-3659 .form-row input.input-text,
      body.page-id-3659 .form-row textarea,
      body.page-id-3659 .form-row select,
      body.page-id-3659 .select2-container .select2-selection--single {
        border: 1.5px solid #d4d4d4 !important;
        border-radius: 10px !important;
        padding: 12px 14px !important;
        font-size: 0.95rem !important;
        background: #fff !important;
        color: #1a1a1a !important;
        transition: border-color 0.2s ease !important;
        height: auto !important;
        box-shadow: none !important;
      }

      body.page-id-3659 .form-row input.input-text:focus,
      body.page-id-3659 .form-row select:focus {
        border-color: #C9983C !important;
        outline: none !important;
        box-shadow: 0 0 0 3px rgba(201, 152, 60, 0.12) !important;
      }

      /* Select2 dropdown */
      body.page-id-3659 .select2-container .select2-selection--single {
        min-height: 48px !important;
        display: flex !important;
        align-items: center !important;
      }

      /* ── Order summary table ──────────────────────── */
      body.page-id-3659 .woocommerce-checkout-review-order-table {
        border: 1px solid #e5e5e5 !important;
        border-radius: 12px !important;
        overflow: hidden !important;
        background: #fff !important;
        margin-bottom: 24px !important;
      }

      body.page-id-3659 .woocommerce-checkout-review-order-table th,
      body.page-id-3659 .woocommerce-checkout-review-order-table td {
        padding: 14px 18px !important;
        font-size: 0.9rem !important;
        border-bottom: 1px solid #f0f0f0 !important;
      }

      body.page-id-3659 .woocommerce-checkout-review-order-table th {
        font-weight: 600 !important;
        color: #1a1a1a !important;
        background: #fafafa !important;
      }

      /* Sale price — strikethrough original, bold sale */
      body.page-id-3659 del {
        color: #999 !important;
        font-size: 0.85em !important;
        margin-right: 6px;
      }
      body.page-id-3659 ins {
        text-decoration: none !important;
        font-weight: 600 !important;
        color: #1a1a1a !important;
      }

      /* Total row */
      body.page-id-3659 .order-total th,
      body.page-id-3659 .order-total td {
        font-size: 1.1rem !important;
        font-weight: 700 !important;
        color: #1a1a1a !important;
        border-bottom: none !important;
        padding-top: 18px !important;
      }

      /* ── Place order button ───────────────────────── */
      body.page-id-3659 #place_order {
        background: #C9983C !important;
        color: #fff !important;
        border: none !important;
        border-radius: 12px !important;
        padding: 16px 32px !important;
        font-size: 1rem !important;
        font-weight: 700 !important;
        letter-spacing: 0.04em !important;
        text-transform: uppercase !important;
        cursor: pointer !important;
        width: 100% !important;
        transition: background 0.2s ease, transform 0.15s ease !important;
      }
      body.page-id-3659 #place_order:hover {
        background: #A07828 !important;
        transform: translateY(-1px) !important;
      }

      /* ── Payment methods ──────────────────────────── */
      body.page-id-3659 .wc_payment_methods {
        background: #fff !important;
        border: 1px solid #e5e5e5 !important;
        border-radius: 12px !important;
        padding: 8px !important;
        margin-bottom: 24px !important;
        list-style: none !important;
      }
      body.page-id-3659 .wc_payment_methods li {
        border-bottom: 1px solid #f0f0f0 !important;
        padding: 14px 16px !important;
      }
      body.page-id-3659 .wc_payment_methods li:last-child {
        border-bottom: none !important;
      }
      body.page-id-3659 .wc_payment_methods label {
        font-weight: 500 !important;
        font-size: 0.95rem !important;
        cursor: pointer !important;
      }

      /* ── Misc ─────────────────────────────────────── */
      body.page-id-3659 .woocommerce-privacy-policy-text {
        font-size: 0.8rem !important;
        color: #888 !important;
      }
      body.page-id-3659 .woocommerce-form-coupon-toggle { margin-bottom: 20px !important; }
      body.page-id-3659 .checkout_coupon {
        border: 1px solid #e5e5e5 !important;
        border-radius: 10px !important;
        padding: 16px !important;
        background: #fff !important;
      }
      body.page-id-3659 .woocommerce-info,
      body.page-id-3659 .woocommerce-message {
        border-top-color: #C9983C !important;
        background: #fff !important;
        border-radius: 10px !important;
        padding: 14px 18px !important;
        margin-bottom: 20px !important;
      }
      body.page-id-3659 .woocommerce-error {
        border-top-color: #dc3545 !important;
        background: #fff !important;
        border-radius: 10px !important;
      }

      /* ── Trust bar below checkout ─────────────────── */
      .pawtrait-trust-bar {
        text-align: center;
        font-size: 0.8rem;
        color: #888;
        margin-top: 16px;
        line-height: 1.5;
      }

      /* ── Responsive ───────────────────────────────── */
      @media (max-width: 768px) {
        body.page-id-3659 .ast-container {
          padding: 24px 16px 40px !important;
        }
        body.page-id-3659 .col2-set .col-1,
        body.page-id-3659 .col2-set .col-2 {
          width: 100% !important;
          float: none !important;
        }
      }
    </style>
    <?php
}, 99 );

// Show was/now sale pricing in checkout order review
add_filter( 'woocommerce_cart_item_subtotal', function( $subtotal, $cart_item, $cart_item_key ) {
    $product = $cart_item['data'];
    $regular = (float) $product->get_regular_price();
    $sale    = (float) $product->get_sale_price();
    $qty     = $cart_item['quantity'];

    if ( $sale && $regular > $sale ) {
        $saved = ( $regular - $sale ) * $qty;
        return '<del>' . wc_price( $regular * $qty ) . '</del> <ins>' . wc_price( $sale * $qty ) . '</ins>'
             . '<br><span style="font-size:0.75rem;color:#C9983C;font-weight:600;">You save ' . wc_price( $saved ) . '</span>';
    }
    return $subtotal;
}, 10, 3 );

// Trust bar below Place Order — uses page check instead of is_checkout
add_action( 'woocommerce_review_order_after_submit', function() {
    echo '<p class="pawtrait-trust-bar">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:-2px;margin-right:4px;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        Secure checkout &middot; Free shipping &middot; 100% satisfaction guarantee
    </p>';
});

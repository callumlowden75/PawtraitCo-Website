<?php
/**
 * Plugin Name: Pawtrait Co — Checkout Styles
 * Description: Clean, professional checkout styling for Pawtrait Co
 * Drop this file into wp-content/mu-plugins/ (create the folder if it doesn't exist)
 */
if ( ! defined( 'ABSPATH' ) ) exit;

// Use page ID 3659 as fallback selector since woocommerce-checkout class
// may not be added to the body. Target both for robustness.
$sel = 'body.woocommerce-checkout, body.page-id-3659';
$s   = 'body.woocommerce-checkout'; // single selector shorthand
$p   = 'body.page-id-3659';         // page-id selector shorthand

// Only load on checkout page
add_action( 'wp_head', function() {
    if ( ! function_exists( 'is_checkout' ) || ! is_checkout() ) return;
    // Get logo URL from theme or use brand_assets fallback
    $logo = get_template_directory_uri() . '/pawtrait-assets/Pawtrait Co Logo.svg';
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    if ( $custom_logo_id ) {
        $logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
        if ( $logo_url ) $logo = $logo_url;
    }
    ?>
    <style>
      /* ── Reset & Base ─────────────────────────────── */
      body.woocommerce-checkout,
      body.page-id-3659 {
        background: #f7f7f7 !important;
        font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif !important;
        color: #1a1a1a !important;
      }

      /* Hide theme header/footer — distraction-free checkout */
      body.woocommerce-checkout .site-header,
      body.woocommerce-checkout .ast-above-header,
      body.woocommerce-checkout .ast-below-header,
      body.woocommerce-checkout .site-footer,
      body.woocommerce-checkout .ast-footer-overlay,
      body.woocommerce-checkout #ast-scroll-top,
      body.woocommerce-checkout .ast-above-header-wrap,
      body.woocommerce-checkout .ast-below-header-wrap,
      body.page-id-3659 .site-header,
      body.page-id-3659 .ast-above-header,
      body.page-id-3659 .ast-below-header,
      body.page-id-3659 .site-footer,
      body.page-id-3659 .ast-footer-overlay,
      body.page-id-3659 #ast-scroll-top,
      body.page-id-3659 .ast-above-header-wrap,
      body.page-id-3659 .ast-below-header-wrap {
        display: none !important;
      }

      /* ── Branded header bar ───────────────────────── */
      body.woocommerce-checkout #site-content::before,
      body.woocommerce-checkout .site-content::before,
      body.page-id-3659 #site-content::before,
      body.page-id-3659 .site-content::before {
        content: '';
        display: block;
        width: 100%;
        height: 64px;
        background: #0E0E12 url('<?php echo esc_url( $logo ); ?>') center center / auto 32px no-repeat;
      }

      /* Hide page title — "Checkout" heading from Astra */
      body.woocommerce-checkout .entry-title,
      body.woocommerce-checkout .page-title,
      body.woocommerce-checkout .ast-archive-description,
      body.page-id-3659 .entry-title,
      body.page-id-3659 .page-title,
      body.page-id-3659 .ast-archive-description {
        display: none !important;
      }

      /* ── Page container ───────────────────────────── */
      body.woocommerce-checkout .site-content,
      body.page-id-3659 .site-content {
        max-width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
      }

      body.woocommerce-checkout .woocommerce,
      body.page-id-3659 .woocommerce {
        max-width: 960px;
        margin: 0 auto;
        padding: 40px 24px 60px;
      }

      /* ── Section headings ─────────────────────────── */
      body.woocommerce-checkout h3,
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
      body.woocommerce-checkout .form-row label,
      body.page-id-3659 .form-row label {
        font-size: 0.85rem !important;
        font-weight: 500 !important;
        color: #444 !important;
        margin-bottom: 6px !important;
      }

      body.woocommerce-checkout .form-row input.input-text,
      body.woocommerce-checkout .form-row textarea,
      body.woocommerce-checkout .form-row select,
      body.woocommerce-checkout .select2-container .select2-selection--single,
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

      body.woocommerce-checkout .form-row input.input-text:focus,
      body.woocommerce-checkout .form-row select:focus,
      body.page-id-3659 .form-row input.input-text:focus,
      body.page-id-3659 .form-row select:focus {
        border-color: #C9983C !important;
        outline: none !important;
        box-shadow: 0 0 0 3px rgba(201, 152, 60, 0.12) !important;
      }

      /* ── Select2 dropdown fix ─────────────────────── */
      body.woocommerce-checkout .select2-container .select2-selection--single,
      body.page-id-3659 .select2-container .select2-selection--single {
        min-height: 48px !important;
        display: flex !important;
        align-items: center !important;
      }

      /* ── Order summary table ──────────────────────── */
      body.woocommerce-checkout .woocommerce-checkout-review-order-table,
      body.page-id-3659 .woocommerce-checkout-review-order-table {
        border: 1px solid #e5e5e5 !important;
        border-radius: 12px !important;
        overflow: hidden !important;
        background: #fff !important;
        margin-bottom: 24px !important;
      }

      body.woocommerce-checkout .woocommerce-checkout-review-order-table th,
      body.woocommerce-checkout .woocommerce-checkout-review-order-table td,
      body.page-id-3659 .woocommerce-checkout-review-order-table th,
      body.page-id-3659 .woocommerce-checkout-review-order-table td {
        padding: 14px 18px !important;
        font-size: 0.9rem !important;
        border-bottom: 1px solid #f0f0f0 !important;
      }

      body.woocommerce-checkout .woocommerce-checkout-review-order-table th,
      body.page-id-3659 .woocommerce-checkout-review-order-table th {
        font-weight: 600 !important;
        color: #1a1a1a !important;
        background: #fafafa !important;
      }

      /* Sale price styling — strikethrough original, bold sale */
      body.woocommerce-checkout del,
      body.page-id-3659 del {
        color: #999 !important;
        font-size: 0.85em !important;
        margin-right: 6px;
      }

      body.woocommerce-checkout ins,
      body.page-id-3659 ins {
        text-decoration: none !important;
        font-weight: 600 !important;
        color: #1a1a1a !important;
      }

      /* Total row */
      body.woocommerce-checkout .order-total th,
      body.woocommerce-checkout .order-total td,
      body.page-id-3659 .order-total th,
      body.page-id-3659 .order-total td {
        font-size: 1.1rem !important;
        font-weight: 700 !important;
        color: #1a1a1a !important;
        border-bottom: none !important;
        padding-top: 18px !important;
      }

      /* ── Place order button ───────────────────────── */
      body.woocommerce-checkout #place_order,
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

      body.woocommerce-checkout #place_order:hover,
      body.page-id-3659 #place_order:hover {
        background: #A07828 !important;
        transform: translateY(-1px) !important;
      }

      body.woocommerce-checkout #place_order:active,
      body.page-id-3659 #place_order:active {
        transform: translateY(0) !important;
      }

      /* ── Payment methods ──────────────────────────── */
      body.woocommerce-checkout .wc_payment_methods,
      body.page-id-3659 .wc_payment_methods {
        background: #fff !important;
        border: 1px solid #e5e5e5 !important;
        border-radius: 12px !important;
        padding: 8px !important;
        margin-bottom: 24px !important;
        list-style: none !important;
      }

      body.woocommerce-checkout .wc_payment_methods li,
      body.page-id-3659 .wc_payment_methods li {
        border-bottom: 1px solid #f0f0f0 !important;
        padding: 14px 16px !important;
      }

      body.woocommerce-checkout .wc_payment_methods li:last-child,
      body.page-id-3659 .wc_payment_methods li:last-child {
        border-bottom: none !important;
      }

      body.woocommerce-checkout .wc_payment_methods label,
      body.page-id-3659 .wc_payment_methods label {
        font-weight: 500 !important;
        font-size: 0.95rem !important;
        cursor: pointer !important;
      }

      /* ── Trust / security line ────────────────────── */
      body.woocommerce-checkout .woocommerce-terms-and-conditions-wrapper,
      body.page-id-3659 .woocommerce-terms-and-conditions-wrapper {
        margin-top: 16px !important;
      }

      body.woocommerce-checkout .woocommerce-privacy-policy-text,
      body.page-id-3659 .woocommerce-privacy-policy-text {
        font-size: 0.8rem !important;
        color: #888 !important;
        line-height: 1.5 !important;
      }

      /* ── Coupon section ───────────────────────────── */
      body.woocommerce-checkout .woocommerce-form-coupon-toggle,
      body.page-id-3659 .woocommerce-form-coupon-toggle {
        margin-bottom: 20px !important;
      }

      body.woocommerce-checkout .checkout_coupon,
      body.page-id-3659 .checkout_coupon {
        border: 1px solid #e5e5e5 !important;
        border-radius: 10px !important;
        padding: 16px !important;
        background: #fff !important;
      }

      /* ── Notices ──────────────────────────────────── */
      body.woocommerce-checkout .woocommerce-info,
      body.woocommerce-checkout .woocommerce-message,
      body.page-id-3659 .woocommerce-info,
      body.page-id-3659 .woocommerce-message {
        border-top-color: #C9983C !important;
        background: #fff !important;
        border-radius: 10px !important;
        padding: 14px 18px !important;
        margin-bottom: 20px !important;
        font-size: 0.9rem !important;
      }

      body.woocommerce-checkout .woocommerce-error,
      body.page-id-3659 .woocommerce-error {
        border-top-color: #dc3545 !important;
        background: #fff !important;
        border-radius: 10px !important;
      }

      /* ── Responsive ───────────────────────────────── */
      @media (max-width: 768px) {
        body.woocommerce-checkout .woocommerce,
        body.page-id-3659 .woocommerce {
          padding: 24px 16px 40px;
        }

        body.woocommerce-checkout .col2-set .col-1,
        body.woocommerce-checkout .col2-set .col-2,
        body.page-id-3659 .col2-set .col-1,
        body.page-id-3659 .col2-set .col-2 {
          width: 100% !important;
          float: none !important;
        }
      }
    </style>
    <?php
});

// Add a trust bar below the Place Order button
add_action( 'woocommerce_review_order_after_submit', function() {
    echo '<p style="text-align:center; font-size:0.8rem; color:#888; margin-top:16px; line-height:1.5;">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:-2px; margin-right:4px;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        Secure checkout &middot; Free shipping &middot; 100% satisfaction guarantee
    </p>';
});

// Load Google Font for checkout
add_action( 'wp_enqueue_scripts', function() {
    if ( function_exists( 'is_checkout' ) && is_checkout() ) {
        wp_enqueue_style( 'pawtrait-checkout-font', 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap', [], null );
    }
});

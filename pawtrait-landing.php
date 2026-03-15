<?php
/**
 * Template Name: Pawtrait Landing Page
 * Description: Full-page custom landing template — bypasses theme header/footer
 */
if ( ! defined( 'ABSPATH' ) ) exit;

// Dequeue theme styles so they don't conflict with our inline styles
add_action( 'wp_enqueue_scripts', function() {
    global $wp_styles;
    foreach ( array_keys( $wp_styles->registered ) as $handle ) {
        if ( strpos( $handle, 'woocommerce' ) === false ) {
            wp_dequeue_style( $handle );
        }
    }
}, 999 );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pawtrait Co — Your Pet's Ambition, Reimagined</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brown: {
              950: '#0E0E12',
              900: '#1A0F05',
              800: '#2C1A0A',
              700: '#3D2510',
              600: '#4E3018',
            },
            gold: {
              DEFAULT: '#C9983C',
              light: '#DFB86A',
              dark: '#A07828',
            },
            cream: {
              DEFAULT: '#F5F2EC',
              dark: '#E8E3D8',
            }
          },
          fontFamily: {
            display: ['Bebas Neue', 'sans-serif'],
            heading: ['Playfair Display', 'serif'],
            body: ['DM Sans', 'sans-serif'],
          },
          letterSpacing: {
            display: '0.04em',
            tight: '-0.03em',
          },
          lineHeight: {
            prose: '1.75',
          }
        }
      }
    }
  </script>

  <style>
    * { box-sizing: border-box; }
    html { scroll-behavior: smooth; }

    body {
      background-color: #2C1A0A;
      color: #F5F2EC;
      font-family: 'DM Sans', sans-serif;
      overflow-x: hidden;
    }

    /* Grain texture overlay */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      pointer-events: none;
      z-index: 9999;
      opacity: 0.035;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='1'/%3E%3C/svg%3E");
      background-size: 200px 200px;
    }

    /* Layered radial gradient backgrounds */
    .bg-hero {
      background:
        radial-gradient(ellipse 80% 60% at 50% 0%, rgba(201,152,60,0.18) 0%, transparent 70%),
        radial-gradient(ellipse 60% 80% at 80% 100%, rgba(201,152,60,0.08) 0%, transparent 60%),
        radial-gradient(ellipse 100% 100% at 20% 50%, rgba(14,14,18,0.6) 0%, transparent 80%),
        #2C1A0A;
    }

    .bg-section-dark {
      background:
        radial-gradient(ellipse 90% 50% at 50% 0%, rgba(201,152,60,0.14) 0%, transparent 60%),
        #0A0A0D;
      border-top: 1px solid rgba(201,152,60,0.18);
    }

    .bg-section-mid {
      background:
        radial-gradient(ellipse 80% 50% at 20% 50%, rgba(201,152,60,0.12) 0%, transparent 60%),
        #160C03;
      border-top: 1px solid rgba(201,152,60,0.14);
    }

    /* Gold gradient text */
    .text-gold-gradient {
      background: linear-gradient(135deg, #DFB86A 0%, #C9983C 40%, #A07828 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* Layered gold shadow for display text */
    .text-shadow-gold {
      text-shadow:
        0 0 60px rgba(201,152,60,0.25),
        0 2px 8px rgba(0,0,0,0.5);
    }

    /* Card elevation system — backgrounds computed to be visible on all section colours */
    .card-base {
      background: rgba(201,152,60,0.16);
      border: 1px solid rgba(201,152,60,0.42);
      border-radius: 16px;
    }

    .card-elevated {
      background: rgba(201,152,60,0.18);
      border: 1px solid rgba(201,152,60,0.45);
      border-radius: 16px;
      box-shadow:
        0 4px 32px rgba(0,0,0,0.5),
        0 1px 0 rgba(201,152,60,0.2) inset;
    }

    .card-floating {
      background: rgba(10,6,2,0.96);
      border: 1px solid rgba(201,152,60,0.55);
      border-radius: 20px;
      box-shadow:
        0 24px 64px rgba(0,0,0,0.7),
        0 4px 16px rgba(201,152,60,0.12),
        0 1px 0 rgba(201,152,60,0.25) inset;
    }

    /* Primary CTA button */
    .btn-primary {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: linear-gradient(135deg, #DFB86A 0%, #C9983C 50%, #A07828 100%);
      color: #0E0E12;
      font-family: 'DM Sans', sans-serif;
      font-weight: 600;
      font-size: 0.9rem;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      padding: 14px 32px;
      border-radius: 50px;
      border: none;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      touch-action: manipulation;
      transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.2s ease, opacity 0.2s ease;
      box-shadow:
        0 8px 24px rgba(201,152,60,0.35),
        0 2px 8px rgba(0,0,0,0.3),
        0 0 40px rgba(201,152,60,0.15);
      text-decoration: none;
    }

    .btn-primary::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, transparent 60%);
      opacity: 0;
      transition: opacity 0.2s ease;
    }

    .btn-primary:hover {
      transform: translateY(-2px) scale(1.02);
      box-shadow:
        0 12px 32px rgba(201,152,60,0.5),
        0 4px 12px rgba(0,0,0,0.4),
        0 0 60px rgba(201,152,60,0.2);
    }

    .btn-primary:hover::before { opacity: 1; }
    .btn-primary:active { transform: translateY(0) scale(0.98); }
    .btn-primary:focus-visible {
      outline: 2px solid #C9983C;
      outline-offset: 3px;
    }

    /* Secondary button */
    .btn-secondary {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: transparent;
      color: #C9983C;
      font-family: 'DM Sans', sans-serif;
      font-weight: 500;
      font-size: 0.9rem;
      letter-spacing: 0.06em;
      padding: 13px 28px;
      border-radius: 50px;
      border: 1.5px solid rgba(201,152,60,0.5);
      cursor: pointer;
      touch-action: manipulation;
      transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1), background 0.2s ease, border-color 0.2s ease;
      text-decoration: none;
    }

    .btn-secondary:hover {
      background: rgba(201,152,60,0.08);
      border-color: rgba(201,152,60,0.8);
      transform: translateY(-2px);
    }

    .btn-secondary:active { transform: translateY(0); }
    .btn-secondary:focus-visible {
      outline: 2px solid #C9983C;
      outline-offset: 3px;
    }

    /* Gold divider */
    .divider-gold {
      width: 48px;
      height: 2px;
      background: linear-gradient(90deg, transparent, #C9983C, transparent);
      margin: 0 auto;
    }

    /* Image overlay treatment */
    .img-treatment {
      position: relative;
      overflow: hidden;
      border-radius: 16px;
    }

    .img-treatment img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .img-treatment:hover img { transform: scale(1.04); }

    .img-treatment::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(14,14,18,0.75) 0%, rgba(14,14,18,0.1) 50%, transparent 100%);
      pointer-events: none;
    }

    .img-color-layer {
      position: absolute;
      inset: 0;
      background: rgba(201,152,60,0.12);
      mix-blend-mode: multiply;
      pointer-events: none;
      z-index: 1;
    }

    /* Step number */
    .step-num {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 4rem;
      line-height: 1;
      letter-spacing: 0.04em;
      color: rgba(201,152,60,0.35);
    }

    /* Testimonial quote mark */
    .quote-mark {
      font-family: 'Playfair Display', serif;
      font-size: 5rem;
      line-height: 0.5;
      color: rgba(201,152,60,0.25);
      font-style: italic;
    }

    /* Site header wrapper (fixed) */
    .site-header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 100;
    }

    /* Announcement bar */
    @keyframes marquee {
      0%   { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }
    .announcement {
      background: linear-gradient(135deg, #A07828 0%, #C9983C 50%, #A07828 100%);
      color: #0E0E12;
      padding: 8px 0;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.7rem;
      font-weight: 700;
      letter-spacing: 0.08em;
      white-space: nowrap;
      overflow: hidden;
      max-height: 40px;
      transition: max-height 0.35s ease, opacity 0.35s ease, padding 0.35s ease;
    }
    .announcement-track {
      display: inline-flex;
      animation: marquee 22s linear infinite;
    }

    .site-header.scrolled .announcement {
      max-height: 0;
      opacity: 0;
      padding-top: 0;
      padding-bottom: 0;
    }

    /* Nav */
    nav {
      padding: 18px 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      transition: background 0.3s ease, padding 0.3s ease;
    }

    nav.scrolled {
      background: rgba(14,14,18,0.92);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      padding: 14px 24px;
      border-bottom: 1px solid rgba(201,152,60,0.1);
    }

    /* Themes compact grid */
    .themes-compact { display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px; }
    @media (min-width: 640px) { .themes-compact { grid-template-columns: repeat(5, 1fr); } }

    /* Badge */
    .badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(201,152,60,0.12);
      border: 1px solid rgba(201,152,60,0.3);
      color: #C9983C;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.75rem;
      font-weight: 600;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      padding: 6px 14px;
      border-radius: 50px;
    }

    /* Price card highlight */
    .price-highlight {
      background: rgba(201,152,60,0.22);
      border: 2px solid rgba(201,152,60,0.65);
      position: relative;
      box-shadow:
        0 0 40px rgba(201,152,60,0.15),
        0 4px 24px rgba(0,0,0,0.5);
    }

    .price-highlight::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 2px;
      background: linear-gradient(90deg, transparent, #C9983C, transparent);
    }

    /* FAQ accordion */
    details summary {
      cursor: pointer;
      list-style: none;
    }

    details summary::-webkit-details-marker { display: none; }

    .faq-icon {
      transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    details[open] .faq-icon {
      transform: rotate(45deg);
    }

    /* Mobile nav */
    .mobile-menu {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(14,14,18,0.97);
      z-index: 99;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 32px;
    }

    .mobile-menu.open { display: flex; }

    /* ── Scroll reveal animations ── */
    .reveal {
      opacity: 1;
      transform: translateY(0);
      transition: opacity 0.75s cubic-bezier(0.16, 1, 0.3, 1), transform 0.75s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .reveal.hidden-init {
      opacity: 0;
      transform: translateY(36px);
    }
    .reveal.visible {
      opacity: 1 !important;
      transform: translateY(0) !important;
    }

    /* Staggered grid — each child reveals in sequence */
    .stagger-grid > * {
      transition: opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1), transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
      opacity: 1; transform: translateY(0);
    }
    .stagger-grid.hidden-init > * { opacity: 0; transform: translateY(28px); }
    .stagger-grid.visible > *:nth-child(1)  { transition-delay: 0ms; }
    .stagger-grid.visible > *:nth-child(2)  { transition-delay: 75ms; }
    .stagger-grid.visible > *:nth-child(3)  { transition-delay: 150ms; }
    .stagger-grid.visible > *:nth-child(4)  { transition-delay: 225ms; }
    .stagger-grid.visible > *:nth-child(5)  { transition-delay: 300ms; }
    .stagger-grid.visible > *:nth-child(6)  { transition-delay: 375ms; }
    .stagger-grid.visible > *:nth-child(7)  { transition-delay: 75ms; }
    .stagger-grid.visible > *:nth-child(8)  { transition-delay: 150ms; }
    .stagger-grid.visible > *:nth-child(9)  { transition-delay: 225ms; }
    .stagger-grid.visible > *:nth-child(10) { transition-delay: 300ms; }

    /* Fade-in (no translate) variant */
    .reveal-fade.hidden-init { opacity: 0; transform: none; }
    .reveal-fade.visible { opacity: 1 !important; transform: none !important; }

    /* Scale-up card variant */
    .reveal-scale.hidden-init { opacity: 0; transform: scale(0.95) translateY(20px); }
    .reveal-scale.visible { opacity: 1 !important; transform: scale(1) translateY(0) !important; }

    /* Slide in from left / right */
    .reveal-left.hidden-init  { opacity: 0; transform: translateX(-32px); }
    .reveal-left.visible  { opacity: 1 !important; transform: translateX(0) !important; }
    .reveal-right.hidden-init { opacity: 0; transform: translateX(32px); }
    .reveal-right.visible { opacity: 1 !important; transform: translateX(0) !important; }

    /* Respect prefers-reduced-motion */
    @media (prefers-reduced-motion: reduce) {
      .reveal, .reveal-fade, .reveal-scale, .reveal-left, .reveal-right,
      .stagger-grid > *, .stagger-grid.hidden-init > * {
        transition: none !important; animation: none !important;
        opacity: 1 !important; transform: none !important;
      }
    }

    /* Star rating */
    .stars { color: #C9983C; letter-spacing: 2px; }

    /* Horizontal scroll gallery */
    .gallery-track {
      display: flex;
      gap: 16px;
      overflow-x: auto;
      padding-bottom: 16px;
      scrollbar-width: none;
      -ms-overflow-style: none;
    }
    .gallery-track::-webkit-scrollbar { display: none; }

    /* ── Product Configurator ── */
    .product-grid { display:grid; grid-template-columns:1fr; gap:40px; align-items:start; }
    @media (min-width:900px) {
      .product-grid { grid-template-columns:1fr 1fr; gap:56px; }
      .product-sticky { position:sticky; top:100px; }
    }
    .option-label { font-family:'DM Sans',sans-serif; font-size:0.7rem; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:rgba(201,152,60,0.75); margin:0 0 12px; }
    .theme-pill { display:inline-flex; align-items:center; gap:5px; padding:7px 13px; border-radius:50px; border:1.5px solid rgba(201,152,60,0.25); background:rgba(201,152,60,0.05); color:rgba(245,242,236,0.65); font-family:'DM Sans',sans-serif; font-size:0.78rem; font-weight:500; cursor:pointer; white-space:nowrap; transition:border-color 0.2s ease, background 0.2s ease, color 0.2s ease, transform 0.2s cubic-bezier(0.34,1.56,0.64,1); }
    .theme-pill:hover { border-color:rgba(201,152,60,0.55); background:rgba(201,152,60,0.1); color:#F5F2EC; transform:translateY(-1px); }
    .theme-pill.active { border-color:#C9983C; background:rgba(201,152,60,0.18); color:#DFB86A; }
    .format-btn { flex:1; padding:13px 16px; border-radius:12px; border:1.5px solid rgba(201,152,60,0.25); background:rgba(201,152,60,0.05); color:rgba(245,242,236,0.65); font-family:'DM Sans',sans-serif; font-size:0.88rem; font-weight:600; cursor:pointer; text-align:center; transition:all 0.2s ease; }
    .format-btn:hover:not(.active) { border-color:rgba(201,152,60,0.5); background:rgba(201,152,60,0.1); color:#F5F2EC; }
    .format-btn.active { background:linear-gradient(135deg,#DFB86A,#C9983C); color:#0E0E12; border-color:transparent; }
    .size-card { padding:14px 16px; border-radius:12px; border:1.5px solid rgba(201,152,60,0.2); background:rgba(201,152,60,0.04); cursor:pointer; position:relative; transition:border-color 0.2s ease, background 0.2s ease, transform 0.2s cubic-bezier(0.34,1.56,0.64,1); }
    .size-card:hover { border-color:rgba(201,152,60,0.5); background:rgba(201,152,60,0.08); transform:translateY(-1px); }
    .size-card.active { border-color:#C9983C; background:rgba(201,152,60,0.14); }
    @keyframes upload-border-pulse {
      0%, 100% { border-color: rgba(201,152,60,0.3); box-shadow: 0 0 0 0 rgba(201,152,60,0); }
      50% { border-color: rgba(201,152,60,0.6); box-shadow: 0 0 0 6px rgba(201,152,60,0.06); }
    }
    .upload-zone { border:2px dashed rgba(201,152,60,0.3); border-radius:16px; padding:32px 20px; text-align:center; cursor:pointer; background:rgba(201,152,60,0.03); transition:border-color 0.2s ease, background 0.2s ease; animation: upload-border-pulse 2.8s ease-in-out infinite; }
    .upload-zone:hover, .upload-zone.drag-active { border-color:rgba(201,152,60,0.7); background:rgba(201,152,60,0.1); animation:none; box-shadow:0 0 0 6px rgba(201,152,60,0.08); }
    .upload-zone.has-file { border-style:solid; border-color:rgba(201,152,60,0.5); animation:none; }
    @media (prefers-reduced-motion: reduce) { .upload-zone { animation: none; } }
    .cart-toast { position:fixed; bottom:32px; left:50%; transform:translateX(-50%) translateY(80px); background:linear-gradient(135deg,#DFB86A,#C9983C); color:#0E0E12; font-family:'DM Sans',sans-serif; font-size:0.88rem; font-weight:700; padding:14px 28px; border-radius:50px; z-index:9999; box-shadow:0 8px 32px rgba(201,152,60,0.4),0 2px 8px rgba(0,0,0,0.3); transition:transform 0.4s cubic-bezier(0.34,1.56,0.64,1), opacity 0.3s ease; opacity:0; pointer-events:none; white-space:nowrap; }
    .cart-toast.show { transform:translateX(-50%) translateY(0); opacity:1; }
  </style>
<?php wp_head(); ?>
</head>
<body>

  <!-- Cart Toast -->
  <div id="cart-toast" class="cart-toast"></div>

  <!-- Fixed Site Header -->
  <header class="site-header" id="site-header">

  <!-- Announcement Bar -->
  <div class="announcement">
    <div class="announcement-track" aria-hidden="true">
      <span>FREE SHIPPING &nbsp;·&nbsp; SATISFACTION GUARANTEED &nbsp;·&nbsp; UNLIMITED REVISIONS &nbsp;·&nbsp; FREE SHIPPING &nbsp;·&nbsp; SATISFACTION GUARANTEED &nbsp;·&nbsp; UNLIMITED REVISIONS &nbsp;·&nbsp; </span>
      <span>FREE SHIPPING &nbsp;·&nbsp; SATISFACTION GUARANTEED &nbsp;·&nbsp; UNLIMITED REVISIONS &nbsp;·&nbsp; FREE SHIPPING &nbsp;·&nbsp; SATISFACTION GUARANTEED &nbsp;·&nbsp; UNLIMITED REVISIONS &nbsp;·&nbsp; </span>
    </div>
  </div>

  <!-- Navigation -->
  <nav id="navbar">
    <a href="#" class="flex items-center gap-2" style="text-decoration:none;">
      <span style="font-family:'Bebas Neue',sans-serif; font-size:1.4rem; letter-spacing:0.1em; color:#F5F2EC; line-height:1;">PAWTRAIT CO</span>
    </a>

    <!-- Desktop nav links -->
    <div class="hidden md:flex items-center gap-8">
      <a href="#how-it-works" style="font-family:'DM Sans',sans-serif; font-size:0.85rem; letter-spacing:0.06em; color:rgba(245,242,236,0.85); text-decoration:none; transition:color 0.2s ease;" onmouseover="this.style.color='#C9983C'" onmouseout="this.style.color='rgba(245,242,236,0.7)'">HOW IT WORKS</a>
      <a href="#gallery" style="font-family:'DM Sans',sans-serif; font-size:0.85rem; letter-spacing:0.06em; color:rgba(245,242,236,0.85); text-decoration:none; transition:color 0.2s ease;" onmouseover="this.style.color='#C9983C'" onmouseout="this.style.color='rgba(245,242,236,0.7)'">GALLERY</a>
      <a href="#upload" style="font-family:'DM Sans',sans-serif; font-size:0.85rem; letter-spacing:0.06em; color:rgba(245,242,236,0.85); text-decoration:none; transition:color 0.2s ease;" onmouseover="this.style.color='#C9983C'" onmouseout="this.style.color='rgba(245,242,236,0.7)'">ORDER</a>
      <a href="#upload" class="btn-primary" style="padding:10px 24px; font-size:0.8rem;">Create Your Poster</a>
    </div>

    <!-- Hamburger -->
    <button id="menu-btn" onclick="toggleMenu()" style="display:flex; flex-direction:column; gap:5px; background:none; border:none; cursor:pointer; padding:8px;" class="md:hidden" aria-label="Open menu" focusable="true">
      <span style="display:block; width:24px; height:2px; background:#F5F2EC; border-radius:2px; transition:transform 0.3s ease;"></span>
      <span style="display:block; width:16px; height:2px; background:#C9983C; border-radius:2px;"></span>
      <span style="display:block; width:24px; height:2px; background:#F5F2EC; border-radius:2px; transition:transform 0.3s ease;"></span>
    </button>
  </nav>

  </header><!-- /site-header -->

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="mobile-menu">
    <button onclick="toggleMenu()" style="position:absolute; top:28px; right:24px; background:none; border:none; color:#F5F2EC; font-size:1.5rem; cursor:pointer; font-family:'DM Sans',sans-serif;" aria-label="Close menu">✕</button>
    <a href="#how-it-works" onclick="toggleMenu()" style="font-family:'Bebas Neue',sans-serif; font-size:2.5rem; letter-spacing:0.08em; color:#F5F2EC; text-decoration:none; transition:color 0.2s ease;" onmouseover="this.style.color='#C9983C'" onmouseout="this.style.color='#F5F2EC'">HOW IT WORKS</a>
    <a href="#gallery" onclick="toggleMenu()" style="font-family:'Bebas Neue',sans-serif; font-size:2.5rem; letter-spacing:0.08em; color:#F5F2EC; text-decoration:none; transition:color 0.2s ease;" onmouseover="this.style.color='#C9983C'" onmouseout="this.style.color='#F5F2EC'">GALLERY</a>
    <a href="#upload" onclick="toggleMenu()" style="font-family:'Bebas Neue',sans-serif; font-size:2.5rem; letter-spacing:0.08em; color:#F5F2EC; text-decoration:none; transition:color 0.2s ease;" onmouseover="this.style.color='#C9983C'" onmouseout="this.style.color='#F5F2EC'">ORDER</a>
    <a href="#upload" onclick="toggleMenu()" class="btn-primary" style="margin-top:16px;">Create Your Poster</a>
  </div>


  <!-- ═══════════════════════════════════════════════════ -->
  <!-- HERO SECTION -->
  <!-- ═══════════════════════════════════════════════════ -->
  <section class="bg-hero" style="min-height:120svh; display:flex; flex-direction:column; justify-content:flex-end; text-align:center; position:relative; overflow:hidden;">

    <!-- Full-bleed hero image — already contains title/copy -->
    <div style="position:absolute; inset:0; z-index:0;">
      <img src="<?php echo get_template_directory_uri(); ?>/pawtrait-assets/hf_20260311_130322_9acc0d6e-934a-4c82-8b56-b4490767e27c.png" alt="Your Pet's Ambition Reimagined — Pawtrait Co cinematic portrait" loading="eager" style="width:100%; height:100%; object-fit:cover; object-position:center top;" />
      <!-- Top gradient — nav legibility -->
      <div style="position:absolute; inset:0; background:linear-gradient(to bottom, rgba(10,10,13,0.55) 0%, transparent 28%); pointer-events:none;"></div>
      <!-- Bottom gradient — CTA legibility, starts lower to expose more image -->
      <div style="position:absolute; inset:0; background:linear-gradient(to top, rgba(10,10,13,1) 0%, rgba(10,10,13,0.85) 16%, rgba(10,10,13,0.3) 36%, transparent 55%); pointer-events:none;"></div>
    </div>

    <!-- CTA block anchored to bottom — single CTA only -->
    <div style="position:relative; z-index:2; padding:0 24px 56px; max-width:480px; margin:0 auto; width:100%;">
      <div style="display:flex; flex-direction:column; gap:14px; align-items:center; margin-bottom:32px;">
        <a href="#upload" class="btn-primary" style="font-size:0.9rem; padding:16px 36px; white-space:nowrap;">
          <span>Create Your Poster — $39</span>
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>

      <!-- Trust signals -->
      <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:center; gap:16px;">
        <div style="display:flex; align-items:center; gap:6px;">
          <div class="stars" style="font-size:0.75rem;">★★★★★</div>
          <span style="font-family:'DM Sans',sans-serif; font-size:0.78rem; color:rgba(245,242,236,0.75);">500+ happy customers</span>
        </div>
        <div style="width:1px; height:16px; background:rgba(245,242,236,0.12);"></div>
        <span style="font-family:'DM Sans',sans-serif; font-size:0.78rem; color:rgba(245,242,236,0.75);">✓ 100% Satisfaction Guarantee</span>
        <div style="width:1px; height:16px; background:rgba(245,242,236,0.12);"></div>
        <span style="font-family:'DM Sans',sans-serif; font-size:0.78rem; color:rgba(245,242,236,0.75);">✓ Free shipping</span>
      </div>
    </div>

  </section>


  <!-- ═══════════════════════════════════════════════════ -->
  <!-- GALLERY PREVIEW SECTION -->
  <!-- ═══════════════════════════════════════════════════ -->
  <section id="gallery" class="bg-section-dark" style="padding:64px 24px;">
    <div style="max-width:1100px; margin:0 auto;">

      <div class="reveal" style="text-align:center; margin-bottom:32px;">
        <h2 style="font-family:'Playfair Display',serif; font-size:clamp(1.8rem,5vw,2.6rem); font-weight:600; color:#F5F2EC; letter-spacing:-0.02em; line-height:1.2; margin:0 0 10px;">
          Real pets. Real <em style="color:#C9983C;">portraits.</em>
        </h2>
        <p style="font-family:'DM Sans',sans-serif; font-size:0.9rem; color:rgba(245,242,236,0.65); line-height:1.65; max-width:400px; margin:0 auto;">
          Each poster is built from your photo — your pet's face, their personality, their moment.
        </p>
      </div>

      <!-- Gallery: horizontal scroll on mobile, grid on desktop -->
      <div class="stagger-grid reveal" style="overflow-x:auto; overflow-y:visible; padding-bottom:8px;">
        <!-- Mobile: horizontal scroll row -->
        <div class="gallery-track" style="display:flex; gap:16px; padding-bottom:8px; scrollbar-width:none;">

          <!-- Real portrait artwork -->
          <div class="img-treatment" style="min-width:260px; width:260px; height:340px; flex-shrink:0; background:#1A0F05;">
            <img src="<?php echo get_template_directory_uri(); ?>/pawtrait-assets/hf_20260307_115605_a79bbb86-6a8c-48d5-9257-b6b289635a97%20(1).png" alt="The Heist — pet portrait artwork" loading="eager" />
            <div class="img-color-layer"></div>
          </div>

          <!-- Lifestyle: dog with framed print -->
          <div class="img-treatment" style="min-width:260px; width:260px; height:340px; flex-shrink:0; background:#2C1A0A;">
            <img src="<?php echo get_template_directory_uri(); ?>/pawtrait-assets/hf_20260124_091815_2ecd8e46-1a65-48cc-9faf-7ec15d5d7c8a.png" alt="Happy customer with Pawtrait Co framed portrait" loading="eager" style="object-position:center;" />
            <div class="img-color-layer"></div>
          </div>

          <!-- Lifestyle: corgi with framed print -->
          <div class="img-treatment" style="min-width:260px; width:260px; height:340px; flex-shrink:0; background:#3D2510;">
            <img src="<?php echo get_template_directory_uri(); ?>/pawtrait-assets/hf_20260310_115957_44a39a4c-b1b6-4f1f-8883-963719fa031e.png" alt="Happy customer with Pawtrait Co portrait" loading="eager" />
            <div class="img-color-layer"></div>
          </div>

        </div>
        <!-- Scroll hint fade on mobile -->
        <p style="font-family:'DM Sans',sans-serif; font-size:0.75rem; color:rgba(201,152,60,0.5); text-align:center; margin-top:12px; letter-spacing:0.08em;">← Swipe to explore →</p>
      </div>

    </div>
  </section>


  <!-- ═══════════════════════════════════════════════════ -->
  <!-- TESTIMONIALS SECTION — positioned for social proof before action -->
  <!-- ═══════════════════════════════════════════════════ -->
  <section style="padding:56px 24px; background:#2C1A0A; border-top:1px solid rgba(201,152,60,0.16);">
    <div style="max-width:1000px; margin:0 auto;">

      <div class="reveal" style="text-align:center; margin-bottom:32px;">
        <div style="display:flex; align-items:center; justify-content:center; gap:8px; margin-bottom:16px;">
          <div class="stars" style="font-size:0.85rem;">★★★★★</div>
          <span style="font-family:'DM Sans',sans-serif; font-size:0.85rem; font-weight:600; color:rgba(245,242,236,0.7);">4.9/5 from 500+ orders</span>
        </div>
        <h2 style="font-family:'Playfair Display',serif; font-size:clamp(1.8rem,5vw,2.6rem); font-weight:600; color:#F5F2EC; letter-spacing:-0.02em; line-height:1.2; margin:0;">
          Don't take our word for it
        </h2>
      </div>

      <div class="stagger-grid reveal" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:20px; max-width:900px; margin:0 auto;">

        <div class="card-elevated" style="padding:24px 20px;">
          <div class="stars" style="font-size:0.82rem; margin-bottom:12px;">★★★★★</div>
          <p style="font-family:'DM Sans',sans-serif; font-size:0.88rem; color:rgba(245,242,236,0.88); line-height:1.75; margin:0 0 20px;">
            "The Heist poster of Milo arrived and I actually cried. He looks like a full movie star. Every single person who visits asks about it."
          </p>
          <div style="display:flex; align-items:center; gap:10px;">
            <div style="width:32px; height:32px; border-radius:50%; background:rgba(201,152,60,0.2); border:1px solid rgba(201,152,60,0.3); display:flex; align-items:center; justify-content:center; font-size:0.7rem; color:#C9983C; font-family:'Bebas Neue',sans-serif;">SJ</div>
            <div>
              <p style="font-family:'DM Sans',sans-serif; font-size:0.82rem; font-weight:600; color:#F5F2EC; margin:0;">Sarah J.</p>
              <p style="font-family:'DM Sans',sans-serif; font-size:0.72rem; color:rgba(245,242,236,0.4); margin:0;">Golden Retriever mum</p>
            </div>
          </div>
        </div>

        <div class="card-elevated" style="padding:24px 20px;">
          <div class="stars" style="font-size:0.82rem; margin-bottom:12px;">★★★★★</div>
          <p style="font-family:'DM Sans',sans-serif; font-size:0.88rem; color:rgba(245,242,236,0.88); line-height:1.75; margin:0 0 20px;">
            "Got The Heist done for both my cats. The detail in the fur, the lighting, the drama — absolutely insane. Zero regrets, framed it immediately."
          </p>
          <div style="display:flex; align-items:center; gap:10px;">
            <div style="width:32px; height:32px; border-radius:50%; background:rgba(201,152,60,0.2); border:1px solid rgba(201,152,60,0.3); display:flex; align-items:center; justify-content:center; font-size:0.7rem; color:#C9983C; font-family:'Bebas Neue',sans-serif;">TM</div>
            <div>
              <p style="font-family:'DM Sans',sans-serif; font-size:0.82rem; font-weight:600; color:#F5F2EC; margin:0;">Tom M.</p>
              <p style="font-family:'DM Sans',sans-serif; font-size:0.72rem; color:rgba(245,242,236,0.4); margin:0;">Cat dad × 2</p>
            </div>
          </div>
        </div>

        <div class="card-elevated" style="padding:24px 20px;">
          <div class="stars" style="font-size:0.82rem; margin-bottom:12px;">★★★★★</div>
          <p style="font-family:'DM Sans',sans-serif; font-size:0.88rem; color:rgba(245,242,236,0.88); line-height:1.75; margin:0 0 20px;">
            "Ordered The Heist as a memorial for our dog Biscuit. Seeing him as a cinematic star on our wall — I'll treasure it forever."
          </p>
          <div style="display:flex; align-items:center; gap:10px;">
            <div style="width:32px; height:32px; border-radius:50%; background:rgba(201,152,60,0.2); border:1px solid rgba(201,152,60,0.3); display:flex; align-items:center; justify-content:center; font-size:0.7rem; color:#C9983C; font-family:'Bebas Neue',sans-serif;">EL</div>
            <div>
              <p style="font-family:'DM Sans',sans-serif; font-size:0.82rem; font-weight:600; color:#F5F2EC; margin:0;">Emma L.</p>
              <p style="font-family:'DM Sans',sans-serif; font-size:0.72rem; color:rgba(245,242,236,0.4); margin:0;">Spaniel mum</p>
            </div>
          </div>
        </div>

      </div>

      <!-- CTA after testimonials — capture emotional peak -->
      <div class="reveal" style="text-align:center; margin-top:32px;">
        <a href="#upload" class="btn-primary" style="font-size:0.88rem; padding:14px 32px;">Create Yours — $39</a>
      </div>

    </div>
  </section>


  <!-- ═══════════════════════════════════════════════════ -->
  <!-- HOW IT WORKS SECTION -->
  <!-- ═══════════════════════════════════════════════════ -->
  <section id="how-it-works" style="padding:64px 24px; background:#160C03; border-top:1px solid rgba(201,152,60,0.16);">
    <div style="max-width:1000px; margin:0 auto;">

      <div class="reveal" style="text-align:center; margin-bottom:48px;">
        <h2 style="font-family:'Playfair Display',serif; font-size:clamp(1.8rem,5vw,2.6rem); font-weight:600; color:#F5F2EC; letter-spacing:-0.02em; line-height:1.2; margin:0 0 10px;">
          How it <em style="color:#C9983C;">works</em>
        </h2>
        <p style="font-family:'DM Sans',sans-serif; font-size:0.9rem; color:rgba(245,242,236,0.65); line-height:1.65; max-width:380px; margin:0 auto;">
          Upload a photo. We do the rest. It's that simple.
        </p>
      </div>

      <div class="stagger-grid reveal" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:24px;">

        <!-- Step 1 -->
        <div class="card-elevated" style="padding:36px 28px; position:relative; overflow:hidden;">
          <div style="position:absolute; top:-10px; right:16px;"><span class="step-num">01</span></div>
          <div style="width:48px; height:48px; border-radius:12px; background:rgba(201,152,60,0.12); border:1px solid rgba(201,152,60,0.3); display:flex; align-items:center; justify-content:center; margin-bottom:20px;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#C9983C" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
          </div>
          <h3 style="font-family:'Playfair Display',serif; font-size:1.2rem; font-weight:600; color:#F5F2EC; margin:0 0 12px; line-height:1.3;">Upload Your Photo</h3>
          <p style="font-family:'DM Sans',sans-serif; font-size:0.9rem; color:rgba(245,242,236,0.88); line-height:1.75; margin:0;">
            Upload your photo — any clear image of your pet works. We handle the rest.
          </p>
        </div>

        <!-- Step 2 -->
        <div class="card-elevated" style="padding:36px 28px; position:relative; overflow:hidden;">
          <div style="position:absolute; top:-10px; right:16px;"><span class="step-num">02</span></div>
          <div style="width:48px; height:48px; border-radius:12px; background:rgba(201,152,60,0.12); border:1px solid rgba(201,152,60,0.3); display:flex; align-items:center; justify-content:center; margin-bottom:20px;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#C9983C" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
          </div>
          <h3 style="font-family:'Playfair Display',serif; font-size:1.2rem; font-weight:600; color:#F5F2EC; margin:0 0 12px; line-height:1.3;">We Create Your Heist Portrait</h3>
          <p style="font-family:'DM Sans',sans-serif; font-size:0.9rem; color:rgba(245,242,236,0.88); line-height:1.75; margin:0;">
            Your pet is transformed into a cinematic movie star in our signature Heist style.
          </p>
        </div>

        <!-- Step 3 -->
        <div class="card-elevated" style="padding:36px 28px; position:relative; overflow:hidden;">
          <div style="position:absolute; top:-10px; right:16px;"><span class="step-num">03</span></div>
          <div style="width:48px; height:48px; border-radius:12px; background:rgba(201,152,60,0.12); border:1px solid rgba(201,152,60,0.3); display:flex; align-items:center; justify-content:center; margin-bottom:20px;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#C9983C" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
          </div>
          <h3 style="font-family:'Playfair Display',serif; font-size:1.2rem; font-weight:600; color:#F5F2EC; margin:0 0 12px; line-height:1.3;">Receive Your Art</h3>
          <p style="font-family:'DM Sans',sans-serif; font-size:0.9rem; color:rgba(245,242,236,0.88); line-height:1.75; margin:0;">
            Your portrait is crafted with care and shipped free to your door — ready to hang, ready to treasure.
          </p>
        </div>

      </div>

      <div class="reveal" style="text-align:center; margin-top:48px;">
        <a href="#upload" class="btn-primary">Upload Your Photo</a>
      </div>

    </div>
  </section>


  <!-- THEMES SECTION — hidden until more themes launch -->
  <section style="display:none;">
    <div>

      <div class="reveal" style="text-align:center; margin-bottom:40px;">
        <div class="badge" style="margin-bottom:20px;">10 Themes</div>
        <h2 style="font-family:'Playfair Display',serif; font-size:clamp(2rem,6vw,3rem); font-weight:600; color:#F5F2EC; letter-spacing:-0.02em; line-height:1.2; margin:0 0 16px;">
          Choose your pet's <em style="color:#C9983C;">adventure</em>
        </h2>
        <div class="divider-gold" style="margin-bottom:16px;"></div>
        <p style="font-family:'DM Sans',sans-serif; font-size:0.95rem; color:rgba(245,242,236,0.88); line-height:1.75; max-width:480px; margin:0 auto;">
          Every theme transforms your pet into the star of their own cinematic world. Pick one — or collect them all.
        </p>
      </div>

      <div class="themes-compact reveal">

        <div class="card-base" style="padding:14px 12px; display:flex; align-items:center; gap:10px; transition:border-color 0.2s ease, transform 0.25s cubic-bezier(0.34,1.56,0.64,1);" onmouseover="this.style.borderColor='rgba(201,152,60,0.75)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(201,152,60,0.42)';this.style.transform='translateY(0)'">
          <span style="font-size:1.2rem; flex-shrink:0;">🕵️</span>
          <div>
            <div style="font-family:'Bebas Neue',sans-serif; font-size:0.95rem; letter-spacing:0.06em; color:#F5F2EC; line-height:1.1;">The Heist</div>
            <div style="font-family:'DM Sans',sans-serif; font-size:0.65rem; color:rgba(201,152,60,0.55); margin-top:2px; letter-spacing:0.04em;">Mission Impossible</div>
          </div>
        </div>

        <div class="card-base" style="padding:14px 12px; display:flex; align-items:center; gap:10px; transition:border-color 0.2s ease, transform 0.25s cubic-bezier(0.34,1.56,0.64,1);" onmouseover="this.style.borderColor='rgba(201,152,60,0.75)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(201,152,60,0.42)';this.style.transform='translateY(0)'">
          <span style="font-size:1.2rem; flex-shrink:0;">🔫</span>
          <div>
            <div style="font-family:'Bebas Neue',sans-serif; font-size:0.95rem; letter-spacing:0.06em; color:#F5F2EC; line-height:1.1;">The Spy</div>
            <div style="font-family:'DM Sans',sans-serif; font-size:0.65rem; color:rgba(201,152,60,0.55); margin-top:2px; letter-spacing:0.04em;">James Bond</div>
          </div>
        </div>

        <div class="card-base" style="padding:14px 12px; display:flex; align-items:center; gap:10px; transition:border-color 0.2s ease, transform 0.25s cubic-bezier(0.34,1.56,0.64,1);" onmouseover="this.style.borderColor='rgba(201,152,60,0.75)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(201,152,60,0.42)';this.style.transform='translateY(0)'">
          <span style="font-size:1.2rem; flex-shrink:0;">🚀</span>
          <div>
            <div style="font-family:'Bebas Neue',sans-serif; font-size:0.95rem; letter-spacing:0.06em; color:#F5F2EC; line-height:1.1;">The Astronaut</div>
            <div style="font-family:'DM Sans',sans-serif; font-size:0.65rem; color:rgba(201,152,60,0.55); margin-top:2px; letter-spacing:0.04em;">Deep Space</div>
          </div>
        </div>

        <div class="card-base" style="padding:14px 12px; display:flex; align-items:center; gap:10px; transition:border-color 0.2s ease, transform 0.25s cubic-bezier(0.34,1.56,0.64,1);" onmouseover="this.style.borderColor='rgba(201,152,60,0.75)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(201,152,60,0.42)';this.style.transform='translateY(0)'">
          <span style="font-size:1.2rem; flex-shrink:0;">👨‍🍳</span>
          <div>
            <div style="font-family:'Bebas Neue',sans-serif; font-size:0.95rem; letter-spacing:0.06em; color:#F5F2EC; line-height:1.1;">The Chef</div>
            <div style="font-family:'DM Sans',sans-serif; font-size:0.65rem; color:rgba(201,152,60,0.55); margin-top:2px; letter-spacing:0.04em;">Kitchen Chaos</div>
          </div>
        </div>

        <div class="card-base" style="padding:14px 12px; display:flex; align-items:center; gap:10px; transition:border-color 0.2s ease, transform 0.25s cubic-bezier(0.34,1.56,0.64,1);" onmouseover="this.style.borderColor='rgba(201,152,60,0.75)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(201,152,60,0.42)';this.style.transform='translateY(0)'">
          <span style="font-size:1.2rem; flex-shrink:0;">💼</span>
          <div>
            <div style="font-family:'Bebas Neue',sans-serif; font-size:0.95rem; letter-spacing:0.06em; color:#F5F2EC; line-height:1.1;">The CEO</div>
            <div style="font-family:'DM Sans',sans-serif; font-size:0.65rem; color:rgba(201,152,60,0.55); margin-top:2px; letter-spacing:0.04em;">Corner Office</div>
          </div>
        </div>

        <div class="card-base" style="padding:14px 12px; display:flex; align-items:center; gap:10px; transition:border-color 0.2s ease, transform 0.25s cubic-bezier(0.34,1.56,0.64,1);" onmouseover="this.style.borderColor='rgba(201,152,60,0.75)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(201,152,60,0.42)';this.style.transform='translateY(0)'">
          <span style="font-size:1.2rem; flex-shrink:0;">🎸</span>
          <div>
            <div style="font-family:'Bebas Neue',sans-serif; font-size:0.95rem; letter-spacing:0.06em; color:#F5F2EC; line-height:1.1;">The Rockstar</div>
            <div style="font-family:'DM Sans',sans-serif; font-size:0.65rem; color:rgba(201,152,60,0.55); margin-top:2px; letter-spacing:0.04em;">Stadium Stage</div>
          </div>
        </div>

        <div class="card-base" style="padding:14px 12px; display:flex; align-items:center; gap:10px; transition:border-color 0.2s ease, transform 0.25s cubic-bezier(0.34,1.56,0.64,1);" onmouseover="this.style.borderColor='rgba(201,152,60,0.75)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(201,152,60,0.42)';this.style.transform='translateY(0)'">
          <span style="font-size:1.2rem; flex-shrink:0;">🗺️</span>
          <div>
            <div style="font-family:'Bebas Neue',sans-serif; font-size:0.95rem; letter-spacing:0.06em; color:#F5F2EC; line-height:1.1;">The Explorer</div>
            <div style="font-family:'DM Sans',sans-serif; font-size:0.65rem; color:rgba(201,152,60,0.55); margin-top:2px; letter-spacing:0.04em;">Indiana Jones</div>
          </div>
        </div>

        <div class="card-base" style="padding:14px 12px; display:flex; align-items:center; gap:10px; transition:border-color 0.2s ease, transform 0.25s cubic-bezier(0.34,1.56,0.64,1);" onmouseover="this.style.borderColor='rgba(201,152,60,0.75)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(201,152,60,0.42)';this.style.transform='translateY(0)'">
          <span style="font-size:1.2rem; flex-shrink:0;">👑</span>
          <div>
            <div style="font-family:'Bebas Neue',sans-serif; font-size:0.95rem; letter-spacing:0.06em; color:#F5F2EC; line-height:1.1;">The Royals</div>
            <div style="font-family:'DM Sans',sans-serif; font-size:0.65rem; color:rgba(201,152,60,0.55); margin-top:2px; letter-spacing:0.04em;">Crown &amp; All</div>
          </div>
        </div>

        <div class="card-base" style="padding:14px 12px; display:flex; align-items:center; gap:10px; transition:border-color 0.2s ease, transform 0.25s cubic-bezier(0.34,1.56,0.64,1);" onmouseover="this.style.borderColor='rgba(201,152,60,0.75)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(201,152,60,0.42)';this.style.transform='translateY(0)'">
          <span style="font-size:1.2rem; flex-shrink:0;">🥇</span>
          <div>
            <div style="font-family:'Bebas Neue',sans-serif; font-size:0.95rem; letter-spacing:0.06em; color:#F5F2EC; line-height:1.1;">The Athlete</div>
            <div style="font-family:'DM Sans',sans-serif; font-size:0.65rem; color:rgba(201,152,60,0.55); margin-top:2px; letter-spacing:0.04em;">Olympic Podium</div>
          </div>
        </div>

        <div class="card-base" style="padding:14px 12px; display:flex; align-items:center; gap:10px; transition:border-color 0.2s ease, transform 0.25s cubic-bezier(0.34,1.56,0.64,1);" onmouseover="this.style.borderColor='rgba(201,152,60,0.75)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(201,152,60,0.42)';this.style.transform='translateY(0)'">
          <span style="font-size:1.2rem; flex-shrink:0;">🎭</span>
          <div>
            <div style="font-family:'Bebas Neue',sans-serif; font-size:0.95rem; letter-spacing:0.06em; color:#F5F2EC; line-height:1.1;">The Villain</div>
            <div style="font-family:'DM Sans',sans-serif; font-size:0.65rem; color:rgba(201,152,60,0.55); margin-top:2px; letter-spacing:0.04em;">Movie Villain Lair</div>
          </div>
        </div>

      </div>

      <div class="reveal" style="text-align:center; margin-top:28px;">
        <a href="#pricing" class="btn-primary" style="font-size:0.88rem; padding:13px 32px;">Pick Your Theme</a>
      </div>

    </div>
  </section>


  <!-- configurator removed — see upload + upsell below -->


  <!-- ═══════════════════════════════════════════════════ -->
  <!-- UPLOAD SECTION -->
  <!-- ═══════════════════════════════════════════════════ -->
  <section id="upload" style="padding:72px 24px; background:#0A0A0D; border-top:1px solid rgba(201,152,60,0.16);">
    <div style="max-width:600px; margin:0 auto;">

      <div class="reveal" style="text-align:center; margin-bottom:40px;">
        <h2 style="font-family:'Playfair Display',serif; font-size:clamp(2rem,6vw,3rem); font-weight:600; color:#F5F2EC; letter-spacing:-0.02em; line-height:1.2; margin:0 0 12px;">Upload Your Photo</h2>
        <p style="font-family:'DM Sans',sans-serif; font-size:0.95rem; color:rgba(245,242,236,0.75); line-height:1.75; margin:0;">Any clear photo works — we handle the rest.</p>
      </div>

      <!-- Risk-reversal trust cluster -->
      <div class="reveal" style="display:flex; flex-wrap:wrap; align-items:center; justify-content:center; gap:16px; margin-bottom:28px;">
        <div style="display:flex; align-items:center; gap:6px;">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4ade80" stroke-width="2" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-family:'DM Sans',sans-serif; font-size:0.78rem; color:rgba(245,242,236,0.6);">Unlimited revisions</span>
        </div>
        <div style="display:flex; align-items:center; gap:6px;">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4ade80" stroke-width="2" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-family:'DM Sans',sans-serif; font-size:0.78rem; color:rgba(245,242,236,0.6);">100% satisfaction guarantee</span>
        </div>
        <div style="display:flex; align-items:center; gap:6px;">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4ade80" stroke-width="2" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
          <span style="font-family:'DM Sans',sans-serif; font-size:0.78rem; color:rgba(245,242,236,0.6);">Digital proof within 3 business days</span>
        </div>
      </div>

      <div class="reveal" data-delay="100">
        <!-- Upload zone -->
        <div class="upload-zone" id="main-upload-zone"
          onclick="document.getElementById('main-photo-input').click()"
          ondragover="event.preventDefault(); this.classList.add('drag-active')"
          ondragleave="this.classList.remove('drag-active')"
          ondrop="handleMainPhotoDrop(event)">
          <input type="file" id="main-photo-input" accept="image/jpeg,image/png" style="display:none;" onchange="handleMainPhotoSelect(this.files[0])" />
          <div id="main-upload-placeholder">
            <div style="width:56px; height:56px; border-radius:14px; background:rgba(201,152,60,0.1); border:1px solid rgba(201,152,60,0.25); display:flex; align-items:center; justify-content:center; margin:0 auto 16px;">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#C9983C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
            </div>
            <p style="font-family:'DM Sans',sans-serif; font-size:0.95rem; font-weight:600; color:#F5F2EC; margin:0 0 6px;">
              <span class="md:hidden">Tap to upload your photo</span>
              <span class="hidden md:inline">Drag and drop your photo here</span>
            </p>
            <p style="font-family:'DM Sans',sans-serif; font-size:0.82rem; color:rgba(245,242,236,0.45); margin:0 0 16px;">
              <span class="md:hidden">JPG or PNG · Max 20 MB</span>
              <span class="hidden md:inline">or click to browse</span>
            </p>
            <p class="hidden md:block" style="font-family:'DM Sans',sans-serif; font-size:0.72rem; color:rgba(245,242,236,0.3); margin:0; letter-spacing:0.06em;">JPG, PNG · Max 20 MB</p>
          </div>
          <div id="main-upload-confirm" style="display:none; flex-direction:column; align-items:center; gap:12px; padding:8px 0;">
            <div style="width:56px; height:56px; border-radius:50%; background:rgba(201,152,60,0.15); border:1.5px solid #C9983C; display:flex; align-items:center; justify-content:center;">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#C9983C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <p style="font-family:'DM Sans',sans-serif; font-size:0.95rem; font-weight:600; color:#C9983C; margin:0;">Photo received — your poster is on its way.</p>
            <img id="main-preview-thumb" style="max-height:100px; max-width:100%; border-radius:10px; display:none;" alt="Your pet photo" />
            <p id="main-filename" style="font-family:'DM Sans',sans-serif; font-size:0.75rem; color:rgba(245,242,236,0.4); margin:0;"></p>
            <button onclick="event.stopPropagation(); clearMainPhoto()" style="background:none; border:1px solid rgba(245,242,236,0.15); border-radius:50px; padding:5px 14px; color:rgba(245,242,236,0.45); font-family:'DM Sans',sans-serif; font-size:0.72rem; cursor:pointer; transition:border-color 0.2s ease;" onmouseover="this.style.borderColor='rgba(245,242,236,0.4)'" onmouseout="this.style.borderColor='rgba(245,242,236,0.15)'">Change photo</button>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ═══════════════════════════════════════════════════ -->
  <!-- PRINT UPSELL SECTION -->
  <!-- ═══════════════════════════════════════════════════ -->
  <section id="print-upsell" style="display:none; padding:72px 24px; background:#160C03; border-top:1px solid rgba(201,152,60,0.16);">
    <div style="max-width:680px; margin:0 auto;">

      <div class="reveal" style="text-align:center; margin-bottom:40px;">
        <div class="badge" style="margin-bottom:20px;">Completely Optional</div>
        <h2 style="font-family:'Playfair Display',serif; font-size:clamp(1.8rem,5vw,2.6rem); font-weight:600; color:#F5F2EC; letter-spacing:-0.02em; line-height:1.2; margin:0 0 12px;">Want it on your wall?</h2>
        <div class="divider-gold" style="margin-bottom:16px;"></div>
        <p style="font-family:'DM Sans',sans-serif; font-size:0.9rem; color:rgba(245,242,236,0.6); line-height:1.65; margin:0;">Your $39 digital purchase earns you a <strong style="color:#C9983C;">$39 credit</strong> toward any print.</p>
      </div>

      <!-- Tab switcher -->
      <div class="reveal" style="display:flex; gap:0; border:1px solid rgba(201,152,60,0.25); border-radius:12px; overflow:hidden; margin-bottom:24px;">
        <button id="tab-framed" onclick="switchPrintTab('framed')" style="flex:1; padding:12px 16px; background:rgba(201,152,60,0.18); color:#DFB86A; font-family:'DM Sans',sans-serif; font-size:0.85rem; font-weight:600; letter-spacing:0.04em; border:none; cursor:pointer; transition:background 0.2s ease, color 0.2s ease;">Framed Prints</button>
        <button id="tab-canvas" onclick="switchPrintTab('canvas')" style="flex:1; padding:12px 16px; background:transparent; color:rgba(245,242,236,0.45); font-family:'DM Sans',sans-serif; font-size:0.85rem; font-weight:600; letter-spacing:0.04em; border:none; border-left:1px solid rgba(201,152,60,0.2); cursor:pointer; transition:background 0.2s ease, color 0.2s ease;">Canvas Prints</button>
      </div>

      <!-- Framed print options -->
      <div id="upsell-framed" class="reveal" style="display:flex; flex-direction:column; gap:8px;">
        <!-- rows rendered by JS -->
      </div>
      <!-- Canvas print options -->
      <div id="upsell-canvas" style="display:none; flex-direction:column; gap:8px;">
        <!-- rows rendered by JS -->
      </div>

      <div class="reveal" style="margin-top:20px; text-align:center;">
        <p style="font-family:'DM Sans',sans-serif; font-size:0.82rem; color:rgba(245,242,236,0.45); line-height:1.6; margin:0;">No print? No problem — your digital file is ready within 3 business days.</p>
      </div>

    </div>
  </section>

  <!-- ═══════════════════════════════════════════════════ -->
  <!-- ORDER SUMMARY + CHECKOUT -->
  <!-- ═══════════════════════════════════════════════════ -->
  <section id="order-summary" style="padding:56px 24px 72px; background:#0A0A0D; border-top:1px solid rgba(201,152,60,0.12);">
    <div style="max-width:520px; margin:0 auto;">

      <div class="reveal" style="text-align:center; margin-bottom:32px;">
        <h2 style="font-family:'Playfair Display',serif; font-size:clamp(1.6rem,4vw,2.2rem); font-weight:600; color:#F5F2EC; letter-spacing:-0.02em; margin:0 0 8px;">Your Order</h2>
        <div class="divider-gold"></div>
      </div>

      <div class="card-elevated reveal" style="padding:24px; margin-bottom:24px;">
        <!-- Digital line always present -->
        <div style="display:flex; align-items:center; justify-content:space-between; padding-bottom:14px; border-bottom:1px solid rgba(245,242,236,0.07); margin-bottom:14px;">
          <div style="display:flex; align-items:center; gap:10px;">
            <div style="width:8px; height:8px; border-radius:50%; background:#C9983C; flex-shrink:0;"></div>
            <span style="font-family:'DM Sans',sans-serif; font-size:0.9rem; color:#F5F2EC;">The Heist Digital File</span>
          </div>
          <span style="font-family:'Bebas Neue',sans-serif; font-size:1.2rem; color:#F5F2EC; letter-spacing:0.04em;">$39</span>
        </div>
        <!-- Print upsell line (hidden if none selected) -->
        <div id="order-print-line" style="display:none; align-items:center; justify-content:space-between; padding-bottom:14px; border-bottom:1px solid rgba(245,242,236,0.07); margin-bottom:14px;">
          <div style="display:flex; align-items:center; gap:10px;">
            <div style="width:8px; height:8px; border-radius:50%; background:#C9983C; flex-shrink:0;"></div>
            <span id="order-print-name" style="font-family:'DM Sans',sans-serif; font-size:0.9rem; color:#F5F2EC;">Print</span>
          </div>
          <div style="display:flex; align-items:center; gap:12px;">
            <span id="order-print-price" style="font-family:'Bebas Neue',sans-serif; font-size:1.2rem; color:#F5F2EC; letter-spacing:0.04em;">$69</span>
            <button onclick="removePrint()" style="font-family:'DM Sans',sans-serif; font-size:0.72rem; color:rgba(245,242,236,0.35); background:none; border:none; border-bottom:1px solid rgba(245,242,236,0.2); cursor:pointer; padding:0 0 1px; line-height:1; transition:color 0.2s ease, border-color 0.2s ease;" onmouseover="this.style.color='rgba(245,242,236,0.6)'; this.style.borderColor='rgba(245,242,236,0.4)'" onmouseout="this.style.color='rgba(245,242,236,0.35)'; this.style.borderColor='rgba(245,242,236,0.2)'" aria-label="Remove print from order">Remove</button>
          </div>
        </div>
        <!-- Total -->
        <div style="display:flex; align-items:center; justify-content:space-between;">
          <div>
            <span style="font-family:'DM Sans',sans-serif; font-size:0.85rem; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:rgba(245,242,236,0.55);">Total</span>
            <div style="font-family:'DM Sans',sans-serif; font-size:0.72rem; color:rgba(245,242,236,0.4); margin-top:2px;">Free shipping included</div>
          </div>
          <span id="order-total" style="font-family:'Bebas Neue',sans-serif; font-size:1.8rem; color:#DFB86A; letter-spacing:0.04em; line-height:1;">$39</span>
        </div>
      </div>

      <div class="reveal">
        <!-- Micro social proof -->
        <p style="font-family:'DM Sans',sans-serif; font-size:0.75rem; color:rgba(245,242,236,0.45); text-align:center; margin:0 0 12px; line-height:1.5;">
          <span class="stars" style="font-size:0.65rem; margin-right:4px;">★★★★★</span> Join 100's of happy pet owners and get yours today!
        </p>
        <button class="btn-primary" onclick="addToCartAndCheckout()" style="width:100%; justify-content:center; font-size:1rem; padding:18px 24px; border-radius:14px;">
          GET MY PORTRAIT <span id="checkout-btn-price" style="opacity:0.75;">· $39</span>
        </button>

        <!-- Payment logos row -->
        <div style="display:flex; align-items:center; justify-content:center; gap:10px; margin-top:18px; flex-wrap:wrap;">
          <span style="font-family:'DM Sans',sans-serif; font-size:0.7rem; font-weight:700; letter-spacing:0.06em; color:rgba(245,242,236,0.3); text-transform:uppercase;">Pay with</span>
          <img src="<?php echo get_template_directory_uri(); ?>/pawtrait-assets/Afterpay_Mint_Logo.jpg" alt="Afterpay" style="height:22px; border-radius:5px; opacity:0.9;" />
          <img src="<?php echo get_template_directory_uri(); ?>/pawtrait-assets/logo-dark.svg" alt="Zip" style="height:20px; filter:brightness(0) invert(1); opacity:0.6;" />
          <!-- PayPal -->
          <img src="<?php echo get_template_directory_uri(); ?>/pawtrait-assets/PayPal-Logo.wine.png" alt="PayPal" style="height:22px; border-radius:5px; opacity:0.85;" />
          <!-- Visa -->
          <img src="<?php echo get_template_directory_uri(); ?>/pawtrait-assets/Visa-Logo.png" alt="Visa" style="height:22px; border-radius:5px;" />
          <!-- Mastercard -->
          <img src="<?php echo get_template_directory_uri(); ?>/pawtrait-assets/Mastercard-logo.svg" alt="Mastercard" style="height:22px; border-radius:5px;" />
        </div>

        <!-- Trust signals -->
        <p style="font-family:'DM Sans',sans-serif; font-size:0.75rem; color:rgba(245,242,236,0.5); text-align:center; margin:14px 0 16px; line-height:1.6;">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" style="display:inline; vertical-align:-1px; margin-right:2px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>Secure checkout · Free shipping · Unlimited revisions
        </p>

      </div>

    </div>
  </section>

  <!-- ═══════════════════════════════════════════════════ -->
  <!-- FAQ SECTION -->
  <!-- ═══════════════════════════════════════════════════ -->
  <section class="bg-section-mid" style="padding:64px 24px;">
    <div style="max-width:640px; margin:0 auto;">

      <div class="reveal" style="text-align:center; margin-bottom:40px;">
        <h2 style="font-family:'Playfair Display',serif; font-size:clamp(1.8rem,5vw,2.6rem); font-weight:600; color:#F5F2EC; letter-spacing:-0.02em; line-height:1.2; margin:0;">
          Got <em style="color:#C9983C;">questions?</em>
        </h2>
      </div>

      <div class="stagger-grid reveal" style="display:flex; flex-direction:column; gap:4px;">

        <details class="card-base" style="padding:0; overflow:hidden; border-radius:12px; margin-bottom:8px;">
          <summary style="padding:20px 24px; display:flex; justify-content:space-between; align-items:center; gap:16px; cursor:pointer;">
            <span style="font-family:'DM Sans',sans-serif; font-size:0.95rem; font-weight:500; color:#F5F2EC; line-height:1.4;">Will it actually look like my pet?</span>
            <span class="faq-icon" style="color:#C9983C; font-size:1.2rem; flex-shrink:0; font-weight:300;">+</span>
          </summary>
          <div style="padding:0 24px 20px; border-top:1px solid rgba(201,152,60,0.08);">
            <p style="font-family:'DM Sans',sans-serif; font-size:0.88rem; color:rgba(245,242,236,0.88); line-height:1.75; margin:16px 0 0;">
              Yes — likeness is everything to us. We work from your photo directly and offer unlimited free revisions until you're completely happy with the result.
            </p>
          </div>
        </details>

        <details class="card-base" style="padding:0; overflow:hidden; border-radius:12px; margin-bottom:8px;">
          <summary style="padding:20px 24px; display:flex; justify-content:space-between; align-items:center; gap:16px; cursor:pointer;">
            <span style="font-family:'DM Sans',sans-serif; font-size:0.95rem; font-weight:500; color:#F5F2EC; line-height:1.4;">What photo should I send?</span>
            <span class="faq-icon" style="color:#C9983C; font-size:1.2rem; flex-shrink:0; font-weight:300;">+</span>
          </summary>
          <div style="padding:0 24px 20px; border-top:1px solid rgba(201,152,60,0.08);">
            <p style="font-family:'DM Sans',sans-serif; font-size:0.88rem; color:rgba(245,242,236,0.88); line-height:1.75; margin:16px 0 0;">
              A clear, well-lit photo works best — face visible, minimal blur. We work with all breeds and all ages. Even older or lower-quality photos can often work, so send us what you've got!
            </p>
          </div>
        </details>

        <details class="card-base" style="padding:0; overflow:hidden; border-radius:12px; margin-bottom:8px;">
          <summary style="padding:20px 24px; display:flex; justify-content:space-between; align-items:center; gap:16px; cursor:pointer;">
            <span style="font-family:'DM Sans',sans-serif; font-size:0.95rem; font-weight:500; color:#F5F2EC; line-height:1.4;">Do you offer revisions?</span>
            <span class="faq-icon" style="color:#C9983C; font-size:1.2rem; flex-shrink:0; font-weight:300;">+</span>
          </summary>
          <div style="padding:0 24px 20px; border-top:1px solid rgba(201,152,60,0.08);">
            <p style="font-family:'DM Sans',sans-serif; font-size:0.88rem; color:rgba(245,242,236,0.88); line-height:1.75; margin:16px 0 0;">
              Absolutely. Every order comes with unlimited revisions — we keep refining until you're completely in love with it. We won't finalise until you say it's perfect.
            </p>
          </div>
        </details>

        <details class="card-base" style="padding:0; overflow:hidden; border-radius:12px; margin-bottom:8px;">
          <summary style="padding:20px 24px; display:flex; justify-content:space-between; align-items:center; gap:16px; cursor:pointer;">
            <span style="font-family:'DM Sans',sans-serif; font-size:0.95rem; font-weight:500; color:#F5F2EC; line-height:1.4;">Which pets can you create a poster for?</span>
            <span class="faq-icon" style="color:#C9983C; font-size:1.2rem; flex-shrink:0; font-weight:300;">+</span>
          </summary>
          <div style="padding:0 24px 20px; border-top:1px solid rgba(201,152,60,0.08);">
            <p style="font-family:'DM Sans',sans-serif; font-size:0.88rem; color:rgba(245,242,236,0.88); line-height:1.75; margin:16px 0 0;">
              All of them! Dogs, cats, rabbits, horses, birds, reptiles — if it's yours and you love it, we'll create a poster with the reverence it deserves.
            </p>
          </div>
        </details>

        <details class="card-base" style="padding:0; overflow:hidden; border-radius:12px; margin-bottom:8px;">
          <summary style="padding:20px 24px; display:flex; justify-content:space-between; align-items:center; gap:16px; cursor:pointer;">
            <span style="font-family:'DM Sans',sans-serif; font-size:0.95rem; font-weight:500; color:#F5F2EC; line-height:1.4;">Is shipping really free?</span>
            <span class="faq-icon" style="color:#C9983C; font-size:1.2rem; flex-shrink:0; font-weight:300;">+</span>
          </summary>
          <div style="padding:0 24px 20px; border-top:1px solid rgba(201,152,60,0.08);">
            <p style="font-family:'DM Sans',sans-serif; font-size:0.88rem; color:rgba(245,242,236,0.88); line-height:1.75; margin:16px 0 0;">
              Yes — every order ships free Australia-wide, whether it's a framed print or canvas. Digital files are delivered straight to your inbox within 3 business days.
            </p>
          </div>
        </details>

      </div>

    </div>
  </section>




  <!-- ═══════════════════════════════════════════════════ -->
  <!-- FOOTER -->
  <!-- ═══════════════════════════════════════════════════ -->
  <footer style="background:#0E0E12; border-top:1px solid rgba(201,152,60,0.1); padding:48px 24px 96px;">
    <div style="max-width:1000px; margin:0 auto;">

      <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:40px; margin-bottom:40px;">

        <div>
          <span style="font-family:'Bebas Neue',sans-serif; font-size:1.6rem; letter-spacing:0.1em; color:#F5F2EC; display:block; margin-bottom:12px;">PAWTRAIT CO</span>
          <p style="font-family:'Playfair Display',serif; font-style:italic; font-size:0.9rem; color:rgba(245,242,236,0.7); line-height:1.6; margin:0 0 20px;">Your Pet's Ambition, Reimagined.</p>
          <div style="display:flex; gap:12px;">
            <a href="https://www.instagram.com/pawtraitco" target="_blank" rel="noopener" style="width:36px; height:36px; border-radius:8px; background:rgba(201,152,60,0.1); border:1px solid rgba(201,152,60,0.2); display:flex; align-items:center; justify-content:center; text-decoration:none; overflow:hidden; transition:background 0.2s ease;" onmouseover="this.style.background='rgba(201,152,60,0.2)'" onmouseout="this.style.background='rgba(201,152,60,0.1)'" aria-label="Instagram">
              <img src="<?php echo get_template_directory_uri(); ?>/pawtrait-assets/Instagram_logo_2016.svg.webp" alt="Instagram" style="width:20px; height:20px; object-fit:contain;" />
            </a>
            <a href="https://www.tiktok.com/@pawtraitco" target="_blank" rel="noopener" style="width:36px; height:36px; border-radius:8px; background:rgba(201,152,60,0.1); border:1px solid rgba(201,152,60,0.2); display:flex; align-items:center; justify-content:center; text-decoration:none; overflow:hidden; transition:background 0.2s ease;" onmouseover="this.style.background='rgba(201,152,60,0.2)'" onmouseout="this.style.background='rgba(201,152,60,0.1)'" aria-label="TikTok">
              <img src="<?php echo get_template_directory_uri(); ?>/pawtrait-assets/Tiktok_Logo.png" alt="TikTok" style="width:20px; height:20px; object-fit:contain;" />
            </a>
          </div>
        </div>

        <div>
          <p style="font-family:'DM Sans',sans-serif; font-size:0.75rem; font-weight:600; letter-spacing:0.1em; text-transform:uppercase; color:rgba(201,152,60,0.7); margin:0 0 16px;">Quick Links</p>
          <div style="display:flex; flex-direction:column; gap:10px;">
            <a href="#gallery" style="font-family:'DM Sans',sans-serif; font-size:0.88rem; color:rgba(245,242,236,0.88); text-decoration:none; transition:color 0.2s ease;" onmouseover="this.style.color='#C9983C'" onmouseout="this.style.color='rgba(245,242,236,0.55)'">Gallery</a>
            <a href="#how-it-works" style="font-family:'DM Sans',sans-serif; font-size:0.88rem; color:rgba(245,242,236,0.88); text-decoration:none; transition:color 0.2s ease;" onmouseover="this.style.color='#C9983C'" onmouseout="this.style.color='rgba(245,242,236,0.55)'">How It Works</a>
            <a href="#upload" style="font-family:'DM Sans',sans-serif; font-size:0.88rem; color:rgba(245,242,236,0.88); text-decoration:none; transition:color 0.2s ease;" onmouseover="this.style.color='#C9983C'" onmouseout="this.style.color='rgba(245,242,236,0.55)'">Order</a>
            <a href="#upload" style="font-family:'DM Sans',sans-serif; font-size:0.88rem; color:rgba(245,242,236,0.88); text-decoration:none; transition:color 0.2s ease;" onmouseover="this.style.color='#C9983C'" onmouseout="this.style.color='rgba(245,242,236,0.55)'">Create Your Poster</a>
          </div>
        </div>

        <div>
          <p style="font-family:'DM Sans',sans-serif; font-size:0.75rem; font-weight:600; letter-spacing:0.1em; text-transform:uppercase; color:rgba(201,152,60,0.7); margin:0 0 16px;">Contact</p>
          <p style="font-family:'DM Sans',sans-serif; font-size:0.88rem; color:rgba(245,242,236,0.88); margin:0 0 8px; line-height:1.6;">hello@pawtraitco.com</p>
          <p style="font-family:'DM Sans',sans-serif; font-size:0.82rem; color:rgba(245,242,236,0.35); line-height:1.6; margin:0;">We reply within 24 hours, Monday–Friday. We love hearing about your pets.</p>
        </div>

      </div>

      <div style="border-top:1px solid rgba(245,242,236,0.06); padding-top:24px; display:flex; flex-wrap:wrap; justify-content:space-between; align-items:center; gap:12px;">
        <p style="font-family:'DM Sans',sans-serif; font-size:0.78rem; color:rgba(245,242,236,0.3); margin:0;">© 2026 Pawtrait Co. All rights reserved.</p>
        <div style="display:flex; gap:20px;">
          <a href="#" style="font-family:'DM Sans',sans-serif; font-size:0.78rem; color:rgba(245,242,236,0.3); text-decoration:none; transition:color 0.2s ease;" onmouseover="this.style.color='rgba(245,242,236,0.6)'" onmouseout="this.style.color='rgba(245,242,236,0.3)'">Privacy</a>
          <a href="#" style="font-family:'DM Sans',sans-serif; font-size:0.78rem; color:rgba(245,242,236,0.3); text-decoration:none; transition:color 0.2s ease;" onmouseover="this.style.color='rgba(245,242,236,0.6)'" onmouseout="this.style.color='rgba(245,242,236,0.3)'">Terms</a>
          <a href="#" style="font-family:'DM Sans',sans-serif; font-size:0.78rem; color:rgba(245,242,236,0.3); text-decoration:none; transition:color 0.2s ease;" onmouseover="this.style.color='rgba(245,242,236,0.6)'" onmouseout="this.style.color='rgba(245,242,236,0.3)'">Refunds</a>
        </div>
      </div>

    </div>
  </footer>


  <!-- ═══════════════════════════════════════════════════ -->
  <!-- JAVASCRIPT -->
  <!-- ═══════════════════════════════════════════════════ -->
  <script>
    // Navbar scroll effect + sticky bar visibility
    const navbar = document.getElementById('navbar');
    const siteHeader = document.getElementById('site-header');
    const stickyBar = document.getElementById('sticky-bar');
    const orderSummaryEl = document.getElementById('order-summary');
    const heroEl = document.querySelector('section.bg-hero');

    window.addEventListener('scroll', () => {
      if (window.scrollY > 60) {
        navbar.classList.add('scrolled');
        if (siteHeader) siteHeader.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
        if (siteHeader) siteHeader.classList.remove('scrolled');
      }
      // Fade sticky bar in once user starts scrolling; hide when order summary is visible
      if (stickyBar) {
        const hasScrolled = window.scrollY > 80;
        const orderInView = orderSummaryEl ? (orderSummaryEl.getBoundingClientRect().top < window.innerHeight && orderSummaryEl.getBoundingClientRect().bottom > 0) : false;
        const visible = hasScrolled && !orderInView;
        stickyBar.style.opacity = visible ? '1' : '0';
        stickyBar.style.pointerEvents = visible ? 'auto' : 'none';
      }
    }, { passive: true });

    // Mobile menu toggle
    function toggleMenu() {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('open');
      document.body.style.overflow = menu.classList.contains('open') ? 'hidden' : '';
    }

    // ── Enhanced scroll reveal ──────────────────────────
    window.addEventListener('load', () => {
      const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

      // All reveal variant selectors
      const allRevealSelectors = '.reveal, .reveal-fade, .reveal-scale, .reveal-left, .reveal-right, .stagger-grid';
      const reveals = document.querySelectorAll(allRevealSelectors);

      if (prefersReduced) {
        // Skip animations entirely for users who prefer reduced motion
        reveals.forEach(el => {
          el.style.opacity = '1';
          el.style.transform = 'none';
        });
        return;
      }

      const vh = window.innerHeight;
      reveals.forEach(el => {
        const rect = el.getBoundingClientRect();
        if (rect.top > vh * 0.92) el.classList.add('hidden-init');
      });

      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const el = entry.target;
            // Slight delay based on data-delay attr for manual orchestration
            const delay = parseInt(el.dataset.delay || 0);
            if (delay) el.style.transitionDelay = delay + 'ms';
            el.classList.remove('hidden-init');
            el.classList.add('visible');
            observer.unobserve(el);
          }
        });
      }, { threshold: 0.07, rootMargin: '0px 0px -32px 0px' });

      reveals.forEach(el => observer.observe(el));
    });

    // ── Product Configurator ─────────────────────────────
    const PRICES = {
      canvas: [
        {size:'20×30 cm', price:59},
        {size:'40×50 cm', price:119, badge:'Most Popular'},
        {size:'50×70 cm', price:179},
        {size:'60×80 cm', price:249}
      ],
      framed: [
        {size:'20×30 cm', price:89},
        {size:'30×40 cm', price:99,  badge:'Most Popular'},
        {size:'40×50 cm', price:150},
        {size:'50×70 cm', price:199},
        {size:'60×90 cm', price:279}
      ]
    };

    const conf = { theme:'The Heist', format:'canvas', sizeIdx:1 };

    function selectTheme(btn, name, imgSrc) {
      document.querySelectorAll('.theme-pill').forEach(p => p.classList.remove('active'));
      btn.classList.add('active');
      conf.theme = name;
      document.getElementById('conf-theme-name').textContent = name;
      document.getElementById('product-theme-badge').textContent = name;
      const img = document.getElementById('product-img');
      img.src = imgSrc || ('https://placehold.co/520x680/1A0F05/C9983C?text=' + encodeURIComponent(name));
      updateHeader();
    }

    function selectFormat(fmt) {
      conf.format = fmt;
      conf.sizeIdx = 1;
      document.getElementById('btn-canvas').classList.toggle('active', fmt === 'canvas');
      document.getElementById('btn-framed').classList.toggle('active', fmt === 'framed');
      document.getElementById('frame-overlay').style.display = fmt === 'framed' ? 'block' : 'none';
      renderSizes();
      updateHeader();
    }

    function selectSize(idx) {
      conf.sizeIdx = idx;
      document.querySelectorAll('.size-card').forEach((c, i) => c.classList.toggle('active', i === idx));
      updateHeader();
    }

    function renderSizes() {
      const sizes = PRICES[conf.format];
      document.getElementById('size-picker').innerHTML = sizes.map((s, i) => `
        <div class="size-card ${i === conf.sizeIdx ? 'active' : ''}" onclick="selectSize(${i})">
          ${s.badge ? `<div style="margin-bottom:6px;"><span style="display:inline-block;background:rgba(201,152,60,0.15);border:1px solid rgba(201,152,60,0.35);border-radius:50px;padding:2px 9px;font-family:'DM Sans',sans-serif;font-size:0.58rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:#C9983C;">${s.badge}</span></div>` : `<div style="margin-bottom:6px;height:18px;"></div>`}
          <p style="font-family:'DM Sans',sans-serif;font-size:0.82rem;font-weight:600;color:#F5F2EC;margin:0 0 4px;">${s.size}</p>
          <span style="font-family:'Bebas Neue',sans-serif;font-size:1.6rem;color:#F5F2EC;line-height:1;">$${s.price}</span>
        </div>
      `).join('');
    }

    function updateHeader() {
      const s = PRICES[conf.format][conf.sizeIdx];
      document.getElementById('price-display').textContent = '$' + s.price;
      document.getElementById('conf-format-name').textContent = (conf.format === 'canvas' ? 'Canvas' : 'Framed') + ' · ' + s.size;
      document.getElementById('cart-price-label').textContent = '$' + s.price;
    }

    function setPreviewImg(el, src) {
      document.getElementById('product-img').src = src;
      document.querySelectorAll('.thumb-wrap').forEach(t => t.style.border = '1px solid rgba(201,152,60,0.2)');
      el.style.border = '2px solid #C9983C';
    }

    function handlePhotoSelect(file) { if (file) showPhotoPreview(file); }

    function handlePhotoDrop(e) {
      e.preventDefault();
      document.getElementById('upload-zone').classList.remove('drag-active');
      const file = e.dataTransfer.files[0];
      if (file && file.type.startsWith('image/')) showPhotoPreview(file);
    }

    function showPhotoPreview(file) {
      const reader = new FileReader();
      reader.onload = e => {
        document.getElementById('preview-thumb').src = e.target.result;
        document.getElementById('upload-placeholder').style.display = 'none';
        document.getElementById('upload-preview').style.display = 'flex';
        document.getElementById('upload-zone').classList.add('has-file');
      };
      reader.readAsDataURL(file);
    }

    function clearPhoto() {
      document.getElementById('pet-photo-input').value = '';
      document.getElementById('upload-placeholder').style.display = 'block';
      document.getElementById('upload-preview').style.display = 'none';
      document.getElementById('upload-zone').classList.remove('has-file');
    }

    function addToCart() {
      const s = PRICES[conf.format][conf.sizeIdx];
      const fmt = conf.format === 'canvas' ? 'Canvas' : 'Framed';
      const toast = document.getElementById('cart-toast');
      toast.textContent = '✓  ' + conf.theme + ' · ' + fmt + ' ' + s.size + ' — $' + s.price + ' AUD';
      toast.classList.add('show');
      setTimeout(() => toast.classList.remove('show'), 3500);
    }

    document.addEventListener('DOMContentLoaded', () => { renderSizes(); updateHeader(); });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    });

    // ── Upload flow ──────────────────────────────────────
    let uploadedFile = null;
    let selectedPrint = null; // { type, size, listedPrice, youPay }

    const UPSELL_FRAMED = [
      { size:'20×30 cm', listed:108, youPay:69 },
      { size:'30×45 cm', listed:148, youPay:109 },
      { size:'45×60 cm', listed:198, youPay:159, badge:'Most Popular' },
      { size:'50×70 cm', listed:238, youPay:199, badge:'Best Value' },
      { size:'60×90 cm', listed:318, youPay:279 },
    ];
    const UPSELL_CANVAS = [
      { size:'20×30 cm', listed:98, youPay:59 },
      { size:'45×60 cm', listed:158, youPay:119, badge:'Most Popular' },
      { size:'50×70 cm', listed:218, youPay:179, badge:'Best Value' },
      { size:'60×90 cm', listed:288, youPay:249 },
    ];

    // ── WooCommerce product / variation IDs ──────────────
    const WOO_BASE_URL = '<?php echo esc_url( rtrim( home_url(), '/' ) ); ?>';
    const WOO_DIGITAL_ID = 4479; // The Heist — Digital File ($39)
    const WOO_FRAMED_VARIATION_IDS = {
      '20×30 cm': 4481,
      '30×45 cm': 4482,
      '45×60 cm': 4483,
      '50×70 cm': 4484,
      '60×90 cm': 4485,
    };
    const WOO_CANVAS_VARIATION_IDS = {
      '20×30 cm': 4487,
      '45×60 cm': 4488,
      '50×70 cm': 4489,
      '60×90 cm': 4490,
    };

    function renderUpsellRows(type) {
      const items = type === 'framed' ? UPSELL_FRAMED : UPSELL_CANVAS;
      return items.map((item, i) => {
        const isMostPopular = item.badge === 'Most Popular';
        const borderColor = isMostPopular ? 'rgba(201,152,60,0.5)' : 'rgba(201,152,60,0.2)';
        const bgColor = isMostPopular ? 'rgba(201,152,60,0.1)' : 'rgba(201,152,60,0.04)';
        const extraShadow = isMostPopular ? 'box-shadow:0 0 20px rgba(201,152,60,0.08);' : '';
        const scale = isMostPopular ? 'transform:scale(1.02);' : '';
        return `
        <div class="upsell-row" id="urow-${type}-${i}" onclick="selectPrint('${type}',${i})"
          style="display:flex; align-items:center; justify-content:space-between; padding:${isMostPopular ? '16px 18px' : '14px 16px'}; border-radius:12px; border:1.5px solid ${borderColor}; background:${bgColor}; cursor:pointer; gap:12px; touch-action:manipulation; transition:border-color 0.2s ease, background 0.2s ease, transform 0.15s ease; ${extraShadow} ${scale}"
          onmouseover="if(!this.classList.contains('urow-active')){this.style.borderColor='rgba(201,152,60,0.5)';this.style.background='rgba(201,152,60,0.1)';this.style.transform='translateY(-1px)${isMostPopular ? ' scale(1.02)' : ''}';}"
          onmouseout="if(!this.classList.contains('urow-active')){this.style.borderColor='${borderColor}';this.style.background='${bgColor}';this.style.transform='${isMostPopular ? 'scale(1.02)' : 'translateY(0)'}';}"
          onmousedown="this.style.transform='scale(0.99)'" onmouseup="this.style.transform='translateY(-1px)'">
          <div style="flex:1;">
            <div style="display:flex; align-items:center; gap:8px; flex-wrap:wrap;">
              <span style="font-family:'DM Sans',sans-serif; font-size:${isMostPopular ? '0.92rem' : '0.88rem'}; font-weight:600; color:#F5F2EC;">${item.size}</span>
              ${isMostPopular ? `<span style="font-family:'DM Sans',sans-serif;font-size:0.6rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;background:linear-gradient(135deg,rgba(201,152,60,0.25),rgba(201,152,60,0.15));border:1px solid rgba(201,152,60,0.55);color:#DFB86A;padding:3px 10px;border-radius:50px;">MOST POPULAR</span>` : ''}
              ${item.badge === 'Best Value' ? `<span style="font-family:'DM Sans',sans-serif;font-size:0.6rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;background:rgba(74,222,128,0.1);border:1px solid rgba(74,222,128,0.3);color:#4ade80;padding:2px 8px;border-radius:50px;">${item.badge}</span>` : ''}
            </div>
          </div>
          <div style="text-align:right; flex-shrink:0;">
            <div style="font-family:'DM Sans',sans-serif; font-size:0.75rem; color:rgba(245,242,236,0.5); text-decoration:line-through; margin-bottom:2px;">$${item.youPay + 39}</div>
            <div style="font-family:'Bebas Neue',sans-serif; font-size:${isMostPopular ? '1.6rem' : '1.4rem'}; color:#DFB86A; line-height:1; letter-spacing:0.04em;">$${item.youPay}</div>
          </div>
        </div>
      `}).join('');
    }

    function initUpsell() {
      document.getElementById('upsell-framed').innerHTML = renderUpsellRows('framed');
      document.getElementById('upsell-canvas').innerHTML = renderUpsellRows('canvas');
    }

    function switchPrintTab(tab) {
      const isFramed = tab === 'framed';
      document.getElementById('upsell-framed').style.display = isFramed ? 'flex' : 'none';
      document.getElementById('upsell-canvas').style.display = isFramed ? 'none' : 'flex';
      document.getElementById('tab-framed').style.background = isFramed ? 'rgba(201,152,60,0.18)' : 'transparent';
      document.getElementById('tab-framed').style.color = isFramed ? '#DFB86A' : 'rgba(245,242,236,0.45)';
      document.getElementById('tab-canvas').style.background = isFramed ? 'transparent' : 'rgba(201,152,60,0.18)';
      document.getElementById('tab-canvas').style.color = isFramed ? 'rgba(245,242,236,0.45)' : '#DFB86A';
      // Clear selection when switching tabs
      selectedPrint = null;
      updateOrderSummary();
      document.querySelectorAll('.upsell-row').forEach(r => {
        r.classList.remove('urow-active');
        r.style.borderColor = 'rgba(201,152,60,0.2)';
        r.style.background = 'rgba(201,152,60,0.04)';
      });
    }

    function selectPrint(type, idx) {
      const item = type === 'framed' ? UPSELL_FRAMED[idx] : UPSELL_CANVAS[idx];
      // Toggle off if already selected
      if (selectedPrint && selectedPrint.type === type && selectedPrint.idx === idx) {
        selectedPrint = null;
        document.querySelectorAll('.upsell-row').forEach(r => {
          r.classList.remove('urow-active');
          r.style.borderColor = 'rgba(201,152,60,0.2)';
          r.style.background = 'rgba(201,152,60,0.04)';
        });
      } else {
        selectedPrint = { type, idx, size: item.size, listed: item.listed, youPay: item.youPay };
        document.querySelectorAll('.upsell-row').forEach(r => {
          r.classList.remove('urow-active');
          r.style.borderColor = 'rgba(201,152,60,0.2)';
          r.style.background = 'rgba(201,152,60,0.04)';
        });
        const row = document.getElementById(`urow-${type}-${idx}`);
        if (row) {
          row.classList.add('urow-active');
          row.style.borderColor = '#C9983C';
          row.style.background = 'rgba(201,152,60,0.14)';
        }
      }
      updateOrderSummary();
    }

    function updateOrderSummary() {
      const printLine = document.getElementById('order-print-line');
      const printName = document.getElementById('order-print-name');
      const printPrice = document.getElementById('order-print-price');
      const total = document.getElementById('order-total');
      const btnPrice = document.getElementById('checkout-btn-price');
      if (selectedPrint) {
        const typeName = selectedPrint.type === 'framed' ? 'Framed Print' : 'Canvas Print';
        printName.textContent = typeName + ' · ' + selectedPrint.size;
        printPrice.textContent = '$' + selectedPrint.youPay;
        printLine.style.display = 'flex';
        const totalAmt = 39 + selectedPrint.youPay;
        total.textContent = '$' + totalAmt;
        if (btnPrice) btnPrice.textContent = '· $' + totalAmt;
      } else {
        printLine.style.display = 'none';
        total.textContent = '$39';
        if (btnPrice) btnPrice.textContent = '· $39';
      }
    }

    function removePrint() {
      selectedPrint = null;
      updateOrderSummary();
      renderUpsellRows('framed');
      renderUpsellRows('canvas');
    }

    function skipPrint(e) {
      e.preventDefault();
      selectedPrint = null;
      updateOrderSummary();
      document.getElementById('order-summary').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function revealUpsellFlow() {
      const upsell = document.getElementById('print-upsell');
      upsell.style.display = 'block';
      initUpsell();
      setTimeout(() => {
        upsell.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }, 300);
    }

    function handleMainPhotoDrop(e) {
      e.preventDefault();
      document.getElementById('main-upload-zone').classList.remove('drag-active');
      const file = e.dataTransfer.files[0];
      if (file && (file.type === 'image/jpeg' || file.type === 'image/png')) {
        processMainPhoto(file);
      }
    }

    function handleMainPhotoSelect(file) {
      if (file) processMainPhoto(file);
    }

    function processMainPhoto(file) {
      uploadedFile = file;
      const reader = new FileReader();
      reader.onload = e => {
        const thumb = document.getElementById('main-preview-thumb');
        thumb.src = e.target.result;
        thumb.style.display = 'block';
        document.getElementById('main-filename').textContent = file.name;
        document.getElementById('main-upload-placeholder').style.display = 'none';
        document.getElementById('main-upload-confirm').style.display = 'flex';
        document.getElementById('main-upload-zone').classList.add('has-file');
        revealUpsellFlow();
      };
      reader.readAsDataURL(file);
    }

    function clearMainPhoto() {
      uploadedFile = null;
      selectedPrint = null;
      document.getElementById('main-photo-input').value = '';
      document.getElementById('main-upload-placeholder').style.display = 'block';
      document.getElementById('main-upload-confirm').style.display = 'none';
      document.getElementById('main-preview-thumb').style.display = 'none';
      document.getElementById('main-upload-zone').classList.remove('has-file');
      document.getElementById('print-upsell').style.display = 'none';
      updateOrderSummary();
    }

    async function addToCartAndCheckout() {
      if (!uploadedFile) {
        document.getElementById('upload').scrollIntoView({ behavior: 'smooth' });
        return;
      }

      // Button loading state
      const btn = document.querySelector('[onclick="addToCartAndCheckout()"]');
      const originalHTML = btn ? btn.innerHTML : '';
      if (btn) { btn.disabled = true; btn.innerHTML = 'Adding to cart…'; }

      try {
        // 1. Always add the digital file
        await wooAddToCart(WOO_DIGITAL_ID);

        // 2. Add print variation if selected
        if (selectedPrint) {
          const varMap = selectedPrint.type === 'framed' ? WOO_FRAMED_VARIATION_IDS : WOO_CANVAS_VARIATION_IDS;
          const variationId = varMap[selectedPrint.size];
          if (variationId) await wooAddToCart(variationId);
        }

        // 3. Redirect to checkout
        window.location.href = WOO_BASE_URL + '/checkout';

      } catch (err) {
        console.error('WooCommerce cart error:', err);
        if (btn) { btn.disabled = false; btn.innerHTML = originalHTML; }
        const toast = document.getElementById('cart-toast');
        toast.textContent = 'Something went wrong — please try again.';
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 4000);
      }
    }

    async function wooAddToCart(productId) {
      const resp = await fetch(WOO_BASE_URL + '/wp-json/wc/store/v1/cart/add-item', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        credentials: 'include',
        body: JSON.stringify({ id: productId, quantity: 1 }),
      });
      if (!resp.ok) {
        const err = await resp.json().catch(() => ({}));
        throw new Error(err.message || 'Failed to add item ' + productId);
      }
      return resp.json();
    }
  </script>

  <!-- Sticky mobile bottom bar -->
  <div id="sticky-bar" style="position:fixed; bottom:0; left:0; right:0; z-index:200; background:linear-gradient(135deg,#A07828,#C9983C,#A07828); padding:14px 24px; display:flex; align-items:center; justify-content:space-between; box-shadow:0 -4px 24px rgba(0,0,0,0.4); transition:opacity 0.4s ease; opacity:0; pointer-events:none;" class="md:hidden">
    <div>
      <p style="font-family:'Bebas Neue',sans-serif; font-size:1.1rem; letter-spacing:0.06em; color:#0E0E12; margin:0; line-height:1;">Create Your Poster</p>
      <p style="font-family:'DM Sans',sans-serif; font-size:0.72rem; color:rgba(14,14,18,0.7); margin:0;">From $39 · Free shipping</p>
    </div>
    <button onclick="document.getElementById('upload').scrollIntoView({behavior:'smooth'})" style="background:#0E0E12; color:#DFB86A; font-family:'DM Sans',sans-serif; font-size:0.82rem; font-weight:700; letter-spacing:0.04em; padding:10px 20px; border-radius:50px; border:none; cursor:pointer; white-space:nowrap;">$39 — Start Now</button>
  </div>

<?php wp_footer(); ?>
</body>
</html>

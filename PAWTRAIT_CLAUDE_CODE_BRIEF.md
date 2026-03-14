# Pawtrait Co — Landing Page Update Brief
## For Claude Code via Antigravity

---

## Context

This is an update to the existing Pawtrait Co landing page (WordPress + WooCommerce + Elementor, Post ID 4381, Elementor Canvas template). Do not create a new page — update the existing one.

The business is pivoting from a physical-product-first presentation to a **digital-product-first funnel** with a print upsell that triggers after the customer uploads their photo. The entire page must remain a single page — no redirects until WooCommerce checkout.

**Stack:**
- WordPress + WooCommerce
- Elementor (Canvas template — no theme header/footer)
- Brand colours: Near-black `#0A0A0C`, Deep charcoal `#0E0E12`, Gold `#C99B3C`, Off-white `#F5F2EC`
- Fonts: Playfair Display (headings), Bebas Neue (labels), DM Sans (body)

---

## The New Customer Flow

Hero (digital $39 presented)
        ↓
Upload section (visible on page, no click required to reveal)
        ↓
Customer uploads photo → Confirmation state triggers
        ↓
Print upsell appears on page (same page, no redirect)
        ↓
Customer selects print size/format if desired
        ↓
Single "Add to Cart" button passes full order to WooCommerce
        ↓
Straight to WooCommerce checkout (bypass cart page)

---

## Section-by-Section Instructions

### 1. Hero Section — UPDATE COPY

Remove the first/duplicate hero block entirely. Keep only the version with "Reimagined." in gold italic.

Update hero body copy to:
"Your pet deserves more than a photo on your phone. We turn them into a cinematic movie star — printed, framed, and ready for your wall."

Below the hero body copy, add a subtle single line in small gold text:
"Love your digital poster? Upgrade to a framed print from $109."

Hero CTA button text: "Create Your Poster — $39"

Remove any instance of "hand-crafted" or "handcrafted" from the entire page.

---

### 2. "Every Pet a Masterpiece" Section — UPDATE COPY

Update body copy to:
"Every pet has a personality worth celebrating. We capture yours in a cinematic movie poster — dramatic, detailed, and unmistakably them."

---

### 3. Upload Section — NEW FUNCTIONALITY

This section must be visible on the page without any click to reveal — do not hide it behind a button. It should sit naturally in the page flow below the hero and product explanation.

Section heading: "Upload Your Photo"
Subheading: "Any clear photo works — we handle the rest."

Build a custom upload widget:
[ Drag and drop your photo here, or click to browse ]
Accepted formats: JPG, PNG — Max 20MB

On successful upload:
- Show confirmation state replacing the upload box:
  "✓ Photo received — [filename or thumbnail preview] — Your poster is on its way."
- Immediately trigger the Print Upsell Section to appear below (smooth scroll or reveal animation)
- Store the uploaded file so it attaches to the WooCommerce order on submission

FILE STORAGE REQUIREMENT:
The uploaded photo must be attached to the WooCommerce order. Use WooCommerce Order Meta or a custom order attachment field so the photo arrives with the order in the WooCommerce dashboard. The file must be retrievable from the order admin screen.

---

### 4. Print Upsell Section — NEW SECTION (appears after upload confirmation)

Hidden by default. Reveals only after successful photo upload.

Section heading: "Want it on your wall?"
Subheading: "Your $39 digital purchase earns you a $50 credit toward any print."

Display two tabs: Framed Prints | Canvas Prints

FRAMED PRINTS:
20x30cm — Listed $119 — You Pay $69
30x45cm — Listed $159 — You Pay $109
45x60cm — Listed $209 — You Pay $159 — MOST POPULAR badge
50x70cm — Listed $249 — You Pay $199 — BEST VALUE badge
60x90cm — Listed $329 — You Pay $279

CANVAS PRINTS:
20x30cm — Listed $109 — You Pay $59
45x60cm — Listed $169 — You Pay $119 — MOST POPULAR badge
50x70cm — Listed $229 — You Pay $179 — BEST VALUE badge
60x90cm — Listed $299 — You Pay $249

Visual treatment:
- Show listed price with strikethrough
- Show "You Pay" price prominently in gold
- "$50 credit applied" shown as green label on each row
- Most Popular badge in gold, Best Value badge in green
- Selecting a size highlights that row

Below the pricing table add:
"No print? No problem — your digital file is ready within 3 business days."

Add a subtle text link below the table (not a button):
"Continue with digital only →"

---

### 5. Order Summary + Add to Cart — NEW SECTION

Sits immediately below upsell selection. Updates dynamically based on selections.

Show live order summary:
YOUR ORDER
─────────────────────────
✓ Digital Poster File     $39
✓ [Selected print]        $[price after credit]   (only if print selected)
─────────────────────────
Total                     $[combined total]

Single CTA button: "ADD TO CART → CHECKOUT"

On click:
1. Add digital product to WooCommerce cart
2. If print selected, add print product + variation to cart
3. Attach uploaded photo file to order meta
4. Redirect straight to WooCommerce checkout — bypass cart page entirely

Below the button display:
- BNPL logos: Afterpay | Zip | PayPal Pay in 4
- "Secure checkout · Free shipping Australia-wide · 5 free revisions"

---

### 6. Existing Sections — Retain and Minor Updates

How It Works (3 steps) — keep, update step 1 to:
"Upload your photo — any clear image of your pet works."

Testimonials — keep, ensure each includes pet name and emotional outcome.

FAQ — keep, ensure first question is:
Q: "Will it actually look like my pet?"
A: "Yes — likeness is everything to us. We work from your photo directly and offer up to 5 free revisions until you're completely happy with the result."

REMOVE: Existing standalone physical product pricing section.
REMOVE: Digital bundle section ($39/$59/$79/$99) — simplify to single $39 for now.

---

### 7. Sticky Mobile Bar — RETAIN AND UPDATE

Keep sticky bar. Update text to: "Create Your Poster — $39"
On click: smooth scroll to Upload Section.

---

### 8. Global Copy Replacements

"hand-crafted" / "handcrafted" → Remove entirely
"ORDER NOW" → "Add to Cart → Checkout"
"From regal oil paintings to bold pop-art prints..." → "Every pet has a personality worth celebrating. We capture yours in a cinematic movie poster — dramatic, detailed, and unmistakably them."
Any reference to multiple art styles → Remove

---

## WooCommerce Product Setup Required

Product 1 — Digital Poster File
Type: Simple product (virtual)
Price: $39
Fulfilment: Manual — do not auto-deliver file

Product 2 — Framed Print
Type: Variable product
Variations: 20x30 ($119), 30x45 ($159), 45x60 ($209), 50x70 ($249), 60x90 ($329)

Product 3 — Canvas Print
Type: Variable product
Variations: 20x30 ($109), 45x60 ($169), 50x70 ($229), 60x90 ($299)

Note: WooCommerce product prices = full listed price. The $50 credit is shown visually on the page. Apply discount as coupon or price override at cart level to keep accounting clean.

---

## Photo Upload Technical Notes

- Use custom HTML/JS upload widget in Elementor HTML widget
- On upload POST file to custom WordPress REST API endpoint
- Recommended plugin: WooCommerce File Upload (NinjaTeam or CodePeople)
- Store file in /wp-content/uploads/pawtrait-orders/ with unique token
- Pass token as hidden cart item meta visible in WooCommerce order admin
- File must be downloadable from WooCommerce order screen

---

## Checkout Flow

- Bypass WooCommerce cart page entirely
- On button click use JavaScript to:
  1. Add items to cart via WooCommerce Store API (/wp-json/wc/store/v1/cart/add-item)
  2. Redirect to /checkout/
- OR enable "Redirect to checkout after adding to cart" in WooCommerce settings

---

## What Success Looks Like

Customer can:
1. Land on page
2. See upload section without clicking anything
3. Upload their pet photo
4. See confirmation and print upsell with credit applied
5. Select or skip print
6. Click one button → arrive at WooCommerce checkout with all selections and photo attached
7. Complete payment

Merchant can:
1. Open completed order in WooCommerce
2. See exactly what was ordered
3. Download customer's uploaded photo from the order
4. Fulfil accordingly

---

## Do Not Change

- Elementor Canvas template
- Brand colours, fonts, overall dark cinematic aesthetic
- Post ID 4381
- Mobile-first layout
- Sticky mobile CTA bar

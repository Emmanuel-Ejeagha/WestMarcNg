# Westmarc Nigeria Limited — Website Audit & Redesign Plan

**Scope reviewed:** Home, About Us, Our Services, Blog, Contact Us, global header/footer, forms, popups, mobile markup, theme/build stack, SEO and performance signals.  
**Review date:** 9 November 2026. Performance figures are single-request measurements and will vary by location/network.

---

## Executive summary

Westmarc has the raw material of a credible commercial real-estate brand: a clear founder story, a real project in Ajah, six defined service lines, a leadership team and strong blue/red brand assets. The current website, however, reads as an unfinished real-estate template rather than a company people should trust with a property investment.

The five most damaging issues are:

1. **Placeholder content is live.** The “Call me back” popup contains “Choose Your Apartment” followed by “Using dummy content or fake information in the Web design process…” — an immediate trust killer on every page.
2. **There is no H1 and no value proposition.** The first screen says only “Commercial / Real Estate / Investment Company.” It does not say what Westmarc does, where, for whom, or what the visitor should do next. None of the audited pages has an H1.
3. **There is no project or investment detail.** No project page, unit types, sizes, prices, payment plan, availability, completion date, brochure or inspection booking. The core decision cannot be made on the site.
4. **The mobile conversion path is broken.** The top bar and header CTA are hidden on mobile, there is no sticky call/WhatsApp action, pinch-zoom is disabled, the gallery shows three tiny slides and floor plans are forced to 230px height.
5. **Technical debt is suppressing performance and trust.** 42 stylesheets, 41 scripts, 194 KB of HTML, 331 KB of CSS, 632 KB of JS, no compression, no WebP, and a measured 7.3s TTFB / 10.1s total load on the homepage.

This does not require changing the business. It requires editing, prioritisation and a coherent design system.

---

## 1. What is wrong now

### 1.1 Design weaknesses

- **Template aesthetic, not brand expression.** The layout, icon boxes, carousel, blue/purple blocks and “Call me back” popup are generic Woodmart/Elementor patterns. Nothing visually expresses Westmarc’s specific proposition: commercial property, investment discipline, Ajah, facility management.
- **The hero is a phone photo of parked cars.** The 810×1080 portrait image is used as a full-width desktop hero, cropped to a narrow slice. It shows an ordinary courtyard and cars rather than an aspirational commercial development. Meanwhile, the strongest asset — a polished architectural render of the Ajah building — is buried in the “About Our Properties” section.
- **No visual hierarchy in the first view.** Three headings of different sizes and colours (“Commercial” 60px purple, “Real Estate” 60px purple, “Investment Company” 30px dark) sit inside a translucent white card over a 70% black overlay. There is no primary CTA, no supporting sentence, no proof point.
- **The site is text-heavy in the middle and visually empty at the edges.** The “About Our Properties” section is a long paragraph with a hidden bullet list; the “Advantages” section repeats six similar cards; the “Plans and Layouts” section is three floor-plan images in a purple block.
- **Imagery is inconsistent.** A polished 3D render, candid construction-site photos, a car-park phone photo and WhatsApp-sourced JPEGs sit side by side with no art direction, crop system or colour grade. Several gallery images are shot into the sun or from awkward angles.
- **Generic iconography.** Header icons come from an “iconizer” set; social icons are Font Awesome in one place and another set elsewhere; the floor-plan and feature cards use different visual languages.
- **No trust architecture.** No testimonials, partner/bank logos, RC number, project status, delivery record, awards, press or legal links. “Guaranteed income” is asserted repeatedly without substantiation or risk wording.
- **The footer is a bright purple block with repeated content.** The address appears twice, the copyright is fixed at 2024, and there are no privacy/terms links.

### 1.2 Poor layout and spacing

- **Three different container widths.** The Woodmart header uses 1222px; Elementor content uses 1140px; the purple “Plans and Layouts” section is full-width with 100px inner padding. The logo/nav and the body content do not share a left edge on desktop.
- **Arbitrary padding.** The About section uses `100px 100px 80px` inside a 1140px container, leaving 940px of usable width and a 485px text column. The purple section uses `80px 100px`; the investment section ends with 120px bottom padding; the gallery uses 100px top padding and 100px bottom margin. There is no spacing scale.
- **Hero construction is fragile.** The hero has a `-40px` top margin, 600px minimum height, 50px vertical padding, a 40/50px padded card, and three heading blocks with negative top margins (-15px, -10px). On mobile the section also gets `padding: 0 40px 0 0`, creating an unexplained right inset.
- **Cards carry their own 30px side margins** on top of Elementor’s column gaps. The gutters are not on the same 8pt rhythm as the rest of the page, and the insets change at breakpoints.
- **Floor plans have no layout system.** Three plan images are stacked with different dimensions (768×464, 768×448, 768×498), a heavy `0 0 25px rgba(0,0,0,.5)` shadow and a 10px radius. On mobile they are forced to 230px height, making the drawings illegible.
- **The gallery is a carousel, not a portfolio.** Nine images autoplay at 3-up with a 25px gap, no captions, no categories, no lightbox and inconsistent aspect ratios. On mobile it remains 3-up.
- **Duplicate hidden sections.** The “Passion for Excellence / Commitment to Innovation” block exists in two device-specific versions, one with an ellipsis, plus a hidden legacy section containing the dummy copy. This creates maintenance drift and unnecessary DOM weight.
- **Footer repetition.** “Head Office / Block B, Plot 26…” appears twice; “Contact Us Here” and “Follow Us” are separate blocks; the legal line is incomplete.

### 1.3 Typography problems

- **Four font families are loaded:** Lato (body), Jost (headings/header), Roboto and Roboto Slab (Elementor globals). Roboto is loaded in nine weights plus italics; Roboto Slab in nine weights plus italics. Lato/Jost have no `display=swap`.
- **No H1 on any audited page.** The homepage has 18 H2s and 26 H4s, zero H3s. About has 22 H2s, including team-member names. This breaks the document outline for SEO and screen readers.
- **Heading levels are used as styling.** “Commercial”, “Real Estate” and “Investment Company” are H2s in the hero; section labels and card titles are H4s; team names are H2s. The hierarchy is visual, not semantic.
- **The hero headings have line-height 1** (Elementor’s default heading style) and negative margins. At 60px, multi-line headings are cramped; at 45px on mobile, “Commercial” barely fits inside a 25px-padded card.
- **Too many sizes:** 13, 16, 18, 20, 22, 25, 30, 32, 40, 45, 46, 50, 60, 80px. There is no type scale. Mobile jumps from 46px desktop to 32px; the hero goes 60/60/30 → 45/45/25.
- **Uppercase micro-labels are too large and too frequent.** 18px all-caps eyebrows (“OUR ADVANTAGES”, “OUR GALLERY”, “PLANS AND LAYOUTS”, “INVESTMENT STAGES”) compete with the 46px H2s. The header uses 13px uppercase for the address and phone, which is hard to scan.
- **Body text is 16px Lato in #777** with line-heights of 25px in cards and 30px in long paragraphs. #777 on white has a 4.48:1 contrast ratio — just below WCAG AA for normal text; on #F2F3F7 it is 4.04:1, on #EAEAEA 3.72:1.
- **Mixed case and punctuation.** Title case, sentence case and ALL CAPS alternate without a rule. Examples: “Make Your Choice...”, “Passion for Excellence...”, “If You Have Questions Please, Contact Us” vs “If You Have Questions, Please Contact Us”.
- **Copy errors:** “HEAD, MEADIA & MARKETING” (should be Media), “Get Consult”, “Booking Apartments”, “Commissioning” used without explanation, duplicated “Passion for Excellence” headings.

### 1.4 Colour inconsistencies

The site uses at least twelve brand-adjacent colours plus two default palettes:

| Colour | Where it appears |
|---|---|
| `#290CC5` (purple-blue) | Theme primary, headings, footer background, buttons |
| `#2000D0` approx. | Actual logo blue |
| `#DB0706` | Red dividers and accents |
| `#D00000` approx. | Actual logo red |
| `#CA0A09` | Red hover state |
| `#106CD8` | Feature-list icon blue |
| `#1F079E` | Deep blue accent |
| `#D3D1F5` | Lilac accent |
| `#777777` | Body text |
| `#242424` | Headings |
| `#F9F9F9` | Section background |
| `#EAEAEA` | Card backgrounds |
| `#FBBC34` | Declared “alternative” yellow, apparently unused |
| `#066AAB` | WPForms button default |
| `#6EC1E4`, `#61CE70`, `#54595F`, `#7A7A7A`, `#FFBC7D` | Elementor default palette, still present |
| WP preset palette | `#cf2e2e`, `#ff6900`, `#fcb900`, `#7bdcb5`, `#00d084`, `#8ed1fc`, `#0693e3`, `#9b51e0`, `#d63637` |

Key problems:

- **The logo is more saturated than the site.** The site’s primary `#290CC5` reads purple next to the logo’s vivid blue. On the large footer, the drift is obvious.
- **There are four blues and three reds.** `#290CC5`, `#106CD8`, `#1F079E`, `#2000D0`; `#DB0706`, `#CA0A09`, `#D00000`. They are close enough to look accidental, far enough to look unresolved.
- **Colour has no semantics.** Red is used for decorative dividers, hover states and accents; blue for headings, buttons and footer. There is no rule such as “blue = action, red = brand accent, navy = authority”.
- **Too many background tones.** White, `#F9F9F9`, `#EAEAEA`, a translucent page background (`rgba(16,16,16,.05)`), a translucent white hero card (`#FFFFFFD1`) and a bright purple footer. The page lacks a calm surface hierarchy.
- **The hero overlay is muddy.** A 70% black overlay over a daylight photo, then an 82%-white card on top, produces a grey, low-contrast first impression.
- **Body grey fails contrast** on white and on the grey card backgrounds.

### 1.5 Navigation and UX problems

- **The main navigation is only five items:** Home, About Us, Our Services, Blog, Contact Us. There is no “Projects”, “Investments”, “Portfolio” or “Gallery” item, even though property is the core product. “Blog” gets prime navigation while the blog has one post from April 2024.
- **The only conversion CTA in the header is “Call me back”**, which opens a popup. There is no “Book a site inspection”, “View the project” or “Request the payment plan”. The header CTA is hidden on mobile.
- **The user cannot complete the core journey.** Home → no project detail → no pricing/availability/payment plan → contact form. The “Projects and Site Inspection” line is a section heading, not an action.
- **The callback popup contains dummy content and is duplicated.** It shows “Choose Your Apartment” and “Using dummy content or fake information…”, plus share icons. Two identical popups are rendered, producing duplicate form IDs (`form-field-name`, `form-field-field_86b1e38`, `form-field-message`). Labels in the second instance point at the first instance’s fields.
- **Form chaos.** The homepage loads four form instances (Elementor Forms and Contact Form 7 inside two popups); Contact has five. WPForms Lite is also loaded but not used for the visible forms. Labels are placeholder-only or screen-reader-only; there is no consent checkbox or privacy link; the contact form’s phone field is keyed as `email`.
- **No confirmation or follow-up path.** No thank-you page, no “what happens next”, no preferred contact time, no email field on the callback form, no CRM/notification specification visible.
- **Social links are inconsistent and partly broken.** Header: Facebook and Instagram. About/Contact: six icons (including Google+) with no `href`. Footer: two icons. The Google+ icon is obsolete.
- **No privacy policy, terms or cookie policy.** `/privacy-policy/` and `/terms-and-conditions/` return 404. Meta Pixel (`3643089862609451`) fires unconditionally via PixelYourSite, with no consent management — a Nigerian Data Protection Act/NDPR risk.
- **The 404 page is the WordPress default:** “This is somewhat embarrassing, isn’t it?” — off-brand and unhelpful.
- **No visible breadcrumbs, no search, no FAQ, no project filter, no related content.** The only body internal links are nav/footer; the homepage has no contextual link to services or the project.
- **The footer does not help.** No privacy/terms, no RC number, no office hours, no WhatsApp, fixed 2024 copyright, duplicated address.
- **No WhatsApp or live channel** despite the “We are online 24/7” claim. For a Lagos real-estate business, WhatsApp is a primary conversion channel.

### 1.6 Mobile responsiveness issues

- **Pinch-zoom is disabled:** `maximum-scale=1.0, user-scalable=no`. This is a direct WCAG failure.
- **The top bar and header CTA disappear.** The address, phone and “Call me back” are in `whb-visible-lg` columns. Mobile users get a logo and hamburger only; the nearest phone link is in the footer.
- **No sticky call/WhatsApp bar.** The most valuable mobile action is several screens away.
- **The gallery stays 3-up.** The Elementor carousel has `slides_to_show: 3` with no tablet/mobile override, so each slide is roughly 100px wide on a 390px screen.
- **Floor plans are compressed to 230px height.** Architectural drawings become unreadable, with no zoom/lightbox and no PDF download.
- **Hero type is too large for the card.** 45px headings inside a 20/25px padded card on a 390px viewport; the section also has a 40px right padding, making the layout asymmetric.
- **Feature cards are over-inset.** 30px side margins plus 20px section padding produce a 50px inset, narrowing the reading column.
- **The popup becomes a long scroll.** An 880px two-column modal stacks into a form plus image/social/dummy content; duplicate forms and IDs remain.
- **Entrance animations can hide content.** Many sections use `elementor-invisible` with fade/zoom delays up to 2s. If JS fails or the connection is slow, content can remain hidden or appear late. There is no `prefers-reduced-motion` handling.
- **Page weight is brutal on mobile data.** Nine gallery thumbs at ~278 KB each (~2.5 MB), a 133 KB hero, 963 KB of CSS/JS uncompressed, and 194 KB of HTML before fonts.
- **No responsive art direction.** The hero uses a portrait phone image; there are no mobile-specific crops or `srcset` for the CSS background.

### 1.7 Technical, SEO and accessibility debt

| Signal | Measured / observed |
|---|---|
| HTML | 194 KB |
| CSS | 42 files, 331 KB |
| JavaScript | 41 files, 632 KB |
| Compression | No gzip/brotli observed |
| Cache headers | No `Cache-Control` observed |
| TTFB / total load | 7.34s / 10.14s homepage (cold); 2.74s / 5.20s services |
| Render-blocking | No `async`, no `defer`, no preload |
| Images | 29 on home; 18 missing alt; 0 WebP/AVIF |
| H1 | 0 on Home, About, Services, Contact |
| Heading structure | 18 H2 / 0 H3 / 26 H4 on Home; 22 H2 on About |
| Duplicate IDs | 4 on Home |
| Forms | 3 form plugins; 4 instances on Home, 5 on Contact |
| Blog | One post, 23 April 2024 |
| Privacy/Terms | 404 |
| Viewport | `user-scalable=no` |
| Skip link / `aria-current` | Absent |
| Security headers | No HSTS observed |
| Stack | WordPress 7.1.4, Woodmart 7.4.3, Elementor 3.21.2, Elementor Pro 3.14.1, Revolution Slider 6.7.6, CF7 5.9.3, WPForms Lite 1.8.8.2, AIOSEO 4.6.1.1 |

Elementor Pro 3.14.1 is significantly older than Elementor 3.21.2. Woodmart is a WooCommerce theme but there is no shop; WooCommerce scripts are still loaded. Revolution Slider is loaded globally but the homepage hero is Elementor, not a slider. These are maintenance and security risks as well as bloat.

---

## 2. Where the visual opportunity is

1. **Lead with the real building.** The Ajah architectural render is the best asset on the site. Make it the hero, art-directed at dusk or golden hour, with a controlled navy scrim and no cars in the foreground.
2. **Create an editorial grid.** A 12-column layout with intentional asymmetry — 7/5 or 8/4 splits, large images, generous white space, thin rules — will feel more “investment-grade” than stacked full-width cards.
3. **Use the logo’s roofline as a brand motif.** A thin red diagonal or roof-angle underline can link the logo, section markers, active tabs and hover states without adding another colour.
4. **Make the blue/red palette disciplined.** Blue as the field and action colour; red only as the roofline accent; deep navy for authority; warm paper for breathing room.
5. **Turn floor plans into a product experience.** Tabs for Ground/First/Second, zoom, unit list, availability, “Download PDF”, “Request availability”.
6. **Turn investment stages into a clear model.** Large numerals 01–04, a horizontal timeline on desktop and a vertical one on mobile, with a payment-plan table and a “Request the payment plan” CTA.
7. **Curate the gallery.** Six to nine consistent 4:3/3:2 images, captions, categories (Exterior, Workspace, Retail, Amenities, Progress), keyboard-accessible lightbox. No autoplay.
8. **Add evidence, not decoration.** Founder portrait and quote, team, RC number, project status, delivery record, testimonials, partner/bank logos, exact map pin. Only publish claims that can be substantiated.
9. **Use typography as hierarchy.** One display family, one text family, three weights, a clear scale, sentence case, generous line-height. No all-caps headings.
10. **Make motion quiet.** 200ms ease-out, 12px reveals, image scale on hover, no auto-rotating carousels, respect reduced motion.

---

## 3. Redesign direction

**Concept: “Architectural confidence.”**  
Westmarc should feel established, transparent and commercially sharp — a company that develops and manages real assets, not a template realtor. The design should be calm and editorial: strong photography, large type, disciplined blue/red, precise data, clear next steps.

**Design principles**

1. **Clarity before decoration.** Every screen answers: what is this, where is it, what does it cost/how does it work, what do I do next?
2. **Evidence over adjectives.** Replace “passion”, “excellence” and “guaranteed” with project facts, process, team and documentation.
3. **One system.** One container, one spacing scale, one palette, one type scale, one button system, one form system.
4. **Mobile is the primary conversion surface.** Sticky call/WhatsApp, 44px targets, readable plans, no zoom lock.
5. **Quiet confidence.** Generous white space, restrained motion, no carousel noise, no clip-art.

**Preserve / replace**

| Preserve | Replace |
|---|---|
| Westmarc name, logo, blue/red identity | Purple drift and extra blues/reds |
| Founder story, team, values | Duplicated “Passion/Commitment” blocks |
| Ajah project, floor plans, gallery | Phone-photo hero and uncaptioned carousel |
| Six services, six advantages, four investment stages | Template card layouts and dummy popup copy |
| Phone, email, address, map, social links | Broken/empty social icons and Google+ |
| Blog, contact, callback functionality | Three form plugins, duplicate popups, placeholder labels |
| Existing URLs and page slugs | Woodmart/WooCommerce/Rev Slider bloat |

---

## 4. Homepage structure

| # | Section | Purpose | Content | CTA |
|---|---|---|---|---|
| 1 | Utility bar | Contact and credibility | Address, phone, email, office hours, social | Call / email |
| 2 | Header | Navigation and primary conversion | Logo, 6 nav items, “Book a site inspection” | Book inspection |
| 3 | Hero | Say what Westmarc does and why it matters | Eyebrow, H1, subcopy, two CTAs, proof strip | Explore the project / Book inspection |
| 4 | Credibility strip | Establish category and scale | Development · Investment · Leasing · Management; “Since 2016”; Ajah, Lagos | — |
| 5 | Featured project | Make the core product tangible | Render, project name, location, status, unit types, amenities | View project / Download brochure |
| 6 | Why Westmarc | Convert advantages into reasons to believe | Prime location, guaranteed income*, ease of management, security, environmental solutions, flexible premises | Speak with an advisor |
| 7 | Investment pathway | Reduce uncertainty | 01 Consultation → 02 Reserve → 03 Payment plan → 04 Handover & management | Request the payment plan |
| 8 | Floor plans & availability | Let users evaluate the space | Ground/First/Second tabs, unit list, sizes, availability, PDF | Enquire about availability |
| 9 | Services | Show the full relationship | Investment, Capital, Leasing, Valuation, Advisory, Management | Explore services |
| 10 | Gallery | Provide visual proof | 6–9 curated images with captions and lightbox | View full gallery |
| 11 | About / leadership | Build trust in the people | Founder quote, 2016/2019 story, team preview | Meet the team |
| 12 | Testimonials / proof | Reduce perceived risk | Investor/client quotes, partner logos, RC number (only if real) | — |
| 13 | Insights | Demonstrate expertise | 3 latest articles; if fewer, one plus newsletter | Read insights |
| 14 | FAQ | Answer decision blockers | Location, unit types, payment plan, inspection, documents, management | Ask a question |
| 15 | Final CTA | Capture the lead | Short form + phone/WhatsApp + map/address | Request a callback |
| 16 | Footer | Navigate and reassure | Logo, descriptor, nav columns, contact, legal, social, RC, dynamic year | — |

\* Only publish “guaranteed income” with substantiation and appropriate risk wording. If that cannot be supported, use “income-focused investment” and explain the assumptions.

**Wireframe**

```
┌ Utility bar: address · phone · email · hours ─────────────┐
├ Header: logo | Home About Projects Services Insights Contact | [Book inspection]
├ HERO (16:9 architectural image, navy scrim) ──────────────┤
│  Eyebrow · H1 · subcopy                                  │
│  [Explore the project] [Book a site inspection]          │
│  Since 2016 · Ajah, Lagos · 20 units/floor · Managed      │
├ Credibility strip: Development · Investment · Leasing · Management
├ FEATURED PROJECT (7/5 split) ─────────────────────────────┤
│  Large render                    Status / location /     │
│                                  highlights / CTAs       │
├ WHY WESTMARC (3×2 cards) ─────────────────────────────────┤
├ INVESTMENT PATH (4-step timeline) ────────────────────────┤
├ FLOOR PLANS (tabs + plan + unit list + PDF) ──────────────┤
├ SERVICES (3×2 cards) ─────────────────────────────────────┤
├ GALLERY (curated grid) ───────────────────────────────────┤
├ ABOUT / FOUNDER QUOTE ────────────────────────────────────┤
├ TESTIMONIALS / PROOF ─────────────────────────────────────┤
├ INSIGHTS (3 cards) ───────────────────────────────────────┤
├ FAQ (accordion) ──────────────────────────────────────────┤
├ FINAL CTA (form + contact + map) ─────────────────────────┤
└ FOOTER ───────────────────────────────────────────────────┘
```

**Hero copy direction**

- Eyebrow: `Westmarc Nigeria Limited · Commercial real estate · Ajah, Lagos`
- H1: **Commercial real estate, built for business.**
- Sub: *“We develop, lease and manage commercial property in Lagos — with clear payment plans, secure environments and hands-on facility management.”*
- Primary CTA: **Explore the project**
- Secondary CTA: **Book a site inspection**
- Proof strip: `Since 2016` · `20 offices & shops per floor` · `Underground parking` · `Managed facilities`

This preserves the original “Commercial / Real Estate / Investment Company” identity while turning it into a promise.

---

## 5. Design system

### 5.1 Colour palette

| Token | Hex | Role | Contrast |
|---|---|---|---|
| `--wm-blue` | `#1E00C7` | Primary brand, CTA, links, active states | 11.17:1 on white |
| `--wm-blue-deep` | `#0B0A3D` | Dark sections, footer, authority | 18.9:1 with white |
| `--wm-red` | `#D71920` | Roofline accent, section markers, one key accent | 5.19:1 on white |
| `--wm-ink` | `#12141D` | Primary text | 18.0:1 on white |
| `--wm-slate` | `#5A6072` | Secondary text, metadata | 6.27:1 on white |
| `--wm-paper` | `#FAF9F6` | Warm page background | — |
| `--wm-mist` | `#F2F3F7` | Section tint, form backgrounds | — |
| `--wm-line` | `#E3E5EA` | Borders, dividers | — |
| `--wm-blue-tint` | `#EDEBFF` | Selected states, badges | — |
| `--wm-white` | `#FFFFFF` | Cards, surfaces | — |
| `--wm-success` | `#0F7B5F` | Form success | 5.23:1 on white |
| `--wm-error` | `#B42318` | Form errors | — |

**Rules**

- 60/30/10: warm white/neutral 60%, blue 30%, red 10%.
- Blue = action and trust. Red = brand accent only; never red text on blue.
- Use deep navy instead of bright purple for large dark areas.
- Keep red for the roof motif, active tab underline, eyebrow rule and a single key CTA variant.
- Do not use colour alone to convey status; pair with text/icon.
- Check every text/background pairing against WCAG AA (4.5:1 normal, 3:1 large).

### 5.2 Typography

**Primary recommendation**

- **Display / headings:** Jost (500/600). It is geometric, matches the logo’s constructed forms and preserves the existing headline voice.
- **Body / UI:** Inter (400/500/600). Better screen legibility than Lato, excellent at small sizes, variable.
- Self-host WOFF2; subset Latin; `font-display: swap`; preload the two main files. Drop Roboto, Roboto Slab and Lato.

**Type scale**

| Style | Size | Line-height | Weight | Tracking |
|---|---|---|---|---|
| Display | `clamp(3rem, 6vw, 4.5rem)` (48–72) | 1.02 | 500 | -0.03em |
| H1 | `clamp(2.5rem, 4.8vw, 4rem)` (40–64) | 1.05 | 600 | -0.02em |
| H2 | `clamp(2rem, 3.4vw, 3rem)` (32–48) | 1.1 | 600 | -0.015em |
| H3 | `clamp(1.5rem, 2.2vw, 2rem)` (24–32) | 1.2 | 500 | -0.01em |
| H4 | 1.25–1.5rem (20–24) | 1.3 | 600 | 0 |
| Body L | 1.125rem (18) | 1.65 | 400 | 0 |
| Body | 1rem (16–17) | 1.65 | 400 | 0 |
| Small | 0.875rem (14) | 1.5 | 500 | 0 |
| Eyebrow | 0.75rem (12) | 1.4 | 600 | 0.14em, uppercase |
| Button | 0.9375rem (15) | 1 | 600 | 0 |
| Stat | `clamp(2.5rem, 5vw, 4rem)` | 1 | 600 | tabular |

**Rules**

- Sentence case for headings and buttons. All-caps only for the 12px eyebrow.
- Maximum 60–75 characters per line for body text.
- No more than three type sizes in one section.
- Left-align paragraphs; centre only short statements.
- Use tabular numerals for stats, prices and dates.
- Keep paragraphs under ~80 words; use subheads and bullets.

### 5.3 Spacing, grid, radii, motion

- **Grid:** 12 columns, max width 1240px, 24px gutters, page margins 24/40/64px. Header, content and footer share the same container.
- **Spacing scale:** 4, 8, 12, 16, 24, 32, 48, 64, 96, 128px.
- **Section padding:** 112px desktop, 80px tablet, 56px mobile.
- **Radii:** 8px buttons/inputs; 16px cards; 24px media; 999px pills. One system, no 5/10/8 mix.
- **Borders:** 1px `--wm-line`; avoid heavy shadows.
- **Shadow:** `0 1px 2px rgba(16,24,40,.04)`, hover `0 12px 32px rgba(16,24,40,.08)`.
- **Motion:** 200ms ease-out; 12px reveal; image scale 1.03 on hover; no autoplay; respect `prefers-reduced-motion`.

### 5.4 Recommended components

1. **Header** — 88px desktop, 64px mobile; logo SVG; 6 nav items; CTA; transparent-over-hero variant; sticky white after scroll.
2. **Mobile header/drawer** — logo, menu, call icon; sticky bottom bar with “Call” and “WhatsApp” (or “Book inspection”).
3. **Hero** — 640–760px; full-bleed image; navy-to-transparent scrim; eyebrow, H1, subcopy, two CTAs, proof strip; no glass card.
4. **Buttons** — primary blue filled, secondary outline, text link with arrow; 48px height; 8px radius; visible focus ring; loading/disabled states.
5. **Project card** — 4:3 image, status pill, location, title, unit types, “View project”; hover zoom.
6. **Service card** — 24px line icon, title, two-line summary, arrow link; subtle border, no heavy box.
7. **Advantage card** — 3×2; line icon, title, one-sentence proof; optional number.
8. **Stat band** — deep navy; 3–4 stats; thin dividers; tabular numerals.
9. **Timeline** — 01–04 large numerals; horizontal desktop, vertical mobile; CTA at the end.
10. **Floor-plan tabs** — Ground/First/Second; plan image with zoom/lightbox; unit list; PDF download; “Request availability”.
11. **Gallery** — 6–9 curated images; consistent aspect ratios; captions; category filter; keyboard lightbox.
12. **Testimonial** — 24px quote, name/role/project; 1–3 cards; no auto-rotate.
13. **FAQ accordion** — 6 questions; plus/minus; `FAQPage` schema.
14. **CTA band** — deep blue, 2 columns: headline + short form or contact options; red accent rule.
15. **Form** — visible labels above fields; 48px inputs; 8px radius; helper text; inline errors; consent checkbox with privacy link; success state; honeypot/Turnstile.
16. **Modal** — native `<dialog>` or accessible modal; 560px; one form; close button; focus trap; no duplicate instances.
17. **Footer** — 4 columns; logo/descriptor; nav; contact; legal; social; RC number; dynamic year.
18. **Cookie banner** — accept/reject/manage; no dark patterns; blocks Meta Pixel until consent.
19. **Breadcrumbs / pagination / 404 / thank-you** — on-brand, useful, linked.

### 5.5 Forms and accessibility

- One form plugin only (Fluent Forms or WPForms); one global callback modal; one contact form.
- Every field has a visible `<label>`; placeholders are examples, not labels.
- Required fields marked in text, not colour alone.
- Email field added to the callback form; preferred contact time optional.
- Consent checkbox: “I agree to Westmarc contacting me about my enquiry. See our Privacy Policy.”
- Success state: “Thank you — an advisor will contact you within one business day.” Plus a thank-you page for tracking.
- Spam: honeypot + Cloudflare Turnstile (or reCAPTCHA v3).
- WCAG 2.2 AA: skip link, landmarks, one H1, focus states, 44px targets, zoom enabled, alt text, keyboard lightbox/modal, reduced motion, error announcements.

---

## 6. Sitemap, templates and content model

**Primary navigation:** Home · About · Projects · Services · Insights · Contact · **Book a site inspection**

- Projects dropdown: Current project, Completed projects, Gallery.
- Services dropdown: Investment, Capital, Leasing, Valuation, Advisory, Management.
- Mobile: accordion drawer; sticky call/WhatsApp bar.

**Templates**

| Template | Purpose |
|---|---|
| Home | Positioning, featured project, proof, conversion |
| About | Story, founder, values, team, credentials |
| Projects index | Filter by status/type/location; project cards |
| Project detail | Hero, facts, gallery, floor plans, amenities, location, payment plan, enquiry |
| Services | Six service cards; process; CTA |
| Service detail (optional) | Deep dive per service |
| Insights | Blog index with categories/search |
| Article | Editorial layout, author, related posts, CTA |
| Contact | Form, phone/WhatsApp, map, hours, address |
| Privacy / Terms / Cookie | Legal and NDPR |
| Thank you | Confirmation and next steps |
| 404 | Helpful search/navigation |

**Content model (WordPress)**

- `project` CPT: title, excerpt, featured image, gallery, location, status, completion, unit types, sizes, price/ROI (if publishable), payment plan, amenities, floor plans, brochure, coordinates.
- `unit` (repeater or CPT): type, size, floor, availability, price.
- `service` CPT: icon, summary, body, CTA.
- `team` CPT: role, photo, bio, social links.
- `testimonial` CPT: quote, name, role, project.
- `faq` CPT: question, answer, category.
- `post` for Insights, with categories and featured image.
- ACF Pro field groups; query loops; no page-builder lock-in for structured data.

---

## 7. WordPress implementation plan

### 7.1 Build approach

**Recommended:** a lightweight block theme (custom or Blocksy/GeneratePress/Kadence) + ACF Pro + GenerateBlocks/native blocks. This gives the client structured, editable content and the best performance ceiling.

**Alternative:** retain Elementor Pro but move to a clean Hello theme, use containers, one global kit, and remove Woodmart, WooCommerce, Revolution Slider, WPForms and CF7. This is faster to migrate but will always be heavier than a block theme.

**Why move off Woodmart:** it is a WooCommerce theme; the site has no shop, yet WooCommerce scripts and Woodmart’s 40+ CSS parts load on every page. It also brings the 1222px container conflict and the 5px/10px radius mix.

### 7.2 Plugin stack

| Need | Recommended | Remove / avoid |
|---|---|---|
| Content fields | ACF Pro | — |
| Forms | Fluent Forms or WPForms (one only) | Contact Form 7 + WPForms duplicate |
| SEO | Rank Math or AIOSEO (one only) | — |
| Caching | LiteSpeed Cache (server is LiteSpeed) + Cloudflare | — |
| Images | ShortPixel or Imagify (WebP/AVIF) | — |
| Consent | Complianz or CookieYes | — |
| Security | Wordfence/Sucuri, 2FA, backups | — |
| Slider | None; use a static hero or native CSS | Revolution Slider |
| Page builder | None (block theme) or Elementor Pro only | Woodmart, Premium Addons, unused widgets |
| Analytics | GA4 or Plausible; Meta Pixel with consent | Unconditional PixelYourSite firing |

### 7.3 Performance budget

| Metric | Current | Target |
|---|---|---|
| HTML | 194 KB | < 80 KB |
| CSS | 42 files / 331 KB | ≤ 3 files / < 80 KB |
| JS | 41 files / 632 KB | ≤ 8 files / < 150 KB |
| Fonts | 4 families, 13+ weights | 2 families, 3 weights |
| LCP | likely > 4s | < 2.5s |
| INP | unmeasured | < 200ms |
| CLS | unmeasured | < 0.1 |
| TTFB | 7.3s cold | < 0.8s |
| Initial page weight | ~3–4 MB+ | < 1.5 MB |
| Images | 0 WebP | 100% WebP/AVIF |
| Alt text | 18 missing on Home | 100% |
| H1 | 0 | 1 per page |

Implementation: enable Brotli/gzip, page cache, object cache (Redis if available), CDN, critical CSS, defer/delay non-critical JS, preload the hero and fonts, responsive `srcset`, lazy-load below-the-fold images, and remove unused plugin assets per page.

### 7.4 SEO

- One H1 per page; logical H2/H3/H4 outline.
- Unique title tags and meta descriptions; remove the “Home -” prefix pattern.
- `RealEstateAgent`/`LocalBusiness` schema with address, geo, phone, email, opening hours, sameAs.
- `BreadcrumbList`, `FAQPage`, `Article`, `Project`/`Residence` schema where valid.
- 1200×630 OG images; correct `og:type`; Twitter cards.
- Internal links from the homepage to the project, services and contact.
- Preserve existing URLs; 301 map for any changed slug.
- XML sitemap, Search Console, Bing, Google Business Profile with the exact Ajah pin.
- Content plan: project updates, buying guides, location guides, investment explainers — one substantive post per month.

### 7.5 Security, legal and consent

- Publish Privacy Policy, Terms, Cookie Policy and a data-request contact.
- Add a consent banner; block Meta Pixel and analytics until consent (NDPR).
- Add HSTS, `X-Content-Type-Options`, `Referrer-Policy`, `Permissions-Policy`, and a cautious CSP.
- Update WordPress, theme and plugins; remove abandoned plugins; 2FA; least privilege; disable XML-RPC/file editing; daily off-site backups; staging environment.
- Review “guaranteed income” claims with legal/compliance; add risk wording and assumptions if retained.

### 7.6 Analytics and conversion tracking

- GA4 or Plausible with consent.
- Events: call click, WhatsApp click, form submit, brochure download, project view, floor-plan tab, map/directions.
- Thank-you page for form conversions.
- Monthly dashboard: enquiries, inspection requests, calls, WhatsApp, brochure downloads, top projects, traffic sources.
- Call tracking optional (e.g. CallRail) if the client wants attribution.

---

## 8. Roadmap and priorities

### Quick wins (first 1–2 weeks, on the current site)

1. Remove the dummy popup content and duplicate popup; replace with one real callback form.
2. Add an H1 and a value proposition to the hero; add a primary CTA.
3. Add “Projects” to the navigation and create one real project page.
4. Consolidate forms; add email, consent and a thank-you state.
5. Fix social links, privacy/terms, copyright year and the “MEADIA” typo.
6. Enable compression/caching; convert hero/gallery/floor plans to WebP; remove unused plugins and Rev Slider.
7. Enable pinch-zoom; add alt text and visible form labels; add a skip link.
8. Add a mobile sticky call/WhatsApp bar.
9. Publish privacy/cookie policy and gate the Meta Pixel.
10. Fix the map pin and add office hours.

### Full redesign (6–8 weeks)

| Phase | Weeks | Deliverables |
|---|---|---|
| 0. Discovery | 1 | Stakeholder workshop, content inventory, data collection, sitemap, wireframes, measurement baseline |
| 1. Quick wins | 1–2 | Live-site fixes above; stop the trust bleed |
| 2. Design | 2–4 | Design system, homepage, About, Project, Contact; copy deck; photography brief |
| 3. Build | 4–7 | WordPress templates, CPT/ACF, forms, SEO, migration on staging |
| 4. QA & launch | 8 | Accessibility, performance, cross-browser, forms, redirects, tracking, launch |
| 5. Optimise | 9–12 | Content, CRO tests, analytics review, iteration |

### Success metrics

- Qualified enquiries / inspection requests per month.
- Call and WhatsApp click-through rates.
- Brochure/floor-plan downloads.
- Project page engagement and scroll depth.
- Mobile LCP < 2.5s, INP < 200ms, CLS < 0.1.
- Lighthouse mobile performance 90+; accessibility 95+.
- Branded search and direct traffic growth.
- Reduced bounce on the homepage and contact page.

### Data needed from Westmarc

- Unit types, sizes, prices, availability, payment plans, service charge, completion/handover dates.
- Title/permit status and documentation buyers receive.
- Rental/ROI assumptions (only if they will be published; legal review required).
- RC number, years in operation, completed projects, investor/client numbers.
- Testimonials, partner/bank logos, awards, press.
- Team bios and professional portraits; founder portrait.
- LinkedIn/YouTube/other social URLs; WhatsApp number; office hours.
- Privacy policy content, cookie/analytics arrangements, CRM/email routing.
- Professional photography/video of the Ajah project and amenities.
- SVG logo and brand assets.

---

## 9. Bottom line

Westmarc does not need a new business identity. It needs a site that behaves like the business: clear about the product, specific about the project, transparent about the process, and easy to contact on a phone.

The fastest path is:

1. **Stop the trust damage this week** — remove the dummy popup, add an H1/value proposition, fix the forms, social links, privacy and mobile CTA.
2. **Build the project story** — one real project page with floor plans, availability, payment plan, gallery and inspection booking.
3. **Rebuild on a clean system** — one container, one palette, two fonts, one form plugin, one performance budget, and a design language drawn from the logo’s blue, red and roofline.

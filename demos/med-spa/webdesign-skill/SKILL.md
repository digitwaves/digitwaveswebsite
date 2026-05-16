---
name: webdesign
description: Use this skill whenever the user wants to build, mock up, or iterate on a polished website — especially hero sections, landing pages, demo sites, pitch mockups, or client portfolio pieces for service businesses (med spas, salons, wellness brands, boutique hotels, luxury services). Triggers on phrases like "build a hero page," "make a landing page," "design a website," "mock up a site for [business]," "demo site," "pitch site," or any request to produce HTML/CSS for a marketing page. Also triggers when the user wants to generate hero images or hero videos for a web design, swap a static hero for video, pick a color palette, wire up a reference image into a build, or make a site accessible (ADA/WCAG compliant). Especially relevant for Digit Waves agency demo work — the user runs Digit Waves and produces polished client demos.
---

# Web Design Skill

This skill captures a proven workflow for producing premium-feeling demo websites and hero sections — the kind of work an agency builds to win clients. It's prompt-heavy on purpose: the user (chaz, who runs Digit Waves) is non-technical and wants ready-to-paste prompts that work the first time.

## Trigger Context

Use this skill when the user wants any of:
- A hero section or hero page
- A full landing page or single-file website mockup
- A demo or pitch site for a service business client
- An alternate variant of an existing hero (different layout, palette, or media)
- A reference image generated for use on a web design
- A hero video generated and integrated into a page
- A color palette suggestion for a brand or vertical
- Accessibility audit or ADA-compliance improvements on a site
- Help making a demo feel "real" without crossing legal lines

Even if the user only mentions one piece (e.g., "give me a hero video prompt"), keep the whole workflow in mind — they're usually mid-flow on a larger build.

## The User's Working Environment

The user works in **Claude Code inside VS Code**, in a project folder like `C:\Users\Charles\Documents\dwm\DIGITWAVES\DEMOS\[CLIENT NAME]`. Conventions to follow:

- Reference images, generated hero images, and poster images go in `images/`
- Generated hero videos go in `images/` or `videos/` (both work; check what already exists)
- Built HTML files (`hero.html`, `hero-fullscreen.html`, variants) live in the project root
- File references in Claude Code prompts use `@` autocomplete — e.g., `@images/reference.png`
- Avoid spaces in filenames (use hyphens) — spaces break `@` autocomplete in some cases

The user often has a reference image and wants Claude Code to build a hero page that matches its style. They iterate by asking for variants (`hero-v2.html`, `hero-fullscreen.html`, etc.) rather than overwriting.

## Workflow Overview

A typical full hero build goes:

1. User drops a reference image into `images/`
2. Claude Code builds `hero.html` matching the reference's style, with appropriate palette and content
3. User reviews, asks for variants or tweaks
4. If they want a hero video: generate a face-free version of the reference, run it through a video model (Seedance / Kling / Luma), web-optimize the MP4, swap it into the HTML
5. Apply accessibility baselines (always) and demo-site legal disclaimers (if going public)

## Hero HTML Prompt Template

When the user asks for a hero page, hand them this prompt format. Adapt content and palette to their brief. Always reference any provided image with `@images/[filename]`. **Always include the accessibility requirements** — they're non-negotiable now.

```
Build [filename].html — a [full-viewport 100vh / standard] hero for [BRAND NAME].

**Hero media:** Use @images/[image-filename] as [the hero image / a background image / a style reference for layout].

**Visual style:** [Premium / minimal / editorial / cinematic] feel. [Mood descriptors: serene, refined, sophisticated, biophilic, etc.]

**Color palette:**
[Pick from the palette library below. Always include hex codes.]

**Content:**
- Sticky top nav: "[Logo]" left; menu items [Item1, Item2, Item3...]; phone number; "[CTA]" pill button right
- Headline "[HEADLINE]" (italic accent on key word if desired)
- One-line subhead about [value proposition]
- Primary "[Primary CTA]" button
- Secondary "[Secondary action]" text link with arrow
- [Optional accents: floating tag, pull-quote chip, stat strip]

**Typography:**
- [Display font] for headlines (e.g., Cormorant Garamond, Playfair Display, Canela)
- [UI font] for body and nav (e.g., Inter, DM Sans, Söhne)
- Load from Google Fonts

**Accessibility (WCAG 2.1 AA — required):**
- Semantic HTML: <header>, <nav>, <main>, <h1> for the headline, <button> for interactive elements
- All body text must meet 4.5:1 contrast ratio against its background; large text (24px+) needs 3:1
- All images: descriptive alt text. Decorative images: alt=""
- Visible focus states on all interactive elements (custom outline, not just default browser ring removed)
- Keyboard navigable — tab order must be logical
- "Skip to main content" link as the first focusable element
- Form fields (if any): associated <label> elements, aria-describedby for errors
- Phone number link with tel: protocol and aria-label
- Color is never the only way to convey information

**Output:** single self-contained file. Inline CSS. Mobile responsive. Generous whitespace.

After building, give me a 2-line summary of what you made and confirm the accessibility checks passed.
```

## Accessibility (the cracked-down-on part)

ADA Title III lawsuits over inaccessible websites have surged. Service businesses with physical locations — med spas, salons, hotels, restaurants — are classified as "places of public accommodation" and their websites fall under the same accessibility requirements. The defacto compliance standard is **WCAG 2.1 Level AA**. Settlements typically run $5K–$50K plus mandated remediation, and serial plaintiffs' firms scan thousands of sites.

### Non-negotiable baselines for every build

Every hero or page this skill produces must include:

1. **Semantic HTML.** `<header>`, `<nav>`, `<main>`, `<footer>` landmarks. One `<h1>` per page. Buttons are `<button>`, not `<div onclick>`.
2. **Alt text on every image.** Descriptive for content images ("Aesthetician consulting with client over a treatment plan"), empty (`alt=""`) for purely decorative ones. Background CSS images need `role="img"` and `aria-label` if they convey content.
3. **Color contrast.** Body text: 4.5:1 against background. Large text (24px+ or 18.66px bold+): 3:1. **The common failure on luxury sites is pale gray body text on cream backgrounds** — looks elegant, fails contrast. Use a contrast checker; bump the text darker until it passes.
4. **Visible focus indicators.** Never `outline: none` without a replacement. Custom focus rings should be at least 2px and 3:1 against the background.
5. **Keyboard navigability.** Every interactive element reachable by Tab. Logical tab order. No keyboard traps.
6. **Skip link.** First focusable element on the page: `<a class="skip-link" href="#main">Skip to main content</a>`, visible on focus.
7. **`prefers-reduced-motion`.** Pause autoplay videos, kill animations, for users with vestibular sensitivity. Required, not optional.
8. **Form accessibility.** Every input has a `<label>`. Errors announced via `aria-describedby` or `aria-live`. Required fields marked with both visual indicator and `aria-required`.
9. **Video accessibility.** Hero videos are muted, looping, decorative — `aria-hidden="true"` on the `<video>` element so screen readers ignore it, and the poster image still gets meaningful alt text via context.
10. **Phone numbers.** Use `<a href="tel:+13105550140" aria-label="Call Digit Waves at 310-555-0140">+1 310 · 555 · 0140</a>` so it's tappable on mobile and announced cleanly.

### Common luxury-design accessibility failures (and fixes)

- **Pale gray body text on cream** (e.g., `#A0A0A0` on `#F4F1EA`) → fails contrast. Fix: darken text to at least `#5A5A5A` or darker.
- **Decorative thin hairlines used to separate content** → may not be visible to low-vision users. Fix: still use them visually, but also use real spacing/whitespace so structure works without them.
- **Headline typography in serif italics over a busy hero image** → readability collapses. Fix: add a gradient overlay behind the text, or use a subtle text-shadow.
- **Custom buttons made of `<div>` with onclick** → unreachable by keyboard, unannounced by screen readers. Fix: use `<button>` or `<a>` always.
- **Removed focus outlines** → keyboard users can't see where they are. Fix: replace with a custom focus style matching the brand.
- **Hover-only menus** → unusable on touch and keyboard. Fix: add click/tap toggle and ensure menu is reachable without hover.

### Accessibility-check prompt to run after every build

Hand the user this to verify the build:

```
Audit [filename].html for WCAG 2.1 Level AA compliance. Check:
- Semantic HTML structure and heading hierarchy
- Alt text on all images
- Color contrast ratios for all text (compute actual ratios using the hex values in the CSS)
- Focus states on every interactive element
- Keyboard accessibility (tab order, skip link, no traps)
- prefers-reduced-motion handling
- ARIA usage (correct, not over-applied)
- Touch target sizes (minimum 44×44px for buttons and links)

Report any failures with the specific element and recommended fix. Do not make changes yet — just audit.
```

Then a follow-up to remediate:

```
Apply all the fixes from your audit. Maintain the existing visual design as closely as possible while meeting WCAG AA. Summarize what changed.
```

### Quick reference: contrast targets

- Normal body text (under 24px regular, under 18.66px bold): **4.5:1**
- Large text (24px+ regular or 18.66px+ bold): **3:1**
- UI components and graphical objects (icons, focus indicators, form borders): **3:1**
- AAA (stricter, often required for government work): 7:1 normal / 4.5:1 large

Use webaim.org/resources/contrastchecker as the standard tool.

## Color Palette Library

These are vetted, on-trend palettes for common service-business verticals. **All text/background pairings noted have been verified to meet WCAG AA contrast.**

### Eucalyptus Sage Spa (med spa, wellness, skincare)
- Sage tones: `#A8B5A0`, `#8FA88A`
- Surfaces: warm ivory `#F4F1EA`, soft stone `#E8E4DC`
- Text: deep charcoal `#2A2E28` (passes AA on ivory at 12.8:1), near-black headline `#1A1D1A`
- Accent: brushed pewter `#A0A39C` (use for non-text elements only — fails contrast as body text)

### Cream & Sage (classic luxury aesthetic medicine)
- Cream: `#FBF7EE`, `#EDE4CE`
- Ink: `#2A2E26` (passes AA on cream at 13.6:1)
- Sage: `#8C9A78` (decorative only as text on cream), `#3D4632` (passes AA as text)

### Dusty Blue Wellness (yoga, therapy, holistic health)
- Blue tones: `#A8B8C4`, `#8FA5B5`
- Surfaces: pale ivory `#F5F2EC`, stone `#E5E1D9`
- Text: deep navy `#1F2A38` (passes AA at 13.1:1)
- Accent: brushed silver `#A8ADB2`

### Mushroom & Taupe (Japanese-inspired wellness, men's grooming)
- Mushroom: `#9B8E7E`, `#7A6F60`
- Surfaces: warm greige `#EEE8DD`, ivory `#F5F0E6`
- Text: smoked black `#2B2620` (passes AA at 13.4:1)
- Accent: aged brass `#A89070`

### Lavender Mist (aromatherapy, women's wellness, fragrance)
- Lavender: `#B5A8C0`, `#9B8FA8`
- Surfaces: pale gray `#EFEDF0`, ivory `#F4F2EE`
- Text: deep aubergine `#2A2030` (passes AA at 14.2:1)
- Accent: brushed pewter `#A8A5B0`

### Warm Cognac (boutique hotel, men's barber, coffee, leather)
- Cognac: `#B07A4E`, `#8C5F3B`
- Surfaces: cream `#F5EFE5`, warm white `#FAF6EE`
- Text: deep espresso `#2E2218` (passes AA at 14.8:1)
- Accent: aged gold `#C9A063`

When in doubt for a spa or aesthetic medicine client, **eucalyptus sage** is the safest premium choice.

## Hero Video Workflow

If the user wants to upgrade a static hero image to video, follow this sequence.

### Step 1: Check for face-detection blockers

Most AI video models (Seedance, Kling, Sora, Pika) reject images with clear human faces as a deepfake safeguard. If the reference image shows recognizable faces, generate a **face-free variant first** using the same scene from a different angle.

Face-free regeneration prompt template (for Midjourney / Flux / Ideogram / DALL-E):

```
[Scene description from original], shot from behind the [subject] over their shoulder. Subject seen from the back/side — only the back of their head, shoulder, and arms visible. [Other subject's] face softly turned down/away, hair falling forward and obscuring features — only chin, jawline, hair, and hands visible. Focus on hands and objects rather than faces. [Setting details]. Soft diffused natural light, shallow depth of field, editorial photography, 85mm lens f/2.0. [Palette]. No faces visible. 16:9 cinematic aspect ratio.

Negative prompt: faces, eyes, mouths, looking at camera, front-facing, cartoon, distorted hands, extra fingers
```

### Step 2: Generate the 5-second hero video

Hero loop videos should be **5 seconds, 16:9, subtle motion only**. Dramatic motion looks cheap on a luxury site.

```
Slow, subtle cinematic motion. Camera performs a gentle, almost imperceptible push-in over 5 seconds. [Subject does one small natural gesture — open palm tilting, slow nod, subtle hair shift]. [Ambient motion sources: candles flickering, branches swaying, dust motes in light]. Soft natural window light, shallow depth of field, refined editorial mood — like a high-end skincare commercial. No talking to camera, no zoom, no whip movement. Cinematic 24fps feel.

Negative prompt: fast motion, zoom, whip pan, dramatic gestures, faces appearing, head turning toward camera, distorted hands, extra fingers, morphing objects, jittery camera, shaky cam, blurry, low quality, cartoonish, oversaturated

Settings:
- Duration: 5 seconds
- Aspect ratio: 16:9
- Camera motion: Subtle (avoid "dynamic" or "dramatic")
- Motion strength: 3–4 out of 10
- Generate 3–4 takes with different seeds, pick the cleanest
```

### Step 3: Model selection by need

- **Faces visible required**: Kling 2.0, Luma Dream Machine, Hailuo/MiniMax, Runway Gen-4 (face filter is lenient)
- **No faces (B-roll, hands, ambient)**: Seedance 2.0 is excellent and cheapest
- **Maximum cinematic quality**: Runway Gen-4 or Sora
- **Maximum permissiveness**: Luma

### Step 4: Web-optimize the MP4 before integrating

Hero videos must be small or the page feels slow. Target specs:
- Format: H.264 MP4
- Resolution: 1920×1080 max (720p is fine for backgrounds)
- Bitrate: 2–4 Mbps
- File size: under 4 MB for a 5-second loop
- No audio track (strip it — autoplay requires muted anyway)

Quick optimization: handbrake.fr (free), "Web" preset, max width 1920px, CRF 18–20, uncheck audio.

Mid-stream pixelation is a **bitrate problem**, not a resolution problem. Re-encode at CRF 18 with 2-pass before assuming you need higher resolution.

### Step 5: Swap video into hero HTML (accessibility-compliant)

```
Replace the static hero image in [filename].html with a looping background video.

- Source: @images/[video-filename].mp4
- Use <video> element with: autoplay, muted, loop, playsinline, preload="metadata", aria-hidden="true"
- Set @images/[poster-image].png as the poster image and fallback
- object-fit: cover (no letterboxing)
- Subtle dark gradient overlay (rgba(0,0,0,0.45) on the side near the text, fading to rgba(0,0,0,0.1) on the opposite side) for headline legibility — verify contrast against the overlay
- Respect prefers-reduced-motion: pause video and show poster only (use the @media query, don't autoplay then pause)
- On slow connections (navigator.connection.effectiveType === '2g' or 'slow-2g'), show poster instead of loading video
- Add a soft fade-in when the video starts playing
- Include a visible pause/play button in the lower-right for users who want to stop motion (WCAG 2.2.2)

Keep all existing styling, palette, nav, CTAs, and accents exactly as-is.
```

The pause button is an actual WCAG requirement (2.2.2) for any auto-playing content over 5 seconds. Below 5 seconds it's recommended but not required. Luxury sites typically loop 5s clips indefinitely → the button is needed.

## Demo Site Legal & Ethics Guardrails

Critical for med spas and any regulated service business. Agency demos that look real are fine for pitch decks and portfolio walkthroughs, but if they go on the open web, fabricated content can trigger:

- **FTC Fake Reviews Rule** — fabricated testimonials, pull-quotes from publications, and made-up ratings/stats. Penalties up to ~$51K per violation.
- **State medical board regulations** — fake "board-certified," fake years of practice, fake credential claims. Especially aggressive enforcement for med spas.
- **ADA Title III** — applies to demo sites too if they're publicly reachable. Plaintiffs' firms don't care that it's a demo.
- **Real consumer harm** — someone in pain finding a fake medical site and trying to book.

### The practical middle path

When publishing a demo site, apply these signals so visitors immediately understand context:

1. **Domain choice**: host at `digitwaves.com/demos/[client-type]/` or `demo.digitwaves.com/[client-type]` — agency domain with a demo path
2. **Thin demo banner** at the top of every page:
   ```
   Concept site — created by Digit Waves to demonstrate capabilities. Not an active business.
   ```
   This banner needs to be screen-reader announced (`role="alert"` or in a `<header>` with sufficient prominence).
3. **Disable functional forms** — booking, lead capture, payment buttons should show a "Concept site — contact Digit Waves to build yours" message instead of collecting data
4. **Block search indexing** — robots.txt disallow plus `<meta name="robots" content="noindex,nofollow">` on every page
5. **Use clearly-placeholder fabricated content** in the live version — change "Vogue — Beauty Issue" to "Publication — Issue Title", swap real-sounding stats for lorem-ipsum-style placeholders. Keep the fully-polished fabricated version for screenshots and pitch decks only.
6. **Make it accessible anyway.** Even on a demo, especially if it's reachable. A demo site that fails ADA is a worse advertisement for agency capabilities than no demo at all.

When the user asks if it's "okay" to make a demo look real, answer honestly: it depends on where it lives. Pitch deck / portfolio = polish away. Public web = apply guardrails.

## Common Pitfalls and Fixes

**Claude Design upload errors with images** (`invalid_request_error` on `image.source.base64`): the image is too large (>5 MB), wrong format despite extension (HEIC saved as `.jpg`), or has weird metadata. Fix: re-export through Photos/Paint as JPEG, ~85% quality, max 2000px on long edge. Or switch to Claude Code, which reads images off the local filesystem.

**Filenames with spaces** break `@` autocomplete in Claude Code. Always rename with hyphens before referencing.

**Image generators producing faces when you wanted face-free**: be explicit in the negative prompt and frame the composition deliberately (back of head, hair falling forward, hands in focus).

**Hero video looks cheap**: motion is too strong. Drop motion strength to 2–3 out of 10. Cinematic motion is *barely perceptible* — that's what makes it premium.

**Page feels slow after video swap**: video file is too big. Handbrake at CRF 18, target 3 Mbps, no audio.

**Pale gray body text fails contrast**: classic luxury-design mistake. Darken to at least `#5A5A5A` on cream/ivory backgrounds, or `#3F3F3F` for safety. Use webaim.org/resources/contrastchecker.

**Fabricated stats in the demo**: fine for screenshots and pitch decks, but if the site is going public, swap them for placeholders and add the demo banner before deploying.

## Iteration Patterns

When the user wants variants of an existing hero, don't overwrite. Build to new filenames so they can compare:

- `hero.html` (original)
- `hero-fullscreen.html` (100vh variant)
- `hero-editorial.html` (Vogue-style full-bleed overlay)
- `hero-minimal.html` (oversized typography, whitespace-heavy)
- `hero-split.html` (50/50 asymmetric)
- `hero-v2-sage.html` (palette variant)

A useful batch prompt:

```
Build three hero variants using @images/[reference] and the same content, each in its own file:
- hero-editorial.html (Vogue-style, full-bleed image, overlay text)
- hero-minimal.html (lots of whitespace, tiny image, oversized typography)
- hero-split.html (50/50 split, asymmetric, modernist)
Different typography and palette weighting for each within the [palette name] family. All must meet WCAG 2.1 AA.
```

## When to Push Back vs. Just Build

Default is **just build it**. The user is non-technical and gets frustrated with caveats and clarifying questions when they've already given a clear direction. If you have everything you need, build it.

Push back only when:
- They're about to deploy a fabricated-content demo on a public domain without guardrails (legal risk worth flagging once, briefly)
- The brief is genuinely ambiguous (rare — usually you can make a strong default choice and iterate)
- A technical constraint will cause the build to fail (e.g., they want a face-driven hero video but Seedance will reject it — flag and offer the face-free workaround)
- Accessibility is being actively skipped — flag once that it's a legal exposure, then proceed if they confirm

For everything else: build, share the file, ask if they want tweaks.

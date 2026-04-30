# Digit Waves About Page - Simplified Artful Build Guide

This About page should feel calmer, clearer, and more visual than the earlier concept.

The last direction became too wordy and too dependent on stacked text blocks.
This version fixes that.

## New Direction

- clear starting point
- fewer sections
- fewer words per section
- stronger imagery
- more breathing room
- warmer message
- technical credibility kept subtle

The page should not feel like an AI agency trying to sound impressive.
It should feel like a thoughtful digital partner with taste, restraint, and modern technical range.

## Core Rule

Each section should do one job only.

- Hero: who Digit Waves is
- Statement: what the work is really about
- Story: how the work is approached
- CTA: what to do next
- Closeout: a calm white landing before the footer

If a section starts trying to explain everything, cut it down.

## Important Elementor Note

This site is using the older Elementor `section / column / inner section` workflow.

That means:

- use `Section` for the main bands
- use `Column` for left/right layouts
- use `Inner Section` only when absolutely needed
- for this About page, you should barely need `Inner Section` at all

That is intentional.
We are reducing stacked blocks, not adding more.

## Recommended Visual Tone

Bring imagery back, but use it strategically.

Good image use for this page:

- one strong hero image or illustration
- one secondary image that supports the story
- no random icon clouds
- no cluttered collage unless it feels deliberate and tightly cropped

Best image choices:

- a clean studio/workspace image
- a refined illustration with people and systems
- a strong abstract tech image with warmth
- something that feels human and modern, not clip-art corporate

## Elementor Build Order

### 1. Hero

Section class:

- `dw-about-hero`

Structure:

1. Create a 2-column section
2. Left column class:
- `dw-about-hero-media`
3. Right column class:
- `dw-about-hero-copy`

Left column widgets:

- Image widget

Right column widgets:

- Heading widget class: `dw-about-eyebrow`
- Heading widget class: `dw-about-hero-title`
- Text Editor widget class: `dw-about-hero-intro`
- Text Editor widget class: `dw-about-hero-note`
- Button widget wrapper class: `dw-premium-button`

Purpose:

- clear visual anchor on the left
- concise message on the right
- the eye should know where to start immediately

Suggested content:

- Eyebrow:
  `About Digit Waves`

- Hero title:
  `Clear websites, smarter systems, and practical AI for growing businesses.`

- Hero intro:
  `Digit Waves helps businesses improve the way they show up online and the way they operate behind the scenes. That can mean a stronger website, a smoother customer experience, cleaner internal workflows, or a better first step into AI.`

- Hero note:
  `The goal is not to make the work sound more complicated. The goal is to make the business easier to run.`

- Button:
  `Start a Project`

Image note:

- Use one strong image only.
- Let it do emotional work.
- Do not pair it with extra boxes or side notes.

### 2. Statement Band

Section class:

- `dw-about-statement`

Structure:

1. Single-column section
2. Add one Heading widget with class:
- `dw-about-statement-title`

Purpose:

- one strong sentence
- a visual pause between the hero and the longer story
- the section uses a darker teal AI/network background in CSS so it clearly contrasts with the hero and story sections

Suggested content:

- `Technology should help a business feel clearer, lighter, and easier to grow.`

Keep this to one sentence.
No paragraph under it.

### 3. Story Section

Section class:

- `dw-about-story`

Structure:

1. Create a 2-column section
2. Left column class:
- `dw-about-story-copy-wrap`
3. Right column class:
- `dw-about-story-media`

Left column widgets:

- Heading widget class: `dw-about-story-title`
- Text Editor widget class: `dw-about-story-copy`

Right column widgets:

- Image widget
- Optional small Text Editor widget class: `dw-about-story-caption`

Purpose:

- give the page some humanity and depth
- explain the approach without turning it into a wall of text

Suggested content:

- Story title:
  `A practical approach for businesses that want clarity, not confusion.`

- Story copy:
  `Many businesses know they need a better website, better systems, or a more modern way to handle repetitive work. What they do not need is another layer of vague jargon. Digit Waves is built around making digital work easier to understand and more useful in everyday operations.`

  `That may start with design and development, but it can also extend into better tool connections, cleaner workflows, and thoughtful AI support. Under the hood, that can involve integrations, retrieval-based tools, automation logic, or agent-style workflows when they actually fit the business.`

- Optional caption:
  `Good digital work should feel useful long after launch.`

Image note:

- this image should feel calmer and more grounded than the hero image
- think supporting visual, not another headline
- the CSS keeps this image square and the same visual size as the hero image

### 4. Principles Row

Current status:

- hidden in CSS for now
- class remains `dw-about-principles` in case we revisit it later
- this section was visually too fussy compared with the simpler About direction

Section class:

- `dw-about-principles`

Structure:

1. Add a centered Heading widget class:
- `dw-about-principles-title`
2. Under that, add one 3-column section
3. Give each column class:
- `dw-about-principle`

Inside each principle column add:

- Heading widget class: `dw-about-principle-number`
- Heading widget class: `dw-about-principle-title`
- Text Editor widget class: `dw-about-principle-copy`

Purpose:

- this replaces stacked containers with a simpler horizontal read
- short, memorable, easy to scan

Suggested section title:

- `What guides the work`

Suggested principles:

1. Number:
   `01`
   Title:
   `Clarity first`
   Copy:
   `If the solution is hard to explain, it is probably too complicated.`

2. Number:
   `02`
   Title:
   `Useful AI`
   Copy:
   `AI should save time, reduce friction, or improve decisions, not just sound impressive.`

3. Number:
   `03`
   Title:
   `Built to last`
   Copy:
   `The best systems are not only modern. They are maintainable, understandable, and grounded in the real business.`

Keep each principle short if this section is restored later.

Design note:

- this section is currently parked; do not spend more time polishing the number cards unless the page needs it back

### 5. Closing CTA

Section class:

- `dw-about-cta`

Structure:

1. Single-column section
2. Add:
- Heading widget class: `dw-about-cta-title`
- Text Editor widget class: `dw-about-cta-copy`
- Button widget wrapper class: `dw-premium-button`

Suggested content:

- CTA title:
  `If you want a better digital presence and a smarter way to operate, let’s start with what would actually help.`

- CTA copy:
  `Whether that means a website refresh, a cleaner customer journey, or a thoughtful first move into AI and automation, the best place to begin is with a clear conversation.`

- Button:
  `Start a Project`

Spacing note:

- the CTA should end cleanly; use Section 6 below it instead of a fake spacer

### 6. Closeout Section

Section class:

- `dw-about-closeout`

Structure:

1. Single-column section
2. Add:
- Heading widget class: `dw-about-closeout-title`
- Text Editor widget class: `dw-about-closeout-copy`

Suggested content:

- Title:
  `Simple first steps. Better digital foundations.`

- Copy:
  `Start with the part of the business that feels most unclear, repetitive, or hard to manage. From there, Digit Waves can help shape a practical next move.`

Purpose:

- gives the page a white visual landing before the dark footer
- avoids the awkward empty strip after the CTA
- keeps the ending warm without adding another heavy sales section
- CSS adds a subtle UI/UX wireframe background so it feels more designed than plain white

## Class List

- `dw-about-hero`
- `dw-about-hero-media`
- `dw-about-hero-copy`
- `dw-about-eyebrow`
- `dw-about-hero-title`
- `dw-about-hero-intro`
- `dw-about-hero-note`
- `dw-about-statement`
- `dw-about-statement-title`
- `dw-about-story`
- `dw-about-story-copy-wrap`
- `dw-about-story-title`
- `dw-about-story-copy`
- `dw-about-story-media`
- `dw-about-story-caption`
- `dw-about-principles`
- `dw-about-principles-title`
- `dw-about-principle`
- `dw-about-principle-number`
- `dw-about-principle-title`
- `dw-about-principle-copy`
- `dw-about-cta`
- `dw-about-cta-title`
- `dw-about-cta-copy`
- `dw-about-closeout`
- `dw-about-closeout-title`
- `dw-about-closeout-copy`

## What To Avoid

- no stack of mini cards
- no long proof ribbons with too many phrases
- no three-paragraph sections trying to say everything
- no filler technical jargon
- no random icon graphics that compete with the main message

## Build Summary

The page should feel like this:

1. strong image plus clear intro
2. one memorable statement
3. one grounded story section with a supporting image
4. one clean CTA
5. one calm closeout before the footer

That is enough.

If it starts feeling busy, the answer is almost always:

- fewer words
- fewer blocks
- stronger image choice
- more spacing

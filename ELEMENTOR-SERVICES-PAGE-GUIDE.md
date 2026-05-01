# Digit Waves Services Page - Creative Build Guide

This page should feel like a premium service narrative, not a catalog of cards. Keep it light, visual, and easy to understand on one read.

## Design Direction

- fewer boxes
- more editorial rhythm
- more contrast between sections
- short copy
- no 4-column card grids
- no heavy jargon blocks
- use dark turquoise as the main accent
- light blue only as atmosphere

The page should answer:

- what Digit Waves helps with
- when someone should reach out
- how the work usually starts
- what kinds of systems may be involved

## Section 1: Hero

Section class:

- `dw-premium-section dw-services-hero`

Structure:

1. One full-width section
2. One column
3. Add these widgets:
- Heading widget class: `dw-section-eyebrow`
- Heading widget class: `dw-services-hero-title`
- Text Editor widget class: `dw-services-hero-intro`
- Button widget class: `dw-premium-button`
- Button widget class: `dw-premium-button-outline`

Suggested content:

Eyebrow:
`Services`

Title:
`AI services built around real business operations.`

Intro:
`Digit Waves helps businesses improve websites, simplify workflows, and explore practical AI tools without turning the business upside down.`

Buttons:
`Start a Project`
`See How We Work`

Notes:

- Keep the two buttons side by side.
- Let the background wave treatment carry visual energy.
- Do not add extra hero cards.

## Section 2: What We Help Improve

Section class:

- `dw-premium-section dw-services-intro`

Structure:

1. Single-column section
2. Add one Heading widget
3. Add one Text Editor widget

Suggested title:
`Better digital work, without the confusion.`

Suggested copy:
`Most businesses do not need a giant AI overhaul on day one. They usually need a clearer website, cleaner customer flow, fewer repetitive tasks, or better-connected tools. That is where Digit Waves starts.`

Design note:

- This should be calm and centered.
- Think "breathing room," not sales pitch.

## Section 3: Service Lanes

Section class:

- `dw-premium-section dw-services-lanes`

Structure:

1. Create a 2-column section
2. Left column class: `dw-services-lanes-copy`
3. Right column class: `dw-services-lanes-art`

Left column widgets:

- Heading widget class: `dw-services-lanes-title`
- Text Editor widget class: `dw-services-lanes-copy-text`

Right column widgets:

- Image widget class: `dw-services-lanes-visual`
- Optional Text Editor widget class: `dw-services-lanes-caption`

Suggested title:
`The work usually falls into three lanes.`

Suggested copy:
`A project may start with the website people see, the workflow the team uses every day, or the AI layer that helps information and tasks move faster. The useful answer is the one that connects to the business instead of adding more noise.`

Right column image:

- Use the SVG asset: `images/services/service-lanes-flow.svg`
- In Elementor, use an Image widget and select/upload this SVG.
- Set the Image widget CSS class to: `dw-services-lanes-visual`
- Keep this image in the right column: `dw-services-lanes-art`

Optional caption:

`Website, workflow, and AI should feel connected, not like separate moving parts.`

Image meaning:

- website/customer experience
- workflow improvement
- practical AI layer
- all three paths connecting into one clearer operating flow

Design note:

- This replaces another row of cards and avoids the default icon-list look.
- Keep the right side visual and quiet, not text-heavy.
- If labels are needed, place one short caption below the image instead of adding another list.

## Section 4: Fit Check

Section class:

- `dw-premium-section dw-services-fit-check`

Structure:

1. Create a 2-column section
2. Left column class: `dw-services-fit-visual`
3. Right column class: `dw-services-fit-copy`

Left column widgets:

- Image widget class: `dw-services-fit-visual`

Right column widgets:

- Heading widget class: `dw-services-fit-title`
- Text Editor widget class: `dw-services-fit-copy-text`
- Button widget class: `dw-premium-button-outline`

Left column image:

- Use the PNG asset: `images/services/services-fit-check-gpt.png`
- In Elementor, use an HTML widget because the visual is a theme PNG/fallback asset now.
- Set the HTML widget CSS class to: `dw-services-fit-visual`

HTML widget snippet:

```html
<img
  class="dw-services-fit-visual-html"
  src="/wp-content/themes/DigitWaves/images/services/services-fit-check-gpt.png"
  alt="A visual showing website experience, workflow, integrations, and AI support being evaluated before choosing the right solution."
/>
```

Suggested title:
`Not every business needs the same solution.`

Suggested copy:
`Some projects start with design and development. Some need better tool connections. Some are ready for AI-assisted workflows, retrieval-based tools, or automation logic. The useful answer is the one that fits the business now.`

Button:
`Talk Through an Idea`

Design note:

- Make this section feel different from the hero.
- Use the dark split-panel treatment from `style.css`.
- The visual column can stay first on desktop; CSS moves copy above the visual on mobile.

## Section 5: How It Starts

Section class:

- `dw-premium-section dw-services-start`

Structure:

1. Single-column section
2. Heading widget class: `dw-services-start-title`
3. Add three short Text Editor widgets, not cards:
- `dw-services-start-step`
- `dw-services-start-step`
- `dw-services-start-step`

Suggested title:
`A simple way to begin.`

Suggested steps:

`01. We clarify what feels messy, slow, or unclear.`

`02. We choose the smallest useful improvement to build first.`

`03. We make the system understandable enough to actually use.`

Design note:

- This is styled as a horizontal timeline on desktop.
- On mobile it stacks cleanly.
- Do not use icon boxes or card widgets here.

## Section 6: Practical AI Layer

Section class:

- `dw-premium-section dw-services-ai-layer`

Structure:

1. Create a 2-column section
2. Left column class: `dw-services-ai-copy`
3. Right column class: `dw-services-ai-terms`

Left column widgets:

- Heading widget class: `dw-services-ai-title`
- Text Editor widget class: `dw-services-ai-copy-text`

Right column widgets:

- Text Editor widget class: `dw-services-ai-term-cloud`

Suggested title:
`AI can be useful without being mysterious.`

Suggested copy:
`When AI makes sense, it should make real work easier: finding answers, routing tasks, drafting responses, and connecting tools the business already uses.`

Suggested term cloud:
Use short lines, not one long sentence:

`RAG systems`

`Tool integrations`

`Workflow automation`

`Agent-style flows`

`Internal knowledge search`

`Customer support assistance`

Design note:

- This is where technical credibility lives.
- Keep it short.
- Do not explain every term.
- Put the services in the second column as short stacked lines so the CSS can treat them like a visual service rail.

## Section 7: Closing CTA

Section class:

- `dw-premium-section dw-premium-cta dw-services-cta`

Structure:

1. Single-column section
2. Heading widget class: `dw-services-cta-title`
3. Text Editor widget class: `dw-services-cta-copy`
4. Button widget class: `dw-premium-button`

Suggested title:
`Start with the part of the business that needs to feel easier.`

Suggested copy:
`Whether that is a better website, a cleaner workflow, or a first step into practical AI, the next move can start with a clear conversation.`

Button:
`Start a Project`

## Elementor Implementation Notes

- Remove or hide old service card/grid sections once the seven-section structure is in place.
- Put section classes on the outer Elementor section, not only on an inner column.
- Put column classes on the actual column Advanced > CSS Classes field.
- Put widget classes on the widget Advanced > CSS Classes field.
- For the two SVG visuals, use Image widgets rather than HTML widgets.
- In How It Starts, use three plain Text Editor widgets with the same `dw-services-start-step` class.
- In the CTA, use `dw-premium-section dw-premium-cta dw-services-cta` on the section so the shared button style and page-specific dark panel both apply.

## Class List

- `dw-services-hero`
- `dw-section-eyebrow`
- `dw-services-hero-title`
- `dw-services-hero-intro`
- `dw-premium-button`
- `dw-premium-button-outline`
- `dw-services-intro`
- `dw-services-lanes`
- `dw-services-lanes-copy`
- `dw-services-lanes-art`
- `dw-services-lanes-title`
- `dw-services-lanes-copy-text`
- `dw-services-lanes-visual`
- `dw-services-lanes-caption`
- `dw-services-fit-check`
- `dw-services-fit-visual`
- `dw-services-fit-copy`
- `dw-services-fit-title`
- `dw-services-fit-copy-text`
- `dw-services-start`
- `dw-services-start-title`
- `dw-services-start-step`
- `dw-services-ai-layer`
- `dw-services-ai-copy`
- `dw-services-ai-terms`
- `dw-services-ai-title`
- `dw-services-ai-copy-text`
- `dw-services-ai-term-cloud`
- `dw-services-cta`
- `dw-services-cta-title`
- `dw-services-cta-copy`

## What To Avoid

- no 4-column service cards
- no default icon-list sections unless the content truly needs a compact utility list
- no giant paragraph sections
- no repeating the same card pattern from About or Work
- no fake "we automate everything" claims
- no jargon unless it helps establish real technical capability

## Build Summary

The Services page should flow like this:

1. bold full-width hero
2. short plain-English framing
3. three service lanes as a connected visual section
4. visual fit-check section
5. simple timeline
6. short practical AI credibility layer
7. clean CTA

If it feels too busy, remove words before adding more design.

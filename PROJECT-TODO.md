# Digit Waves Project To-Do

## Current Priorities

- Return to the homepage for last-minute copy, layout, CTA, and visual polish.
- Build a clean post-submit redirect / thank-you page for contact form submissions.
- Rebuild the Contact page form using `CONTACT-FORM-LEAD-INTAKE-GUIDE.md` so the visible fields map cleanly to the DigitWaves Leads Google Sheet.
- Add contact form spam protection before relying on lead automation: enable WPForms anti-spam, add CAPTCHA/Turnstile if needed, and keep spam submissions out of Gmail/Sheets/message alerts.
- After the n8n workflow is completed, fix the About page header: `/about/` currently loses the logo/menu on load and likely needs a page-specific masthead visibility/CSS correction.
- Domain renewal reminder is set: `digitwaves.com` public RDAP expiration is `2028-01-02T07:39:50Z`; registrar is Register.com / Network Solutions, LLC; one-month reminder scheduled for December 1, 2027.
- Set up Google Analytics for `digitwaves.com`: create/confirm GA4 property, install the tag, verify real-time traffic, and connect Search Console if available. Added to the weekday focus reminder.
- Track DigitWaves work sessions in `PROJECT-FOCUS-LOG.md` whenever Charles types `starting now`, `taking a break`, or `ending now`.
- Continue front page SEO and copy/design tightening from the top down.
- Continue the same SEO/copy/design pass across the other interior pages.

## Medium Priority

- Point remaining `Book a Strategy Call` CTAs to the Google Calendar booking page: `https://calendar.app.google/9zMzaHNicay1Za1GA`.
- Create a business lead generation system for DigitWaves: define target niches, capture sources, outreach flow, offer/CTA, tracking sheet fields, follow-up steps, and manual review process before automation.
- Build the AI Makeover / AI Package centerpiece offer with Starter, Pro, and Max packages; roll it out below the homepage hero after the first-generation site makeover is more fleshed out.
- Create interior pages for the three homepage service cards: `/web-design/`, `/ai-enabled-websites/`, and `/ugc-ads-short-videos/`.

## Lower Priority

- Turn okay Yoast SEO into good Yoast SEO later on the Contact page and other pages, without adding awkward filler copy or random outbound links.
- Keep a short Contact page SEO cleanup list: internal link, optional trusted outbound link after case studies/resources exist, subheading phrase usage, and enough helpful text to avoid thin-page warnings.
- Get Yoast SEO to green on the front page where it makes sense without making the copy awkward.
- Investigate contact form alert latency: recent form notification reached Gmail, but delivery/notification felt delayed. Check WPForms submission time, WP Mail SMTP logs, Gmail received time, n8n label logic, and Android notification behavior when this becomes important again.
- Keep qualified lead alerts to `310-855-4383` on the reliability list, but do not prioritize Twilio/Gmail notification tuning until the Contact page and SEO pass are cleaner.
- Keep Codex/Gmail/n8n lead intake reliable enough for manual review: contact form email to Gmail, parse lead, update the DigitWaves Leads Google Sheet, and draft a courtesy reply.
- Use the expanded DigitWaves Leads sheet to track contact preference, warm email, follow-up emails, last contacted, next follow-up, outreach notes, and reply status after the front-end Contact page is settled.
- Clean up old lead-sheet transition fields: stop relying on `aiKnowledgeSearch`, keep it blank or remove it after old form tests are no longer needed.
- Build follow-up tracking logic later: set `nextFollowUp` only after reply/follow-up workflow exists, and use `outreachNotes` for actual draft/reply/follow-up activity.
- Plan AI assistant reply layer later: start with Gmail lead summaries and approved warm replies, then add SMS via Twilio/Make/Zapier, then phone answering via Twilio Voice plus an AI voice agent.
- For production email/SMS/phone handling, use an always-on hosted workflow instead of relying on the local computer or Codex Desktop staying open. Best candidate: n8n on the existing VPS, with Make/Zapier as lower-maintenance paid alternatives.
- Set up GitHub to Hostinger webhook deployment.
- Explore Zendesk message automation: when someone sends a Zendesk message, capture the lead/conversation details into the DigitWaves Google Sheet and send a notification/message alert.
- Wire homepage/showcase hover items and buttons to useful destinations after the main page copy and form are settled.
- Plan AI chatbot, AI phone assistant, and AI email replier.
- Create Digit Waves LinkedIn account.
- Add footer LinkedIn, Instagram, and YouTube social icons once the public profile URLs exist.
- Redesign the surrounding Contact page layout after primary pages are tightened: improve trust copy, spacing, map/visual balance, and follow-up expectations.

## Higher Priority Later

- Build outbound lead-generation system.
- Build social automation workflow.
- Continue Yoast SEO setup and page optimization.

## Completed

- Fixed root `.htaccess` / server rewrites so public URLs no longer need `/index.php/` before page slugs.

## After SEO-Optimized Site

- Build an end-to-end automated growth pipeline: cold DM outreach, offer flow, lead qualification, project-start workflow, follow-up system, and handoff into the Digit Waves project process.

# Digit Waves Project To-Do

## Current Priorities

- Investigate contact form alert latency: recent form notification reached Gmail, but delivery/notification felt delayed. Current finding: newer `Contact and Discovery Form` emails are landing in `INBOX`/`SENT` but not receiving the `Lead` label, so Android `Lead` label notifications may not fire; verify WPForms submission time, WP Mail SMTP logs, Gmail received time, n8n label logic, and Android notification behavior.
- Keep Codex/Gmail lead intake reliable: when the contact form submits to `charlesdigitwaves@digitwaves.com`, analyze the email, summarize it, label it, update the DigitWaves Leads Google Sheet, and keep the inbox alert path fast enough to trust.
- Add contact form spam protection before relying on lead automation: enable WPForms anti-spam, add CAPTCHA/Turnstile if needed, and keep spam submissions out of Gmail/Sheets/message alerts.
- Keep qualified lead alerts to `310-855-4383` on the active reliability list; Gmail label notifications are the current path, but latency needs to be diagnosed before relying on it.
- Use the expanded DigitWaves Leads sheet to track contact preference, warm email, follow-up emails, last contacted, next follow-up, outreach notes, and reply status.
- Rebuild the Contact page form using `CONTACT-FORM-LEAD-INTAKE-GUIDE.md` so the visible fields map cleanly to the DigitWaves Leads Google Sheet.
- Plan AI assistant reply layer: start with Gmail lead summaries and approved warm replies, then add SMS via Twilio/Make/Zapier, then phone answering via Twilio Voice plus an AI voice agent.
- For production email/SMS/phone handling, use an always-on hosted workflow instead of relying on the local computer or Codex Desktop staying open. Best candidate: n8n on the existing VPS, with Make/Zapier as lower-maintenance paid alternatives.
- After the n8n workflow is completed, fix the About page header: `/about/` currently loses the logo/menu on load and likely needs a page-specific masthead visibility/CSS correction.
- Domain renewal reminder is set: `digitwaves.com` public RDAP expiration is `2028-01-02T07:39:50Z`; registrar is Register.com / Network Solutions, LLC; one-month reminder scheduled for December 1, 2027.
- Set up Google Analytics for `digitwaves.com`: create/confirm GA4 property, install the tag, verify real-time traffic, and connect Search Console if available. Added to the weekday focus reminder.
- Track DigitWaves work sessions in `PROJECT-FOCUS-LOG.md` whenever Charles types `starting now`, `taking a break`, or `ending now`.
- Continue front page SEO and copy/design tightening from the top down.
- Get Yoast SEO to green on the front page where it makes sense without making the copy awkward.
- Continue the same SEO/copy/design pass across the other interior pages.

## Lower Priority

- Set up GitHub to Hostinger webhook deployment.
- Plan AI chatbot, AI phone assistant, and AI email replier.
- Create Digit Waves LinkedIn account.
- Add footer LinkedIn social icon once the LinkedIn URL exists.
- Redesign the surrounding Contact page layout after primary pages are tightened: improve trust copy, spacing, map/visual balance, and follow-up expectations.

## Higher Priority Later

- Build outbound lead-generation system.
- Build social automation workflow.
- Continue Yoast SEO setup and page optimization.

## Completed

- Fixed root `.htaccess` / server rewrites so public URLs no longer need `/index.php/` before page slugs.

## After SEO-Optimized Site

- Build an end-to-end automated growth pipeline: cold DM outreach, offer flow, lead qualification, project-start workflow, follow-up system, and handoff into the Digit Waves project process.

# DigitWaves Contact Form Lead Intake Guide

Use this guide to rebuild the Contact page form so it feeds the `DigitWaves Leads` Google Sheet cleanly.

Lead sheet:
`https://docs.google.com/spreadsheets/d/1JSc0tMJI7EP44-gXXvCxh39tUS2K5Qd8aLJhsxWJTYY/edit?usp=drivesdk`

Send all contact form notifications to:
`charlesdigitwaves@digitwaves.com`

## Recommended Form Fields

Build this in WPForms on the Contact page. Keep labels plain and friendly.

Before the fields, add a section heading.

Preferred: WPForms `Section Divider`.

If Section Divider is not available, use an HTML field with CSS class:
`dw-form-section-heading`

HTML:

```html
<h3>Personal info</h3>
<p>Just enough to know who I am replying to.</p>
```

1. Name
   - Type: Name or Single Line Text
   - Required: Yes
   - Sheet column: `Name`

2. Email
   - Type: Email
   - Required: Yes
   - Sheet column: `Email`

3. Phone
   - Type: Phone
   - Required: No
   - Sheet column: `Phone`

4. Business / Company
   - Type: Single Line Text
   - Required: No
   - Sheet column: `Company`

5. Website
   - Type: Website / URL
   - Required: No
   - Helps qualify website redesign and AI integration work.

Add another section heading before contact preference fields:

```html
<h3>Follow-up details</h3>
<p>How to reply without making the process annoying.</p>
```

6. How should I contact you?
   - Type: Radio Buttons or Dropdown
   - Required: Yes
   - Sheet column: `Preferred Contact Method`
   - Options:
     - Email
     - Phone call
     - Text message
     - No preference
   - If radio buttons do not display correctly after cache clear, use Dropdown.

7. Is it okay if an assistant helps with the first reply?
   - Type: Radio Buttons
   - Required: Yes
   - Sheet column: `Preferred Contact Method` or `Outreach Notes`
   - Options:
     - Yes, email is fine
     - Yes, text is fine
     - Yes, phone is fine
     - I prefer a direct personal reply
   - If radio buttons do not display correctly after cache clear, use Dropdown.

8. Text message permission
   - Type: Checkbox
   - Required: Only if text message is selected
   - Sheet column: `Outreach Notes`
   - Copy:
     - `I agree to receive text messages about my inquiry. Message and data rates may apply.`

9. Best time to reach you
   - Type: Dropdown
   - Required: No
   - Sheet column: `Best Time to Reach`
   - Options:
     - Morning
     - Afternoon
     - Evening
     - No preference

Add another section heading before project fields:

```html
<h3>Your project</h3>
<p>A few details so the first reply can be useful.</p>
```

10. What do you need help with?
   - Type: Checkboxes
   - Required: Yes
   - Sheet column: `Interest`
   - Options:
     - Website redesign
     - AI automation
     - RAG / internal knowledge search
     - Tool integrations
     - Customer support AI
     - Workflow cleanup
     - Not sure yet

11. Best fit right now
   - Type: Dropdown
   - Required: Yes
   - Sheet column: `Project Type`
   - Options:
     - New website or redesign
     - Add AI to an existing website
     - Automate a repetitive workflow
     - Connect tools that do not talk to each other
     - Build a searchable knowledge system
     - I need help figuring this out

12. Do you already know you need RAG or internal knowledge search?
   - Type: Radio Buttons
   - Required: Yes
   - Sheet column: `AI/RAG Need`
   - Options:
     - Yes, that is part of the project
     - Maybe, I want to talk it through
     - Not sure what that means yet
     - No, I need something simpler
   - If radio buttons do not display correctly after cache clear, use Dropdown.

13. Budget range
   - Type: Dropdown
   - Required: Yes
   - Sheet column: `Budget/Timeline`
   - Options:
     - Under $1,000
     - $1,000 - $3,000
     - $3,000 - $7,500
     - $7,500+
     - Not sure yet

14. Timeline
    - Type: Dropdown
    - Required: Yes
    - Sheet column: `Budget/Timeline`
    - Options:
      - ASAP
      - This month
      - 1-3 months
      - Just exploring

Add one final section heading before the open message:

```html
<h3>What feels messy?</h3>
<p>Plain language is perfect. You do not need to know the technical answer yet.</p>
```

15. Tell me what feels slow, messy, or unclear
    - Type: Paragraph Text
    - Required: Yes
    - Sheet column: used by Codex to write `Summary`
    - Placeholder:
      `Example: We need our website redesigned, and we want customers or staff to search our documents without asking us the same questions over and over.`

## Internal Sheet Columns

Do not add these as public form fields:

- `Received`: pulled from the email timestamp.
- `Summary`: written by Codex after reading the submission.
- `Status`: default should be `Needs Reply`.
- `Gmail Message ID`: used internally so the email and sheet row can stay connected.
- `Warm Email Sent`: internal checkbox after the first personal reply is sent.
- `Warm Email Date`: internal date for the first reply.
- `Follow-Up 1 Sent`: internal checkbox for the first follow-up.
- `Follow-Up 1 Date`: internal date for the first follow-up.
- `Follow-Up 2 Sent`: internal checkbox for the second follow-up.
- `Follow-Up 2 Date`: internal date for the second follow-up.
- `Last Contacted`: internal date for the most recent outreach.
- `Next Follow-Up`: internal date for when to follow up again.
- `Outreach Notes`: internal notes about what was sent or promised.
- `Reply Status`: internal dropdown for lead progress.

## WPForms Notification Settings

Notification email:
`charlesdigitwaves@digitwaves.com`

Subject:
`New DigitWaves Lead`

Email body:
Use WPForms `{all_fields}` so Codex can read every selected option.

Reply-To:
Use the visitor email field.

## Spam Protection

Set this up before turning on phone/message alerts so spam does not become noise.

In WPForms:

1. Enable built-in anti-spam protection.
2. Enable Akismet integration if Akismet is installed and active.
3. Add a CAPTCHA if spam still gets through.
   - Preferred: Cloudflare Turnstile.
   - Backup: Google reCAPTCHA.
4. Add a short keyword/link rule if WPForms supports it:
   - Flag messages with many links.
   - Flag obvious spam terms.
   - Do not send flagged spam into the lead sheet.

Lead automation rule:

- Only add messages to the Google Sheet when they look like a real business inquiry.
- Label suspicious messages as `Lead Review` or `Possible Spam`.
- Do not send phone/message alerts for obvious spam.

## Phone / Message Alerts

Preferred alert content:

`New DigitWaves lead: [Name] - [Interest]. Budget: [Budget]. Timeline: [Timeline]. Reply: [Email].`

Current fastest alert path:

- Alert phone: `310-855-4383`
- Device/app target: Android phone
- Immediate method: Gmail mobile notification for the `Lead` label.
- Upgrade later: true Android Messages/SMS via Twilio, Make/Zapier, or carrier email-to-SMS.

Best setup options:

1. Easiest now: Gmail app notification on your phone for the `Lead` label.
2. More automated: Make/Zapier watches Gmail label `Lead` and sends SMS/push alert.
3. Strongest long-term: Twilio SMS alert when Codex/Gmail qualifies a lead.
4. Apple Messages/iMessage: needs a Mac/iPhone Shortcut or another bridge. Codex on this Windows workspace cannot directly send iMessages.

Android Gmail setup:

1. Open Gmail app on the Android phone.
2. Tap the menu icon, then Settings.
3. Select `charlesdigitwaves@digitwaves.com`.
4. Tap `Labels`.
5. Open the `Lead` label.
6. Turn on label sync.
7. Turn on label notifications.
8. Set notification sound/vibration if desired.

True Android Messages/SMS later:

- If using carrier email-to-SMS, we need the mobile carrier for `310-855-4383`.
- If using Twilio or Make/Zapier, we need that account connected and permission to send SMS.

## AI Assistant Reply Layer

What Codex can do now:

- Read lead emails sent to `charlesdigitwaves@digitwaves.com`.
- Summarize the inquiry.
- Update the `DigitWaves Leads` sheet.
- Draft warm email replies.
- Send Gmail replies only when Charles explicitly approves.

What needs another tool or bridge:

- Phone call answering needs a phone provider such as Twilio, plus an AI voice endpoint.
- SMS replies need Twilio, Make/Zapier, or another SMS provider. Android Messages is not directly controllable from this Windows workspace.
- Automated outbound text replies need clear opt-in language on the form.

Recommended build order:

1. Email assistant first: summarize, draft, and track replies from Gmail.
2. SMS alert/reply second: use Twilio or Make/Zapier after text consent is in the form.
3. Phone assistant third: use Twilio Voice/SIP with an OpenAI Realtime voice agent or a managed voice-agent platform.

Production hosting rule:

- Do not depend on Charles's local computer, browser, or Codex Desktop being open for live email/SMS/phone handling.
- Local Codex is fine for setup, testing, review, drafting, and manual approvals.
- Production lead handling should run from a hosted service that stays awake.
- Best beginner path: self-host n8n on the existing VPS, or use Make/Zapier if avoiding server maintenance matters more than monthly cost.
- Twilio SMS and phone webhooks need a public HTTPS endpoint that is always available.

## Confirmation Message

Use this after submit:

`Thanks. I will review this and reply with the clearest next step. If it looks like a fit, we can schedule a short strategy call.`

## Contact Page Styling

The theme CSS now styles the richer WPForms fields on page `page-id-22`, including:

- Text, email, phone, URL, dropdown, and textarea fields.
- Radio and checkbox rows with soft turquoise hover states.
- A stronger dark-turquoise submit button gradient.

Use the existing Elementor Contact section class:
`dw-contact-action`

Current Contact page layout direction:

- Keep WPForms.
- Remove or hide the map.
- Remove or hide the contact image.
- Make the form the first thing visitors see.
- Use two columns: form on the left, address/contact details on the right.
- Keep the right column useful but quieter than the form.

Elementor cleanup:

1. Contact form parent section/container classes:
   `dw-contact-action contact-form-mast-container`
2. This parent class places the large subtle envelope SVG behind both columns.
3. Set the section to two columns.
4. Left column width: about 65%.
5. Right column width: about 35%.
6. Left column: WPForms widget only.
7. Right column class:
   `dw-contact-intro-panel`
8. Right column should include heading, short text, three-step process, and contact details.
9. Three-step process widget class:
   `dw-contact-steps`
10. Contact details icon/list widget class:
   `dw-contact-detail-list`
11. Remove the Google Maps widget.
12. Remove the large image widget.
13. Delete or hide the old separate contact hero section if it repeats the same address details.

Right column final copy:

Heading:
`Start with the rough version.`

Body:
`You do not need a finished plan. Tell me what feels slow, unclear, repetitive, or hard to explain. I will turn the rough version into a practical next step.`

Three-step process:

1. `Fill out the contact form.`
2. `I reply with the clearest next step.`
3. `We clean up the pain points and get your website AI-ready.`

Do not use:
`If it fits`

Reason:
The page should invite inquiries. We can qualify leads internally after they contact us.

Contact details:

- `charlesdigitwaves@digitwaves.com`
- `310-855-4383`
- `600 W. Hyde Park Blvd. #17, Inglewood, CA 90302`
- `Mon-Fri, 9:00 AM - 5:00 PM`

Radio button issue:

- The theme has older Materialize-style input behavior that can hide native radio/checkbox controls.
- The theme CSS now forces WPForms radio and checkbox inputs back to visible native controls on `page-id-22`.
- If caching keeps the controls hidden, clear site/browser cache.
- If they still do not show, use dropdown fields for those questions instead of changing form plugins.

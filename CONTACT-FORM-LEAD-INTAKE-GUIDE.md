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
<p>Plain language is perfect. You do not need to know the technical answer yet.</p>
```

10. What do you need help with?
   - Type: Paragraph Text
   - Required: Yes
   - Sheet column: used by Codex to write `Summary`
   - Placeholder:
     `Example: I need my website to explain what I do better, and I want help getting more leads from content or follow-up.`
   - Keep this as the main project field. This should do the heavy lifting instead of making visitors pick too many radio buttons.

11. Services needed
   - Type: Checkboxes
   - Required: No
   - Sheet column: `Interest`
   - Description:
     `Optional. Pick any that sound close.`
   - Options:
     - Website design or redesign
     - AI-enabled website / smart chatbot
     - UGC ads or short videos
     - Instagram / TikTok / YouTube content
     - Brand voice / messaging
     - Lead follow-up or posting workflow
     - Not sure yet

Do not show these as public fields:

- `Project Type`
- `AI/RAG Need`

Reason:
Those choices are too technical and make the form feel like homework. Codex/n8n can infer project type later from the open message and selected services.

12. Budget range
   - Type: Dropdown
   - Required: No
   - Sheet column: `Budget/Timeline`
   - Options:
     - Under $1,000
     - $1,000 - $3,000
     - $3,000 - $7,500
     - $7,500+
     - Not sure yet

13. Timeline
    - Type: Dropdown
    - Required: No
    - Sheet column: `Budget/Timeline`
    - Options:
      - ASAP
      - This month
      - 1-3 months
      - Just exploring

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

## Contact Page SEO

Use the Contact page to rank for branded/contact intent, not a broad keyword. Keep the page helpful, direct, and easy to skim.

Focus keyphrase:
`Contact DigitWaves`

SEO title:
`Contact DigitWaves | AI Marketing Help for Small Businesses`

Meta description:
`Contact DigitWaves for website help, AI marketing, smart customer answers, content ideas, and simple lead follow-up.`

Slug:
`contact`

Recommended visible H1:
`Contact DigitWaves`

If the page keeps the current visual headline, use this as the first intro line or an H2 so Yoast can still find the phrase:

`Contact DigitWaves when your website, content, or follow-up feels unclear. Send the rough version, and I will reply with the clearest next step.`

Short page intro:

`You do not need a finished plan. Tell me what feels slow, unclear, repetitive, or hard to explain. I will read it, sort out the likely next step, and reply with a practical path forward.`

Helpful text block below the form:

```html
<h2>Contact DigitWaves for practical marketing help</h2>
<p>DigitWaves helps small businesses make their marketing easier to understand, easier to find, and easier to act on. That can mean a clearer website, better content ideas, short-form video direction, smart customer answers, or a simple follow-up path so good leads do not slip away.</p>
<p>If you are not sure what you need yet, that is fine. Send what feels messy or unclear. I will look at your website, your message, and your goals, then reply with the simplest next step.</p>
<p>You can also review the <a href="/services/">services</a>, see recent <a href="/work/">featured work</a>, or read practical <a href="/articles/">articles</a> before reaching out.</p>
<p>Useful resource: <a href="https://www.sba.gov/business-guide/manage-your-business/marketing-sales" target="_blank" rel="noopener">SBA Marketing and Sales guide</a>.</p>
```

Optional accordion copy if Yoast still complains about text length:

```html
<h3>What can you ask about?</h3>
<p>You can contact DigitWaves about a website that needs clearer messaging, a homepage that does not explain the offer fast enough, short-form content ideas, better customer answers, or a follow-up process that feels scattered.</p>
<h3>What happens after you send the form?</h3>
<p>I read the message first, look for the main problem, and reply with a practical next step. The goal is not to bury you in technical options. The goal is to help you understand what would make your marketing easier to trust, easier to find, and easier to act on.</p>
<h3>What if you are not sure what you need?</h3>
<p>That is completely fine. A rough message is enough. Tell me what feels slow, messy, repetitive, or unclear, and I will help sort the request into a website, content, smart customer answer, or lead follow-up direction.</p>
```

Image suggestion:

- Add one small image near the right-side contact panel or near the thank-you path.
- Use the DigitWaves logo, a simple marketing workflow visual, or the homepage marketing visual.
- Alt text:
  `Contact DigitWaves for AI marketing and website help`

Yoast red notes:

- `Text length`: Contact pages are naturally shorter, but the helpful text block above gives Yoast enough real copy without stuffing the page.
- `Outbound links`: The SBA Marketing and Sales guide link is enough.
- `Internal links`: Link to Services, Work, and Articles.
- `Images`: Add one relevant image with the alt text above.
- `Keyphrase in introduction/subheading`: Use the first intro line and H2 above.

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

## Redirect / Thank-You Page

Create a page for the form redirect:

Title:
`Thanks, I Got Your Message`

Slug:
`contact-thank-you`

WPForms confirmation type:
`Go to URL (Redirect)`

Redirect URL:
`https://digitwaves.com/contact-thank-you/`

SEO setting:
Set this page to `noindex` if the SEO plugin allows it. This page is for visitors after they submit, not a search landing page.

Elementor structure:

1. Section class:
   `dw-thankyou-hero`
2. Inner container class:
   `dw-thankyou-card`
3. Heading widget:
   `Thanks, I got your message.`
4. Text widget:
   `I will review what you sent and reply with the clearest next step. If it looks like a good fit, we can schedule a short strategy call.`
5. Small process row class:
   `dw-thankyou-steps`
6. Process labels:
   - `Review`
   - `Reply`
   - `Next step`
7. Button row class:
   `dw-thankyou-actions`
8. Buttons:
   - `View Featured Work` -> `/work/`
   - `Back to Home` -> `/`

Optional short copy below the buttons:

`While you wait, you can look through recent work or read a few practical articles about clearer websites, content, and AI-assisted marketing.`

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

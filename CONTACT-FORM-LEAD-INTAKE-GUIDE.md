# DigitWaves Contact Form Lead Intake Guide

Use this guide to rebuild the Contact page form so it feeds the `DigitWaves Leads` Google Sheet cleanly.

Lead sheet:
`https://docs.google.com/spreadsheets/d/1JSc0tMJI7EP44-gXXvCxh39tUS2K5Qd8aLJhsxWJTYY/edit?usp=drivesdk`

Send all contact form notifications to:
`charlesdigitwaves@digitwaves.com`

## Recommended Form Fields

Build this in WPForms on the Contact page. Keep labels plain and friendly.

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

6. What do you need help with?
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

7. Best fit right now
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

8. Do you already know you need RAG or internal knowledge search?
   - Type: Radio Buttons
   - Required: Yes
   - Sheet column: `AI/RAG Need`
   - Options:
     - Yes, that is part of the project
     - Maybe, I want to talk it through
     - Not sure what that means yet
     - No, I need something simpler

9. Budget range
   - Type: Dropdown
   - Required: Yes
   - Sheet column: `Budget/Timeline`
   - Options:
     - Under $1,000
     - $1,000 - $3,000
     - $3,000 - $7,500
     - $7,500+
     - Not sure yet

10. Timeline
    - Type: Dropdown
    - Required: Yes
    - Sheet column: `Budget/Timeline`
    - Options:
      - ASAP
      - This month
      - 1-3 months
      - Just exploring

11. Tell me what feels slow, messy, or unclear
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

Best setup options:

1. Easiest now: Gmail app notification on your phone for the `Lead` label.
2. More automated: Make/Zapier watches Gmail label `Lead` and sends SMS/push alert.
3. Strongest long-term: Twilio SMS alert when Codex/Gmail qualifies a lead.
4. Apple Messages/iMessage: needs a Mac/iPhone Shortcut or another bridge. Codex on this Windows workspace cannot directly send iMessages.

To connect this, decide which alert path you want and provide the phone number or app/service account needed for that path.

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

# Web Design Page Yoast Setup

Use this for `/web-design/`.

## Yoast Fields

Focus keyphrase:

`web design for local businesses`

SEO title:

`Web Design for Local Businesses | DigitWaves`

Slug:

`web-design`

Meta description:

`Web design for local businesses that need a clear WordPress site, stronger service pages, local SEO basics, and easier contact paths.`

## Page Copy Signals

H1:

`Web Design for Local Businesses That Need More Trust and Better Leads`

First paragraph:

`Web design for local businesses should make it easy for visitors to understand what you offer, trust the company behind it, and take the next step without confusion.`

Recommended social title:

`Web Design for Local Businesses | DigitWaves`

Recommended social description:

`Clear, trust-focused web design for local teams that need better service pages, stronger calls to action, and a simpler path from visitor to lead.`

Recommended image alt text for the proof visual:

`Website content, customer answers, and lead follow-up arranged into a clearer local marketing flow`

## Notes

- Yoast may not fully read custom PHP template content in the page editor analysis. The rendered page is still crawlable.
- If you want the Yoast content analysis light to see the copy, paste the H1 and first paragraph into the WordPress page editor body as plain reference content, then keep the template assigned.
- Do not over-repeat the keyphrase. It is already in the H1, first paragraph, SEO title, meta description, and supporting copy.

## Next Yoast Fix Pass

The screenshot shows Yoast reading the WordPress editor body as `0 words`, even though the PHP template renders content on the front end. To improve the Yoast score, add editor-visible content to the `/web-design/` page in WordPress.

Do this first:

1. Set the focus keyphrase to `web design for local businesses`.
2. Set the SEO title to `Web Design for Local Businesses | DigitWaves`.
3. Set the meta description to `Web design for local businesses that need a clear WordPress site, stronger service pages, local SEO basics, and easier contact paths.`
4. Confirm the slug is `web-design`.

Then add this editor-visible content near the top of the page editor:

```text
Web Design for Local Businesses That Need More Trust and Better Leads

Web design for local businesses should make it easy for visitors to understand what you offer, trust the company behind it, and take the next step without confusion.

DigitWaves helps local teams clean up the parts of a website that affect trust: service pages, mobile layout, local SEO basics, contact paths, and clear calls to action. The goal is not just a better-looking site. The goal is a website that explains the business clearly enough for more visitors to call, book, request a quote, or send a message.
```

Add these internal links in the editor content:

- `AI-Enabled Websites` -> `/ai-enabled-websites/`
- `UGC Ads & Short Videos` -> `/ugc-ads-short-videos/`
- `Contact DigitWaves` -> `/contact/`

Add one helpful outbound link:

- `SBA Marketing and Sales guide` -> `https://www.sba.gov/business-guide/manage-your-business/marketing-sales`

Add one image to the editor body if Yoast still reports no images. Use the existing proof/marketing visual if it is available in Media Library, or upload the theme image.

Suggested image alt text:

`Web design for local businesses with website content, customer answers, and lead follow-up`

Likely red bullets this fixes:

- Focus keyphrase not set.
- Keyphrase missing from SEO title.
- Keyphrase missing from meta description.
- Keyphrase missing from slug.
- Keyphrase missing from introduction.
- Keyphrase density.
- Text length.
- Internal links.
- Outbound links.
- Images.
- Image alt attributes.
- Keyphrase in subheading.

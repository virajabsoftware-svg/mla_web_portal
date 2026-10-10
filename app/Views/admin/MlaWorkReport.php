<!DOCTYPE html>
<html lang="mr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>आमदारांच्या कामाचा लेखाजोखा | आमदारांनी भरायची माहिती</title>
<link rel="icon" type="image/png" href="<?= base_url('assets/user/images/logo.jpeg') ?>">

<!-- Optional web fonts for the standalone page. If your site already loads a
     Devanagari font, delete these three lines; the form falls back to system fonts. -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mukta:wght@400;500;600;700&family=Tiro+Devanagari+Marathi&display=swap">
<link rel="stylesheet" href="<?= base_url('assets/admin/css/header.css') ?>">
<!-- ============================================================
         REFERENCE HEADER DEPENDENCIES
         ============================================================ -->
    <!-- Font Awesome 4.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Bootstrap 4.0.0 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <!-- jQuery 3.6.0 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Popper.js 1.12.9 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    
    <!-- Bootstrap 4.0.0 JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Header CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/header.css') ?>">
    
    <!-- Font Awesome 6.0.0-beta3 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Google Fonts: Inter + Playfair Display -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,600;14..32,700;14..32,800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3.0-alpha1 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
  /* Page-only styles. Not needed once the block below is pasted into your dashboard page. */
  html { -webkit-text-size-adjust: 100%; }
  body { margin: 0; background: #E9EDF1; }
</style>
</head>
<?php include "common/header.php"; ?>
<body>

<!-- =====================================================================
  AMDAR LEKHAJOKHA — MLA DASHBOARD FORM (embeddable block)
  Sections 1-10 answer voter questions 1-10 of the voter questionnaire;
  section 11 answers voter questions 11-12. Each section shows the voter's
  question next to the MLA's entry.

  HOW TO EMBED
  1. Copy everything from "COPY FROM HERE" to "COPY TO HERE" into the dashboard
     page. All CSS is scoped under .amdar; the script is wrapped in a function.
  2. Attributes on the root element (#amdar-root):
       data-endpoint="https://your-server/path"   where the form POSTs. Empty = TEST MODE
                                                  (nothing is stored; the data is shown on screen).
       data-mla="..."  data-constituency="..."    pre-fill and lock the identity fields
       data-mla-id="..."                          sent back as mla_id (for your convenience only)
       data-financial-year="2025-26"              pre-select the year
       data-max-file-mb="10"                      per-file size limit shown and enforced in the browser
       data-csrf-name="..." data-csrf-token="..." added to the POST as an ordinary form field
       data-with-credentials="true"               send cookies on a cross-origin POST
  3. To reopen a saved draft or an earlier submission, print the stored payload as JSON
     inside <script type="application/json" id="amdar-initial"> (same shape as "payload"
     below). For files already on your server, give each file entry as {"name": "...", "url": "..."}.

  WHAT IS SENT  (POST, multipart/form-data; any 2xx reply = success)
    status            "draft" (no validation) or "submitted" (fully validated)
    form_version, submitted_at (visitor's clock), page_url
    mla_id, mla_name, constituency, financial_year      convenience copies
    payload           ONE JSON string holding every section:
                      { basic:{...}, promises:{items:[...], manifesto_file:[...]}, mlalad:{...},
                        participation:{...}, priorities:{...}, special_funds:{none, items:[...]},
                        works:{full_list_file:[...], items:[...]}, party_change:{...}, assembly:{...},
                        grievances:{...}, annual_report:{...}, statement:{...}, declaration:{accepted} }
                      Amounts are strings in lakh rupees with ASCII digits ("512.5").
                      A file field is a list: new uploads look like
                        {"field":"file__works__items__0__photos__0","name":"a.jpg","size":12345,"type":"image/jpeg"}
                      and the file itself arrives as the multipart part named in "field";
                      files you supplied through amdar-initial come back as {"existing":true,"name","url"}.
    file__...         the uploaded files, one part each
    After a draft save you may reply with JSON {"payload": {...}} (uploads rewritten as {name,url});
    the form then reloads from it, so files are not uploaded twice.

  ON THE SERVER, BEFORE GOING LIVE
    * This form does not authenticate anyone. Tie every submission to the logged-in dashboard
      session; never trust mla_id, mla_name or constituency from the browser.
    * Re-check file type and size, store uploads under generated names, and scan them.
    * Escape all text when you show it publicly; open submitted links with rel="noopener nofollow".
    * The sentences promising what is shown to voters and what stays private (intro, the note in
      "मूलभूत माहिती", the declaration) must match what the portal really does. Edit them if not.
===================================================================== -->

<!-- ======================= COPY FROM HERE ======================= -->
<div class="amdar" id="amdar-root" lang="mr"
     data-endpoint=""
     data-mla=""
     data-constituency=""
     data-mla-id=""
     data-financial-year=""
     data-max-file-mb="10"
     data-csrf-name=""
     data-csrf-token=""
     data-with-credentials="false">

<style>
.amdar {
  /* ---- Theme: same tokens as the voter form; change to match your site ---- */
  --amdar-ink: #1B2437;
  --amdar-ink-soft: #566079;
  /*--amdar-paper: #FFFFFF;*/
  --amdar-tint: #EDF1F8;
  --amdar-rule: #D2D9E5;
  --amdar-margin: #C23B3B;       /* ledger margin line, required marks, errors */
  --amdar-warn-bg: #FFF5F4;
  --amdar-stamp: #2F4BA0;
  --amdar-font: "Mukta", "Noto Sans Devanagari", "Nirmala UI", "Kohinoor Devanagari", "Mangal", system-ui, sans-serif;
  --amdar-font-display: "Tiro Devanagari Marathi", "Noto Serif Devanagari", "Mukta", "Noto Sans Devanagari", "Nirmala UI", serif;
  --amdar-sticky-top: 0px;       /* height of your dashboard's fixed header, if any */
  --amdar-gutter: 16px;

  container-type: inline-size;
  container-name: amdar;
  max-width: 1200px;
  margin: 0 auto;
  padding: 22px var(--amdar-gutter) 48px;
  background: var(--amdar-paper);
  color: var(--amdar-ink);
  font-family: var(--amdar-font);
  font-size: 17px;
  line-height: 1.6;
  text-align: left;
  -webkit-font-smoothing: antialiased;
}
.amdar, .amdar *, .amdar *::before, .amdar *::after { box-sizing: border-box; }
.amdar [hidden] { display: none !important; }

/* Reset what host themes usually restyle */
.amdar h1, .amdar h2, .amdar p, .amdar ul, .amdar fieldset, .amdar legend { margin: 0; padding: 0; }
.amdar ul { list-style: none; }
.amdar fieldset { border: 0; min-width: 0; }
.amdar legend { display: block; float: none; width: 100%; border: 0; color: inherit; font-size: inherit; line-height: inherit; }
.amdar label { display: block; margin: 0; font-weight: inherit; }
.amdar button, .amdar input, .amdar textarea, .amdar select { margin: 0; font: inherit; color: inherit; letter-spacing: inherit; }

/* ---------- Head ---------- */
.amdar .amdar-head { padding-bottom: 16px; border-bottom: 4px double var(--amdar-ink); }
.amdar .amdar-title { font-family: var(--amdar-font-display); font-weight: 400; font-size: 1.8em; font-size: clamp(1.7em, 5vw, 2.5em); line-height: 1.35; }
.amdar .amdar-sub { margin-top: 2px; font-size: 1.06em; color: var(--amdar-ink-soft); }
.amdar .amdar-intro { padding-top: 16px; max-width: 46em; }
.amdar .amdar-intro p + p { margin-top: 10px; }
.amdar .amdar-demo { margin-bottom: 18px; padding: 10px 12px; border: 1px dashed var(--amdar-margin); border-radius: 6px; background: var(--amdar-warn-bg); font-size: .9em; line-height: 1.55; }

/* ---------- Section index (sticky) ---------- */
.amdar .amdar-nav {
  position: -webkit-sticky; position: sticky; top: var(--amdar-sticky-top); z-index: 5;
  margin: 16px calc(var(--amdar-gutter) * -1) 0; padding: 8px var(--amdar-gutter) 0;
  background: var(--amdar-paper); border-bottom: 1px solid var(--amdar-rule);
}
.amdar .amdar-nav-text { display: block; font-size: .86em; color: var(--amdar-ink-soft); }
.amdar .amdar-nav-chips { display: flex; overflow-x: auto; padding: 8px 0 10px; scrollbar-width: thin; -webkit-overflow-scrolling: touch; }
.amdar .amdar-chip {
  flex: 0 0 auto; display: flex; align-items: center; min-height: 40px; margin-right: 8px; padding: 4px 14px 4px 8px;
  border: 1px solid var(--amdar-rule); border-radius: 20px; background: var(--amdar-paper);
  font-size: .88em; white-space: nowrap; cursor: pointer;
}
.amdar .amdar-chip-num {
  display: inline-flex; align-items: center; justify-content: center; min-width: 24px; height: 24px; margin-right: 7px; padding: 0 5px;
  border: 1.5px solid var(--amdar-ink-soft); border-radius: 12px; font-size: .85em; font-weight: 600; line-height: 1; color: var(--amdar-ink-soft);
}
.amdar .amdar-chip.is-filled .amdar-chip-num { border-color: var(--amdar-ink); background: var(--amdar-ink); color: #fff; }
.amdar .amdar-chip.is-error { border-color: var(--amdar-margin); }
.amdar .amdar-chip.is-error .amdar-chip-num { border-color: var(--amdar-margin); background: transparent; color: var(--amdar-margin); }
.amdar .amdar-chip:focus-visible, .amdar .amdar-add:focus-visible, .amdar .amdar-btn:focus-visible, .amdar .amdar-link-btn:focus-visible { outline: 2px solid var(--amdar-ink); outline-offset: 2px; }

/* ---------- The ledger sheet ---------- */
.amdar .amdar-sheet { border-left: 1px solid var(--amdar-margin); }
.amdar .amdar-sec {
  position: relative; padding: 22px 0 28px 14px; border-bottom: 1px solid var(--amdar-rule);
  scroll-margin-top: calc(var(--amdar-sticky-top) + 104px);
}
.amdar .amdar-sec:last-child { border-bottom-color: var(--amdar-ink); }
.amdar .amdar-sec-title { font-size: 1.22em; font-weight: 700; line-height: 1.4; outline: none; }
.amdar .amdar-sec-num { display: inline-block; margin-right: 10px; font-family: var(--amdar-font-display); font-weight: 400; font-size: 1.35em; line-height: 1; vertical-align: -2px; }
.amdar .amdar-sec.amdar-sec-error .amdar-sec-num { color: var(--amdar-margin); }

/* The voter's side of the ledger */
.amdar .amdar-voterq { margin-top: 12px; padding: 10px 14px 12px; border-left: 3px solid var(--amdar-ink); border-radius: 0 6px 6px 0; background: var(--amdar-tint); }
.amdar .amdar-voterq-label { font-size: .82em; font-weight: 600; color: var(--amdar-ink-soft); }
.amdar .amdar-voterq-text { margin-top: 2px; font-size: .95em; line-height: 1.55; }

.amdar .amdar-sec-body { container-type: inline-size; container-name: amdarbody; min-width: 0; }
.amdar .amdar-prompt { margin-top: 14px; }

/* ---------- Fields ---------- */
.amdar .amdar-grid { display: grid; grid-template-columns: minmax(0, 1fr); grid-column-gap: 18px; }
.amdar .amdar-field { margin-top: 16px; min-width: 0; }
.amdar .amdar-label { display: block; margin-bottom: 4px; font-size: .95em; font-weight: 600; line-height: 1.45; }
.amdar .amdar-req { color: var(--amdar-margin); }
.amdar .amdar-field input[type="text"], .amdar .amdar-field input[type="url"], .amdar .amdar-field input[type="tel"],
.amdar .amdar-field input[type="email"], .amdar .amdar-field input[type="date"], .amdar .amdar-field select {
  display: block; width: 100%; min-height: 48px; padding: 8px 12px;
  border: 1px solid var(--amdar-rule); border-bottom-color: var(--amdar-ink-soft); border-radius: 6px;
  background-color: #fff; box-shadow: none;
}
.amdar .amdar-field input[readonly] { background-color: var(--amdar-tint); }
.amdar .amdar-field textarea {
  display: block; width: 100%; padding: 0 12px; border: 1px solid var(--amdar-rule); border-radius: 6px;
  line-height: 30px; resize: vertical; overflow: hidden; box-shadow: none;
  background-color: #FCFDFF;
  background-image: linear-gradient(to bottom, transparent 29px, var(--amdar-rule) 29px);
  background-size: 100% 30px; background-position: 0 0; background-attachment: local;
}
.amdar .amdar-field input:focus, .amdar .amdar-field select:focus, .amdar .amdar-field textarea:focus { outline: 2px solid var(--amdar-ink); outline-offset: 1px; border-color: var(--amdar-ink); }
.amdar .amdar-hint { margin-top: 6px; font-size: .87em; line-height: 1.5; color: var(--amdar-ink-soft); }
.amdar p.amdar-hint.amdar-span-3 { margin-top: 12px; }
.amdar .amdar-echo { margin-top: 4px; font-size: .87em; font-weight: 600; color: var(--amdar-ink-soft); }
.amdar .amdar-echo.is-warn { color: var(--amdar-margin); }
.amdar .amdar-calc { margin-top: 12px; padding: 8px 12px; border-left: 3px solid var(--amdar-ink); background: var(--amdar-tint); font-size: .93em; font-weight: 600; }
.amdar .amdar-calc.is-warn { border-left-color: var(--amdar-margin); background: var(--amdar-warn-bg); }

/* Choices */
.amdar .amdar-pills { display: flex; flex-wrap: wrap; margin: 0 -4px; }
.amdar .amdar-pill { position: relative; margin: 6px 4px 0; cursor: pointer; -webkit-tap-highlight-color: transparent; }
.amdar .amdar-pill input { position: absolute; top: 20px; left: 18px; width: 1px; height: 1px; opacity: 0; }
.amdar .amdar-pill span { display: flex; align-items: center; min-height: 46px; padding: 8px 16px 8px 12px; border: 1px solid var(--amdar-rule); border-radius: 8px; background: #fff; line-height: 1.45; }
.amdar .amdar-pill span::before { content: ""; flex: 0 0 auto; width: 16px; height: 16px; margin-right: 10px; border: 1.5px solid var(--amdar-ink-soft); border-radius: 50%; }
.amdar .amdar-pill--checkbox span::before { border-radius: 4px; }
.amdar .amdar-pill input:checked + span { border-color: var(--amdar-ink); background: var(--amdar-tint); box-shadow: inset 0 0 0 1px var(--amdar-ink); }
.amdar .amdar-pill input:checked + span::before { border-color: var(--amdar-ink); background: var(--amdar-ink); box-shadow: inset 0 0 0 3px var(--amdar-tint); }
.amdar .amdar-pill input:focus + span { outline: 2px solid var(--amdar-ink); outline-offset: 2px; }
.amdar .amdar-pill input:focus:not(:focus-visible) + span { outline: none; }
.amdar .amdar-tick { display: flex; align-items: flex-start; cursor: pointer; }
.amdar .amdar-tick input { flex: 0 0 auto; width: 22px; height: 22px; margin: 3px 12px 0 0; accent-color: var(--amdar-ink); }

/* Files */
.amdar .amdar-filelist li { display: flex; align-items: center; padding: 6px 0; border-bottom: 1px solid var(--amdar-rule); font-size: .93em; }
.amdar .amdar-filelist:not(:empty) { margin-bottom: 10px; border-top: 1px solid var(--amdar-rule); }
.amdar .amdar-file-name { flex: 1 1 auto; min-width: 0; overflow-wrap: anywhere; }
.amdar .amdar-file-name a { color: inherit; }
.amdar .amdar-file-size { flex: 0 0 auto; margin: 0 12px; font-size: .9em; color: var(--amdar-ink-soft); white-space: nowrap; }
.amdar .amdar-filebtn { position: relative; display: inline-flex; align-items: center; min-height: 44px; padding: 6px 16px; border: 1.5px solid var(--amdar-ink); border-radius: 8px; font-weight: 600; cursor: pointer; }
.amdar .amdar-filebtn input { position: absolute; top: 0; left: 0; width: 1px; height: 1px; opacity: 0; }
.amdar .amdar-filebtn:focus-within { outline: 2px solid var(--amdar-ink); outline-offset: 2px; }
.amdar .amdar-link-btn { padding: 6px 4px; border: 0; background: none; color: var(--amdar-margin); font-size: .9em; font-weight: 600; text-decoration: underline; cursor: pointer; white-space: nowrap; }

/* Repeating entries */
.amdar .amdar-row { margin-top: 16px; padding: 0 14px 18px; border: 1px solid var(--amdar-rule); border-radius: 8px; background: #fff; }
.amdar .amdar-row-head { display: flex; align-items: center; justify-content: space-between; margin: 0 -14px; padding: 6px 10px 6px 14px; border-bottom: 1px solid var(--amdar-rule); border-radius: 8px 8px 0 0; background: var(--amdar-tint); }
.amdar .amdar-row-title { font-size: .95em; font-weight: 700; }
.amdar .amdar-add { display: block; width: 100%; min-height: 48px; margin-top: 14px; padding: 8px 16px; border: 1.5px dashed var(--amdar-ink-soft); border-radius: 8px; background: transparent; font-weight: 600; cursor: pointer; }
.amdar .amdar-add:disabled { opacity: .5; cursor: not-allowed; }

/* Errors */
.amdar .amdar-err { margin-top: 6px; font-size: .9em; font-weight: 600; color: var(--amdar-margin); }
.amdar .amdar-err:empty { display: none; }
.amdar .amdar-has-error input, .amdar .amdar-has-error select, .amdar .amdar-has-error textarea { border-color: var(--amdar-margin); }

/* End */
.amdar .amdar-end { padding-top: 24px; max-width: 46em; }
.amdar .amdar-actions { display: flex; flex-wrap: wrap; margin: 14px -6px 0; }
.amdar .amdar-btn { flex: 1 1 220px; min-height: 54px; margin: 6px; padding: 12px 22px; border-radius: 8px; font-size: 1.05em; font-weight: 600; cursor: pointer; }
.amdar .amdar-btn--primary { border: 0; background: var(--amdar-ink); color: #fff; }
.amdar .amdar-btn--primary:hover { filter: brightness(1.25); }
.amdar .amdar-btn--ghost { border: 1.5px solid var(--amdar-ink); background: transparent; }
.amdar .amdar-btn--ghost:hover { background: var(--amdar-tint); }
.amdar .amdar-btn:disabled { opacity: .6; cursor: progress; filter: none; }
.amdar .amdar-status { margin-top: 10px; font-size: .93em; font-weight: 600; }
.amdar .amdar-status:empty { display: none; }
.amdar .amdar-sent { margin-top: 18px; font-size: .88em; }
.amdar .amdar-sent summary { cursor: pointer; font-weight: 600; }
.amdar .amdar-sent pre { max-height: 420px; margin: 8px 0 0; padding: 12px; overflow: auto; border: 1px solid var(--amdar-rule); border-radius: 6px; background: #FCFDFF; font: 13px/1.5 ui-monospace, Menlo, Consolas, monospace; white-space: pre-wrap; overflow-wrap: anywhere; }

.amdar .amdar-done { padding: 34px 0 10px; outline: none; }
.amdar .amdar-stamp {
  display: inline-block; padding: 4px 18px 6px; border: 4px double var(--amdar-stamp); border-radius: 6px;
  color: var(--amdar-stamp); font-family: var(--amdar-font-display); font-size: 1.5em; line-height: 1.4;
  opacity: .92; transform: rotate(-5deg); transform-origin: left center;
  animation: amdar-stamp .38s cubic-bezier(.2, .9, .3, 1.25) both;
}
@keyframes amdar-stamp { from { opacity: 0; transform: rotate(-5deg) scale(1.7); } to { opacity: .92; transform: rotate(-5deg) scale(1); } }
.amdar .amdar-done h2 { margin-top: 22px; font-family: var(--amdar-font-display); font-weight: 400; font-size: 1.5em; line-height: 1.4; }
.amdar .amdar-done p { margin-top: 8px; max-width: 40em; }

/* ---------- Wider layouts (measured on the form's own width, not the window) ---------- */
@container amdarbody (min-width: 520px) {
  .amdar .amdar-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
  .amdar .amdar-span-2, .amdar .amdar-span-3 { grid-column: 1 / -1; }
}
@container amdarbody (min-width: 780px) {
  .amdar .amdar-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
  .amdar .amdar-span-2 { grid-column: span 2; }
  .amdar .amdar-span-3 { grid-column: 1 / -1; }
}
@container amdar (min-width: 640px) {
  .amdar .amdar-sheet { margin-left: 58px; }
  .amdar .amdar-sec { padding-left: 24px; }
  .amdar .amdar-sec::after { content: ""; position: absolute; left: -59px; bottom: -1px; width: 59px; height: 1px; background: var(--amdar-rule); }
  .amdar .amdar-sec:last-child::after { background: var(--amdar-ink); }
  .amdar .amdar-sec-num { position: absolute; top: 22px; left: -59px; width: 58px; margin: 0; text-align: center; font-size: 1.55em; line-height: 1.2; }
}
@container amdar (min-width: 980px) {
  .amdar .amdar-sec-cols { display: grid; grid-template-columns: 250px minmax(0, 1fr); grid-column-gap: 30px; align-items: start; }
  .amdar .amdar-sec-cols > .amdar-sec-body:only-child { grid-column: 1 / -1; }
  .amdar .amdar-voterq { position: -webkit-sticky; position: sticky; top: calc(var(--amdar-sticky-top) + 108px); margin-top: 18px; }
  .amdar .amdar-sec-body > .amdar-prompt:first-child, .amdar .amdar-sec-body > .amdar-grid:first-child > .amdar-field:first-child { margin-top: 18px; }
}
@media (min-width: 700px) { .amdar { --amdar-gutter: 32px; padding-top: 34px; } }
@media (prefers-reduced-motion: reduce) { .amdar *, .amdar *::before, .amdar *::after { transition: none !important; animation: none !important; } }
</style>

  <!-- <div class="amdar-demo" id="amdar-demo" hidden>
    चाचणी मोड: माहिती अजून कुठेही साठवली जात नाही. डॅशबोर्डमध्ये लावण्यापूर्वी data-endpoint मध्ये तुमच्या सर्व्हरची लिंक भरा.
  </div> -->

  <!-- <header class="amdar-head">
    <h1 class="amdar-title">आमदारांच्या कामाचा लेखाजोखा</h1>
    <p class="amdar-sub">आमदारांनी भरायची माहिती</p>
  </header>

  <noscript><p style="padding:16px 0;font-weight:600">हा फॉर्म भरण्यासाठी ब्राउझरमध्ये JavaScript सुरू असणे आवश्यक आहे.</p></noscript> -->

  <form class="amdar-form" action="" method="post" enctype="multipart/form-data" novalidate>

    <!-- <div class="amdar-intro">
      <p>मतदारांना त्यांच्या आमदारांच्या कामाबद्दल एक प्रश्नावली दिली जात आहे. त्याच मुद्द्यांवर तुमची बाजू, आकडेवारी आणि कागदपत्रे इथे नोंदवा. प्रत्येक विभागात मतदारांना विचारलेला प्रश्न दाखवला आहे; तुम्ही दिलेली माहिती मतदारांच्या उत्तरांसोबत मांडली जाईल.</p>
      <p>सर्व रकमा ₹ लाखांत लिहा (उदा. ५ कोटी = ५००). शक्य तिथे आदेश क्रमांक, दिनांक, लिंक किंवा कागदपत्र जोडा; पडताळता येणारी माहिती अधिक विश्वासार्ह ठरते. सर्व काही एकाच बैठकीत भरण्याची गरज नाही: ‘मसुदा जतन करा’ दाबून नंतर पुढे सुरू ठेवता येते. <span class="amdar-req" aria-hidden="true">*</span> खूण असलेली माहिती आवश्यक आहे.</p>
    </div> -->

    <nav class="amdar-nav" aria-label="फॉर्मचे विभाग">
      <span class="amdar-nav-text" id="amdar-nav-text"></span>
      <div class="amdar-nav-chips"><button type="button" class="amdar-chip" data-goto="basic"><span class="amdar-chip-num" aria-hidden="true">०</span>ओळख</button><button type="button" class="amdar-chip" data-goto="promises"><span class="amdar-chip-num" aria-hidden="true">१</span>जाहीरनामा</button><button type="button" class="amdar-chip" data-goto="mlalad"><span class="amdar-chip-num" aria-hidden="true">२</span>निधी</button><button type="button" class="amdar-chip" data-goto="participation"><span class="amdar-chip-num" aria-hidden="true">३</span>सहभाग</button><button type="button" class="amdar-chip" data-goto="priorities"><span class="amdar-chip-num" aria-hidden="true">४</span>प्राधान्य</button><button type="button" class="amdar-chip" data-goto="special_funds"><span class="amdar-chip-num" aria-hidden="true">५</span>विशेष निधी</button><button type="button" class="amdar-chip" data-goto="works"><span class="amdar-chip-num" aria-hidden="true">६</span>कामे</button><button type="button" class="amdar-chip" data-goto="party_change"><span class="amdar-chip-num" aria-hidden="true">७</span>पक्षांतर</button><button type="button" class="amdar-chip" data-goto="assembly"><span class="amdar-chip-num" aria-hidden="true">८</span>विधानसभा</button><button type="button" class="amdar-chip" data-goto="grievances"><span class="amdar-chip-num" aria-hidden="true">९</span>तक्रारी</button><button type="button" class="amdar-chip" data-goto="annual_report"><span class="amdar-chip-num" aria-hidden="true">१०</span>अहवाल</button><button type="button" class="amdar-chip" data-goto="statement"><span class="amdar-chip-num" aria-hidden="true">११</span>निवेदन</button></div>
    </nav>

    <div class="amdar-sheet">
<section class="amdar-sec" id="amdar-sec-basic" data-sec="basic" aria-labelledby="amdar-sec-basic-title">
<h2 class="amdar-sec-title" id="amdar-sec-basic-title">मूलभूत माहिती</h2>
<div class="amdar-sec-cols">
<div class="amdar-sec-body">
<div class="amdar-grid">
  <div class="amdar-field amdar-span-1" data-key="mla_name" data-type="text" data-req="1"><label class="amdar-label" for="amdar-basic-mla_name">आमदारांचे नाव <span class="amdar-req" aria-hidden="true">*</span></label><input id="amdar-basic-mla_name" aria-describedby="amdar-basic-mla_name-err" aria-required="true" type="text" maxlength="120" autocomplete="off"><p class="amdar-err" id="amdar-basic-mla_name-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="constituency" data-type="text" data-req="1"><label class="amdar-label" for="amdar-basic-constituency">विधानसभा मतदारसंघ <span class="amdar-req" aria-hidden="true">*</span></label><input id="amdar-basic-constituency" aria-describedby="amdar-basic-constituency-err" aria-required="true" type="text" maxlength="120" autocomplete="off"><p class="amdar-err" id="amdar-basic-constituency-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="financial_year" data-type="select" data-req="1"><label class="amdar-label" for="amdar-basic-financial_year">आर्थिक वर्ष <span class="amdar-req" aria-hidden="true">*</span></label><select id="amdar-basic-financial_year" aria-describedby="amdar-basic-financial_year-err" aria-required="true"></select><p class="amdar-hint">पुढील सर्व माहिती या एकाच आर्थिक वर्षापुरती लिहा.</p><p class="amdar-err" id="amdar-basic-financial_year-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="filler_name" data-type="text" data-req="1"><label class="amdar-label" for="amdar-basic-filler_name">माहिती भरणाऱ्या व्यक्तीचे नाव <span class="amdar-req" aria-hidden="true">*</span></label><input id="amdar-basic-filler_name" aria-describedby="amdar-basic-filler_name-err" aria-required="true" type="text" maxlength="120" autocomplete="off"><p class="amdar-err" id="amdar-basic-filler_name-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="filler_role" data-type="text" data-req="1"><label class="amdar-label" for="amdar-basic-filler_role">पद किंवा आमदारांशी संबंध <span class="amdar-req" aria-hidden="true">*</span></label><input id="amdar-basic-filler_role" aria-describedby="amdar-basic-filler_role-err" aria-required="true" type="text" maxlength="120" placeholder="उदा. स्वतः आमदार, स्वीय सहायक" autocomplete="off"><p class="amdar-err" id="amdar-basic-filler_role-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="filler_phone" data-type="tel" data-req="1" data-strict="1"><label class="amdar-label" for="amdar-basic-filler_phone">संपर्क क्रमांक <span class="amdar-req" aria-hidden="true">*</span></label><input id="amdar-basic-filler_phone" aria-describedby="amdar-basic-filler_phone-err" aria-required="true" type="tel" maxlength="20" autocomplete="off"><p class="amdar-err" id="amdar-basic-filler_phone-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="filler_email" data-type="email"><label class="amdar-label" for="amdar-basic-filler_email">ईमेल (ऐच्छिक)</label><input id="amdar-basic-filler_email" aria-describedby="amdar-basic-filler_email-err" type="email" maxlength="120" autocomplete="off"><p class="amdar-err" id="amdar-basic-filler_email-err"></p></div>
  <p class="amdar-hint amdar-span-3">माहिती भरणाऱ्या व्यक्तीचा तपशील फक्त पडताळणीसाठी आहे; तो मतदारांना दाखवला जाणार नाही.</p>
</div>
</div></div></section>

<section class="amdar-sec" id="amdar-sec-promises" data-sec="promises" aria-labelledby="amdar-sec-promises-title">
<h2 class="amdar-sec-title" id="amdar-sec-promises-title"><span class="amdar-sec-num">१</span>जाहीरनामा</h2>
<div class="amdar-sec-cols">
<aside class="amdar-voterq"><p class="amdar-voterq-label">मतदारांना विचारलेला प्रश्न</p><p class="amdar-voterq-text">निवडणुकीच्या वेळी तुमच्या आमदारांनी दिलेल्या आश्वासनांपैकी किती प्रत्यक्षात पूर्ण झाली आहेत?</p></aside>
<div class="amdar-sec-body">
<p class="amdar-prompt">निवडणुकीत दिलेली प्रमुख आश्वासने आणि त्यांची आजची स्थिती नोंदवा.</p>
<div class="amdar-repeat" data-repeat="items" data-template="amdar-tpl-promises" data-max="40"><div data-rows></div><button type="button" class="amdar-add" data-add>आणखी एक आश्वासन जोडा</button><p class="amdar-hint" data-maxnote hidden>इथे जास्तीत जास्त ४० नोंदी करता येतात.</p></div>
<div class="amdar-grid">
  <div class="amdar-field amdar-span-3 amdar-file" data-key="manifesto_file" data-type="file" data-accept="pdf,jpg,jpeg,png" data-maxfiles="2"><span class="amdar-label" id="amdar-promises-manifesto_file-lbl">जाहीरनामा किंवा वचननामा</span><ul class="amdar-filelist" data-filelist aria-labelledby="amdar-promises-manifesto_file-lbl"></ul><label class="amdar-filebtn"><input type="file" id="amdar-promises-manifesto_file" accept=".pdf,.jpg,.jpeg,.png" multiple aria-labelledby="amdar-promises-manifesto_file-lbl" aria-describedby="amdar-promises-manifesto_file-err"><span>फाइल निवडा</span></label><p class="amdar-hint" data-filehint></p><p class="amdar-err" id="amdar-promises-manifesto_file-err"></p></div>
</div>
</div></div></section>

<section class="amdar-sec" id="amdar-sec-mlalad" data-sec="mlalad" aria-labelledby="amdar-sec-mlalad-title">
<h2 class="amdar-sec-title" id="amdar-sec-mlalad-title"><span class="amdar-sec-num">२</span>निधीची पारदर्शकता</h2>
<div class="amdar-sec-cols">
<aside class="amdar-voterq"><p class="amdar-voterq-label">मतदारांना विचारलेला प्रश्न</p><p class="amdar-voterq-text">गेल्या आर्थिक वर्षात आमदार स्थानिक विकास निधीतून तुमच्या मतदारसंघासाठी किती निधी उपलब्ध झाला, त्यापैकी किती खर्च झाला आणि कोणत्या कामावर किती रक्कम खर्च झाली, याची माहिती सार्वजनिकरीत्या उपलब्ध आहे का?</p></aside>
<div class="amdar-sec-body">
<p class="amdar-prompt">निवडलेल्या आर्थिक वर्षातील आमदार स्थानिक विकास निधीचा जमा-खर्च लिहा.</p>
<div class="amdar-grid">
  <div class="amdar-field amdar-span-1" data-key="available" data-type="num" data-unit="lakh"><label class="amdar-label" for="amdar-mlalad-available">उपलब्ध झालेला निधी (₹ लाखांत)</label><input id="amdar-mlalad-available" aria-describedby="amdar-mlalad-available-err" type="text" maxlength="20" autocomplete="off" inputmode="decimal"><p class="amdar-echo" data-echo hidden></p><p class="amdar-err" id="amdar-mlalad-available-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="spent" data-type="num" data-unit="lakh"><label class="amdar-label" for="amdar-mlalad-spent">त्यापैकी खर्च झालेला निधी (₹ लाखांत)</label><input id="amdar-mlalad-spent" aria-describedby="amdar-mlalad-spent-err" type="text" maxlength="20" autocomplete="off" inputmode="decimal"><p class="amdar-echo" data-echo hidden></p><p class="amdar-err" id="amdar-mlalad-spent-err"></p></div>
  <p class="amdar-calc amdar-span-3" data-calc data-a="spent" data-b="available" data-label="खर्चाचे प्रमाण" data-warn="खर्च उपलब्ध निधीपेक्षा जास्त दिसतो. आकडे पुन्हा तपासा." hidden></p>
  <div class="amdar-field amdar-span-1" data-key="works_sanctioned" data-type="int"><label class="amdar-label" for="amdar-mlalad-works_sanctioned">मंजूर कामांची संख्या</label><input id="amdar-mlalad-works_sanctioned" aria-describedby="amdar-mlalad-works_sanctioned-err" type="text" maxlength="20" autocomplete="off" inputmode="numeric"><p class="amdar-err" id="amdar-mlalad-works_sanctioned-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="works_completed" data-type="int"><label class="amdar-label" for="amdar-mlalad-works_completed">पूर्ण झालेल्या कामांची संख्या</label><input id="amdar-mlalad-works_completed" aria-describedby="amdar-mlalad-works_completed-err" type="text" maxlength="20" autocomplete="off" inputmode="numeric"><p class="amdar-err" id="amdar-mlalad-works_completed-err"></p></div>
  <div class="amdar-field amdar-span-3" data-key="public_where" data-type="text"><label class="amdar-label" for="amdar-mlalad-public_where">हा जमा-खर्च नागरिकांना कुठे पाहता येतो?</label><input id="amdar-mlalad-public_where" aria-describedby="amdar-mlalad-public_where-err" type="text" maxlength="300" placeholder="लिंक, कार्यालयातील फलक, कार्यअहवाल इत्यादी" autocomplete="off"><p class="amdar-err" id="amdar-mlalad-public_where-err"></p></div>
  <div class="amdar-field amdar-span-3 amdar-file" data-key="statement_file" data-type="file" data-accept="pdf,xlsx,xls,csv,jpg,jpeg,png" data-maxfiles="3"><span class="amdar-label" id="amdar-mlalad-statement_file-lbl">जमा-खर्चाचे विवरणपत्र</span><ul class="amdar-filelist" data-filelist aria-labelledby="amdar-mlalad-statement_file-lbl"></ul><label class="amdar-filebtn"><input type="file" id="amdar-mlalad-statement_file" accept=".pdf,.xlsx,.xls,.csv,.jpg,.jpeg,.png" multiple aria-labelledby="amdar-mlalad-statement_file-lbl" aria-describedby="amdar-mlalad-statement_file-err"><span>फाइल निवडा</span></label><p class="amdar-hint" data-filehint></p><p class="amdar-err" id="amdar-mlalad-statement_file-err"></p></div>
</div>
</div></div></section>

<section class="amdar-sec" id="amdar-sec-participation" data-sec="participation" aria-labelledby="amdar-sec-participation-title">
<h2 class="amdar-sec-title" id="amdar-sec-participation-title"><span class="amdar-sec-num">३</span>मतदारांचा सहभाग</h2>
<div class="amdar-sec-cols">
<aside class="amdar-voterq"><p class="amdar-voterq-label">मतदारांना विचारलेला प्रश्न</p><p class="amdar-voterq-text">आमदार निधी कोणत्या कामांवर खर्च करायचा, हे ठरवताना तुमचे किंवा तुमच्या परिसरातील नागरिकांचे मत विचारण्यात आले होते का?</p></aside>
<div class="amdar-sec-body">
<div class="amdar-grid">
  <fieldset class="amdar-field amdar-span-3 amdar-choice" data-key="methods" data-type="checks" aria-describedby="amdar-participation-methods-err"><legend class="amdar-label">कोणती कामे घ्यायची हे ठरवताना नागरिकांचे मत कोणत्या मार्गांनी घेतले?</legend><div class="amdar-pills"><label class="amdar-pill amdar-pill--checkbox"><input type="checkbox" name="amdar-participation-methods" value="public_meetings"><span>जाहीर सभा, ग्रामसभा किंवा प्रभाग बैठका</span></label><label class="amdar-pill amdar-pill--checkbox"><input type="checkbox" name="amdar-participation-methods" value="janata_darbar"><span>जनता दरबार</span></label><label class="amdar-pill amdar-pill--checkbox"><input type="checkbox" name="amdar-participation-methods" value="written"><span>लेखी अर्ज आणि निवेदने</span></label><label class="amdar-pill amdar-pill--checkbox"><input type="checkbox" name="amdar-participation-methods" value="online"><span>ऑनलाइन सूचना (वेबसाइट, व्हॉट्सॲप, सोशल मीडिया)</span></label><label class="amdar-pill amdar-pill--checkbox"><input type="checkbox" name="amdar-participation-methods" value="local_bodies"><span>ग्रामपंचायत, नगरपरिषद किंवा महापालिकेच्या शिफारशी</span></label><label class="amdar-pill amdar-pill--checkbox"><input type="checkbox" name="amdar-participation-methods" value="none" data-exclusive="1"><span>ठरावीक पद्धत नव्हती</span></label></div><p class="amdar-err" id="amdar-participation-methods-err"></p></fieldset>
  <div class="amdar-field amdar-span-1" data-key="meetings_count" data-type="int"><label class="amdar-label" for="amdar-participation-meetings_count">अशा सभा किंवा बैठकांची संख्या</label><input id="amdar-participation-meetings_count" aria-describedby="amdar-participation-meetings_count-err" type="text" maxlength="20" autocomplete="off" inputmode="numeric"><p class="amdar-err" id="amdar-participation-meetings_count-err"></p></div>
  <div class="amdar-field amdar-span-3 amdar-area" data-key="details" data-type="area"><label class="amdar-label" for="amdar-participation-details">त्या कुठे आणि कधी झाल्या, याचा तपशील</label><textarea id="amdar-participation-details" aria-describedby="amdar-participation-details-err" rows="2" maxlength="1500"></textarea><p class="amdar-err" id="amdar-participation-details-err"></p></div>
  <div class="amdar-field amdar-span-3 amdar-file" data-key="proof_files" data-type="file" data-accept="pdf,jpg,jpeg,png" data-maxfiles="5"><span class="amdar-label" id="amdar-participation-proof_files-lbl">इतिवृत्त, उपस्थिती पत्रक किंवा फोटो</span><ul class="amdar-filelist" data-filelist aria-labelledby="amdar-participation-proof_files-lbl"></ul><label class="amdar-filebtn"><input type="file" id="amdar-participation-proof_files" accept=".pdf,.jpg,.jpeg,.png" multiple aria-labelledby="amdar-participation-proof_files-lbl" aria-describedby="amdar-participation-proof_files-err"><span>फाइल निवडा</span></label><p class="amdar-hint" data-filehint></p><p class="amdar-err" id="amdar-participation-proof_files-err"></p></div>
</div>
</div></div></section>

<section class="amdar-sec" id="amdar-sec-priorities" data-sec="priorities" aria-labelledby="amdar-sec-priorities-title">
<h2 class="amdar-sec-title" id="amdar-sec-priorities-title"><span class="amdar-sec-num">४</span>गरज आणि प्राधान्य</h2>
<div class="amdar-sec-cols">
<aside class="amdar-voterq"><p class="amdar-voterq-label">मतदारांना विचारलेला प्रश्न</p><p class="amdar-voterq-text">आमदार निधीतून झालेली कामे तुमच्या परिसराच्या खऱ्या गरजेनुसार होती का?</p></aside>
<div class="amdar-sec-body">
<div class="amdar-grid">
  <div class="amdar-field amdar-span-3 amdar-area" data-key="basis" data-type="area"><label class="amdar-label" for="amdar-priorities-basis">कोणते काम आधी घ्यायचे, हे कशाच्या आधारावर ठरवले?</label><textarea id="amdar-priorities-basis" aria-describedby="amdar-priorities-basis-err" rows="3" maxlength="1500"></textarea><p class="amdar-err" id="amdar-priorities-basis-err"></p></div>
  <div class="amdar-field amdar-span-3 amdar-file" data-key="allocation_file" data-type="file" data-accept="pdf,xlsx,xls,csv,jpg,jpeg,png" data-maxfiles="2"><span class="amdar-label" id="amdar-priorities-allocation_file-lbl">परिसरनिहाय निधीवाटपाचा तक्ता (असल्यास)</span><ul class="amdar-filelist" data-filelist aria-labelledby="amdar-priorities-allocation_file-lbl"></ul><label class="amdar-filebtn"><input type="file" id="amdar-priorities-allocation_file" accept=".pdf,.xlsx,.xls,.csv,.jpg,.jpeg,.png" multiple aria-labelledby="amdar-priorities-allocation_file-lbl" aria-describedby="amdar-priorities-allocation_file-err"><span>फाइल निवडा</span></label><p class="amdar-hint" data-filehint></p><p class="amdar-err" id="amdar-priorities-allocation_file-err"></p></div>
</div>
</div></div></section>

<section class="amdar-sec" id="amdar-sec-special_funds" data-sec="special_funds" aria-labelledby="amdar-sec-special_funds-title">
<h2 class="amdar-sec-title" id="amdar-sec-special_funds-title"><span class="amdar-sec-num">५</span>विशेष निधीचे निकष</h2>
<div class="amdar-sec-cols">
<aside class="amdar-voterq"><p class="amdar-voterq-label">मतदारांना विचारलेला प्रश्न</p><p class="amdar-voterq-text">मतदारसंघासाठी विशेष निधी आला असल्यास, तो कोणत्या निकषांवर आणि कशाच्या आधारे वापरला गेला, हे आमदारांनी जाहीर केले आहे का?</p></aside>
<div class="amdar-sec-body">
<p class="amdar-prompt">आमदार निधीव्यतिरिक्त मतदारसंघासाठी मिळालेल्या प्रत्येक विशेष निधीची स्वतंत्र नोंद करा.</p>
<div class="amdar-grid">
  <div class="amdar-field amdar-span-3" data-key="none" data-type="check1"><label class="amdar-tick"><input type="checkbox" id="amdar-special_funds-none" value="yes"><span>या आर्थिक वर्षात विशेष निधी मिळाला नाही</span></label><p class="amdar-err" id="amdar-special_funds-none-err"></p></div>
</div>
<div class="amdar-repeat" data-repeat="items" data-template="amdar-tpl-special_funds" data-max="30" data-hide-if="none=yes"><div data-rows></div><button type="button" class="amdar-add" data-add>आणखी एक निधी जोडा</button><p class="amdar-hint" data-maxnote hidden>इथे जास्तीत जास्त ३० नोंदी करता येतात.</p></div>
</div></div></section>

<section class="amdar-sec" id="amdar-sec-works" data-sec="works" aria-labelledby="amdar-sec-works-title">
<h2 class="amdar-sec-title" id="amdar-sec-works-title"><span class="amdar-sec-num">६</span>कामाचा दर्जा</h2>
<div class="amdar-sec-cols">
<aside class="amdar-voterq"><p class="amdar-voterq-label">मतदारांना विचारलेला प्रश्न</p><p class="amdar-voterq-text">आमदार निधीतून झालेल्या कामांचा (रस्ते, गटारे, पथदिवे, समाजमंदिर इ.) दर्जा कसा आहे?</p></aside>
<div class="amdar-sec-body">
<p class="amdar-prompt">या वर्षातील कामांची नोंद करा. कामे जास्त असतील तर संपूर्ण यादी फाइल म्हणून जोडा आणि महत्त्वाची कामे खाली स्वतंत्रपणे नोंदवा.</p>
<div class="amdar-grid">
  <div class="amdar-field amdar-span-3 amdar-file" data-key="full_list_file" data-type="file" data-accept="pdf,xlsx,xls,csv" data-maxfiles="3"><span class="amdar-label" id="amdar-works-full_list_file-lbl">सर्व कामांची यादी</span><ul class="amdar-filelist" data-filelist aria-labelledby="amdar-works-full_list_file-lbl"></ul><label class="amdar-filebtn"><input type="file" id="amdar-works-full_list_file" accept=".pdf,.xlsx,.xls,.csv" multiple aria-labelledby="amdar-works-full_list_file-lbl" aria-describedby="amdar-works-full_list_file-err"><span>फाइल निवडा</span></label><p class="amdar-hint" data-filehint></p><p class="amdar-err" id="amdar-works-full_list_file-err"></p></div>
</div>
<div class="amdar-repeat" data-repeat="items" data-template="amdar-tpl-works" data-max="150"><div data-rows></div><button type="button" class="amdar-add" data-add>आणखी एक काम जोडा</button><p class="amdar-hint" data-maxnote hidden>इथे जास्तीत जास्त १५० नोंदी करता येतात.</p></div>
</div></div></section>

<section class="amdar-sec" id="amdar-sec-party_change" data-sec="party_change" aria-labelledby="amdar-sec-party_change-title">
<h2 class="amdar-sec-title" id="amdar-sec-party_change-title"><span class="amdar-sec-num">७</span>पक्षांतर आणि मतदारांचा कौल</h2>
<div class="amdar-sec-cols">
<aside class="amdar-voterq"><p class="amdar-voterq-label">मतदारांना विचारलेला प्रश्न</p><p class="amdar-voterq-text">निवडून आल्यानंतर तुमच्या आमदारांनी पक्ष, गट किंवा आघाडी बदलली असल्यास, त्याआधी मतदारांना विश्वासात घेतले होते का?</p></aside>
<div class="amdar-sec-body">
<div class="amdar-grid">
  <fieldset class="amdar-field amdar-span-3 amdar-choice" data-key="changed" data-type="radio" aria-describedby="amdar-party_change-changed-err"><legend class="amdar-label">निवडून आल्यानंतर तुम्ही पक्ष, गट किंवा आघाडी बदलली आहे का?</legend><div class="amdar-pills"><label class="amdar-pill amdar-pill--radio"><input type="radio" name="amdar-party_change-changed" value="yes"><span>होय</span></label><label class="amdar-pill amdar-pill--radio"><input type="radio" name="amdar-party_change-changed" value="no"><span>नाही</span></label></div><p class="amdar-err" id="amdar-party_change-changed-err"></p></fieldset>
  <div class="amdar-field amdar-span-1" data-key="when" data-type="text" data-show-if="changed=yes"><label class="amdar-label" for="amdar-party_change-when">केव्हा? (महिना आणि वर्ष)</label><input id="amdar-party_change-when" aria-describedby="amdar-party_change-when-err" type="text" maxlength="60" autocomplete="off"><p class="amdar-err" id="amdar-party_change-when-err"></p></div>
  <div class="amdar-field amdar-span-3 amdar-area" data-key="consultation" data-type="area" data-show-if="changed=yes"><label class="amdar-label" for="amdar-party_change-consultation">हा निर्णय घेण्यापूर्वी मतदारांना कसे विश्वासात घेतले?</label><textarea id="amdar-party_change-consultation" aria-describedby="amdar-party_change-consultation-err" rows="2" maxlength="1500"></textarea><p class="amdar-err" id="amdar-party_change-consultation-err"></p></div>
</div>
</div></div></section>

<section class="amdar-sec" id="amdar-sec-assembly" data-sec="assembly" aria-labelledby="amdar-sec-assembly-title">
<h2 class="amdar-sec-title" id="amdar-sec-assembly-title"><span class="amdar-sec-num">८</span>विधानसभेतील कामगिरी</h2>
<div class="amdar-sec-cols">
<aside class="amdar-voterq"><p class="amdar-voterq-label">मतदारांना विचारलेला प्रश्न</p><p class="amdar-voterq-text">तुमच्या आमदारांनी विधानसभेत मतदारसंघाचे प्रश्न मांडले आहेत का, याची माहिती तुम्हाला मिळते का?</p></aside>
<div class="amdar-sec-body">
<p class="amdar-prompt">निवडलेल्या आर्थिक वर्षात झालेल्या अधिवेशनांमधील तुमची कामगिरी लिहा.</p>
<div class="amdar-grid">
  <div class="amdar-field amdar-span-1" data-key="sitting_days" data-type="int"><label class="amdar-label" for="amdar-assembly-sitting_days">अधिवेशनांचे एकूण कामकाजाचे दिवस</label><input id="amdar-assembly-sitting_days" aria-describedby="amdar-assembly-sitting_days-err" type="text" maxlength="20" autocomplete="off" inputmode="numeric"><p class="amdar-err" id="amdar-assembly-sitting_days-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="attended_days" data-type="int"><label class="amdar-label" for="amdar-assembly-attended_days">त्यापैकी तुमच्या उपस्थितीचे दिवस</label><input id="amdar-assembly-attended_days" aria-describedby="amdar-assembly-attended_days-err" type="text" maxlength="20" autocomplete="off" inputmode="numeric"><p class="amdar-err" id="amdar-assembly-attended_days-err"></p></div>
  <p class="amdar-calc amdar-span-3" data-calc data-a="attended_days" data-b="sitting_days" data-label="उपस्थिती" data-warn="" hidden></p>
  <div class="amdar-field amdar-span-1" data-key="starred" data-type="int"><label class="amdar-label" for="amdar-assembly-starred">तारांकित प्रश्न</label><input id="amdar-assembly-starred" aria-describedby="amdar-assembly-starred-err" type="text" maxlength="20" autocomplete="off" inputmode="numeric"><p class="amdar-err" id="amdar-assembly-starred-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="unstarred" data-type="int"><label class="amdar-label" for="amdar-assembly-unstarred">अतारांकित प्रश्न</label><input id="amdar-assembly-unstarred" aria-describedby="amdar-assembly-unstarred-err" type="text" maxlength="20" autocomplete="off" inputmode="numeric"><p class="amdar-err" id="amdar-assembly-unstarred-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="calling_attention" data-type="int"><label class="amdar-label" for="amdar-assembly-calling_attention">लक्षवेधी सूचना</label><input id="amdar-assembly-calling_attention" aria-describedby="amdar-assembly-calling_attention-err" type="text" maxlength="20" autocomplete="off" inputmode="numeric"><p class="amdar-err" id="amdar-assembly-calling_attention-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="debates" data-type="int"><label class="amdar-label" for="amdar-assembly-debates">चर्चांमधील सहभाग (किती वेळा)</label><input id="amdar-assembly-debates" aria-describedby="amdar-assembly-debates-err" type="text" maxlength="20" autocomplete="off" inputmode="numeric"><p class="amdar-err" id="amdar-assembly-debates-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="private_bills" data-type="int"><label class="amdar-label" for="amdar-assembly-private_bills">अशासकीय विधेयके किंवा ठराव</label><input id="amdar-assembly-private_bills" aria-describedby="amdar-assembly-private_bills-err" type="text" maxlength="20" autocomplete="off" inputmode="numeric"><p class="amdar-err" id="amdar-assembly-private_bills-err"></p></div>
  <div class="amdar-field amdar-span-3 amdar-area" data-key="issues" data-type="area"><label class="amdar-label" for="amdar-assembly-issues">मतदारसंघाचे कोणते प्रमुख प्रश्न मांडले? (एका ओळीत एक)</label><textarea id="amdar-assembly-issues" aria-describedby="amdar-assembly-issues-err" rows="3" maxlength="2000"></textarea><p class="amdar-err" id="amdar-assembly-issues-err"></p></div>
  <div class="amdar-field amdar-span-3" data-key="records_url" data-type="url"><label class="amdar-label" for="amdar-assembly-records_url">विधानसभेतील नोंदींची किंवा व्हिडिओची लिंक (ऐच्छिक)</label><input id="amdar-assembly-records_url" aria-describedby="amdar-assembly-records_url-err" type="url" autocomplete="off"><p class="amdar-err" id="amdar-assembly-records_url-err"></p></div>
  <fieldset class="amdar-field amdar-span-3 amdar-choice" data-key="outreach" data-type="checks" aria-describedby="amdar-assembly-outreach-err"><legend class="amdar-label">ही माहिती मतदारांपर्यंत कशी पोहोचवता?</legend><div class="amdar-pills"><label class="amdar-pill amdar-pill--checkbox"><input type="checkbox" name="amdar-assembly-outreach" value="social"><span>सोशल मीडिया</span></label><label class="amdar-pill amdar-pill--checkbox"><input type="checkbox" name="amdar-assembly-outreach" value="report"><span>कार्यअहवाल किंवा पत्रक</span></label><label class="amdar-pill amdar-pill--checkbox"><input type="checkbox" name="amdar-assembly-outreach" value="press"><span>प्रसिद्धीपत्रक किंवा पत्रकार परिषद</span></label><label class="amdar-pill amdar-pill--checkbox"><input type="checkbox" name="amdar-assembly-outreach" value="meetings"><span>सभा आणि मेळावे</span></label><label class="amdar-pill amdar-pill--checkbox"><input type="checkbox" name="amdar-assembly-outreach" value="website"><span>स्वतःची वेबसाइट</span></label><label class="amdar-pill amdar-pill--checkbox"><input type="checkbox" name="amdar-assembly-outreach" value="none" data-exclusive="1"><span>नियमितपणे पोहोचवत नाही</span></label></div><p class="amdar-err" id="amdar-assembly-outreach-err"></p></fieldset>
  <div class="amdar-field amdar-span-3 amdar-file" data-key="files" data-type="file" data-accept="pdf,jpg,jpeg,png,xlsx,xls" data-maxfiles="5"><span class="amdar-label" id="amdar-assembly-files-lbl">प्रश्नांची यादी किंवा इतर कागदपत्रे</span><ul class="amdar-filelist" data-filelist aria-labelledby="amdar-assembly-files-lbl"></ul><label class="amdar-filebtn"><input type="file" id="amdar-assembly-files" accept=".pdf,.jpg,.jpeg,.png,.xlsx,.xls" multiple aria-labelledby="amdar-assembly-files-lbl" aria-describedby="amdar-assembly-files-err"><span>फाइल निवडा</span></label><p class="amdar-hint" data-filehint></p><p class="amdar-err" id="amdar-assembly-files-err"></p></div>
</div>
</div></div></section>

<section class="amdar-sec" id="amdar-sec-grievances" data-sec="grievances" aria-labelledby="amdar-sec-grievances-title">
<h2 class="amdar-sec-title" id="amdar-sec-grievances-title"><span class="amdar-sec-num">९</span>तक्रार निवारण</h2>
<div class="amdar-sec-cols">
<aside class="amdar-voterq"><p class="amdar-voterq-label">मतदारांना विचारलेला प्रश्न</p><p class="amdar-voterq-text">तुम्ही आमदारांच्या कार्यालयाकडे केलेल्या तक्रारीचे किंवा मागणीचे काय झाले?</p></aside>
<div class="amdar-sec-body">
<div class="amdar-grid">
  <div class="amdar-field amdar-span-3 amdar-area" data-key="office_address" data-type="area"><label class="amdar-label" for="amdar-grievances-office_address">जनसंपर्क कार्यालयाचा पत्ता</label><textarea id="amdar-grievances-office_address" aria-describedby="amdar-grievances-office_address-err" rows="2" maxlength="400"></textarea><p class="amdar-err" id="amdar-grievances-office_address-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="office_hours" data-type="text"><label class="amdar-label" for="amdar-grievances-office_hours">कार्यालयाची वेळ</label><input id="amdar-grievances-office_hours" aria-describedby="amdar-grievances-office_hours-err" type="text" maxlength="120" autocomplete="off"><p class="amdar-err" id="amdar-grievances-office_hours-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="public_phone" data-type="tel"><label class="amdar-label" for="amdar-grievances-public_phone">नागरिकांसाठी संपर्क क्रमांक</label><input id="amdar-grievances-public_phone" aria-describedby="amdar-grievances-public_phone-err" type="tel" maxlength="20" autocomplete="off"><p class="amdar-err" id="amdar-grievances-public_phone-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="janata_darbar" data-type="text"><label class="amdar-label" for="amdar-grievances-janata_darbar">जनता दरबार कधी आणि कुठे भरतो?</label><input id="amdar-grievances-janata_darbar" aria-describedby="amdar-grievances-janata_darbar-err" type="text" maxlength="200" autocomplete="off"><p class="amdar-err" id="amdar-grievances-janata_darbar-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="received" data-type="int"><label class="amdar-label" for="amdar-grievances-received">या वर्षात आलेल्या तक्रारी आणि मागण्या</label><input id="amdar-grievances-received" aria-describedby="amdar-grievances-received-err" type="text" maxlength="20" autocomplete="off" inputmode="numeric"><p class="amdar-err" id="amdar-grievances-received-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="resolved" data-type="int"><label class="amdar-label" for="amdar-grievances-resolved">त्यापैकी निकाली काढलेल्या</label><input id="amdar-grievances-resolved" aria-describedby="amdar-grievances-resolved-err" type="text" maxlength="20" autocomplete="off" inputmode="numeric"><p class="amdar-err" id="amdar-grievances-resolved-err"></p></div>
  <p class="amdar-calc amdar-span-3" data-calc data-a="resolved" data-b="received" data-label="निकाली काढण्याचे प्रमाण" data-warn="निकाली काढलेल्या तक्रारी आलेल्या तक्रारींपेक्षा जास्त दिसतात. आकडे पुन्हा तपासा." hidden></p>
  <div class="amdar-field amdar-span-1" data-key="record_method" data-type="select"><label class="amdar-label" for="amdar-grievances-record_method">तक्रारींची नोंद कशी ठेवली जाते?</label><select id="amdar-grievances-record_method" aria-describedby="amdar-grievances-record_method-err"><option value="">निवडा</option><option value="register">नोंदवहीत</option><option value="software">संगणकीय प्रणाली किंवा ॲपमध्ये</option><option value="none">नोंद ठेवली जात नाही</option></select><p class="amdar-err" id="amdar-grievances-record_method-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="response_days" data-type="int"><label class="amdar-label" for="amdar-grievances-response_days">साधारण किती दिवसांत प्रतिसाद दिला जातो?</label><input id="amdar-grievances-response_days" aria-describedby="amdar-grievances-response_days-err" type="text" maxlength="20" autocomplete="off" inputmode="numeric"><p class="amdar-err" id="amdar-grievances-response_days-err"></p></div>
</div>
</div></div></section>

<section class="amdar-sec" id="amdar-sec-annual_report" data-sec="annual_report" aria-labelledby="amdar-sec-annual_report-title">
<h2 class="amdar-sec-title" id="amdar-sec-annual_report-title"><span class="amdar-sec-num">१०</span>वार्षिक हिशेब</h2>
<div class="amdar-sec-cols">
<aside class="amdar-voterq"><p class="amdar-voterq-label">मतदारांना विचारलेला प्रश्न</p><p class="amdar-voterq-text">तुमच्या आमदारांनी आपल्या कामाचा आणि निधीच्या खर्चाचा लेखी कार्यअहवाल जनतेसमोर मांडला आहे का?</p></aside>
<div class="amdar-sec-body">
<div class="amdar-grid">
  <fieldset class="amdar-field amdar-span-3 amdar-choice" data-key="published" data-type="radio" aria-describedby="amdar-annual_report-published-err"><legend class="amdar-label">या वर्षाचा लेखी कार्यअहवाल जनतेसमोर मांडला आहे का?</legend><div class="amdar-pills"><label class="amdar-pill amdar-pill--radio"><input type="radio" name="amdar-annual_report-published" value="yes"><span>होय</span></label><label class="amdar-pill amdar-pill--radio"><input type="radio" name="amdar-annual_report-published" value="no"><span>नाही</span></label></div><p class="amdar-err" id="amdar-annual_report-published-err"></p></fieldset>
  <div class="amdar-field amdar-span-1" data-key="published_on" data-type="date" data-show-if="published=yes"><label class="amdar-label" for="amdar-annual_report-published_on">प्रसिद्धीचा दिनांक</label><input id="amdar-annual_report-published_on" aria-describedby="amdar-annual_report-published_on-err" type="date" autocomplete="off"><p class="amdar-err" id="amdar-annual_report-published_on-err"></p></div>
  <div class="amdar-field amdar-span-2" data-key="distribution" data-type="text" data-show-if="published=yes"><label class="amdar-label" for="amdar-annual_report-distribution">मतदारांपर्यंत कसा पोहोचवला?</label><input id="amdar-annual_report-distribution" aria-describedby="amdar-annual_report-distribution-err" type="text" maxlength="300" autocomplete="off"><p class="amdar-err" id="amdar-annual_report-distribution-err"></p></div>
  <div class="amdar-field amdar-span-3" data-key="report_url" data-type="url" data-show-if="published=yes"><label class="amdar-label" for="amdar-annual_report-report_url">कार्यअहवालाची लिंक (ऐच्छिक)</label><input id="amdar-annual_report-report_url" aria-describedby="amdar-annual_report-report_url-err" type="url" autocomplete="off"><p class="amdar-err" id="amdar-annual_report-report_url-err"></p></div>
  <div class="amdar-field amdar-span-3 amdar-file" data-key="report_file" data-type="file" data-show-if="published=yes" data-accept="pdf" data-maxfiles="2"><span class="amdar-label" id="amdar-annual_report-report_file-lbl">कार्यअहवाल</span><ul class="amdar-filelist" data-filelist aria-labelledby="amdar-annual_report-report_file-lbl"></ul><label class="amdar-filebtn"><input type="file" id="amdar-annual_report-report_file" accept=".pdf" multiple aria-labelledby="amdar-annual_report-report_file-lbl" aria-describedby="amdar-annual_report-report_file-err"><span>फाइल निवडा</span></label><p class="amdar-hint" data-filehint></p><p class="amdar-err" id="amdar-annual_report-report_file-err"></p></div>
</div>
</div></div></section>

<section class="amdar-sec" id="amdar-sec-statement" data-sec="statement" aria-labelledby="amdar-sec-statement-title">
<h2 class="amdar-sec-title" id="amdar-sec-statement-title"><span class="amdar-sec-num">११</span>मतदारांसाठी निवेदन</h2>
<div class="amdar-sec-cols">
<aside class="amdar-voterq"><p class="amdar-voterq-label">मतदारांना विचारलेले प्रश्न</p><p class="amdar-voterq-text">तुमचे सध्याचे आमदार तुम्हाला “आदर्श आमदार” वाटतात का? तुमच्या मते आदर्श आमदार कसे असावेत?</p></aside>
<div class="amdar-sec-body">
<div class="amdar-grid">
  <div class="amdar-field amdar-span-3 amdar-area" data-key="message" data-type="area"><label class="amdar-label" for="amdar-statement-message">मतदारांना तुम्हाला काय सांगायचे आहे? (ऐच्छिक)</label><textarea id="amdar-statement-message" aria-describedby="amdar-statement-message-err" rows="4" maxlength="2000"></textarea><p class="amdar-err" id="amdar-statement-message-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="priority_1" data-type="text"><label class="amdar-label" for="amdar-statement-priority_1">पुढील वर्षातील प्राधान्याचे काम १</label><input id="amdar-statement-priority_1" aria-describedby="amdar-statement-priority_1-err" type="text" maxlength="200" autocomplete="off"><p class="amdar-err" id="amdar-statement-priority_1-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="priority_2" data-type="text"><label class="amdar-label" for="amdar-statement-priority_2">पुढील वर्षातील प्राधान्याचे काम २</label><input id="amdar-statement-priority_2" aria-describedby="amdar-statement-priority_2-err" type="text" maxlength="200" autocomplete="off"><p class="amdar-err" id="amdar-statement-priority_2-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="priority_3" data-type="text"><label class="amdar-label" for="amdar-statement-priority_3">पुढील वर्षातील प्राधान्याचे काम ३</label><input id="amdar-statement-priority_3" aria-describedby="amdar-statement-priority_3-err" type="text" maxlength="200" autocomplete="off"><p class="amdar-err" id="amdar-statement-priority_3-err"></p></div>
</div>
</div></div></section>
    </div>

    <div class="amdar-end">
      <div class="amdar-field" id="amdar-declaration-box">
        <label class="amdar-tick"><input type="checkbox" id="amdar-declaration" value="yes"><span>वरील माहिती माझ्या माहितीप्रमाणे खरी आणि अचूक आहे. ही माहिती आणि जोडलेली कागदपत्रे मतदारांना पाहता येतील, याची मला जाणीव आहे.</span></label>
        <p class="amdar-err" id="amdar-declaration-err"></p>
      </div>
      <p class="amdar-err" id="amdar-form-err" role="alert"></p>
      <div class="amdar-actions">
        <button type="button" class="amdar-btn amdar-btn--ghost" id="amdar-draft">मसुदा जतन करा</button>
        <button type="button" class="amdar-btn amdar-btn--primary" id="amdar-submit">माहिती सादर करा</button>
      </div>
      <p class="amdar-status" id="amdar-status" role="status"></p>
      <details class="amdar-sent" id="amdar-draft-sent" hidden>
        <summary>चाचणी: सर्व्हरकडे जाणारी माहिती</summary>
        <pre id="amdar-draft-pre"></pre>
      </details>
    </div>
  </form>

  <div class="amdar-done" id="amdar-done" tabindex="-1" hidden>
    <div class="amdar-stamp" aria-hidden="true">नोंद झाली</div>
    <h2>तुमची माहिती सादर झाली</h2>
    <p>दुरुस्ती करायची किंवा भर घालायची असल्यास डॅशबोर्डमधून हा फॉर्म पुन्हा उघडा.</p>
    <details class="amdar-sent" id="amdar-done-sent" hidden>
      <summary>चाचणी: सर्व्हरकडे जाणारी माहिती</summary>
      <pre id="amdar-done-pre"></pre>
    </details>
  </div>

<template id="amdar-tpl-promises"><div class="amdar-row" data-row><div class="amdar-row-head"><span class="amdar-row-title">आश्वासन <span data-row-num></span></span><button type="button" class="amdar-link-btn" data-remove>ही नोंद काढा</button></div>
<div class="amdar-grid">
  <div class="amdar-field amdar-span-2" data-key="promise" data-type="text" data-primary="1"><label class="amdar-label" for="amdar-promises-promise-__i__">आश्वासन</label><input id="amdar-promises-promise-__i__" aria-describedby="amdar-promises-promise-__i__-err" type="text" maxlength="300" autocomplete="off"><p class="amdar-err" id="amdar-promises-promise-__i__-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="status" data-type="select"><label class="amdar-label" for="amdar-promises-status-__i__">सद्यस्थिती</label><select id="amdar-promises-status-__i__" aria-describedby="amdar-promises-status-__i__-err"><option value="">निवडा</option><option value="done">पूर्ण झाले</option><option value="ongoing">काम सुरू आहे</option><option value="not_started">अद्याप सुरू झालेले नाही</option><option value="dropped">आता शक्य नाही</option></select><p class="amdar-err" id="amdar-promises-status-__i__-err"></p></div>
  <div class="amdar-field amdar-span-3 amdar-area" data-key="details" data-type="area"><label class="amdar-label" for="amdar-promises-details-__i__">तपशील किंवा कारण</label><textarea id="amdar-promises-details-__i__" aria-describedby="amdar-promises-details-__i__-err" rows="2" maxlength="1000"></textarea><p class="amdar-err" id="amdar-promises-details-__i__-err"></p></div>
  <div class="amdar-field amdar-span-3" data-key="evidence_url" data-type="url"><label class="amdar-label" for="amdar-promises-evidence_url-__i__">पुराव्याची लिंक (ऐच्छिक)</label><input id="amdar-promises-evidence_url-__i__" aria-describedby="amdar-promises-evidence_url-__i__-err" type="url" autocomplete="off"><p class="amdar-err" id="amdar-promises-evidence_url-__i__-err"></p></div>
</div>
</div></template>
<template id="amdar-tpl-special_funds"><div class="amdar-row" data-row><div class="amdar-row-head"><span class="amdar-row-title">विशेष निधी <span data-row-num></span></span><button type="button" class="amdar-link-btn" data-remove>ही नोंद काढा</button></div>
<div class="amdar-grid">
  <div class="amdar-field amdar-span-2" data-key="source" data-type="text" data-primary="1"><label class="amdar-label" for="amdar-special_funds-source-__i__">निधीचा स्रोत किंवा योजना</label><input id="amdar-special_funds-source-__i__" aria-describedby="amdar-special_funds-source-__i__-err" type="text" maxlength="200" placeholder="उदा. २५१५ ग्रामविकास, नगरविकास विभाग, जिल्हा वार्षिक योजना" autocomplete="off"><p class="amdar-err" id="amdar-special_funds-source-__i__-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="amount" data-type="num" data-unit="lakh"><label class="amdar-label" for="amdar-special_funds-amount-__i__">रक्कम (₹ लाखांत)</label><input id="amdar-special_funds-amount-__i__" aria-describedby="amdar-special_funds-amount-__i__-err" type="text" maxlength="20" autocomplete="off" inputmode="decimal"><p class="amdar-echo" data-echo hidden></p><p class="amdar-err" id="amdar-special_funds-amount-__i__-err"></p></div>
  <div class="amdar-field amdar-span-3 amdar-area" data-key="criteria" data-type="area"><label class="amdar-label" for="amdar-special_funds-criteria-__i__">हा निधी कोणत्या निकषांवर आणि कशाच्या आधारे वापरला?</label><textarea id="amdar-special_funds-criteria-__i__" aria-describedby="amdar-special_funds-criteria-__i__-err" rows="2" maxlength="1500"></textarea><p class="amdar-err" id="amdar-special_funds-criteria-__i__-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="criteria_public" data-type="select"><label class="amdar-label" for="amdar-special_funds-criteria_public-__i__">निकष आधी जाहीर केले होते का?</label><select id="amdar-special_funds-criteria_public-__i__" aria-describedby="amdar-special_funds-criteria_public-__i__-err"><option value="">निवडा</option><option value="yes">होय</option><option value="no">नाही</option></select><p class="amdar-err" id="amdar-special_funds-criteria_public-__i__-err"></p></div>
  <div class="amdar-field amdar-span-2" data-key="criteria_url" data-type="url"><label class="amdar-label" for="amdar-special_funds-criteria_url-__i__">निकषांची किंवा शासन निर्णयाची लिंक (ऐच्छिक)</label><input id="amdar-special_funds-criteria_url-__i__" aria-describedby="amdar-special_funds-criteria_url-__i__-err" type="url" autocomplete="off"><p class="amdar-err" id="amdar-special_funds-criteria_url-__i__-err"></p></div>
</div>
</div></template>
<template id="amdar-tpl-works"><div class="amdar-row" data-row><div class="amdar-row-head"><span class="amdar-row-title">काम <span data-row-num></span></span><button type="button" class="amdar-link-btn" data-remove>ही नोंद काढा</button></div>
<div class="amdar-grid">
  <div class="amdar-field amdar-span-2" data-key="title" data-type="text" data-primary="1"><label class="amdar-label" for="amdar-works-title-__i__">कामाचे नाव</label><input id="amdar-works-title-__i__" aria-describedby="amdar-works-title-__i__-err" type="text" maxlength="300" autocomplete="off"><p class="amdar-err" id="amdar-works-title-__i__-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="place" data-type="text"><label class="amdar-label" for="amdar-works-place-__i__">ठिकाण (गाव किंवा प्रभाग)</label><input id="amdar-works-place-__i__" aria-describedby="amdar-works-place-__i__-err" type="text" maxlength="150" autocomplete="off"><p class="amdar-err" id="amdar-works-place-__i__-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="category" data-type="select"><label class="amdar-label" for="amdar-works-category-__i__">प्रकार</label><select id="amdar-works-category-__i__" aria-describedby="amdar-works-category-__i__-err"><option value="">निवडा</option><option value="road">रस्ता</option><option value="drainage">गटार किंवा ड्रेनेज</option><option value="water">पाणीपुरवठा</option><option value="lighting">पथदिवे किंवा वीज</option><option value="hall">समाजमंदिर किंवा सभागृह</option><option value="school">शाळा किंवा अंगणवाडी</option><option value="health">आरोग्य सुविधा</option><option value="sports">क्रीडांगण किंवा उद्यान</option><option value="crematorium">स्मशानभूमी किंवा दफनभूमी</option><option value="other">इतर</option></select><p class="amdar-err" id="amdar-works-category-__i__-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="fund_source" data-type="select"><label class="amdar-label" for="amdar-works-fund_source-__i__">निधीचा स्रोत</label><select id="amdar-works-fund_source-__i__" aria-describedby="amdar-works-fund_source-__i__-err"><option value="">निवडा</option><option value="mlalad">आमदार स्थानिक विकास निधी</option><option value="special">विशेष निधी</option><option value="other">इतर</option></select><p class="amdar-err" id="amdar-works-fund_source-__i__-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="status" data-type="select"><label class="amdar-label" for="amdar-works-status-__i__">सद्यस्थिती</label><select id="amdar-works-status-__i__" aria-describedby="amdar-works-status-__i__-err"><option value="">निवडा</option><option value="done">पूर्ण झाले</option><option value="ongoing">काम सुरू आहे</option><option value="sanctioned">मंजूर, काम सुरू व्हायचे आहे</option><option value="cancelled">रद्द</option></select><p class="amdar-err" id="amdar-works-status-__i__-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="sanctioned" data-type="num" data-unit="lakh"><label class="amdar-label" for="amdar-works-sanctioned-__i__">मंजूर रक्कम (₹ लाखांत)</label><input id="amdar-works-sanctioned-__i__" aria-describedby="amdar-works-sanctioned-__i__-err" type="text" maxlength="20" autocomplete="off" inputmode="decimal"><p class="amdar-echo" data-echo hidden></p><p class="amdar-err" id="amdar-works-sanctioned-__i__-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="spent" data-type="num" data-unit="lakh"><label class="amdar-label" for="amdar-works-spent-__i__">खर्च झालेली रक्कम (₹ लाखांत)</label><input id="amdar-works-spent-__i__" aria-describedby="amdar-works-spent-__i__-err" type="text" maxlength="20" autocomplete="off" inputmode="decimal"><p class="amdar-echo" data-echo hidden></p><p class="amdar-err" id="amdar-works-spent-__i__-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="completed_on" data-type="date"><label class="amdar-label" for="amdar-works-completed_on-__i__">पूर्ण झाल्याचा दिनांक</label><input id="amdar-works-completed_on-__i__" aria-describedby="amdar-works-completed_on-__i__-err" type="date" autocomplete="off"><p class="amdar-err" id="amdar-works-completed_on-__i__-err"></p></div>
  <div class="amdar-field amdar-span-2" data-key="approval_ref" data-type="text"><label class="amdar-label" for="amdar-works-approval_ref-__i__">प्रशासकीय मान्यता आदेश क्रमांक व दिनांक</label><input id="amdar-works-approval_ref-__i__" aria-describedby="amdar-works-approval_ref-__i__-err" type="text" maxlength="200" autocomplete="off"><p class="amdar-err" id="amdar-works-approval_ref-__i__-err"></p></div>
  <div class="amdar-field amdar-span-1" data-key="agency" data-type="text"><label class="amdar-label" for="amdar-works-agency-__i__">काम करणारी यंत्रणा किंवा ठेकेदार</label><input id="amdar-works-agency-__i__" aria-describedby="amdar-works-agency-__i__-err" type="text" maxlength="200" autocomplete="off"><p class="amdar-err" id="amdar-works-agency-__i__-err"></p></div>
  <div class="amdar-field amdar-span-3" data-key="quality_check" data-type="text"><label class="amdar-label" for="amdar-works-quality_check-__i__">दर्जाची तपासणी कोणी आणि केव्हा केली?</label><input id="amdar-works-quality_check-__i__" aria-describedby="amdar-works-quality_check-__i__-err" type="text" maxlength="300" autocomplete="off"><p class="amdar-err" id="amdar-works-quality_check-__i__-err"></p></div>
  <div class="amdar-field amdar-span-3 amdar-file" data-key="photos" data-type="file" data-accept="jpg,jpeg,png" data-maxfiles="3"><span class="amdar-label" id="amdar-works-photos-__i__-lbl">कामाचे फोटो</span><ul class="amdar-filelist" data-filelist aria-labelledby="amdar-works-photos-__i__-lbl"></ul><label class="amdar-filebtn"><input type="file" id="amdar-works-photos-__i__" accept=".jpg,.jpeg,.png" multiple aria-labelledby="amdar-works-photos-__i__-lbl" aria-describedby="amdar-works-photos-__i__-err"><span>फाइल निवडा</span></label><p class="amdar-hint" data-filehint></p><p class="amdar-err" id="amdar-works-photos-__i__-err"></p></div>
</div>
</div></template>

<!-- Saved draft / earlier submission goes here as JSON (see notes at the top). -->
<script type="application/json" id="amdar-initial">{}</script>

<script>
(function () {
  "use strict";
  var root = document.getElementById("amdar-root");
  if (!root || root.getAttribute("data-ready")) { return; }
  root.setAttribute("data-ready", "1");

  var FORM_VERSION = "mla-v1-2026-09";
  var form = root.querySelector(".amdar-form");
  var cfg = {
    endpoint: attr("data-endpoint"),
    mlaId: attr("data-mla-id"),
    maxFileMb: parseFloat(attr("data-max-file-mb")) || 10,
    csrfName: attr("data-csrf-name"),
    csrfToken: attr("data-csrf-token"),
    withCredentials: attr("data-with-credentials") === "true"
  };
  var sending = false, dirty = false, finished = false, uid = 0, navTimer = null;

  var draftBtn = byId("amdar-draft"), submitBtn = byId("amdar-submit");
  var formErr = byId("amdar-form-err"), statusLine = byId("amdar-status");
  var declaration = byId("amdar-declaration"), declarationBox = byId("amdar-declaration-box");
  var DRAFT_LABEL = draftBtn.textContent, SUBMIT_LABEL = submitBtn.textContent;

  /* ---------- helpers ---------- */
  function attr(name) { return trim(root.getAttribute(name)); }
  function byId(id) { return document.getElementById(id); }
  function all(sel, ctx) { return Array.prototype.slice.call((ctx || root).querySelectorAll(sel)); }
  function trim(s) { return String(s == null ? "" : s).replace(/^\s+|\s+$/g, ""); }
  function mr(n) { return String(n).replace(/[0-9]/g, function (d) { return "०१२३४५६७८९".charAt(+d); }); }
  function toAscii(s) { return String(s).replace(/[०-९]/g, function (d) { return String("०१२३४५६७८९".indexOf(d)); }); }
  function show(el, on) { if (on) { el.removeAttribute("hidden"); } else { el.setAttribute("hidden", ""); } }
  function isHidden(el) { return !!el.closest("[hidden]"); }
  function isBlank(v) { return v == null || v === "" || (v instanceof Array && v.length === 0); }
  function control(box) { return box.querySelector("input, textarea, select"); }

  function parseNum(raw, isInt) {
    var s = toAscii(trim(raw)).replace(/[,\s]/g, "");
    if (s === "") { return { empty: true, ok: true }; }
    var ok = isInt ? /^\d+$/.test(s) : /^\d+(\.\d+)?$/.test(s);
    return { empty: false, ok: ok, text: s, value: ok ? parseFloat(s) : NaN };
  }
  function trimZeros(n) { return n.toFixed(2).replace(/\.?0+$/, ""); }
  function fileSize(bytes) {
    return bytes >= 1048576 ? mr(trimZeros(bytes / 1048576)) + " MB" : mr(Math.max(1, Math.round(bytes / 1024))) + " KB";
  }

  /* ---------- reading and writing one field ---------- */
  function readField(box) {
    var type = box.getAttribute("data-type");
    if (type === "radio") { var r = box.querySelector("input:checked"); return r ? r.value : ""; }
    if (type === "checks") { return all("input:checked", box).map(function (i) { return i.value; }); }
    if (type === "check1") { return control(box).checked ? "yes" : ""; }
    if (type === "file") { return box._files || []; }
    var raw = trim(control(box).value);
    if (type === "num" || type === "int") { var p = parseNum(raw, type === "int"); return p.empty ? "" : (p.ok ? p.text : raw); }
    return raw;
  }

  function writeField(box, v) {
    if (v == null) { return; }
    var type = box.getAttribute("data-type");
    if (type === "radio") { all("input", box).forEach(function (i) { i.checked = i.value === v; }); return; }
    if (type === "checks") { all("input", box).forEach(function (i) { i.checked = v instanceof Array && v.indexOf(i.value) > -1; }); return; }
    if (type === "check1") { control(box).checked = v === "yes" || v === true; return; }
    if (type === "file") {
      box._files = (v instanceof Array ? v : []).filter(function (f) { return f && f.name && !f.field; })
        .map(function (f) { return { existing: true, name: String(f.name), url: /^https?:\/\//i.test(f.url || "") || /^\//.test(f.url || "") ? String(f.url) : "" }; });
      renderFiles(box); return;
    }
    var ctl = control(box);
    if (ctl.tagName === "SELECT") {
      for (var i = 0; i < ctl.options.length; i++) { if (ctl.options[i].value === String(v)) { ctl.value = String(v); } }
    } else { ctl.value = String(v); if (ctl.tagName === "TEXTAREA") { grow(ctl); } }
  }

  function boxesIn(scope, inRow) {
    return all("[data-key]", scope).filter(function (b) { var row = b.closest("[data-row]"); return inRow ? row === scope : !row; });
  }
  function rowIsBlank(row) {
    return boxesIn(row, true).every(function (b) { return isBlank(readField(b)); });
  }

  /* ---------- collecting everything ---------- */
  function collectScope(scope, inRow, path, files) {
    var out = {};
    boxesIn(scope, inRow).forEach(function (b) {
      if (isHidden(b)) { return; }
      var key = b.getAttribute("data-key"), v = readField(b);
      if (b.getAttribute("data-type") !== "file") { out[key] = v; return; }
      out[key] = v.map(function (f, i) {
        if (f.existing) { return { existing: true, name: f.name, url: f.url }; }
        var fieldName = "file__" + path + "__" + key + "__" + i;
        if (files) { files.push([fieldName, f]); }
        return { field: fieldName, name: f.name, size: f.size, type: f.type };
      });
    });
    if (!inRow) {
      all("[data-repeat]", scope).forEach(function (rep) {
        if (isHidden(rep)) { return; }
        var name = rep.getAttribute("data-repeat"), rows = [];
        all("[data-row]", rep).forEach(function (row) {
          if (!rowIsBlank(row)) { rows.push(collectScope(row, true, path + "__" + name + "__" + rows.length, files)); }
        });
        out[name] = rows;
      });
    }
    return out;
  }
  function collectAll(files) {
    var payload = {};
    all("[data-sec]", form).forEach(function (sec) {
      var id = sec.getAttribute("data-sec");
      payload[id] = collectScope(sec, false, id, files);
    });
    payload.declaration = { accepted: declaration.checked ? "yes" : "" };
    return payload;
  }

  /* ---------- repeating entries ---------- */
  function renumber(rep) {
    var rows = all("[data-row]", rep), max = parseInt(rep.getAttribute("data-max"), 10) || 100;
    rows.forEach(function (row, i) { row.querySelector("[data-row-num]").textContent = mr(i + 1); });
    rep.querySelector("[data-add]").disabled = rows.length >= max;
    show(rep.querySelector("[data-maxnote]"), rows.length >= max);
  }
  function addRow(rep, focus) {
    var max = parseInt(rep.getAttribute("data-max"), 10) || 100;
    if (all("[data-row]", rep).length >= max) { return null; }
    uid++;
    var holder = document.createElement("div");
    holder.innerHTML = byId(rep.getAttribute("data-template")).innerHTML.replace(/__i__/g, "r" + uid);
    var row = holder.firstElementChild;
    rep.querySelector("[data-rows]").appendChild(row);
    all("[data-filehint]", row).forEach(setFileHint);
    renumber(rep);
    if (focus) { var first = row.querySelector("input, select, textarea"); if (first) { first.focus(); } }
    return row;
  }
  function removeRow(btn) {
    var row = btn.closest("[data-row]"), rep = btn.closest("[data-repeat]");
    if (!rowIsBlank(row) && !btn.getAttribute("data-armed")) {
      btn.setAttribute("data-armed", "1");
      btn.textContent = "नक्की काढायची? पुन्हा दाबा";
      setTimeout(function () { btn.removeAttribute("data-armed"); btn.textContent = "ही नोंद काढा"; }, 4000);
      return;
    }
    row.parentNode.removeChild(row);
    if (!all("[data-row]", rep).length) { addRow(rep, false); }
    renumber(rep);
    rep.querySelector("[data-add]").focus();
    dirty = true;
    refresh();
  }

  /* ---------- files ---------- */
  function setFileHint(p) {
    var box = p.closest("[data-key]"), exts = box.getAttribute("data-accept").split(","), max = +box.getAttribute("data-maxfiles") || 1, kinds = [];
    if (exts.indexOf("pdf") > -1) { kinds.push("PDF"); }
    if (exts.indexOf("xlsx") > -1) { kinds.push("Excel"); }
    if (exts.indexOf("jpg") > -1) { kinds.push("फोटो (JPG, PNG)"); }
    var list = kinds.length > 1 ? kinds.slice(0, -1).join(", ") + " किंवा " + kinds[kinds.length - 1] : kinds[0];
    p.textContent = list + "; प्रत्येक फाइल " + mr(cfg.maxFileMb) + " MB पर्यंत; जास्तीत जास्त " + mr(max) + (max > 1 ? " फाइल्स." : " फाइल.");
  }
  function renderFiles(box) {
    var ul = box.querySelector("[data-filelist]"), files = box._files || [];
    ul.innerHTML = "";
    files.forEach(function (f, i) {
      var li = document.createElement("li"), name = document.createElement("span"), size = document.createElement("span"), rm = document.createElement("button");
      name.className = "amdar-file-name";
      if (f.existing && f.url) { var a = document.createElement("a"); a.href = f.url; a.target = "_blank"; a.rel = "noopener"; a.textContent = f.name; name.appendChild(a); }
      else { name.textContent = f.name; }
      size.className = "amdar-file-size"; size.textContent = f.existing ? "आधी जोडलेली" : fileSize(f.size);
      rm.type = "button"; rm.className = "amdar-link-btn"; rm.setAttribute("data-file-remove", String(i)); rm.textContent = "काढा";
      rm.setAttribute("aria-label", f.name + " ही फाइल काढा");
      li.appendChild(name); li.appendChild(size); li.appendChild(rm); ul.appendChild(li);
    });
    box.querySelector(".amdar-filebtn span").textContent = files.length ? "आणखी फाइल जोडा" : "फाइल निवडा";
  }
  function pickFiles(box, input) {
    var exts = box.getAttribute("data-accept").split(","), max = +box.getAttribute("data-maxfiles") || 1;
    var list = box._files || (box._files = []), msgs = [], full = false;
    Array.prototype.forEach.call(input.files, function (f) {
      var ext = (f.name.indexOf(".") > -1 ? f.name.split(".").pop() : "").toLowerCase();
      if (exts.indexOf(ext) === -1) { msgs.push("“" + f.name + "” या प्रकारची फाइल इथे चालत नाही."); return; }
      if (f.size > cfg.maxFileMb * 1048576) { msgs.push("“" + f.name + "” ही फाइल " + mr(cfg.maxFileMb) + " MB पेक्षा मोठी आहे."); return; }
      if (list.length >= max) { if (!full) { msgs.push("इथे जास्तीत जास्त " + mr(max) + (max > 1 ? " फाइल्स" : " फाइल") + " जोडता येतात."); full = true; } return; }
      list.push(f);
    });
    input.value = "";
    renderFiles(box);
    setBoxError(box, msgs.join(" "));
  }

  /* ---------- live feedback ---------- */
  function grow(t) { t.style.height = "auto"; t.style.height = (t.scrollHeight + 2) + "px"; }

  function updateEcho(box) {
    var echo = box.querySelector("[data-echo]"); if (!echo) { return; }
    var p = parseNum(control(box).value, false);
    if (p.empty || !p.ok || p.value < 100) { show(echo, false); return; }
    var tooBig = p.value >= 100000;
    echo.textContent = "= ₹ " + mr((p.value / 100).toFixed(4).replace(/\.?0+$/, "")) + " कोटी" + (tooBig ? ". रक्कम लाखांत लिहिली आहे ना? पुन्हा तपासा." : "");
    echo.classList[tooBig ? "add" : "remove"]("is-warn");
    show(echo, true);
  }
  function numIn(sec, key) {
    var box = sec.querySelector('[data-key="' + key + '"]'); if (!box) { return null; }
    var p = parseNum(control(box).value, false); return p.empty || !p.ok ? null : p.value;
  }
  function updateCalcs() {
    all("[data-calc]", form).forEach(function (line) {
      var sec = line.closest("[data-sec]"), a = numIn(sec, line.getAttribute("data-a")), b = numIn(sec, line.getAttribute("data-b"));
      if (a == null || b == null || b === 0) { show(line, false); return; }
      var over = a > b, warn = line.getAttribute("data-warn");
      line.textContent = line.getAttribute("data-label") + ": " + mr(Math.round(a / b * 1000) / 10) + "%" + (over && warn ? ". " + warn : "");
      line.classList[over ? "add" : "remove"]("is-warn");
      show(line, true);
    });
  }
  function applyConditions() {
    all("[data-show-if], [data-hide-if]", form).forEach(function (el) {
      var isShow = el.hasAttribute("data-show-if"), spec = (el.getAttribute(isShow ? "data-show-if" : "data-hide-if") || "").split("=");
      var src = el.closest("[data-sec]").querySelector('[data-key="' + spec[0] + '"]');
      var match = !!src && String(readField(src)) === spec[1];
      show(el, isShow ? match : !match);
    });
  }
  function sectionHasData(sec) {
    if (sec.getAttribute("data-sec") === "basic") {
      return all('[data-req="1"]', sec).every(function (b) { return !isBlank(readField(b)); });
    }
    var d = collectScope(sec, false, "x", null);
    for (var k in d) { if (Object.prototype.hasOwnProperty.call(d, k) && !isBlank(d[k])) { return true; } }
    return false;
  }
  function updateNav() {
    var secs = all("[data-sec]", form), filled = 0, total = 0;
    secs.forEach(function (sec) {
      var id = sec.getAttribute("data-sec"), chip = root.querySelector('[data-goto="' + id + '"]'), has = sectionHasData(sec);
      var bad = !!sec.querySelector(".amdar-has-error");
      if (id !== "basic") { total++; if (has) { filled++; } }
      chip.classList[has ? "add" : "remove"]("is-filled");
      chip.classList[bad ? "add" : "remove"]("is-error");
      sec.classList[bad ? "add" : "remove"]("amdar-sec-error");
    });
    byId("amdar-nav-text").textContent = mr(total) + " पैकी " + mr(filled) + (filled === 1 ? " विभागात" : " विभागांत") + " माहिती भरली आहे";
  }
  function refresh() { applyConditions(); updateCalcs(); updateNav(); }
  function refreshSoon() { clearTimeout(navTimer); navTimer = setTimeout(function () { updateCalcs(); updateNav(); }, 160); }

  /* ---------- errors ---------- */
  function setBoxError(box, msg) {
    var err = box.querySelector(".amdar-err"), ctl = control(box);
    if (err) { err.textContent = msg || ""; }
    box.classList[msg ? "add" : "remove"]("amdar-has-error");
    if (ctl) { if (msg) { ctl.setAttribute("aria-invalid", "true"); } else { ctl.removeAttribute("aria-invalid"); } }
  }
  function phoneOk(v, strict) {
    var d = toAscii(v).replace(/\D/g, "");
    if (!strict) { return d.length >= 6 && d.length <= 13; }
    if (d.length === 12 && d.indexOf("91") === 0) { d = d.slice(2); }
    if (d.length === 11 && d.charAt(0) === "0") { d = d.slice(1); }
    return /^[6-9]\d{9}$/.test(d);
  }

  function validate() {
    var firstBad = null;
    function flag(box, msg) { setBoxError(box, msg); if (!firstBad) { firstBad = box; } }

    all("[data-key]", form).forEach(function (b) {
      setBoxError(b, "");
      if (isHidden(b)) { return; }
      var row = b.closest("[data-row]");
      if (row && rowIsBlank(row)) { return; }
      var type = b.getAttribute("data-type"), v = readField(b);
      if (isBlank(v)) {
        if (b.getAttribute("data-req")) { flag(b, "ही माहिती आवश्यक आहे."); }
        else if (row && b.getAttribute("data-primary")) { flag(b, "हे लिहा, किंवा ही नोंद काढून टाका."); }
        return;
      }
      if (type === "num" || type === "int") {
        if (!parseNum(control(b).value, type === "int").ok) { flag(b, type === "int" ? "इथे पूर्ण संख्या लिहा (उदा. १२)." : "इथे फक्त आकडा लिहा (उदा. १२.५)."); }
      } else if (type === "url") {
        if (!/^https?:\/\/[^\s.]+\.\S+$/i.test(v)) { flag(b, "लिंक http:// किंवा https:// ने सुरू व्हायला हवी."); }
      } else if (type === "email") {
        if (!/^\S+@\S+\.\S+$/.test(v)) { flag(b, "ईमेल पत्ता पुन्हा तपासा."); }
      } else if (type === "tel") {
        var strict = !!b.getAttribute("data-strict");
        if (!phoneOk(v, strict)) { flag(b, strict ? "दहा अंकी मोबाइल क्रमांक लिहा." : "संपर्क क्रमांक पुन्हा तपासा."); }
      }
    });

    var asm = form.querySelector('[data-sec="assembly"]');
    var sitting = numIn(asm, "sitting_days"), attended = numIn(asm, "attended_days");
    if (sitting != null && attended != null && attended > sitting) {
      flag(asm.querySelector('[data-key="attended_days"]'), "उपस्थितीचे दिवस एकूण कामकाजाच्या दिवसांपेक्षा जास्त असू शकत नाहीत.");
    }

    setBoxError(declarationBox, "");
    if (!declaration.checked) { flag(declarationBox, "माहिती सादर करण्यापूर्वी या घोषणेवर खूण करा."); }

    updateNav();
    if (!firstBad) { formErr.textContent = ""; return true; }
    formErr.textContent = "काही जागा दुरुस्त करायच्या आहेत. लाल रंगात दाखवलेल्या जागा पाहा आणि पुन्हा ‘माहिती सादर करा’ दाबा.";
    try { firstBad.scrollIntoView({ behavior: "smooth", block: "center" }); } catch (e) { firstBad.scrollIntoView(true); }
    var ctl = control(firstBad);
    if (ctl) { try { ctl.focus({ preventScroll: true }); } catch (e2) { ctl.focus(); } }
    return false;
  }

  /* ---------- loading saved data ---------- */
  function loadData(data) {
    if (!data || typeof data !== "object") { return; }
    all("[data-sec]", form).forEach(function (sec) {
      var d = data[sec.getAttribute("data-sec")];
      if (!d || typeof d !== "object") { return; }
      boxesIn(sec, false).forEach(function (b) {
        if (control(b) && control(b).readOnly) { return; }
        writeField(b, d[b.getAttribute("data-key")]);
      });
      all("[data-repeat]", sec).forEach(function (rep) {
        var rows = d[rep.getAttribute("data-repeat")];
        if (!(rows instanceof Array)) { return; }
        rep.querySelector("[data-rows]").innerHTML = "";
        rows.forEach(function (rd) {
          var row = addRow(rep, false);
          if (row && rd && typeof rd === "object") { boxesIn(row, true).forEach(function (b) { writeField(b, rd[b.getAttribute("data-key")]); }); }
        });
        if (!all("[data-row]", rep).length) { addRow(rep, false); }
      });
    });
    all("[data-unit]", form).forEach(updateEcho);
    refresh();
  }

  /* ---------- sending ---------- */
  function busy(on, status) {
    sending = on;
    draftBtn.disabled = on; submitBtn.disabled = on;
    draftBtn.textContent = on && status === "draft" ? "जतन करत आहे…" : DRAFT_LABEL;
    submitBtn.textContent = on && status === "submitted" ? "सादर करत आहे…" : SUBMIT_LABEL;
  }
  function describe(payload, files) {
    var lines = files.map(function (f) { return f[0] + "  ←  " + f[1].name + " (" + fileSize(f[1].size) + ")"; });
    return JSON.stringify(payload, null, 2) + (lines.length ? "\n\n/* files */\n" + lines.join("\n") : "");
  }
  function clock() {
    try { return new Date().toLocaleTimeString("mr-IN", { hour: "numeric", minute: "2-digit" }); } catch (e) { return ""; }
  }
  function afterDraft(replyText, payload, files) {
    busy(false);
    dirty = false;
    var t = clock();
    if (!cfg.endpoint) {
      statusLine.textContent = "चाचणी मोड: मसुदा प्रत्यक्षात जतन झालेला नाही. सर्व्हरकडे जाणारी माहिती खाली पाहा.";
      byId("amdar-draft-pre").textContent = describe(payload, files);
      show(byId("amdar-draft-sent"), true);
      return;
    }
    statusLine.textContent = "मसुदा जतन झाला" + (t ? " (" + t + ")" : "") + ".";
    /* Optional reply {"payload": {...}}: reload so uploaded files show as saved. Skipped if the reply still
       contains raw upload references, because reloading would then drop the files picked in this session. */
    try {
      var reply = JSON.parse(replyText);
      if (reply && reply.payload && !hasRawUploads(reply.payload)) { loadData(reply.payload); }
    } catch (e) { /* reply body is optional */ }
  }
  function afterSubmit(payload, files) {
    busy(false);
    dirty = false; finished = true;
    show(form, false);
    show(byId("amdar-demo"), false);
    if (!cfg.endpoint) { byId("amdar-done-pre").textContent = describe(payload, files); show(byId("amdar-done-sent"), true); }
    var done = byId("amdar-done");
    show(done, true);
    try { root.scrollIntoView({ block: "start" }); } catch (e) { root.scrollIntoView(true); }
    try { done.focus({ preventScroll: true }); } catch (e2) { done.focus(); }
  }
  function hasRawUploads(o) {
    if (!o || typeof o !== "object") { return false; }
    if (typeof o.field === "string" && o.field.indexOf("file__") === 0 && !o.url) { return true; }
    for (var k in o) { if (Object.prototype.hasOwnProperty.call(o, k) && hasRawUploads(o[k])) { return true; } }
    return false;
  }
  function sameOrigin(url) {
    var a = document.createElement("a"); a.href = url;
    return a.protocol === window.location.protocol && a.host === window.location.host;
  }

  function send(status) {
    if (sending) { return; }
    statusLine.textContent = "";
    if (status === "submitted" && !validate()) { return; }
    formErr.textContent = "";

    var files = [], payload = collectAll(files), fd = new FormData();
    fd.append("status", status);
    fd.append("form_version", FORM_VERSION);
    fd.append("submitted_at", new Date().toISOString());
    fd.append("page_url", window.location.href);
    fd.append("mla_id", cfg.mlaId);
    fd.append("mla_name", payload.basic.mla_name || "");
    fd.append("constituency", payload.basic.constituency || "");
    fd.append("financial_year", payload.basic.financial_year || "");
    if (cfg.csrfName) { fd.append(cfg.csrfName, cfg.csrfToken); }
    fd.append("payload", JSON.stringify(payload));
    files.forEach(function (f) { fd.append(f[0], f[1], f[1].name); });

    if (!cfg.endpoint) { if (status === "draft") { afterDraft("", payload, files); } else { afterSubmit(payload, files); } return; }

    busy(true, status);
    var xhr = new XMLHttpRequest(), activeBtn = status === "draft" ? draftBtn : submitBtn;
    xhr.open("POST", cfg.endpoint, true);
    xhr.withCredentials = cfg.withCredentials;
    xhr.setRequestHeader("Accept", "application/json");
    xhr.timeout = 180000;
    if (files.length && sameOrigin(cfg.endpoint) && xhr.upload) {   /* a progress listener would force a CORS preflight cross-origin */
      xhr.upload.onprogress = function (ev) {
        if (ev.lengthComputable) { activeBtn.textContent = "अपलोड होत आहे… " + mr(Math.round(ev.loaded / ev.total * 100)) + "%"; }
      };
    }
    function fail() {
      busy(false);
      formErr.textContent = "माहिती पाठवता आली नाही. इंटरनेट जोडणी तपासून पुन्हा प्रयत्न करा. तुम्ही भरलेली माहिती तशीच आहे.";
    }
    xhr.onload = function () {
      if (xhr.status < 200 || xhr.status >= 300) { fail(); return; }
      if (status === "draft") { afterDraft(xhr.responseText, payload, files); } else { afterSubmit(payload, files); }
    };
    xhr.onerror = fail;
    xhr.ontimeout = fail;
    xhr.send(fd);
  }

  /* ---------- events ---------- */
  form.addEventListener("input", function (ev) {
    var t = ev.target, box = t.closest("[data-key]");
    dirty = true;
    if (t.tagName === "TEXTAREA") { grow(t); }
    if (box) {
      if (box.classList.contains("amdar-has-error")) { setBoxError(box, ""); }
      if (box.getAttribute("data-unit")) { updateEcho(box); }
    }
    refreshSoon();
  });

  form.addEventListener("change", function (ev) {
    var t = ev.target, box = t.closest("[data-key]");
    dirty = true;
    if (t.type === "file" && box) { pickFiles(box, t); }
    if (t.type === "checkbox" && box && box.getAttribute("data-type") === "checks" && t.checked) {
      all("input", box).forEach(function (i) {
        if (i !== t && (t.getAttribute("data-exclusive") || i.getAttribute("data-exclusive"))) { i.checked = false; }
      });
    }
    if (box && t.type !== "file" && box.classList.contains("amdar-has-error")) { setBoxError(box, ""); }
    if (t === declaration && t.checked) { setBoxError(declarationBox, ""); }
    refresh();
  });

  form.addEventListener("click", function (ev) {
    var t = ev.target;
    if (t.hasAttribute("data-add")) { addRow(t.closest("[data-repeat]"), true); dirty = true; refresh(); }
    else if (t.hasAttribute("data-remove")) { removeRow(t); }
    else if (t.hasAttribute("data-file-remove")) {
      var box = t.closest("[data-key]");
      box._files.splice(+t.getAttribute("data-file-remove"), 1);
      renderFiles(box); setBoxError(box, ""); dirty = true; refresh();
      control(box).focus();
    }
  });

  all("[data-goto]").forEach(function (chip) {
    chip.addEventListener("click", function () {
      var sec = byId("amdar-sec-" + chip.getAttribute("data-goto")), title = sec.querySelector(".amdar-sec-title");
      try { sec.scrollIntoView({ behavior: "smooth", block: "start" }); } catch (e) { sec.scrollIntoView(true); }
      title.setAttribute("tabindex", "-1");
      try { title.focus({ preventScroll: true }); } catch (e2) { /* older browsers: skip focus rather than jump */ }
    });
  });

  draftBtn.addEventListener("click", function () { send("draft"); });
  submitBtn.addEventListener("click", function () { send("submitted"); });
  form.addEventListener("submit", function (ev) { ev.preventDefault(); });
  window.addEventListener("beforeunload", function (ev) {
    if (dirty && !finished) { ev.preventDefault(); ev.returnValue = ""; }
  });

  /* ---------- start ---------- */
  (function fillYears() {
    var sel = control(form.querySelector('[data-key="financial_year"]')), now = new Date();
    var start = now.getMonth() >= 3 ? now.getFullYear() : now.getFullYear() - 1, wanted = attr("data-financial-year");
    for (var i = 0; i <= 5; i++) {
      var y = start - i, two = ("0" + ((y + 1) % 100)).slice(-2), opt = document.createElement("option");
      opt.value = y + "-" + two;
      opt.textContent = mr(y) + "-" + mr(two) + (i === 0 ? " (चालू वर्ष)" : "");
      if (wanted ? opt.value === wanted : i === 1) { opt.selected = true; }
      sel.appendChild(opt);
    }
  })();

  all("[data-repeat]", form).forEach(function (rep) { addRow(rep, false); });
  all("[data-filehint]", form).forEach(setFileHint);

  [["mla_name", "data-mla"], ["constituency", "data-constituency"]].forEach(function (pair) {
    var v = attr(pair[1]), ctl = control(form.querySelector('[data-key="' + pair[0] + '"]'));
    if (v) { ctl.value = v.slice(0, 120); ctl.readOnly = true; }
  });

  try { loadData(JSON.parse(byId("amdar-initial").textContent || "{}")); } catch (e) { /* bad JSON: start empty */ }
  if (!cfg.endpoint) { show(byId("amdar-demo"), true); }
  refresh();
})();
</script>
</div>
<!-- ======================== COPY TO HERE ======================== -->

</body>
</html>
<?php
// Start the session
session_start();
ob_start();

// If the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

include_once('../inc/db.php');

?> <html>
  <head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>yeni ürün ekle • panel</title>
    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <style>
      .cke {
        visibility: hidden;
      }
    </style>
    <!-- Favicon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="src/icon/favicon.ico" type="image/x-icon">
    <style>
      /* ! tailwindcss v3.4.3 | MIT License | https://tailwindcss.com */
      *,
      ::after,
      ::before {
        box-sizing: border-box;
        border-width: 0;
        border-style: solid;
        border-color: #e5e7eb
      }

      ::after,
      ::before {
        --tw-content: ''
      }

      :host,
      html {
        line-height: 1.5;
        -webkit-text-size-adjust: 100%;
        -moz-tab-size: 4;
        tab-size: 4;
        font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-feature-settings: normal;
        font-variation-settings: normal;
        -webkit-tap-highlight-color: transparent
      }

      body {
        margin: 0;
        line-height: inherit
      }

      hr {
        height: 0;
        color: inherit;
        border-top-width: 1px
      }

      abbr:where([title]) {
        -webkit-text-decoration: underline dotted;
        text-decoration: underline dotted
      }

      h1,
      h2,
      h3,
      h4,
      h5,
      h6 {
        font-size: inherit;
        font-weight: inherit
      }

      a {
        color: inherit;
        text-decoration: inherit
      }

      b,
      strong {
        font-weight: bolder
      }

      code,
      kbd,
      pre,
      samp {
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        font-feature-settings: normal;
        font-variation-settings: normal;
        font-size: 1em
      }

      small {
        font-size: 80%
      }

      sub,
      sup {
        font-size: 75%;
        line-height: 0;
        position: relative;
        vertical-align: baseline
      }

      sub {
        bottom: -.25em
      }

      sup {
        top: -.5em
      }

      table {
        text-indent: 0;
        border-color: inherit;
        border-collapse: collapse
      }

      button,
      input,
      optgroup,
      select,
      textarea {
        font-family: inherit;
        font-feature-settings: inherit;
        font-variation-settings: inherit;
        font-size: 100%;
        font-weight: inherit;
        line-height: inherit;
        letter-spacing: inherit;
        color: inherit;
        margin: 0;
        padding: 0
      }

      button,
      select {
        text-transform: none
      }

      button,
      input:where([type=button]),
      input:where([type=reset]),
      input:where([type=submit]) {
        -webkit-appearance: button;
        background-color: transparent;
        background-image: none
      }

      :-moz-focusring {
        outline: auto
      }

      :-moz-ui-invalid {
        box-shadow: none
      }

      progress {
        vertical-align: baseline
      }

      ::-webkit-inner-spin-button,
      ::-webkit-outer-spin-button {
        height: auto
      }

      [type=search] {
        -webkit-appearance: textfield;
        outline-offset: -2px
      }

      ::-webkit-search-decoration {
        -webkit-appearance: none
      }

      ::-webkit-file-upload-button {
        -webkit-appearance: button;
        font: inherit
      }

      summary {
        display: list-item
      }

      blockquote,
      dd,
      dl,
      figure,
      h1,
      h2,
      h3,
      h4,
      h5,
      h6,
      hr,
      p,
      pre {
        margin: 0
      }

      fieldset {
        margin: 0;
        padding: 0
      }

      legend {
        padding: 0
      }

      menu,
      ol,
      ul {
        list-style: none;
        margin: 0;
        padding: 0
      }

      dialog {
        padding: 0
      }

      textarea {
        resize: vertical
      }

      input::placeholder,
      textarea::placeholder {
        opacity: 1;
        color: #9ca3af
      }

      [role=button],
      button {
        cursor: pointer
      }

      :disabled {
        cursor: default
      }

      audio,
      canvas,
      embed,
      iframe,
      img,
      object,
      svg,
      video {
        display: block;
        vertical-align: middle
      }

      img,
      video {
        max-width: 100%;
        height: auto
      }

      [hidden] {
        display: none
      }

      *,
      ::before,
      ::after {
        --tw-border-spacing-x: 0;
        --tw-border-spacing-y: 0;
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        --tw-pan-x: ;
        --tw-pan-y: ;
        --tw-pinch-zoom: ;
        --tw-scroll-snap-strictness: proximity;
        --tw-gradient-from-position: ;
        --tw-gradient-via-position: ;
        --tw-gradient-to-position: ;
        --tw-ordinal: ;
        --tw-slashed-zero: ;
        --tw-numeric-figure: ;
        --tw-numeric-spacing: ;
        --tw-numeric-fraction: ;
        --tw-ring-inset: ;
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: rgb(59 130 246 / 0.5);
        --tw-ring-offset-shadow: 0 0 #0000;
        --tw-ring-shadow: 0 0 #0000;
        --tw-shadow: 0 0 #0000;
        --tw-shadow-colored: 0 0 #0000;
        --tw-blur: ;
        --tw-brightness: ;
        --tw-contrast: ;
        --tw-grayscale: ;
        --tw-hue-rotate: ;
        --tw-invert: ;
        --tw-saturate: ;
        --tw-sepia: ;
        --tw-drop-shadow: ;
        --tw-backdrop-blur: ;
        --tw-backdrop-brightness: ;
        --tw-backdrop-contrast: ;
        --tw-backdrop-grayscale: ;
        --tw-backdrop-hue-rotate: ;
        --tw-backdrop-invert: ;
        --tw-backdrop-opacity: ;
        --tw-backdrop-saturate: ;
        --tw-backdrop-sepia: ;
        --tw-contain-size: ;
        --tw-contain-layout: ;
        --tw-contain-paint: ;
        --tw-contain-style:
      }

      ::backdrop {
        --tw-border-spacing-x: 0;
        --tw-border-spacing-y: 0;
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        --tw-pan-x: ;
        --tw-pan-y: ;
        --tw-pinch-zoom: ;
        --tw-scroll-snap-strictness: proximity;
        --tw-gradient-from-position: ;
        --tw-gradient-via-position: ;
        --tw-gradient-to-position: ;
        --tw-ordinal: ;
        --tw-slashed-zero: ;
        --tw-numeric-figure: ;
        --tw-numeric-spacing: ;
        --tw-numeric-fraction: ;
        --tw-ring-inset: ;
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: rgb(59 130 246 / 0.5);
        --tw-ring-offset-shadow: 0 0 #0000;
        --tw-ring-shadow: 0 0 #0000;
        --tw-shadow: 0 0 #0000;
        --tw-shadow-colored: 0 0 #0000;
        --tw-blur: ;
        --tw-brightness: ;
        --tw-contrast: ;
        --tw-grayscale: ;
        --tw-hue-rotate: ;
        --tw-invert: ;
        --tw-saturate: ;
        --tw-sepia: ;
        --tw-drop-shadow: ;
        --tw-backdrop-blur: ;
        --tw-backdrop-brightness: ;
        --tw-backdrop-contrast: ;
        --tw-backdrop-grayscale: ;
        --tw-backdrop-hue-rotate: ;
        --tw-backdrop-invert: ;
        --tw-backdrop-opacity: ;
        --tw-backdrop-saturate: ;
        --tw-backdrop-sepia: ;
        --tw-contain-size: ;
        --tw-contain-layout: ;
        --tw-contain-paint: ;
        --tw-contain-style:
      }

      .mb-2 {
        margin-bottom: 0.5rem
      }

      .mb-4 {
        margin-bottom: 1rem
      }

      .mt-4 {
        margin-top: 1rem
      }

      .block {
        display: block
      }

      .flex {
        display: flex
      }

      .h-screen {
        height: 100vh
      }

      .w-full {
        width: 100%
      }

      .appearance-none {
        -webkit-appearance: none;
        appearance: none
      }

      .flex-col {
        flex-direction: column
      }

      .items-center {
        align-items: center
      }

      .justify-between {
        justify-content: space-between
      }

      .rounded {
        border-radius: 0.25rem
      }

      .border {
        border-width: 1px
      }

      .bg-gray-700 {
        --tw-bg-opacity: 1;
        background-color: rgb(55 65 81 / var(--tw-bg-opacity))
      }

      .bg-gray-800 {
        --tw-bg-opacity: 1;
        background-color: rgb(31 41 55 / var(--tw-bg-opacity))
      }

      .p-4 {
        padding: 1rem
      }

      .px-3 {
        padding-left: 0.75rem;
        padding-right: 0.75rem
      }

      .px-4 {
        padding-left: 1rem;
        padding-right: 1rem
      }

      .py-2 {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem
      }

      .text-2xl {
        font-size: 1.5rem;
        line-height: 2rem
      }

      .font-bold {
        font-weight: 700
      }

      .leading-tight {
        line-height: 1.25
      }

      .text-gray-400 {
        --tw-text-opacity: 1;
        color: rgb(156 163 175 / var(--tw-text-opacity))
      }

      .text-gray-700 {
        --tw-text-opacity: 1;
        color: rgb(55 65 81 / var(--tw-text-opacity))
      }

      .text-white {
        --tw-text-opacity: 1;
        color: rgb(255 255 255 / var(--tw-text-opacity))
      }

      .shadow {
        --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
      }

      .transition {
        transition-property: color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
        transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
        transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 150ms
      }

      .duration-200 {
        transition-duration: 200ms
      }

      .hover\:bg-gray-700:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(55 65 81 / var(--tw-bg-opacity))
      }

      .hover\:bg-gray-800:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(31 41 55 / var(--tw-bg-opacity))
      }

      .hover\:text-white:hover {
        --tw-text-opacity: 1;
        color: rgb(255 255 255 / var(--tw-text-opacity))
      }

      .focus\:outline-none:focus {
        outline: 2px solid transparent;
        outline-offset: 2px
      }

      @media (min-width: 768px) {
        .md\:w-64 {
          width: 16rem
        }

        .md\:flex-1 {
          flex: 1 1 0%
        }

        .md\:flex-row {
          flex-direction: row
        }
      }
    </style>
    <script type="text/javascript" src="https://cdn.ckeditor.com/4.20.2/standard/config.js?t=N1FC"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.ckeditor.com/4.20.2/standard/skins/moono-lisa/editor.css?t=N1FC">
    <script type="text/javascript" src="https://cdn.ckeditor.com/4.20.2/standard/lang/en.js?t=N1FC"></script>
    <script type="text/javascript" src="https://cdn.ckeditor.com/4.20.2/standard/styles.js?t=N1FC"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.ckeditor.com/4.20.2/standard/plugins/scayt/skins/moono-lisa/scayt.css?t=N1FC">
    <link rel="stylesheet" type="text/css" href="https://cdn.ckeditor.com/4.20.2/standard/plugins/scayt/dialogs/dialog.css?t=N1FC">
    <link rel="stylesheet" type="text/css" href="https://cdn.ckeditor.com/4.20.2/standard/plugins/tableselection/styles/tableselection.css?t=N1FC">
    <link rel="stylesheet" type="text/css" href="https://cdn.ckeditor.com/4.20.2/standard/plugins/dialog/styles/dialog.css?t=N1FC">
  </head>
  <body>
    <div id="sidebar" class="md:w-64 bg-gray-800 h-screen" style="background-color: #222a3f;">
      <nav class="mt-4">
        <a href="dashboard.php" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white"> Ana Sayfa <i class="bi bi-speedometer"></i>
        </a>

        <a href="yeniurun.php" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white"> Yeni Ürün Ekle <i class="bi bi-folder-plus"></i>
        </a>
        <a href="urun.php" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white"> Ürün Düzenle <i class="bi bi-pencil-fill"></i>
        </a>
        <a href="logout.php" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white"> Çıkış Yap <i class="bi bi-box-arrow-right"></i>
        </a>
      </nav>
    </div>
    <style>
      div#sidebar {
        background-color: #222a3f;
        border-right: 1px solid #a5a5a5;
      }

      #sidebar {
        position: fixed;
      }

      #sidebar nav a {
        text-decoration: none;
        color: #fff;
      }
    </style>
    <div class="flex flex-col md:flex-row">
      <div class="w-full md:w-64 bg-gray-800 h-screen">
        <nav class="mt-4">
          <a href="dashboard.php" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white"> Ana Sayfa </a>
          <a href="logs.php" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white"> Loglar </a>
          <a href="yeniurun.php" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white"> Yeni Ürün Ekle </a>
          <a href="logout.php" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white"> Çıkış Yap </a>
        </nav>
      </div>
      <div class="w-full md:flex-1">
        <main class="p-4">
          <h1 class="text-2xl font-bold mb-4">Yeni Ürün Ekle</h1>
          <form id="new-product-form">
            <div class="mb-4">
              <label class="block text-gray-700 font-bold mb-2" for="product-name"> Ürün Adı </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product-name" name="product-name" type="text" required="">
            </div>


            <div class="mb-4">
              <label class="block text-gray-700 font-bold mb-2" for="product-price"> Ürün Fiyatı </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product-price" name="product-price" type="number" min="0" required="">
            </div>
       
            <div class="mb-4">
              <label class="block text-gray-700 font-bold mb-2" for="product-image"> Ürün Resmi </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product-image" name="product-image" type="file" accept="image/*" required="">
            </div>
            <div class="flex items-center justify-between">
              <button class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-200" type="submit"> Ürün Ekle </button>
            </div>
          </form>
        </main>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        CKEDITOR.config.entities_latin = false;

        const form = $('#new-product-form');
        const productName = $('#product-name');
        const productPrice = $('#product-price');
        const productImage = $('#product-image');

        const action = 'new-product'
        form.submit(function(event) {
          event.preventDefault();
          const formData = new FormData();
          formData.append('name', productName.val());
          formData.append('price', productPrice.val());
          formData.append('image', productImage[0].files[0]);
          formData.append('action', action);

          $.ajax({
            url: 'inc/ajax.php',
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
              response = JSON.parse(response);
              if (response.status) {
                toastr.success(response.message);
              } else {
                toastr.error(response.message);
              }
            }
          })
        })
      })
    </script>
  </body>
</html>
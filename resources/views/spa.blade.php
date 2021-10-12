@php
  $config = [
      'appName' => config('app.name'),
      'locale' => $locale = app()->getLocale(),
      'locales' => config('app.locales'),
      'pdfUrl' => route('invoice.pdf', '')
  ]
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet"
        href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link href="{{ mix('dist/css/app.css') }}" type="text/css" rel="stylesheet"/>
  <script defer>
    window.config = @json($config);
  </script>
</head>
<body>

  <div id="app">
  </div>
  <script defer src="{{ mix('dist/js/app.js') }}"></script>
</body>
</html>

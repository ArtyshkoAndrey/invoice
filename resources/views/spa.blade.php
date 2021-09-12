@php
  $config = [
      'appName' => config('app.name'),
      'locale' => $locale = app()->getLocale(),
      'locales' => config('app.locales'),
  ]
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>{{ config('app.name') }}</title>

  <link href="{{ mix('dist/css/app.css') }}" type="text/css" rel="stylesheet"/>
</head>
<body>

  <div id="app">
  </div>

  <script>
    window.config = @json($config);
  </script>
  <script src="{{ mix('dist/js/app.js') }}"></script>
</body>
</html>

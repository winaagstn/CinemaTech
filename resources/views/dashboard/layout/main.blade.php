<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/dist/output.css" rel="stylesheet">
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
  @include('dashboard.layout.sidebar')
  @include('dashboard.layout.navbar')

  @yield("content")

  @vite(['resources/css/app.css','resources/js/app.js'])
</body>
</html>
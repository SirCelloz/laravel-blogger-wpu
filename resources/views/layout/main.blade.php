<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>{{ $title }}</title>
  
  <link rel="icon" href="https://daisyui.com/images/daisyui-logo/daisyui-logomark.svg" type="image/svg+xml">
  @vite('resources/css/app.css')

</head>
<body>
  
  @include('partials.nav-bar')

  <div class="mt-4">
    @yield('contain')
  </div>

</body>
</html>
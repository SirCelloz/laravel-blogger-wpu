<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>{{ $title }}</title>

  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <link rel="icon" href="https://daisyui.com/images/daisyui-logo/daisyui-logomark.svg" type="image/svg+xml">
  @vite('resources/css/app.css')

  <style>
    trix-toolbar [data-trix-button-group="file-tools"] {
      display: none;
    }
    trix-toolbar .trix-button-group button {
      background-color: silver;
    }
    trix-editor{
      background: silver;
      color: rgb(20, 20, 20);
    }
  </style>

</head>
<body>
  
  <div class="drawer lg:drawer-open">
    <input id="drawer" type="checkbox" class="drawer-toggle" />

    <div class="drawer-side z-40">
      @include('dashboard.layout.side')
    </div>

    <div class="drawer-content">
      @include('dashboard.layout.header')
    </div>

    @yield('konten')

  </div>

  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

</body>
</html>
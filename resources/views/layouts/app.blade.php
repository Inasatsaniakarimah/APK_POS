<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>@yield('title')</title>
      <style>
          html, body {
              margin: 0 !important;
              padding: 0 !important;
              width: 100% !important;
              min-height: 100vh !important;
              overflow-x: hidden; 
          }
      </style>


      @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="container-fluid px-0 w-100 min-vh-100">

      @if (session('success'))
              <div class="alert alert-success m-3">
                  {{ session('success') }}
              </div>
      @endif
      @yield('content')
      
</div>

</body>
</html>
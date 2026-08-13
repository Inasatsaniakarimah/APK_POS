<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Isi title yang kita kirimkan dari view lain -->
      <title>@yield('title')</title>
      <!-- memanggil link bootstrap -->
      @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
      
<!-- Ganti .container dengan .container-fluid px-0 agar melebar penuh selebar layar -->
<div class="container-fluid px-0">

      @if (session('success'))
              <div class="alert alert-success m-3">
                  {{ session('success') }}
              </div>
      @endif

      <!-- isi konten yang kita kirimkan dari view lain -->
      @yield('content')
      
</div>

</body>
</html>
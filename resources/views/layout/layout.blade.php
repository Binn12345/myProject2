<!doctype html>
<html>
<head>

  <title>Document Management System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('publicindex')
    @yield('adminindex')
    @yield('registerindex')
    @yield('profileindex')
    @yield('accountsindex')
    
    
</body>
</html>
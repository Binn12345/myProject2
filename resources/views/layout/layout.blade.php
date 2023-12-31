<html>
<head>

  <title>Document Management System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
  
</head>
<body>
    
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('publicindex')
    @yield('adminindex')
    @yield('registerindex')
    @yield('profileindex')
    @yield('accountsindex')
    <script type="text/javascript">
      $(document).ready(function(){
          $('#logout').on('click',function(e){
            Swal.fire({
              title: 'Are you sure?',
              text: "You want to sign out",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes!'
              
            }).then((result) => {
              if (result.isConfirmed) {
                  window.location = "{{route('logout')}}"
              }
            })
          })
      });
      </script>
     
    
</body>
</html>
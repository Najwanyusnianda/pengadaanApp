<!DOCTYPE html>
<html lang="en"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title>Fixed top navbar example for Bootstrap</title>
    <!-- Custom fonts for this template-->
        <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Quicksand|Roboto|Varela+Round" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="{{asset('assets/adminlte/adminlte.css')}}">
        <!-- Custom styles for this template -->
        <link href="navbar-top-fixed.css" rel="stylesheet">
      </head>
    
      <body>
    
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <a class="navbar-brand" href="#">Fixed navbar</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Daftar Permintaan<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Add Permintaan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li>
            </ul>
          </div>
        </nav>
    
        <div class="content">
            @yield('konten_bagian')
        </div>
    
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
          <!-- Bootstrap core JavaScript-->
        <script src="{{asset('assets/bootstrap/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  
        <!-- Core plugin JavaScript-->
        <script src="{{asset('assets/jquery-easing/jquery.easing.min.js')}}"></script>
    
  
        <!-- Custom scripts for all pages-->
        <script src="{{asset('assets/adminlte/adminlte.js')}}"></script>
    
    </body>
</html>
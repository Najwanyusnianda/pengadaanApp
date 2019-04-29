<!DOCTYPE html>
<html lang="en"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Pengadaan App - test</title>
    <!-- Custom fonts for this template-->
        <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Quicksand|Roboto|Varela+Round" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
        <!-- Custom styles for this template-->
        <!--<link rel="stylesheet" href="{{asset('assets/adminlte/adminlte.css')}}">-->
        <!-- Custom styles for this template -->
        <style>
              body {
                min-height: 75rem;
                padding-top: 4.5rem;
                background-color: #F4F6F9;
                font-family: 'Roboto';
              }

              .active{
                color: black;
              }

              
        </style>
      </head>
      @yield('addStyle')
      <body >
    
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="background-color:#2c3e50 !important;font-size:14px;" >

          <a class="navbar-brand" href="#">Pengadaan App</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav" >
            <li class="nav-item {{Request::is('permintaan/'.auth()->user()->sub_bagian->kode_bagian.'/list') ? 'active' : '' }}">
                <a class="nav-link"  href="{{route('bagian.permintaan.index',['bagian'=>auth()->user()->sub_bagian->kode_bagian])}}">
                    <i class="far fa-file-alt"></i>
                    Daftar Permintaan
                    <span class="sr-only">(current)</span>
                </a>
              </li>
            <li class="nav-item {{Request::is('permintaan/form') ? 'active' : ''}}">
              <a class="nav-link" href="{{route('permintaan.form')}}">
                    <i class="fas fa-plus-circle"></i>
                    Tambah permintaan
                    <span class="sr-only"></span>
                </a>
            </li>

            </ul>
            <hr style="color:white;">
            <div style="font-size: 12px;color:white;">
            <a class="btn btn-link" href="{{route('logout')}}" >
                  <i class="fas fa-power-off"></i>
            </a>
                
                {{auth()->user()->sub_bagian->nama_bagian}}
            </div>
            
          </div>
        </nav>
 <!-----------konten---------->
        <div class="content">
            @yield('konten_bagian')
        </div>

   <!-----------end konten---------->      

    
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
          <!-- Bootstrap core JavaScript-->
        <script src="{{asset('assets/bootstrap/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  
        <!-- Core plugin JavaScript-->
        <script src="{{asset('assets/jquery-easing/jquery.easing.min.js')}}"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    
  
        <!-- Custom scripts for all pages-->
        <script src="{{asset('assets/adminlte/adminlte.js')}}"></script>
          @yield('addScript')
    </body>
</html>
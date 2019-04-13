<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
    
        <title>Login</title>
    
        <!-- Custom fonts for this template-->
        <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="{{asset('assets/adminlte/adminlte.css')}}">
        <!--<link href="{{asset('assets\sbadmin\css\sb-admin-2.min.css')}}" rel="stylesheet">-->
        
        @yield('addStyle')
</head>
<body class="hold-transition login-page">
@yield('auth_konten')
<!-- /.login-box -->

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('assets/bootstrap/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>



  <!-- Custom scripts for all pages-->
  <script src="{{asset('assets/adminlte/adminlte.js')}}"></script>
  <!--<script src="{{asset('assets/sbadmin/js/sb-admin-2.min.js')}}"></script>-->

  @yield('addScript')
</body>
</html>

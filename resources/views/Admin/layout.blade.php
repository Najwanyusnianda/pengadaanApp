<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title>SB Admin 2 - Blank</title>
    
        <!-- Custom fonts for this template-->
        <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Quicksand|Roboto|Varela+Round" rel="stylesheet">
        
        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="{{asset('assets/adminlte/adminlte.css')}}">
        <!--<link href="{{asset('assets\sbadmin\css\sb-admin-2.min.css')}}" rel="stylesheet">-->
        
        @yield('addStyle')
    </head>
  
    <body class="sidebar-mini" style="height: auto;">
      <div class="wrapper">
      
        <!-- Navbar -->
        @include('Admin.inc_topbar')
        <!-- /.navbar -->
      
        <!-- Main Sidebar Container -->
       @include('Admin.inc_sidebar')
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 600px;">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Starter Page</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
      
          <!-- Main content -->
          <div class="content">
            @yield('konten')
          </div>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
      
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark" style="top: 57px;">
          <!-- Control sidebar content goes here -->
          <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
          </div>
        </aside>
        <!-- /.control-sidebar -->
      
        <!-- Main Footer -->
        <footer class="main-footer">
          <!-- To the right -->
          <div class="float-right d-none d-sm-inline">
            Anything you want
          </div>
          <!-- Default to the left -->
          <strong>Copyright © 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
      </div>
      <!-- ./wrapper -->
      
      <!-- REQUIRED SCRIPTS -->
 
  
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/bootstrap/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  
    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/jquery-easing/jquery.easing.min.js')}}"></script>
    
  
    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/adminlte/adminlte.js')}}"></script>
    <!--<script src="{{asset('assets/sbadmin/js/sb-admin-2.min.js')}}"></script>-->

    @yield('addScript')
  
  
  
  </body>
</html>
@extends('Admin.layout_auth')
    
@section('auth_konten')
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{route('post.register')}}" method="post">
        {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="nama" name="nama">
          <div class="input-group-append">
              <span class="fa fa-user input-group-text"></span>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="nip" name="nip">
          <div class="input-group-append">
              <span class="fa fa-user input-group-text"></span>
          </div>
        </div>

        <hr>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="username" name="username">
          <div class="input-group-append">
              <span class="fa fa-user input-group-text"></span>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
              <span class="fa fa-lock input-group-text"></span>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    
    
    </div>
    <!-- /.login-card-body -->
  </div>
</div>  
@endsection

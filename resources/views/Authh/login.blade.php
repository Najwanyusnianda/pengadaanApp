    @extends('Admin.layout_auth')
    
    @section('auth_konten')
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Pengadaan</b>App</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in</p>
    
        <form action="{{route('post.login')}}" method="post">
          {{ csrf_field() }}
            <div class="input-group mb-3">
              <input type="username" class="form-control" placeholder="Username" name="username">
              <div class="input-group-append">
                  <span class="fa fa-envelope input-group-text"></span>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" name="password">
              <div class="input-group-append">
                  <span class="fa fa-lock input-group-text"></span>
              </div>
            </div>
            <div class="row">

             
            </div>
            <div class="row">
            
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
     <hr>
          <!-- /.social-auth-links -->
    
         <!-- <p class="mb-1">
            <a href="#">I forgot my password</a>
          </p>-->
          <p class="mb-0">
            <a href="{{route('get.register')}}" class="text-center">Register a new membership</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
  </div>  
    @endsection

    @extends('Admin.layout_auth')
    
    @section('auth_konten')
    <!--<div class="login-box">
      <div class="login-logo">
        <a href=""><b >Pengadaan</b><span >App</span> </a>
      </div>
     
      <div class="card shadow shadow-lg">
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
            
              
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div>
         
            </div>
          </form>
    
     <hr>
         
    

        
        </div>
      
      </div>
  </div> -->
  <div class="container mt-5">
      <div class="card card-login col-md-4 " style="min-width:400px;min-height:517px;margin:auto;">
        <div class="card-body" >
          <div class="row justify-content-center" >
            <div class=" ">
              <div class="padding">
                <h2>Login</h2>
                <p class="lead">Login Terlebih dahulu sebelum masuk kedalam sistem</p>
                <form autocomplete="off" action="{{route('post.login')}}" method="post">
                    {{ csrf_field() }}
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" class="form-control" placeholder="Username" name="username" tabindex="1">
                  </div>
                  <div class="form-group">
                    <label class="d-block" for="password">
                      Password
                      <div class="float-right">
                       <!-- <a href="#">Forgot Password?</a>-->
                      </div>
                    </label>
                    <input type="password" class="form-control" placeholder="Password" name="password" tabindex="2">
                  </div>
                  <div class="form-group text-right">
                    <!--<div class="float-left mt-2">
                      <a href="#">Create an account?</a>
                    </div>-->
                    <button class="btn btn-primary d-block" type="submit" >
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  
    @endsection


    @section('addStyle')
        <style>
        

html, body {
min-height: 100%;
}

body {
background-color: #f7f7fb;
}

.card-login {
/* RESET */
font-size: 14px;
padding: 0;
border: none;
box-shadow: 0 4px 30px rgba(0,0,0,.05);
border-radius: 0;


width: 800px;
margin: 0 auto;
margin-top: 80px;
position: relative;

/* VARIABLES */
--color-primary: #0081C6;
--color-grey: #f9f9f9;
--color-dark: #000;
--color-semidark: #9b9b9b;
--shadow-color: rgba(0,129,198, .3);
--logo-width: 60px;
--logo-height: 60px;
}

.container{
  
}

.card-login #particles-js {
position: absolute;
top: 0;
left: 0;
width: 50%;
height: 50%;
}

.card-login a {
font-weight: 600;
}

.card-login:after {
content: ' ';
position: absolute;
bottom: -8px;
left: 20px;
right: 20px;
background-color: #fff;
height: 100px;
z-index: -1;
}

.card-login .card-body {
padding: 0;
}

.card-login .padding {
padding: 50px;
height: 100%;
position: relative;
}

.card-login .padding.bg-primary .lead {
opacity: .8;
}

.card-login .padding.bg-primary .help-links {
text-align: center;
padding: 0;
margin: 0;
position: absolute;
left: 0;
bottom: 25px;
width: 100%;
}

.card-login .padding.bg-primary .help-links ul {
display: inline-block;
padding: 0;
margin: 0;
}

.card-login .padding.bg-primary .help-links li {
float: left;
list-style: none;
color: #fff;
}

.card-login .padding.bg-primary .help-links li a {
font-size: 12px;
font-weight: 400;
color: #fff;
}

.card-login .padding.bg-primary .help-links li:not(:last-child):after {
content: '\2022';
margin: 0 8px;
}

.card-login .row {
margin: 0;
}

.card-login .row [class^="col-"] {
padding: 0;
min-height: 100%;
}

.card-login .logo {
display: inline-block;
padding: 5px;
border-radius: 50%;
background-color: #fff;
width: var(--logo-width);
height: var(--logo-height);
overflow: hidden;
}

.card-login h2 {
font-size: 2em;
margin-bottom: 25px;
color: var(--color-dark);
}

.card-login h4 {
font-size: 18px;
}

.card-login .lead {
font-size: 14px;
line-height: 24px;
margin-bottom: 30px;
color: var(--color-semidark);
font-weight: 400;
}

.card-login .form-group {
margin-bottom: 30px;
}

.card-login .form-group label {
color: var(--color-semidark);
font-weight: 600;
}

.card-login .form-control {
font-size: 14px;
padding: 0 18px;
box-shadow: none;
border-radius: 0;
height: 45px;
background-color: var(--color-grey);
color: var(--color-dark);
border: none;
}

.card-login .form-control:focus {
border-color: var(--primary);
}

.card-login .btn {
font-size: 14px;
border-radius: 3px;
padding: 10px 30px;
box-shadow: 0 4px 10px var(--shadow-color);
font-weight: 600;
}

.card-login .btn:focus {
background-color: #0069d9;
}

.card-login .btn:focus,
.card-login .btn:active:focus {
box-shadow: none !important;
}

.card-login .btn-icon {
background-color: #fff;
box-shadow: 0 4px 15px rgba(0, 0, 0, .2);
padding-left: 45px;
position: relative;
height: 45px;
}

.card-login .btn-icon:focus,
.card-login .btn-icon:active {
background-color: #fff;
-webkit-transform: scale(.98);
      transform: scale(.98);
}

.card-login .btn-icon:before {
content: ' ';
position: absolute;
top: -1px;
left: -1px;
bottom: -1px;
width: 45px;
background-color: #f2f2f2;
border-radius: 3px 0 0 3px;
}

.card-login .btn-icon.btn-icon-google:before {
background-image: url('../img/google.png');
background-size: 20px;
background-repeat: no-repeat;
background-position: center;
}

@media screen and (min-width: 769px) and (max-width: 1023px) {
.card-login {
width: 800px;
}
}

@media screen and (max-width: 991px) {
.card-login {
width: 400px;
margin-bottom: 40px;
}

.card-login .row [class^="col-"] {
min-height: 480px;
}
}

@media screen and (max-width: 425px) {
.card-login {
width: 100%;
margin-top: 20px;
}
}

@media screen and (max-width: 375px) {
.card-login .padding {
padding: 30px;
}
}



        </style>
    @endsection

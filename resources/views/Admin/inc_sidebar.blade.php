<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 600px;background-color:;">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('img/brand.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('img/user.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             <li class="nav-item has-treeview ">
              <a href="#" class="nav-link ">
                
                  <i class="nav-icon fas fa-file-alt"></i>
                <p>
                  Permintaan
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
           
                  <li class="nav-item">
                  <a href="{{route('permintaan.form')}}" class="nav-link ">
                        <i class="fas fa-circle-notch nav-icon" style="font-size: 15px;"></i>
                        <p>Entri Baru</p>
                      </a>
                  </li>  
             
              
                <li class="nav-item">
                <a href="{{route('permintaan.list')}}" class="nav-link ">
                    <i class="fas fa-circle-notch nav-icon" style="font-size: 15px;"></i>
                    <p>Daftar Permintaan</p>
                  </a>
                </li>

              </ul>        
            </li>
            <li class="nav-item has-treeview ">
                <a href="#" class="nav-link ">
                  
                    <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                    Disposisi
                    <i class="right fa fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
             
                    <li class="nav-item">
                    <a href="{{route('disposisi.list')}}" class="nav-link ">
                          <i class="fas fa-circle-notch nav-icon" style="font-size: 15px;"></i>
                          <p>Daftar Disposisis</p>
                        </a>
                    </li>  
               
                
                  <li class="nav-item">
                  <a href="{{route('permintaan.list')}}" class="nav-link ">
                      <i class="fas fa-circle-notch nav-icon" style="font-size: 15px;"></i>
                      <p>Daftar Permintaan</p>
                    </a>
                  </li>
  
                </ul>        
              </li>
            <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>
                  Log Out
                  <span class="right badge badge-danger"></span>
                </p>
              </a>
            </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
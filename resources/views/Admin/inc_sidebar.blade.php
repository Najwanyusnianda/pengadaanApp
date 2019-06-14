<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 600px;font-family:Roboto; background-color:#2f3640;">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('img/brand.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">pengadaanApp</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar" >
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('img/user.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{auth()->user()->username ? auth()->user()->username : ' '}}</a>
        <small> <a href="#" class="d-block">{{auth()->user()->person->role->deskripsi ? auth()->user()->person->role->deskripsi : ' '}}</a></small>
      </div>
      
     
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             @if (auth()->user()->person->role_id==1)
              <li class="nav-item has-treeview ">
                  <a href="#" class="nav-link ">
                    
                      <i class="nav-icon fas fa-cogs" ></i>
                    <p>
                      Project Management
                      <i class="right fa fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
  
                        <li class="nav-item">
                          <a href="{{route('project.index')}}" class="nav-link ">
                                <i class="fas fa-circle-notch nav-icon" style="font-size: 15px;"></i>
                                <p>Project </p>
                              </a>
                        </li>
               
                      <li class="nav-item">
                      <a href="{{route('user_list.index')}}" class="nav-link ">
                            <i class="fas fa-users nav-icon" style="font-size: 15px;"></i>
                            <p>Pegawai</p>
                          </a>
                      </li>

                      <li class="nav-item">
                          <a href="{{route('user_list.indexBagian')}}" class="nav-link ">
                                <i class="fas fa-circle-notch nav-icon" style="font-size: 15px;"></i>
                                <p>Subdirektorat</p>
                              </a>
                      </li>
    
                  </ul>        
              </li>
              <!--
               <li class="nav-item has-treeview ">
                <a href="#" class="nav-link ">
                  
                    <i class="nav-icon fas fa-users" ></i>
                  <p >
                    Users
                    <i class="right fa fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
             
                    <li class="nav-item">
                    <a href="{{route('user_list.index')}}" class="nav-link">
                          <i class="fas fa-circle-notch nav-icon" style="font-size: 15px;"></i>
                          <p>Daftar User</p>
                        </a>
                    </li>  
               
                
                  <li class="nav-item">
                  <a href="{{route('user_list.indexBagian')}}" class="nav-link ">
                      <i class="fas fa-circle-notch nav-icon" style="font-size: 15px;"></i>
                      <p>Daftar Subdirektorat</p>
                    </a>
                  </li>
  
               
  
                </ul>        
              </li>-->
             
                 
             @endif

             @if (auth()->user()->person->role_id==1)
             @else
             <li class="nav-item">  
                <a href="{{route('logout')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <span class="right badge badge-danger"></span>
                  </p>
                </a>
              </li>
             <li class="nav-item">  
                <a href="{{route('logout')}}" class="nav-link">
                <i class="nav-icon fas fa-bell"></i>
                
                  <p>
                    Notifikasi
                    <span class="right badge badge-danger"></span>
                  </p>
                </a>
              </li>
             <li class="nav-item has-treeview ">
              <a href="#" class="nav-link ">
                
                  <i class="nav-icon far fa-envelope"></i>
                <p>
                  Inbox
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
           
                  <li class="nav-item">
                  <a href="{{route('disposisi.masuk')}}" class="nav-link ">
                        <i class="fas fa-circle-notch nav-icon" style="font-size: 15px;"></i>
                        <p>Masuk</p>
                      </a>
                  </li>  
             
              
                <li class="nav-item">
                <a href="{{route('disposisi.diteruskan')}}" class="nav-link ">
                    <i class="fas fa-circle-notch nav-icon" style="font-size: 15px;"></i>
                    <p>Terkirim</p>
                  </a>
                </li>


              </ul>        
            </li>  
             
             <li class="nav-item has-treeview {{Request::is('permintaan') ? 'menu-open' : ''}}">
              <a href="#" class="nav-link {{Request::is('permintaan') ? 'active' : ''}}">
                
                  <i class="nav-icon fas fa-table" ></i>
                <p>
                  Permintaan
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
           
             
              
                <li class="nav-item">
                <a href="{{route('permintaan.list')}}" class="nav-link {{Request::is('permintaan') ? 'active' : ''}}">
                    <i class="fas fa-circle-notch nav-icon" style="font-size: 15px;"></i>
                    <p>Daftar Permintaan</p>
                  </a>
                </li>

         

              </ul>        
            </li>
          
            <li class="nav-item has-treeview {{Request::is('paket') ? 'menu-open' : ''}}">
                <a href="#" class="nav-link {{Request::is('paket') ? 'active' : ''}}">
                  
                    <i class="nav-icon fas fa-box" ></i>
                  <p>
                    Paket Pengadaan
                    <i class="right fa fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
             
                    <li class="nav-item">
                    <a href="{{route('paket.index')}}" class="nav-link ">
                          <i class="fas fa-circle-notch nav-icon" style="font-size: 15px;"></i>
                          <p>Daftar Paket</p>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('paket.index.me',['person'=>auth()->user()->person->id])}}" class="nav-link ">
                            <i class="fas fa-circle-notch nav-icon" style="font-size: 15px;"></i>
                            <p>Tugas Paket</p>
                          </a>
                      </li>
  
                </ul>        
              </li>
            <li class="nav-item">
             @endif


               
            <li class="nav-item">  
              <a href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
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

<style>

.nav-link{
  font-size: 14px;
}

.main-sidebar { 
  background-color: #2d3436!important ;
 

}
p{
 
}
</style>

<!-- Notifications Dropdown Menu -->
<li class="nav-item dropdown" id="notif" style="font-family:roboto;" onclick="markNotificationAsRead()" >
    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
      <i class="far fa-bell"></i>
    <span class="badge badge-warning navbar-badge">{{count(auth()->user()->unreadNotifications) ?? '0'}}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="width:400px;">
      @if (count(auth()->user()->unreadNotifications)>0)
      <span class="dropdown-header">{{count(auth()->user()->unreadNotifications)}} Notifikasi belum dibaca </span>
      @else
      <span class="dropdown-header">Tidak ada notifikasi belum dibaca</span>
      @endif
      
      <div class="dropdown-divider"></div>
      
      @foreach (auth()->user()->unreadNotifications as $notifikasi)
          @include('Admin.notifikasi.permintaan_masuk')
      @endforeach
   
      <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
</li>


    <script>
      function markNotificationAsRead(){
        $.get('/markAsRead');
      }
    </script>



     <!--<a href="#" class="dropdown-item">
        <i class="fa fa-envelope mr-2"></i> 4 new messages
        <span class="float-right text-muted text-sm">3 mins</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <i class="fa fa-users mr-2"></i> 8 friend requests
        <span class="float-right text-muted text-sm">12 hours</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
        <i class="fa fa-file mr-2"></i> 3 new reports
        <span class="float-right text-muted text-sm">2 days</span>
      </a>
      <div class="dropdown-divider"></div> -->
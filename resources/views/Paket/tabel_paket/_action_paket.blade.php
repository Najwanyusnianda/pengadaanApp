<div class="btn-group" >
        <button type="button" class="btn  btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-ellipsis-v"style="color:#3498db"></i>
            <span class="caret"></span>
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu" style="font-size:10px;"role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(67px, 38px, 0px);">
            <!--<a class="dropdown-item" href="{{route('paket.jadwal',['id'=>$id_paket])}}">Buat Jadwal</a>-->
            <a class="dropdown-item" href="{{route('paket.detail',['id'=>$id_paket])}}">Detail Paket</a>                                            
          <div class="dropdown-divider"></div>
          <!--<a class="dropdown-item" href="#">Separated link</a>-->
        </div>
    </div>
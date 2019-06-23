<div class="btn-group">
    <a  class="btn btn-link {{$is_disabled}}" id="active_project" data-id="{{$id}}">
            <i class="fas fa-power-off fa-md" style="color:{{$name_condition}}"></i>
        </a>
    <a  class="btn btn-link" id="user_pro" href="{{$user_setup_link}}"  data-id="{{$id}}">
            
        </a>
        <div class="btn-group" >
                <button type="button" class="btn  btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"style="color:#3498db"></i>
                    <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" style="font-size:10px;"role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(67px, 38px, 0px);">
                        <a  class="dropdown-item" id="user_pro" href="{{$user_setup_link}}"  data-id="{{$id}}">Anggota Project</a>
                 
                </div>
        </div>    
</div>
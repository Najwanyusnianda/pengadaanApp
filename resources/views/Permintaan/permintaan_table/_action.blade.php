<div class="btn-group">
        @if (auth()->user()->person->role->id==4 || auth()->user()->person->role->id==5)
                <a class="btn btn-link disposisi-show  {{$disabled_status}} " data-id="{{$data_id}}" data-title="{{$judul}}" data-toggle="tooltip" data-placement="top" title="Disposisi Permintaan"  >
                        <i class="fas fa-envelope-open-text disposisi_tolltip" style="color:{{$color_status}}" ></i>  
                </a>
        @endif


        <a class="btn btn-link permintaan-show" data-id={{$data_id}} data-toggle="tooltip" data-placement="top" title="Lihat Permintaan">
                <i class="fas fa-eye " style="color:#3498db"></i>
        </a>
</div>

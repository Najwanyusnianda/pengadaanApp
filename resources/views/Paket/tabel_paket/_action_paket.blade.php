<div class="btn-group" >
    @if (empty($pj))
    <a class="badge badge-danger badge-pills" href="{{route('paket.pj',[$id_paket])}}" role="button" ><i class="fas fa-user-plus"></i> <small>Tambah Pj</small> </a> 
    @else
    <a class="badge badge-secondary" href="{{route('paket.detail',['id'=>$id_paket])}}">Detail Paket</a>  
    @endif
     
</div>
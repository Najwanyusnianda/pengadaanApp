@extends('Admin.layout')
@section('link_bread')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Paket</li>

@endsection
@section('konten')
<div class="container-fluid">
    <div class="col-md-6" style="width:50%;margin:auto;">
        <div class="row">

        </div>
        <div class="row-md-6 justify-content-center" >
            <div class="card shadow-lg" style="font-family:Roboto,sans-serif">
                <div class="card-header" class="justify-content-between" style="background-color:#566787;color:white;">
                   
                        Daftar Paket
                 
                    <div class="card-tools float-right">
                    </div>

                </div>
                <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif;color:#566787;">
                   
                    <table class="table table-condensed table-hover " id="paketTable">

                        <thead>
                            <tr style="font-family:Valera Round, sans-serif;color:#566787" >
                                <th>Nama Paket</th>
                                <th>Status Paket</th>
                              
                            </tr>
                        </thead>
        
                        <tbody style="font-family:'Varela Round', sans-serif;color:#566787;font-size:13px;">
                            @if (count($paket)>0)
                                @forelse ($paket as $data)
                                <tr>
                                    <td>{{$data->judul}}
                                    
                                        <div class="btn-group" >
                                            <button type="button" class="btn  btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"style="color:#3498db"></i>
                                                <span class="caret"></span>
                                              <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" style="font-size:10px;"role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(67px, 38px, 0px);">
                                                <a class="dropdown-item" href="{{route('paket.jadwal',['id'=>$data->id])}}">Buat Jadwal</a>
                                                <a class="dropdown-item" href="{{route('paket.detail',['id'=>$data->id])}}">Kelola Berkas</a>                                              <a class="dropdown-item" href="#">Something else here</a>
                                              <div class="dropdown-divider"></div>
                                              <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                    <a href="{{route('paket.persiapan',[$data->id])}}"><span class="badge badge-info">Dokumen Persiapan Pengadaan</span></a>
                                    <a href="{{route('paket.detail.penyedia',['id'=>$data->id])}}" class="badge badge-info">Pilih Calon Penyedia</a>
                                    </td>

                                </tr>
                                @empty
                                    
                                @endforelse
                            @else
                                
                            @endif
                        </tbody>
                    </table>        

      
                </div>
                


               
            </div>
        
        </div>
    </div>
</div>
@endsection

@section('addStyle')
    <style>
    .dropdown-toggle::after {
    display: none;
}
    </style>
@endsection
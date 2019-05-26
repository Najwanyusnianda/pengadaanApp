@extends('Admin.layout')

@section('konten')
<div class="container">
    <div class="col">
        <div class="row">

        </div>
        <div class="row-md-8 justify-content-center" style="margin:auto;width:80%">
            <div class="card shadow-lg" style="font-family:Roboto,sans-serif">
                <div class="card-header" class="justify-content-between" style="background-color:#566787;color:white;">
                   
                        Daftar Paket
                 
                    <div class="card-tools float-right">
                   
                    </div>

                </div>
                <div class="card-body">
                   
                    <table class="table table-bordered table-hover " id="paketTable">

                        <thead>
                            <tr style="font-family:Valera Round, sans-serif;color:#566787" >
                                <th>Nama Paket</th>
                                <th>Status Paket</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
        
                        <tbody style="font-family:'Varela Round', sans-serif;color:#566787;font-size:13px;">
                            @if (count($paket)>0)
                                @forelse ($paket as $data)
                                <tr>
                                    <td>{{$data->judul}}</td>
                                    <td>test</td>
                                    <td>
                                        <div class="btn-group" >
                                            
                                            <button type="button" class="btn  btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                                <span class="caret"></span>
                                              <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" style="font-size:10px;"role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(67px, 38px, 0px);">
                                                <a class="dropdown-item" href="{{route('paket.jadwal',['id'=>$data->id])}}">Buat Jadwal</a>
                                                <a class="dropdown-item" href="{{route('paket.detail',['id'=>$data->id])}}">Kelola Berkas</a>                                              <a class="dropdown-item" href="#">Something else here</a>
                                              <div class="dropdown-divider"></div>
                                              <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                            <button class="btn btn-flat">
                                                <i class="fas fa-eye " style="color:#3498db"></i>
                                            </button>
                                        </div>
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
@extends('Admin.layout')

@section('konten')
    <div class="container mt-5">
        <div class="col-md-8" style="width:50%;margin:auto;">
            <div class="row-md-8">
                    <div class="card card-outline card-info shadow p-2" style="font-family:QuickSand;font-size:12px; ">
                            <div class="card-header text-center" style="font-size:16px;">
                                Dokumen Persiapan Pengadaan
                                <hr>
                            </div>
        
                          
                                <div class="list-group ">
                                    <li class="list-group-item">
                                        @if ($is_spek >0)
                                        <i class="fas fa-check-circle mr-2 text-success"></i> 
                                        @else
                                        <i class="fas fa-circle mr-2 text-secondary"></i>
                                        @endif                                
                                        Spesifikasi Teknis 
                                        @if (auth()->user()->person->role->id == 3)
                                        @if ($is_spek >0)
                                        <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}">
                                                <span class="badge badge-secondary float-right">edit</span>
                                        </a>
                                        @else
                                        <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}">
                                                <span class="badge badge-secondary float-right">buat spesifikasi</span>
                                        </a>
                                        @endif    

                                        
                                        @endif
                                        
                                    </li>
                                    <li href="#" class="list-group-item ">
                                        @if (!$is_not_hps >0)
                                        <i class="fas fa-check-circle mr-2 text-success"></i>
                                        @else
                                        
                                        @endif
                                            
                                        HPS :
                                        @if ($paket->total_hps)
                                        Rp.<a href="" style="color:#566787;font-family:'Courier New', Courier, monospace"><strong>  {{ number_format($paket->total_hps,0,',','.')}}</strong></a>
                                        @endif
                                        @if (auth()->user()->person->role->id == 3)
                                        @if (!$is_not_hps >0)
                                        <a href="{{route('paket.detail.hps',['id'=>$paket->id])}}"><span class="badge badge-secondary float-right">edit rincian</span></a>
                                        @else
                                        <a href="{{route('paket.detail.hps',['id'=>$paket->id])}}"><span class="badge badge-secondary float-right">buat rincian</span></a>
                                        @endif
                                        
                                        @endif
                                            
                                    </li>
                                    <li class="list-group-item ">Kerangka Acuan Kerja</li>
                                    <li class="list-group-item ">Rancangan Kontrak</li>
                                </div>
                                <br>
                                <hr>
                                <div class="list-group">
                                        <li class="list-group-item ">Surat Permohonan Pengadaan <button class="btn btn-secondary btn-sm float-right" id="permohonan_show">Kirim</button></li>
                                        
                                </div>
                        </div>

            </div>

            <div class="row-md-8">
                    <div class="card ">
                        <div class="col-3 float-left ml-3 pt-2 pb-2 ">
                        <a href="{{route('paket.index')}}" class="btn btn-outline-info"> Kembali</a>    
    
                        </div>
                        
                    </div>
            </div>
        </div>

    </div>
@endsection

@section('addStyle')
    <style>
        ul.list-group:after {
  clear: both;
  display: block;
  content: "";
}


    </style>
@endsection

@section('addScript')
    <script>
    $(document).ready(function(){
       
        $("#permohonan_show").click(function(){
            Swal.fire({
            title: '',
            text: "Kirim Surat Permohonan Pengadaan Kepada PP?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
            }
        })
        });
    });
    </script>
@endsection
@extends('Admin.layout')

@section('konten')
    <div class="container">
            <div class="row-md-8">
                    <nav aria-label="breadcrumb ">
                       
                        <ol class="breadcrumb arr-right bg-info ">
                       
                          <li class="breadcrumb-item "><a href="#" class="text-light">Paket</a></li>
                       
                          <li class="breadcrumb-item text-light active " aria-current="page">Dokumen Persiapan Pengadaan</li>
                       
                       
                        </ol>
                       
                    </nav>
                </div>
        <div class="col-md-8 mt-5" style="width:50%;margin:auto;">
            <div class="row-md-8">
                    <div class="card card-outline card-info shadow p-2" style="font-family:QuickSand;font-size:12px; ">
                            <div class="card-header text-center" style="font-size:16px;">
                                Dokumen Persiapan Pengadaan
                                <hr>
                            </div>
        
                          
                                <div class="list-group ">
                                    <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="list-group-item list-group-item-action">      
                                        Spesifikasi Teknis                            
  
                                    </a>
                                    <a href="{{route('paket.detail.hps',['id'=>$paket->id])}}" class="list-group-item list-group-item-action">
                                            
                                        HPS :
                                        @if ($paket->total_hps)
                                        Rp.<span  style="color:#566787;font-family:'Roboto">
                                            <strong>  {{ number_format($paket->total_hps,0,',','.')}}</strong>
                                            </span>
                                            
                                        @endif

                                            
                                    </a>
                                </div>
                                <br>
                                <hr>
                                <div class="list-group">
                                        <button class="list-group-item list-group-item-action" id="Permohonan">Kirim Permohonan Pengadaan </button>
                                        
                                </div>
                        </div>

            </div>

            <div class="row-md-8">
                    <div class="card shadow">
                        <div class="col-3 float-left ml-3 pt-1 pb-2 ">
                        <a href="{{route('paket.detail',[$paket->id])}}" class="btn btn-outline-info"> Kembali</a>    
    
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
.arr-right .breadcrumb-item+.breadcrumb-item::before {
 
 content: "›";

 vertical-align:top;

 color: #408080;

 font-size:35px;

 line-height:18px;

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
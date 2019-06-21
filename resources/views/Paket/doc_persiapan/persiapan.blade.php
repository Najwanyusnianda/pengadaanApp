@extends('Admin.layout')

@section('link_bread')
                           
<li class="breadcrumb-item "><a href="#" class="text-light">Paket</a></li>
                       
<li class="breadcrumb-item text-light active " aria-current="page">Dokumen Persiapan Pengadaan</li>


@endsection
@section('konten')
    <div class="container">

        <div class="col-md-8 mt-5" id="persiapan-component" style="margin:auto;">
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
    
                                <hr>
                                <div class="col-3 float-left  pt-1 pb-2 ">
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

#persiapan-component{
    width:50%
}

@media screen and (min-width: 769px) and (max-width: 1023px) {
    #persiapan-component{
    width:100%
}
}

@media screen and (max-width: 991px) {
#persiapan-component{
    width:100%;
}
}
.list-group a{
    font-size: 15px;

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
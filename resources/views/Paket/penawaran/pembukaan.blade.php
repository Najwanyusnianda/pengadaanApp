@extends('Admin.layout')

@section('konten')
<div class="container ">
                <div class="row-md-8">
                                <nav aria-label="breadcrumb ">
                                   
                                    <ol class="breadcrumb arr-right bg-info ">
                                   
                                      <li class="breadcrumb-item "><a href="#" class="text-light">Paket</a></li>
                                   
                                      <li class="breadcrumb-item text-light active " aria-current="page">Pembukaan, Evaluasi, Klarifikasi dan Negosiasi Teknis</li>
                                   
                                   
                                    </ol>
                                   
                                </nav>
                </div>
        <div class="col-md-8 mt-5" style="width:50%;margin:auto;">
            <div class="row-md-8">
                    <div class="card card-outline card-info shadow p-2" style="font-family:QuickSand;font-size:12px; ">
                            <div class="card-header text-center" style="font-size:16px;">
                                Pembukaan, Evaluasi, Klarifikasi dan Negosiasi Teknis dan Harga
                                <hr>
                            </div>
        
                          
                                <div class="list-group ">
                                        <a  class="list-group-item list-group-item-action" href="{{route('paket.detail.klarifikasi_teknis',['id'=>$paket->id])}}">Klarifikasi dan Negosisasi Teknis dan Harga</a>
                                        <a  class="list-group-item list-group-item-action" href="{{route('paket.detail.pembukaan_evaluasi',['id'=>$paket->id])}}">Pembukaan Penawaran</a>
                                        <a  class="list-group-item list-group-item-action" href="{{route('paket.detail.pembukaan_evaluasi',['id'=>$paket->id])}}">Evaluasi Administrasi, Teknis dan Harga</a>
                                       

                                </div>
                                <br>
                                <hr>
                                <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action">Berita Acara Hasil Pengadaan Langsung</a>
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
    .arr-right .breadcrumb-item+.breadcrumb-item::before {
 
 content: "›";

 vertical-align:top;

 color: #408080;

 font-size:35px;

 line-height:18px;

}
    </style>
@endsection
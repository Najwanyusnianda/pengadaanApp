@extends('Admin.layout')

@section('konten')
<div class="container mt-5">
        <div class="col-md-8" style="width:50%;margin:auto;">
            <div class="row-md-8">
                    <div class="card card-outline card-info shadow p-2" style="font-family:QuickSand;font-size:12px; ">
                            <div class="card-header text-center" style="font-size:16px;">
                                Pembukaan, Evaluasi, Klarifikasi dan Negosiasi Teknis
                                <hr>
                            </div>
        
                          
                                <div class="list-group ">
                                        <li  class="list-group-item list-group-item-action">Klarifikasi dan Negosisasi Teknis dan Harga <a href="{{route('paket.detail.klarifikasi_teknis',['id'=>$paket->id])}}" class="badge badge-info float-right">buat</a></li>
                                        <li  class="list-group-item list-group-item-action">Pembukaan, Evaluasi, Klarifikasi, Negosiasi Penawaran <a href="{{route('paket.detail.pembukaan_evaluasi',['id'=>$paket->id])}}" class="badge badge-info float-right">buat</a></li>

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
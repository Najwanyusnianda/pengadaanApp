@extends('Admin.layout')

@section('link_bread')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active"><a href="{{route('paket.index')}}">Paket</a></li>
<li class="breadcrumb-item active">Detail {{$paket->id}}</li>
@endsection

@section('konten')
    <style>
    th{
        font-family: 'Roboto';
        font-weight:bold;
    }
    </style>
    <div class="container card" style="font-family:QuickSand;font-size:12px;">
        <table class="table table-bordered m-2">
            <tbody>
                <tr>
                    <th width=30%>Penanggung jawab</th>
                    <td>
                            <div class="btn-group" >
                                <button  class="btn btn-outline-secondary" style="font-family:QuickSand;font-size:12px;">Pilih PPK</button>
                                <button  class="btn btn-circle btn-outline-secondary" style="font-family:QuickSand;font-size:12px;">Pilih PP</button>
                           </div>
                    </td>
                </tr>
                <tr>
                    <th>Dokumen Persiapan Pengadaan</th>
                    <td>
                        <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action">Spesifikasi Teknis</a>
                                <a href="#" class="list-group-item list-group-item-action">HPS</a>
                                <a href="#" class="list-group-item list-group-item-action">Kerangka Acuan Kerja</a>
                                <a href="#" class="list-group-item list-group-item-action">Rancangan Kontrak</a>
                        </div>
                        <hr>
                        <div class="card-footer">
                            <button type="button" class="btn btn-sm btn-primary float-right shadow" >
                                <i class="fa fa-download"></i> Generate Berkas
                            </button>
                            <button type="button" class="btn btn-sm btn-success float-right shadow mr-1" >
                                <i class="fa "></i> Preview
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Pengadaan Langsung</th>
                    <td>
                        <div class="d-block">
                            <button class="btn btn-sm btn-outline-secondary" style="font-family:QuickSand;font-size:12px;">
                            <a href="{{route('paket.detail.penyedia',['id'=>$paket->id])}}">
                                Tambah Penyedia
                            </a>    
                            </button>
                            <button class="btn btn-sm btn-outline-secondary" style="font-family:QuickSand;font-size:12px;">
                                
                            <a href="{{route('paket.detail.pembukaan_evaluasi',['id'=>$paket->id])}}">
                                        Buat Jadwal Penawaran
                            </a>
                            </button>
                        </div>
                        <hr>
                        <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action">Undangan Pengadaan</a>
                                <a href="#" class="list-group-item list-group-item-action">Surat Penawaran <small>(Upload)</small></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Penawaran</th>
                    <td>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">Pembukaan, Evaluasi, Klarifikasi, Negosiasi Penawaran</a>
                            <a href="#" class="list-group-item list-group-item-action">Klarifikasi dan Negosisasi Teknis dan Harga</a>
                            <a href="#" class="list-group-item list-group-item-action">Hasil Pengadaan Langsung</a>
                            
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Kontrak</th>
                    <td>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">Surat Perintah Kerja</a>
                        </div>
                    </td>
                </tr>
            
            </tbody>
        </table>
    </div>
@endsection
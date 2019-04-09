@extends('Admin.layout')

@section('konten_head')
    <div class="card shadow mb-4 ">
        <div class="card-header bg-white p-2">
            <ul class="nav nav-pills" style="font-size:14px">
                <li class="nav-item">
                    <a class="nav-link" href="#activity" data-toggle="tab">Semua
                            <span class="right badge badge-danger"> 10</span>
                    </a>
                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#activity" data-toggle="tab">Dikerjakan
                            <span class="right badge badge-danger"> 10</span>
                    </a>
                   
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#activity" data-toggle="tab">Selesai
                            <span class="right badge badge-danger"> 10</span>
                    </a>
                </li>
    
    </ul>
        </div>
    </div>
@endsection

@section('konten')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
        </div>
        @if (count($permintaan)>0)
        <div class="card-body" style="font-size:12px">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr role="row" >
                            <th>No</th>
                            <th>Judul</th>
                            <th>Subject Matter</th>
                            <th>Kode Kegiatan</th>
                            <th>Nilai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="color:black"> 
                        @foreach ($permintaan as $data)
                            <tr role="row" class="odd">
                                <td>1</td>
                                <td>{{$data->judul}}</td>
                                <td>{{$data->nama_bagian}}</td>
                                <td>{{$data->kode_kegiatan}}</td>
                                <td>{{$data->nilai}}</td>
                                <td>
                                    <span class="badge badge-danger">{{$data->disposisi_status}}</span>
                               <!-- <span class="badge badge-success">Success</span>
                                <span class="badge badge-danger">Danger</span>
                                <span class="badge badge-warning">Warning</span>-->
                                </td>
                                <td>
                                    <a href="#" class="btn btn-info btn-xs ">
                                        Detail
                                    </a>
                                </td> 
                            </tr>                             
                        @endforeach
                                                 
                                          
                    </tbody>
                    <tfoot>
                     
                    </tfoot>
                </table>
        </div>
        @else
            <p>tidak ada permintaan</p>
        @endif
        
    </div>
@endsection

@section('addStyle')
    <style>
        .btn-xs{
        
        font-size: 14px;    
        padding-top: 1px;
        padding-bottom: 1px;
        border-radius: 0%;
    }
    </style>
    
@endsection
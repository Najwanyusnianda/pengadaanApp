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
                    <a class="nav-link" href="#activity" data-toggle="tab">Disposisi
                            <span class="right badge badge-danger"> 10</span>
                    </a>
                   
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#activity" data-toggle="tab">dikerjakan
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
        <div class="card-body">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr role="row">
                            <th>No</th>
                            <th>Judul</th>
                            <th>Subject Matter</th>
                            <th>Kode Kegiatan</th>
                            <th>Nilai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <tr role="row" class="odd">
                          <td>1</td>
                          <td>Fullboard Pembinaan Change Agent Network</td>
                          <td>Bagian Transformasi Statistik</td>
                          <td></td>
                          <td>A</td>
                        </tr>
                    </tbody>
                        <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Rendering engine</th>
                            <th rowspan="1" colspan="1">Browser</th>
                            <th rowspan="1" colspan="1">Platform(s)</th>
                            <th rowspan="1" colspan="1">Engine version</th>
                            <th rowspan="1" colspan="1">CSS grade</th>
                        </tr>
                        </tfoot>
                </table>
        </div>
    </div>
@endsection
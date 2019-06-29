@extends('Admin.layout')
@section('link_bread')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Paket</li>

@endsection
@section('konten')
<div class="container-fluid">
    <div class="col-md-12" style="width:100%;margin:auto;">
        <div class="row">

        </div>
        <div class="row-md-12 justify-content-center" >
            <div class="card shadow" style="font-family:Roboto,sans-serif">
                <div class="card-header" class="justify-content-between" >
                   
                        <h6 style="font-weight:550">Daftar Paket Pengadaan</h6>
                 
                    <div class="card-tools float-right">
                    </div>

                </div>
                <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif;">
                   <div class="table-responsive">
                        <table class="table table-condensed table-hover " id="paketTable">

                                <thead>
                                    <tr style="font-family:Valera Round, sans-serif;">
                                        <th>#</th>
                                        <th style="width:60%">Nama Paket</th>
                                        <th>Jenis Pengadaan</th>
                                        <th>Nilai Anggaran</th>
                                        <th>tanggal dikerjakan</th>
                                        <th>Status</th>
                                        <th>aksi</th>
                                      
                                    </tr>
                                </thead>
                
                                <tbody style="font-family:'Varela Round', sans-serif;font-size:13px;">
        
                                </tbody>
                            </table>     
                   </div>
   

      
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

@section('addScript')
    <script>
            $('#paketTable').DataTable({
            responsive:true,
            processing:true,
            serverSide:true,
            ajax:"{{route('table.paket')}}",
            columns:[
                {data: 'DT_RowIndex', name: 'DT_Row_Index' , orderable: false, searchable: false},
                {data:'judul'},
                {data:'jenis_pengadaan'},
                {data:'nilai_rp'},
                {data:'created_at'},
                {data:'status'},
                {data:'action',orderable: false,searchable: false}]})
    </script>
@endsection
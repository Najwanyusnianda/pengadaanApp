@extends('Admin.layout')

@section('konten')
    <div class="container mt-5">
        <div class="card">
                
        </div>
        <div class="card p-3">
         <div class="card-header">
                <h5>Pilih Penyedia</h5>
         <span class="text text-muted ">Pilih penyedia untuk pengadaan <b>{{$permintaan->judul}}</b></span>
         </div>
         <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-condensed m-2" id="penyedia_table">
                            <thead>
                                    <tr>
                                            <th>#</th>
                                            <th>NPWP</th>
                                            <th>nama</th>
                                            <th>alamat</th>
                                            <th>telephone</th>
                                            <th>Pilihan</th>
                                        </tr>
                            </thead>
    
                            <tbody>
    
                            </tbody>
    
                                
                            </table>
                </div>
         </div>


        </div>
    </div>
@endsection

@section('addScript')
    <script>
    $(document).ready(function(){
        $('#penyedia_table').DataTable({
            responsive:true,
            processing:true,
            serverSide:true,
            ajax:"{{route('table.penyedia')}}",
            columns:[
                {data: 'DT_RowIndex', name: 'DT_Row_Index' , orderable: false, searchable: false},
                {data:'npwp'},
                {data:'nama'},
                {data:'alamat'},
                {data:'telepon'},
                {data:'action'},
            ]
        })
    })
    </script>
@endsection
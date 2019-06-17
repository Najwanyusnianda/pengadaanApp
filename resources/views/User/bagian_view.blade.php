@extends('Admin.layout')

@section('konten')
    <div class="container">
        <div class="col-md-8" style="margin:auto;">
                <div class="card shadow-lg">
                        <div class="card-header">
                          <h3 class="card-title" style="font-family:Roboto;">Daftar Subject Matter (Subdirektorat)</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table class="table table-condensed" id="bagianTable" style="font-family:'Varela Round';font-size:13px;">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>kode bagian</th>
                                                    <th>Nama Bagian</th>                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                     
                                            </tbody>
                                    </table>                        
                            </div>
        
                        </div>
                        <!-- /.card-body -->
                    </div>
        </div>

    </div>
@endsection


@section('addScript')
    <script>
        $(document).ready(function(){
            $('#bagianTable').DataTable({
                responsive:true,
                processing:true,
                serverSide:true,
                ajax:"{{route('table.bagian')}}",
                columns:[
                {data: 'DT_RowIndex', name: 'DT_Row_Index' , orderable: false, searchable: false},
                {data:'kode_bagian'},
                {data:'nama_bagian'}
                ]
            });

        
        })

    </script>    
@endsection
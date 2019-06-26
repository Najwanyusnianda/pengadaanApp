@extends('Admin.layout')

@section('konten')
    <div class="container">
        <div class="col-md-8" style="margin:auto;">
                <div class="card shadow-lg">
                        <div class="card-header">
                          <h3 class="card-title" style="font-family:Roboto;">Daftar Subject Matter (Subdirektorat)</h3>
                          <a href="" class="btn btn-primary float-right">Tambah Subject matter</a>
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
                                                    <th>aksi</th>                  
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
                {data:'nama_bagian'},
                {data: 'action'}
                ]
            });

        $('body').on('click','.delete_bagian',function(e){
            e.preventDefault();
            var me = $(this);
            var id= me.attr('data-id');
            var url='/bagian/'+id+'/delete'
            Swal.fire({
                title: 'Are you sure?',
                text: "Bagian akan dihapus secara permanen",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
                        });

                        $.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
                        data: {
                            _method:'DELETE',
                            _token: $('meta[name="csrf-token"]').attr('content'),      
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'Bagian telah dihapus.',
                                'success'
                                );
                                $('#bagianTable').DataTable().ajax.reload();
                        }
                    });
                }
                })
        })
        
        })

    </script>    
@endsection
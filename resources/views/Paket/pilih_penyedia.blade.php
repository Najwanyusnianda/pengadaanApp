@extends('Admin.layout')

@section('konten')
    <div class="container mt-5">
        <div class="card">
                
        </div>
        <div class="card p-3">
         <div class="card-header">
                <h5>Pilih Penyedia</h5>
         <span class="text text-muted ">Pilih penyedia untuk pengadaan <b>{{$permintaan->judul}}</b></span>
         <hr>

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
         <div class="card-footer">
                <p>Tidak ada penyedia?  <a class="badge badge-primary" href="{{route('paket.detail.penyedia',['id'=>$paket_id])}}">Tambah Penyedia Baru</a></p>

        </div>


        </div>
    </div>
@endsection

@section('addScript')
    <script>
    $(document).ready(function(){
       // var penyedia_button=$('.pilih_penyedia');
      
        $('#penyedia_table').DataTable({
            responsive:true,
            processing:true,
            serverSide:true,
            ajax:"{{route('table.penyedia',['id'=>$paket_id])}}",
            columns:[
                {data: 'DT_RowIndex', name: 'DT_Row_Index' , orderable: false, searchable: false},
                {data:'npwp'},
                {data:'nama'},
                {data:'alamat'},
                {data:'telepon'},
                {data:'action'}
            ]
        });
        $('body').on('click','.pilih_penyedia',function(e){

                e.preventDefault();
                me=$(this);
                var npwp=me.attr('data-id');
            
                var paket_id={{$paket_id}}
                var url='/paket/penyedia/pilih/store';
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
                        // change data to this object
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id_paket: paket_id,
                        npwp: npwp,
                     
                        
                    },
                    success: function(result) {
                        swal.fire({
                             title: 'Memilih Penyedia'
                        });
                        Swal.showLoading();
                        setTimeout(function() {
                            window.location.href = "{{route('paket.detail',[$paket_id])}}";
                        }, 2000);
                    },error:function(){
                        alert('error');
                    }

                });

        });

    })
    </script>
@endsection
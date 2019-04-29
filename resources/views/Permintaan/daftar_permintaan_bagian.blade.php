@extends('SubBagian.sub_bagian_index')

@section('konten_bagian')
<div class="container">
        @if(Session::has('success'))
        <div class="alert alert-success" style="background-color:#7bed9f; color:white;font-weight:bold;">{{session('success')}}</div>
        @endif

        <div class="card shadow mb-4 permintaan-card mt-3" style="font-family:QuickSand;">
                <div class="card-header py-3" style="background-color:#2c3e50;">
                <h6 class="m-0  " style="color:white;">Daftar Permintaan <span class="font-weight-bold">{{auth()->user()->sub_bagian->nama_bagian}}</span></h6>
                </div>
                @if (count($permintaan_bagian)>0)
                <div class="card-body" style="font-size:13px">
                        <table id="example2" class="table table-bordered table-hover dataTable table-responsive" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row" >
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Jenis Pengadaan</th>
                                    <th>Kode Kegiatan</th>
                                    <th>Nilai</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="color:black"> 
                                @foreach ($permintaan_bagian as $key=>$data)
                                    <tr role="row" class="odd">
                                        <td>{{$key+1}}</td>
                                        <td class="judul" >{{$data->judul}}  
                                            <small>
                                                <span class="badge badge-secondary ml-2">{{\Carbon\Carbon::parse($data->created_at)->diffForHumans()}}</span>
                                            </small> 
                                        </td>
                                        <td >{{$data->jenis_pengadaan}}</td>
                                        <td>{{$data->kode_kegiatan}}</td>
                                        <td>{{$data->nilai}}</td>
                                        <td>
                                                <span class="badge {{$data->disposisi_status ==  'baru' ? 'badge-danger' : ($data->disposisi_status == 'dikerjakan' ? 'badge-success' : 'badge-warning')}}">{{$data->disposisi_status}}</span>
                                        </td>
                                        <td>
                                                <div class="btn-group">
                                                    <a  class="btn btn-link" href="{{route('permintaan.edit',['bagian'=>auth()->user()->sub_bagian->kode_bagian,'id'=>$data->id])}}">
                                                        <i class="fas fa-pencil-alt " style="color:#f39c12;"></i>
                                                    </a>
                                                    <a  class="btn btn-link" data-id="{{$data->id}}" id="delete_permintaan">
                                                        <i class="fas fa-trash-alt" style="color:#c0392b;"></i>
                                                    </a>
                                                    <a class="btn btn-link permintaan-show" data-id="{{$data->id}}">
                                                            <i class="fas fa-eye " style="color:#2980b9;"></i>
                                                    </a>
                                                </div>
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
</div>

<div class="modal fade permintaan_modal" id="exampleModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content detail-permintaan"  id="detail_body" style="width:800px;">
           
            


          </div>
        </div>
</div>

@endsection

@section('addStyle')
    <style>
        .btn-group > a{
            opacity: 0.5;
        }
          .btn-group > a:hover{
            opacity: 1;
        }
    </style>
@endsection

@section('addScript')
    <script>
          $('body').on('click','.permintaan-show',function(e){
            e.preventDefault();

            
            var me = $(this);
            var id= me.attr('data-id');
            var me = me.parent().parent();
            var judul=me.find('.judul').text();
            console.log(id);
          
            //get disposisi form
            $.ajax({
                url: '/permintaan/'+id,
                dataType: 'html',
                success: function(response) {
                $('#detail_body').html(response);
               
                }
            });
            $('.permintaan_modal').modal('show');

        });

        $('body').on('click','#delete_permintaan',function(e){
            e.preventDefault();
            var me = $(this);
            var id= me.attr('data-id');
            var url='/permintaan/'+id+'/delete'
            Swal.fire({
                title: 'Are you sure?',
                text: "Permintaan akan dihapus secara permanent",
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
                                'Your file has been deleted.',
                                'success'
                                );
                        }
                    });
                }
                })
        })
    </script>
@endsection
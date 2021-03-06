@extends('Admin.layout')

@section('konten')
<div class="container-fluid">
    <div class="col-md-12" style="margin:auto;">

     <!-- END OF PILLS --> 


        <div class="row-md-12  " >
            <div class="card shadow" >  
                <div class="card-header">
                        <div class="" id="register-item" style="font-family:Roboto;">
                            
                                <h5>Daftar Pegawai</h5>
                                <button class="btn btn-sm btn-primary float-right"  id="register-show"  >
                                        <i class="fas fa-user-plus"></i>
                                        Tambah Pegawai
                                </button>
                        </div>
                </div>
                    @include('User._user_semua')
               <!-- <div class="tab-content m-2 p-2" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                </div>-->
            </div>  
        </div>  

    
    </div>  
    
    <div class="col-md-6">
        
    </div>
</div>

<!-- end tab-content -->


<!-- modal add user -->

<div class="modal fade register_modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
           
            <div class="" id="form_register">
              
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
                    <button  class="btn btn-primary btn-block btn-flat shadow" id="register_x" > Register</button>
            </div>
          </div>
        </div>
    </div>


@endsection

@section('addStyle')
    <style>
        #register-item > a {
            opacity:0.5;
        }
        #register-item > a:hover{
            opacity: 1;
        }
    </style>
@endsection

@section('addScript')
    <script>
        
        $(document).ready(function(){
            $('#register_x').click(
                function(e){
                var url="{{route('user.post.register')}}"
                var nama= $('#nama').val(),
                nip= $('#nip').val(),
                role=$('#role').val(),
                username= $('#username').val(),
                password= $('#password').val();
            
                //console.log(url+'||'+nama+'||'+nip+'||'+role+'||'+username+'||'+password);
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
                        nama: $('#nama').val(),
                        nip: $('#nip').val(),
                        role: $('#role').val(),
                        email:$('#email').val(),
                        username: $('#username').val(),
                        password: $('#password').val(),
                        
                    },
                    success: function(result) {
                        Swal.fire(
                                'Ditambahkan!',
                                'Anggota telah ditambahkan.',
                                'success'
                                );
                        $("#close").trigger("click");
                        $('#userTable').DataTable().ajax.reload();
                    }
                });
                }
            )
            
            $('#register-show').click(function(e){
                e.preventDefault();
            
                var url="{{route('user.form.register')}}"
                $.ajax({
                    url: url,
                    dataType: 'html',
                    success: function(response) {
                    $('#form_register').html(response);
                    }
                });
                $('.register_modal').modal('show');
            });

            $('#userTable').DataTable({
                responsive:true,
                processing:true,
                serverSide:true,
                ajax:"{{route('table.user')}}",
                columns:[
                {data: 'DT_RowIndex', name: 'DT_Row_Index' , orderable: false, searchable: false},
                {data:'nama'},
                {data:'nip'},
                {data:'deskripsi'},
                {data:'username'},
                {data:'email'},
                {data:'action'}
                ]
            });

        $('body').on('click','.delete_user',function(e){
            e.preventDefault();
            var me = $(this);
            var id= me.attr('data-id');
            var url='/user/'+id+'/delete'
            Swal.fire({
                title: 'Hapus?',
                text: "Data Pegawai akan dihapus secara permanen",
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
                                $('#userTable').DataTable().ajax.reload();
                        }
                    });
                }
                })
        })

        $('body').on('click','.edit_user',function(e){
            e.preventDefault();
            me=$(this)
            var row=me.parent().parent().parent();
            var nama= row.children().eq(1)
            var nip=row.children().eq(2)
            var username=row.children().eq(4)
            var email=row.children().eq(5)
            person_id=me.attr('data-id');
            var url="{{route('user.form.register')}}"
                $.ajax({
                    url: url,
                    dataType: 'html',
                    success: function(response) {

                    $('#form_register').html(response);
                    }
                });
                $('.register_modal').modal('show');
        })

        $('#updated_x').click(
                function(e){
                var url="{{route('user.post.register')}}"
                var nama= $('#nama').val(),
                nip= $('#nip').val(),
                role=$('#role').val(),
                username= $('#username').val(),
                password= $('#password').val();
            
                //console.log(url+'||'+nama+'||'+nip+'||'+role+'||'+username+'||'+password);
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
                        nama: $('#nama').val(),
                        nip: $('#nip').val(),
                        role: $('#role').val(),
                        email:$('#email').val(),
                        username: $('#username').val(),
                        password: $('#password').val(),
                        
                    },
                    success: function(result) {
                        Swal.fire(
                                'Updated!',
                                'Anggota telah diupdate.',
                                'success'
                                );
                        $("#close").trigger("click");
                        $('#userTable').DataTable().ajax.reload();
                    }
                });
                }
            )
        })    
        
    </script>
@endsection
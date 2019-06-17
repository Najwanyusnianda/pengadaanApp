@extends('Admin.layout')

@section('header_name')
<h2>User Management</h2>
<h6>Project: <strong style="color:cornflowerblue">{{$project->nama}}</strong></h6>
<div class="">
    <button type="button" id="add_user_project" class="btn btn-info btn-sm ">
        Tambahkan Pengguna 
    </button>
</div>
@endsection
@section('konten')
    <div class="container">
        <div class="row">
            <div id="project_" project-id={{$project->id}}>
                
            </div>
        </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card  card-outline card-info shadow" id="addULP">
            <div class="card-header">
              
              <b class="align-center">Unit Pelayanan Pengadaan</b>
              <button class="btn float-right">
                <i class="fas fa-user-plus " style="color:#95a5a6"></i>
              </button>
            </div>
            <div class="card-body" style="padding-left: 10px;padding-right: 10px;">
              <div class="list-group">
                  @if (count($data_kulp)>0)
                  @forelse ($data_kulp as $data)
                  <li>
                      <td>{{$data->nama}}</td>                     
                  </li>    
                  @empty
                     
                  @endforelse
                  @else
                  <li class="list-group-item">Tidak Ada Kepala Ulp</li>
                  @endif
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card  card-outline card-info shadow">
            <div class="card-header">
              
              <b class="align-center">Pejabat Pengadaan</b>
              <button class="btn float-right">
                <i class="fas fa-user-plus " style="color:#95a5a6"></i>
              </button>
            </div>
            <div class="card-body">
              <div class="list-group">
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <div class="card  card-outline card-info shadow">
                <div class="card-header">
                  
                  <b class="align-center">Pejabat Pembuat Komitmen</b>
                  <button class="btn float-right">
                    <i class="fas fa-user-plus " style="color:#95a5a6"></i>
                  </button>
                </div>
                <div class="card-body">
                  <div class="list-group">
                    
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>


    <!-- modall pegawai-->

    <div class="modal fade" id="modalListUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pilih Pegawai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="row">
                <div class="col-md-7" id="pegawai_in_list">

                </div>
                <div class="col-md-3" id="role_in_list">

                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"></button>
              <button type="button" class="btn btn-primary user_save">Pilih Pegawai</button>
            </div>
          </div>
        </div>
    </div>

    
    <!-- modall role-->
    <div class="modal fade" id="modalListRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pilih Role</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary user_save">Save changes</button>
            </div>
          </div>
        </div>
    </div>


    <!-- user choose-->
    <div class="modal fade userChoose" id="choose" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header" id="userChoose_modalHeader">
              <h5 class="modal-title"  id="disposisi_title"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary btn-block" id="user_save">Tambahkan</button>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('addStyle')
    <style>
    #modalListRole {
    top:5%;
    right:50%;
    outline: none;
    overflow:hidden;
    }
    </style>
@endsection

@section('addScript')
    <script>
      $(document).ready(function(){
        var modalUser=$('#modalListUser');
        var modalRole=$('#modalListRole')
        $('#addULP').click(function(e){
          e.preventDefault();


        });

        $('.user_save').click(function(e){
          e.preventDefault();
          var project_id=$('#project_').attr('project-id')
          $.ajax({
                url: '/available/user/'+project_id,
                dataType: 'html',
                success: function(response) {
                $('#pegawai_in_list').html(response);
                //$('.modal-title').html(judul);
                }
            });
           
          modalUser.modal("show");       
        });

        $('#add_user_project').click(function(event){
    event.preventDefault();
    var project_id=$('#project_').attr('project-id')
    $.ajax({
                url: '/available/user/'+project_id,
                dataType: 'html',
                success: function(response) {
                $('.modal-body').html(response);
                //$('.modal-title').html(judul);
                }
            });
            $('#choose').modal('show');


})


$('#user_save').click(function(){

  var role_id=$('#role_choose').val();
  var jabatan_id;
  if(role_id=='2'){
    jabatan_id=$('#pp_choose').val();

  }else if(role_id=='3'){
    jabatan_id=$('#ppk_choose').val();
  }else{
    jabatan_id==null;
  }
               
  $.ajaxSetup({
      headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
  }); 
    $.ajax({
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/project/enrollment/save',
        data: {
            // change data to this object
            _token: $('meta[name="csrf-token"]').attr('content'),
            project_id: $('#project_').attr('project-id'),
            person_id: $('#pegawai_choose').val(),
            role_id:$('#role_choose').val(),
            jabatan_id:jabatan_id
            
        },
        success: function(result) {
            //console.log(result);
            Swal.fire(
                'Sukses',
                'Pengguna Telah di Tambahkan!',
                'success'
                )
            //permintaanTable.ajax.reload();
          
            $("#close").trigger("click");
            setTimeout(
                  function() 
                  {
                     location.reload();
                  }, 1000);
        },error:function(){
            alert('error');
        }

    });
})
      })
    </script>
@endsection





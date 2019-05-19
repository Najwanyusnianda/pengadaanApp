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
  <div class="">
      <div class="row-sm-6">
          <div id="project_" project-id={{$project->id}}>
              
          </div>
      </div>

      <div class="row-6 ">
     
          <div class="card mt-1 p-1">
              <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-ULP" role="tab" aria-controls="pills-ULP" aria-selected="true">ULP</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-PPK" role="tab" aria-controls="pills-PPK" aria-selected="false">PPK</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-PP" role="tab" aria-controls="pills-PP" aria-selected="false">PP</a>
                  </li>
              </ul>

          </div>

     

      </div>
      <div class="row-sm-6">
        

      </div>

      <div class="row-sm-6">
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-ULP" role="tabpanel" aria-labelledby="pills-home-tab">@include('Project._ulp_enrollment')</div>
          <div class="tab-pane fade" id="pills-PPK" role="tabpanel" aria-labelledby="pills-profile-tab"> @include('Project._ppk_enrollment')</div>
          <div class="tab-pane fade" id="pills-PP" role="tabpanel" aria-labelledby="pills-contact-tab"> @include('Project._pp_enrollment')</div>
        </div>
      </div>



  </div>
</div>





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

@section('addScript')
   
<script>

$(document).ready(function(){
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



/*
$('body').on('click','.simpan',function(e){
  //e.preventDefault();

  var me=$(this);
  var role_id='2'
  var jabatan_id=me.attr('data-id');
  var url= '/project/enrollment/save'
  var person_id=me.parent().parent().find('.pp').val();
  console.log(role_id,'|',jabatan_id,'|',person_id);
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
                        project_id: $('#project_').attr('project-id'),
                        person_id: person_id,
                        role_id:role_id,
                        jabatan_id:jabatan_id

                        
                    },
                    success: function(result) {
                        //console.log(result);
                        Swal.fire(
                            'User ditambahkan!',
                            'berhasil Telah Terkirim!',
                            'success'
                            )
                        //permintaanTable.ajax.reload();
                      
                        $("#close").trigger("click");
                    },error:function(){
                        alert('error');
                    }

                });
  
})


//ppk save
$('body').on('click','.simpan_ppk',function(e){
  //e.preventDefault();

  var me=$(this);
  var role_id='3'
  var jabatan_id=me.attr('data-id');
  var url= '/project/enrollment/save'
  var person_id=me.parent().parent().find('.pp').val();
  console.log(role_id,'|',jabatan_id,'|',person_id);
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
                        project_id: $('#project_').attr('project-id'),
                        person_id: person_id,
                        role_id:role_id,
                        jabatan_id:jabatan_id

                        
                    },
                    success: function(result) {
                        //console.log(result);
                        Swal.fire(
                            'User ditambahkan!',
                            'berhasil Telah Terkirim!',
                            'success'
                            )
                        //permintaanTable.ajax.reload();
                      
                        $("#close").trigger("click");
                    },error:function(){
                        alert('error');
                    }

                });
  
})
*/
})

</script>
@endsection
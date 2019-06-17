@extends('Admin.layout')

@section('header_name')


@endsection
@section('konten')
<div class="container">
    <div class="row-md-8">
        <nav aria-label="breadcrumb ">
           
            <ol class="breadcrumb arr-right  " style="background-color:#2c3e50">
           
              <li class="breadcrumb-item "><a href="/project" class="text-light">Project</a></li>
           
              <li class="breadcrumb-item text-light active" aria-current="page">User Project :{{$project->nama}}</li>
           
            </ol>
           
        </nav>
    </div>
    <div class="row-md-8">
        
            <button type="button" id="add_user_project" class="btn btn-info  ">
                Tambahkan Pengguna 
            </button>
   
        <div id="project_" project-id={{$project->id}}>
            
        </div>
    </div>
    <br>
  <div class="row">
    <div class="col-md-4">
      <div class="card  card-outline card-info shadow" id="addULP">
        <div class="card-header">
          
          <b class="align-center" style="font-family:Roboto">Unit Pelayanan Pengadaan</b>
          <button class="btn float-right">
            <i class="fas fa-user-plus " style="color:#95a5a6"></i>
          </button>
        </div>
        <div class="card-body" style="padding-left: 10px;padding-right: 10px;">
          <table class="table table-condensed" style="font-family:'Roboto', sans-serif;color:#566787;font-size:13px;">
            <thead>
                <tr>
                    <th></th>
                    <th>Nama</th>
                    <th>Role</th>
                  </tr>
            </thead>
            <tbody>
                @if (count($data_kulp)>0)
                  @forelse ($data_kulp as $data)
                  <tr>
                      <td width=20px;>
                          <img src="{{asset('img/user.png')}}" class="img-circle img-bordered-sm" alt="User Image" width="40px" height="40px">
                      </td> 
                      <td style="vertical-align:middle">
                        {{$data->nama}}
                      <small class="d-block">NIP.{{$data->nip}}</small>
                      </td>
                      <td style="vertical-align:middle"> 
                        <span class="badge badge-info">{{$data->deskripsi}}</span>
                        
                      </td>
                      
                  </tr>    
                  @empty
                    <tr>Tidak ada kepala ULP</tr>  
                  @endforelse
                @endif
              @if (count($data_kasi)>0)
                @forelse ($data_kasi as $data)
                <tr>
                    <td width=20px;>
                        <img src="{{asset('img/user.png')}}" class="img-circle img-bordered-sm" alt="User Image" width="40px" height="40px">
                    </td> 
                    <td style="vertical-align:middle">
                      {{$data->nama}}
                    <small class="d-block">NIP.{{$data->nip}}</small>
                    </td>
                    <td style="vertical-align:middle"> 
                      <span class="badge badge-info">{{$data->deskripsi}}</span>
                      
                    </td>
                    
                </tr>    
                @empty
                  <tr>Tidak ada kepala ULP</tr>  
                @endforelse
              @endif
              @if (count($data_staff)>0)
              @forelse ($data_staff as $data)
              <tr>
                  <td width=20px;>
                      <img src="{{asset('img/user.png')}}" class="img-circle img-bordered-sm" alt="User Image" width="40px" height="40px">
                  </td> 
                  <td style="vertical-align:middle">
                    {{$data->nama}}
                  <small class="d-block">NIP.{{$data->nip}}</small>
                  </td>
                  <td style="vertical-align:middle"> 
                    <span class="badge badge-info">{{$data->deskripsi}}</span>
                    
                  </td>
                  
              </tr>    
              @empty
                <tr>Tidak ada kepala ULP</tr>  
              @endforelse
            @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-4">
        <div class="card  card-outline card-info shadow" id="addULP">
          <div class="card-header">
            
            <b class="align-center" style="font-family:Roboto">Pejabat Pengadaan</b>
            <button class="btn float-right">
              <i class="fas fa-user-plus " style="color:#95a5a6"></i>
            </button>
          </div>
          <div class="card-body" style="padding-left: 10px;padding-right: 10px;">
            <table class="table table-condensed" style="font-family:'Roboto', sans-serif;color:#566787;font-size:13px;">
              <thead>
                  <tr>
                      <th></th>
                      <th>Nama</th>
                      <th>Role</th>
                    </tr>
              </thead>
              <tbody>
                @if (count($data_pp)>0)
                  @forelse ($data_pp as $data)
                  <tr>
                      <td width=20px;>
                          <img src="{{asset('img/user.png')}}" class="img-circle img-bordered-sm" alt="User Image" width="40px" height="40px">
                      </td> 
                      <td style="vertical-align:middle">
                        {{$data->nama}}
                      <small class="d-block">NIP.{{$data->nip}}</small>
                      </td>
                      <td style="vertical-align:middle"> 
                        <span class="badge badge-info">{{$data->kode_pp}}</span>
                        
                      </td>
                      
                  </tr>    
                  @empty
                    <tr>Tidak ada kepala ULP</tr>  
                  @endforelse
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <div class="col-md-4">
        <div class="card  card-outline card-info shadow" id="addULP">
            <div class="card-header">
              
              <b class="align-center" style="font-family:Roboto">Pejabat Pembuat Komitmen</b>
              <button class="btn float-right">
                <i class="fas fa-user-plus " style="color:#95a5a6"></i>
              </button>
            </div>
            <div class="card-body" style="padding-left: 10px;padding-right: 10px;">
              <table class="table table-condensed" style="font-family:'Roboto', sans-serif;color:#566787;font-size:13px;">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama</th>
                        <th>Role</th>
                      </tr>
                </thead>
                <tbody>
                  @if (count($data_ppk)>0)
                    @forelse ($data_ppk as $data)
                    <tr>
                        <td width=20px;>
                            <img src="{{asset('img/user.png')}}" class="img-circle img-bordered-sm" alt="User Image" width="40px" height="40px">
                        </td> 
                        <td style="vertical-align:middle">
                          {{$data->nama}}
                        <small class="d-block">NIP.{{$data->nip}}</small>
                        </td>
                        <td style="vertical-align:middle"> 
                          <span class="badge badge-info">{{$data->kode_ppk}}</span>
                          
                        </td>
                        
                    </tr>    
                    @empty
                      <tr>Tidak ada kepala ULP</tr>  
                    @endforelse
                  @endif
                </tbody>
              </table>
            </div>
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
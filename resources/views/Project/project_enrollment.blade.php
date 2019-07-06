@extends('Admin.layout')

@section('header_name')


@endsection
@section('konten')
<div class="container">

    <div class="row-md-8">
        

   
        <div id="project_" project-id={{$project->id}}>
            
        </div>
    </div>
    <br>

  <div class="row-md-8">
    <div class="card">
    <div class="card-header">
      Satuan Kerja
      <button type="button" id="add_user_project" class="btn btn-primary btn-sm float-right">
          Tambahkan Pengguna 
      </button>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Unit Layanan Pengadaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Pejabat Pengadaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Pejabat Pembuat Komitmen</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="table-responsive">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>NIP</th>
                      <th>jabatan</th>
                      <th>Aksi</th>
                    </tr>

                  </thead>
                  <tbody>
                      @if (count($data_kulp)>0)
                      @forelse ($data_kulp as $key=>$data)
                      <tr>
                      <td>#</td>
                          <td style="vertical-align:middle">
                            {{$data->nama}}
                         
                          </td>
                          <td style="vertical-align:middle"> 
                            
                            <span class="d-block">NIP.{{$data->nip}}</span>
                          </td>
                          <td><span class="badge badge-info">{{$data->deskripsi}}</span></td>  
                          <td>
                            <button class="btn btn-sm  change_member" data-id="{{$data->enroll_id}}"><i style="color:#c0392b;" class="fas fa-user-minus"></i></button>
                          </td>
                        </tr>    
                      @empty
                        <tr>Tidak ada kepala ULP</tr>  
                      @endforelse
                    @endif
                    @if (count($data_kasi)>0)
                    @forelse ($data_kasi as $data)
                    <tr>
                      <td>#</td>
                        <td style="vertical-align:middle">
                          {{$data->nama}}
                       
                        </td>
                        <td style="vertical-align:middle"> 
                       
                          <span class="d-block">NIP.{{$data->nip}}</span>
                        </td>
                        <td>
                            <span class="badge badge-info">{{$data->deskripsi}}</span>
                        </td>
                        <td>
                            <button class="btn btn-sm  change_member" data-id="{{$data->enroll_id}}"><i style="color:#c0392b;" class="fas fa-user-minus"></i></button>
                        </td>
                    </tr>    
                    @empty
                      <tr>Tidak ada kepala ULP</tr>  
                    @endforelse
                  @endif
                  @if (count($data_staff)>0)
                  @forelse ($data_staff as $key=>$data)
                  <tr>
                      <td># </td>
                      <td style="vertical-align:middle">
                        {{$data->nama}}
                     
                      </td>
                      <td> <span class="d-block">NIP.{{$data->nip}}</span></td>
                      <td style="vertical-align:middle"> 
                        <span class="badge badge-info">{{$data->deskripsi}}</span>
                      </td>
                      <td>
                          <button class="btn btn-sm  change_member" data-id="{{$data->enroll_id}}"><i style="color:#c0392b;" class="fas fa-user-minus"></i></button>
                        </td>
                      
                  </tr>    
                  @empty
                    <tr></tr>  
                  @endforelse
                @endif
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="table-responsive">
                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>NIP</th>
                      <th style="max-width:40%;" width=40%; >Jabatan</th>
                      <th>Label</th>
                      <th>aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if (count($data_pp)>0)
                      @forelse ($data_pp as $data)
                      <tr>
                          <td style="vertical-align:middle">#</td>
                          <td style="vertical-align:middle">
                            {{$data->nama}}
                        
                          </td>
                          <td style="vertical-align:middle"> 
                              <span class="d-block">{{$data->nip}}</span>                         
                          </td>
                          <td>
                              {{$data->jabatan_pp}}
                          </td>
                          <td><span class="badge badge-info">{{$data->kode_pp}}</span></td>
                          <td>
                              <button class="btn btn-sm  change_member" data-id="{{$data->enroll_id}}"><i style="color:#c0392b;" class="fas fa-user-minus"></i></button>
                            </td>
                      </tr>    
                      @empty
                   
                      @endforelse
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="table-responsive">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>NIP</th>
                          <th style="max-width:40%;" width=40%; >Jabatan</th>
                          <th>Label</th>
                          <th>aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                          @if (count($data_ppk)>0)
                          @forelse ($data_ppk as $data)
                          <tr>
                              <td style="vertical-align:middle">#</td>
                              <td style="vertical-align:middle">
                                {{$data->nama}}
                            
                              </td>
                              <td style="vertical-align:middle"> 
                                  <span class="d-block">{{$data->nip}}</span>                         
                              </td>
                              <td>
                                  {{$data->jabatan_ppk}}
                              </td>
                              <td><span class="badge badge-info">{{$data->kode_ppk}}</span></td>
                              <td>
                                  <button class="btn btn-sm  change_member" data-id="{{$data->enroll_id}}"><i style="color:#c0392b;" class="fas fa-user-minus"></i></button>
                                </td>
                          </tr>    
                          @empty
                           
                          @endforelse
                        @endif
                      </tbody>
                    </table>
                  </div>
            </div>
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

$('body').on('click','.change_member',function(e){
  e.preventDefault();
  var me=$(this);
  var id=me.attr('data-id');
  var url='/project/'+id+'/delete'
            Swal.fire({
                title: 'Are you sure?',
                text: "Hapus dari anggota project",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
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
                                'Anggota telah dihilangkan.',
                                'success'
                                );

                             setTimeout(
                            function() 
                            {
                              Swal.showLoading();
                                location.reload();
                            }, 2000);
                        }
                    });
                }
                })
})
})

</script>
@endsection
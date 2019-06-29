@extends('Admin.layout')

@section('konten')
    <div class="container">
      <div class="col-md-12" style="margin:auto;">
          <div class="row-md-12">

          </div>
          <div class="row-md-12">
              <div class="card shadow ">
                  <div class="card-header" >
                    <h5 style="font-family:Roboto">Daftar Project</h5>
                      <button type="button" id="add_Project" class="btn btn-primary float-right shadow" style="margin-right: 5px;">
                            <i class="fas fa-plus"></i> Tambah Project
                          </button>
                  </div>
                  <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-condensed" id="project_table" style="font-family:Roboto">
                                      <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>Nama Project</th>
                                              <th>Deskripsi</th>
                                              <th>dibuat</th>
                                              <th>aksi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
          
          
                                      </tbody>
                                </table>
                            </div>
                  </div>
              
              </div>
          </div>
      </div>

       

        
    </div>


    <!-----#modal -->
        <div class="modal fade projectNew_modal" id="project_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
              <div class="modal-content">

                <div class="modal-body" id="projectNew_body">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-flat" id="close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-flat btn-block shadow" id="store_project">Simpan</button>

                </div>
              </div>
            </div>
        </div>
@endsection



@section('addScript')
    <script>
        $(document).ready(function(){
        
            var url;
            /*$('#add_Project').mouseover(function(){
                var me=$('#item').attr('style');
                console.log(me);
                //me.attr('style')="color:white;"
            })*/

            $('#add_Project').click(function(event){
                event.preventDefault();
                
                var modal=$('.projectNew_modal');
                var url="{{route('project.form')}}"
               

               
                $.ajax({
                    url:url,
                    dataType:'html',
                    success:function(response){
                        $('#projectNew_body').html(response);
                    }
                })

                modal.modal('show');
            });

            $('#store_project').click(function(event){
                event.preventDefault();
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
                });
               
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/project/store',
                    data: {
                        // change data to this object
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        nama_project: $('#nama_project').val(),
                        deskripsi: $('#deskripsi_project').val(),
        
                        
                    },
                    success: function(response) {
                        swal.fire("...", "Project Telah ditambahkan!");
                        $("#close").trigger("click");
                        //$.get('/project/'+response.id+'/enrollment')
                        
                      
                        $('#project_table').DataTable().ajax.reload();  
                       
                    }
                });

            })

            $('body').on('click','#active_project',function(e){
                e.preventDefault();
                var me= $(this);
                var id=me.attr('data-id');
                //console.log(id)
                var url="/project/update_active"

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
                        id_project:id    
                    },
                    success: function(result) {
                        //console.log(result);
                        swal.fire("...", "Project telah diaktifkan!");
                        $('#project_table').DataTable().ajax.reload();  
                        
                    },error:function(){
                        alert('error');
                    }

                });
            })


            $('#project_table').DataTable({
            responsive:true,
            processing:true,
            serverSide:true,
            filter:false,
            paging:true,
            ajax:"{{route('table.project')}}",
            columns:[
                {data: 'DT_RowIndex', name: 'DT_Row_Index' , orderable: false, searchable: false},
                {data:'nama'},
                {data:'deskripsi'},
                {data:'created'},
                {data:'action'},
            ]
            })
        })
        
    
    </script>
@endsection


@section('addStyle')
    <style>
   

        .card-deck .card{
            min-width: 233px;
            min-height: 198px;
        }

    
        .btn-fix {
            padding: 0;
            border: none;
            white-space: normal;
            }
        
            th{
        font-weight: 600;
        font-family: 'QuickSand';
        font-size:13px;
        color:
    }

    td{
        font-family: 'Varela Round';
        font-size: 13px;
        font-weight: 500;
    }



    </style>
@endsection
@extends('Admin.layout')

@section('konten')
    <div class="container">
      

        @include('Project.project_cards')
    </div>


    <!-----#modal -->
        <div class="modal fade projectNew_modal" id="project_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
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
                        alert('berhasil');
                        $("#close").trigger("click");
                        $.get('/project/enrollment'+response.id)
                        
                        //permintaanTable.ajax.reload();
                       
                    }
                });

            })
        })
        
    
    </script>
@endsection


@section('addStyle')
    <style>
        #add_Project{
            min-width: 233px;
            min-height: 198px;
        }

    
        .btn-fix {
            padding: 0;
            border: none;
            white-space: normal;
            }

    </style>
@endsection
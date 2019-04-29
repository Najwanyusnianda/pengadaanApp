@extends('Admin.layout')

@section('konten')
<div class="container-fluid">
    <div class="col">
        <div class="row-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                        <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-home" aria-selected="true">Semua</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">ULP</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                                        </li>
                                        
                                    </ul>
                        </div>
                        <div class="col-md-2 offset-md-4">
                                <li class="row justify-content-end" id="register-item">
                                        <a class="btn btn-link"  id="register-show" style="color:white;background-color: #353b48;">
                                                <i class="fas fa-user-plus"></i>
                                                Add User
                                        </a>
                                </li>
                        </div>
                    </div>
                    

                       

                </div> 

            </div> 
        </div> 
     <!-- END OF PILLS --> 


        <div class="row-md-8  justify-content-center align-content-center">
            <div class="card">  
                <div class="tab-content m-2 p-2" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                        @include('User._user_semua')
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                </div>
            </div>  
        </div>  

    
    </div>    
</div>

<!-- end tab-content -->


<!-- modal add user -->

<div class="modal fade register_modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
            
                console.log(url+'||'+nama+'||'+nip+'||'+role+'||'+username+'||'+password);
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
                        username: $('#username').val(),
                        password: $('#password').val(),
                        
                    },
                    success: function(result) {
                        //console.log(result);
                        alert("Berhasil dikirim");
                        //permintaanTable.ajax.reload();
                        $("#close").trigger("click");
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
        })    
        
        


      

        
    </script>
@endsection
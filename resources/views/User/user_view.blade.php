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
                                <li class="row justify-content-end" style="">
                                        <a class="btn btn-link" style="color:white;background-color: #353b48;">
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
    
@endsection
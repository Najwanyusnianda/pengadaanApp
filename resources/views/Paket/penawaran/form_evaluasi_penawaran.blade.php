@extends('Admin.layout')

@section('konten')
    <div class="container invoice pt-3" style="font-size:13px;font-family:'Varela Round'">
        <form action="" method="post">
                <div class="row-md-8 mb-2 ">
                    <div class="btn-group">
                            <div class="col-md-6">
                                    <button class=" shadow btn btn-outline-info btn-sm btn-flat back-step btn-block" style="width=50%;margin:auto;" > Back</button>
                            </div>
                            <div class="col-md-6">
                                    <button class=" shadow btn btn-outline-info btn-sm btn-flat next-step btn-block" style="width=50%;margin:auto;" > Next</button>
                            </div>
                    </div>

                </div>    
        
        <div class="row-md-8">
            
            @include('Paket.penawaran._evaluasi_penawaran')
    
        </div>



        </form>
    </div>
@endsection

@section('addStyle')
    <style>
            .custom-checkbox .custom-control-input:checked~.custom-control-label::before{
        background-color:#28a745;
    }
    </style>
@endsection


@section('addScript')
    <script>
    $(document).ready(function(){
     

        

    })
    </script>
@endsection
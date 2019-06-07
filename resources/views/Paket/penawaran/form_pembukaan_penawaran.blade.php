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
                @include('Paket.penawaran._pembukaan_penawaran')
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
        alert('lol');
        var eval_penawaran= $('#evaluasi_penawaran_component');
        var pembukaan_penawaran=$('#pembukaan_penawaran_component');
        //$('#evaluasi_penawaran_component').hide();
        eval_penawaran.hide();
        var nextStep=$('.next-step');
        var backStep=$('.back-step');
        backStep.attr('disabled', 'disabled');
        nextStep.click(function(e){
            e.preventDefault();
            pembukaan_penawaran.hide();
            eval_penawaran.show();
            $(this).attr('disabled', 'disabled');
            backStep.removeAttr('disabled');
        });

        backStep.click(function(e){
            e.preventDefault();
            eval_penawaran.hide();
            pembukaan_penawaran.show();
            $(this).attr('disabled', 'disabled');
            nextStep.removeAttr('disabled');

        })

        

    })
    </script>
@endsection
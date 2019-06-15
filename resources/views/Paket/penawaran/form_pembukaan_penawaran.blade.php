@extends('Admin.layout')

@section('konten')
@include('Paket.penawaran._pembukaan_penawaran')
@endsection

@section('addStyle')
    <style>
            .custom-checkbox .custom-control-input:checked~.custom-control-label::before{
        background-color:#28a745;
    }

    .custom-control.custom-checkbox{padding-left: 0;}

label.custom-control-label {
  position: relative;
  padding-right: 1.5rem;
}

label.custom-control-label::before, label.custom-control-label::after{
  right: 0;
  left: auto;
}

label:not(.form-check-label):not(.custom-file-label){
    font-weight: 500
}
    </style>
@endsection


@section('addScript')
    <script>
    $(document).ready(function(){


        $('body').on('click','.check_lengkap',function(e){
            me=$(this);
            var kelengkapan=me.parent().find('.kelengkapan');
            
            if(me.prop("checked")==true){
                kelengkapan.val("1")
            }else if(me.prop("checked")==false){
                kelengkapan.val("0")
            }
        })

    })
    </script>
@endsection
@extends('Admin.layout')

@section('konten')
    <div class="container invoice pt-3" style="font-size:13px;font-family:'Varela Round'">
        <form action="" method="post">
  

        <div class="row-md-8">
                @include('Paket.penawaran._pembukaan_penawaran')
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
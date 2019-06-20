@extends('Admin.layout')


@section('konten')
<div class="container">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>Whoops!</strong> Ada yang salah dengan inputan anda.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                
            @endforeach
          </ul>
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
        @endif
       
 <div class="col">
     <div class="card">
        <form method="post" action="{{route('upload.penawaran.store',[$paket->id])}}" enctype="multipart/form-data">
            {{csrf_field()}}
          <div class="form-group p-5">
            <div class="control-group input-group increment" >
                <input type="file" name="filename" class="form-control-file">
             </div>

          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary" style="margin-top:10px">Upload file</button>
            <a class="btn btn-link btn-outline-secondary btn-sm ml-3" href="{{route('paket.detail',['id'=>$paket->id])}}">Kembali</a>
          </div>
                  
          
          </form>  
     </div>
 </div>
        
  </div>
@endsection


@section('addScript')
<script type="text/javascript">

    $(document).ready(function() {


    });

</script>
@endsection
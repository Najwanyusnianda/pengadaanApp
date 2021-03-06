@extends('SubBagian.sub_bagian_index')

@section('konten_bagian')

    <div class="container col-md-6" style="font-family:'Quicksand';font-size:14px;" >
            @if(Session::has('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                        <li>{{ $errors->first() }}</li>
                </ul>
            </div>
            @endif
        <div class="card shadow ">

            <div class="card-body">
                    <div class="py-3 " >
                            <h5 class="m-0  text-center" style="font-family:Roboto">Form Permintaan</h5>
                    </div>
                    <hr>
            <form action="{{route('permintaan.add')}}" method="POST" class="m-3" style="font-size:12px;" id="form" enctype="multipart/form-data">
                {{csrf_field()}}
                            <div class="form-group">
                                <label for="email">Judul:</label>
                                <input type="text" class="form-control" id="judul_permintaan" name="judul_permintaan" placeholder="masukkan Judul">
                            </div>

                            <div class="form-group">
                                    <label>Jenis Pengadaan</label>
                                    <select class="form-control" id="jenis_pengadaan" name="jenis_pengadaan">
                                        <option disabled selected>Pilih jenis pengadaan</option>
                                        <option value="barang">Barang/Jasa</option>
                                        <option value="konsultan">Jasa Konsultan</option>
                                        <option value="lainnya">Jasa Lainnya</option>
                                        <option value="fullboard">Fullboard</option>
                                    
                                    </select>
                            </div>

                            <div class="form-group">
                                <label for="email">Nomor Form:</label>
                                <input type="text" class="form-control" id="nomor_form_permintaan" name="nomor_form_permintaan" placeholder="Input nomor form permintaan">
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Kode Kegiatan:</label>
                        
                                <select class="form-control custom-select" id="kode_kegiatan" name="kode_kegiatan">
                                    
                                    @forelse ($kode_kegiatan as $item)
                                    <option >{{$item->kode_kegiatan}}</option>
                                    @empty
                                        
                                    @endforelse

                                
                                </select>
                                <!--<input type="text" class="form-control col-6" id="kode_kegiatan" name="kode_kegiatan" placeholder="Input 4 digit kode kegiatan">-->
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Output:</label>
                                <input type="text" class="form-control" id="output" name="output" placeholder="Input nama Output">
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Komponen:</label>
                                <input type="text" class="form-control" id="komponen" name="komponen" placeholder="Input nama komponen">
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Sub Komponen:</label>
                                <input type="text" class="form-control" id="sub_komponen" name="sub_komponen" placeholder="input nama sub komponen">
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Grup Akun:</label>
                                <input type="text" class="form-control" id="grup_akun" name="grup_akun" placeholder="input nama grup akun ">
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Nilai (Rp):</label>
                                <input type="number" class="form-control col-6" id="nilai_anggaran" name="nilai_anggaran" placeholder="nilai anggaran">
                            </div>
                            <div class="form-group">
                                <hr>
                            </div>
                            <div class="form-group" >
                                    <label for="pwd">Tanggal Buat Form:</label>
                                    <input type="date" class="form-control col-6" id="date_buat_form" name="date_buat_form" placeholder="dd - m - yyyy">
                            </div>
                            <div class="form-group ">
                                    <label for="exampleInputEmail1">Tanggal Pelaksanaan: </label>
                                    <div class="form-inline">
                                        <div class="row">
                                            <div class="col">
                                                    <small id="emailHelp" class="form-text text-muted">Mulai</small>
                                                    <input type="date" class="form-control permintaan_control date_control" id="date_mulai" name="date_mulai" aria-describedby="emailHelp" placeholder="dd - m - yyyy">
                                                    
                                            </div>
                                            <div class="col">   
                                                    <small id="emailHelp" class="form-text text-muted">Selesai</small>              
                                                    <input type="date" class="form-control permintaan_control date_control" id="date_selesai" name="date_selesai" aria-describedby="emailHelp" placeholder="dd - m - yyyy">
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <small id="emailHelp" class="form-text text-muted"> </small>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="">Masukkan File Pendukung <small>(.pdf atau .docx)</small></label>
                                    <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                              <input type="file" class="custom-file-input" id="inputGroupFile01" name="filename">
                                              <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>
                                            </div>
                                          </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary shadow">Kirim Permintaan</button>
                            </div>
                            
                            
                        </form>
            </div>
        </div>
    
    </div>
@endsection

@section('addStyle')
    <style>
    .form-control{
        font-size:15px;
    }
    label{
        font-weight: bold;
    }
    .flatpickr-input {
            background-color: white !important;
        }

    .form-group{
        margin-left: 20%;
        margin-right: 20%;
     
    } 

    

       @media screen and (min-width: 769px) and (max-width: 1023px) {
        .container.col-md-6 {
    padding-left: 0px;
    padding-right: 0px;
}
        .form-control{
        font-size:12px;
        }
        .form-group{
        margin-left: 0%;
        margin-right: 0%;
    }
}


@media screen and (min-width: 400px)  {
    .form-group{
        margin-left: 0%;
        margin-right: 0%;
    }
    .form-control{
        font-size:12px;
    }
}

@media screen and (max-width: 991px) {
    .form-group{
        margin-left: 0%;
        margin-right: 0%;
    }
    .form-control{
        font-size:12px;
    }
}

label.required:before {
    content: "* ";
}
    </style>
    <link rel="stylesheet" href="{{asset('assets/flatpickr/flatpickr.min.css')}}">
@endsection

@section('addScript')
<script src="{{asset('assets/flatpickr/flatpickr.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>
<script>
    
$("input[type='date']").flatpickr({
    altInput: true,
    altFormat: "j - F - Y",
    dateFormat: "Y-m-d",
})

var mulai=$("#date_mulai").val();

var  startpicker=$("#date_mulai").flatpickr({
    altInput: true,
    altFormat: "j - F - Y",
    dateFormat: "Y-m-d",
    minDate:"today",
    defaultDate: "today",
    onClose: function(selectedDates, dateStr, instance) {
      endpicker.set('minDate', dateStr);
    },
})


var endpicker=$("#date_selesai").flatpickr({
    altInput: true,
    altFormat: "j - F - Y",
    dateFormat: "Y-m-d",
    minDate: $('date_mulai').attr('value'),
    onClose: function(selectedDates, dateStr, instance) {
      startpicker.set('maxDate', dateStr);
    },
  
})

$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

<script>
    $('#form').validate({ // initialize the plugin

rules: {

    judul_permintaan: {

        required: true

    }
}

});
</script>
@endsection
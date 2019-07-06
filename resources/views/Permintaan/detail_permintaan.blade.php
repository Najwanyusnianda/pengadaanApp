<div class="container" style="font-family:Roboto">
    <div class="row justify-content-center">
        <div class="invoice p-3 mb-3">
        
            <!-- title row -->
            <div class="row">
               
                <h5 class="mx-auto text-center mt-4">
                    <div class="">
                            FORM PERMINTAAN <br>  {{$permintaan_detail->judul}}                    
                    </div>
                    <small class="p-1">Nomor : {{$permintaan_detail->nomor_form}}</small>
                    <!-- <small class="float-right">Date: 2/10/2014</small>-->
                </h5>
              
                <!-- /.col -->
            </div>
            <!-- info row -->
        
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                
                <div class="col-12 table-responsive p-2">
                
                <table class="table text-left " style="font-family:Roboto;font-size:13px;">
                    <thead>
                        <th width="5%"></th>
                        <th width="35%"></th>
                        <th width="10%"></th>
                        <th width="50%"></th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Unit Eselon I</td>
                        <td>:</td>
                        <td>{{$permintaan_detail->eselonI=="SESTAMA" ? "Sekretaris Utama" : $permintaan_detail->eselonI }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Unit Eselon II</td>
                        <td>:</td>
                        <td>{{$permintaan_detail->eselonII}}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Bagian/ Sub Direktorat</td>
                        <td>:</td>
                        <td>{{$permintaan_detail->nama_bagian}}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Program</td>
                        <td>:</td>
                        <td>({{$permintaan_detail->kode_program}}){{$permintaan_detail->nama_program}}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Kegiatan</td>
                        <td>:</td>
                        <td>({{$permintaan_detail->kode_kegiatan}}){{$permintaan_detail->nama_kegiatan}}</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Output</td>
                        <td>:</td>
                        <td>{{$permintaan_detail->nama_bagian}}</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Komponen</td>
                        <td>:</td>
                        <td>{{$permintaan_detail->komponen}}</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Sub Komponen</td>
                        <td>:</td>
                        <td>{{$permintaan_detail->sub_komponen}}</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Grup Akun</td>
                        <td>:</td>
                        <td>{{$permintaan_detail->grup_akun}}</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Item Aktivitas dalam POK</td>
                        <td>:</td>
                        <td>{{$permintaan_detail->judul}}</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Nilai (Rp)</td>
                        <td>:</td>
                        <td>{{$permintaan_detail->nilai}}</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>File Pendukung</td>
                        <td></td>
                        <td><a href="{{ Storage::url($permintaan_detail->file_pendukung) }} " class="btn btn-link">
                            Lihat</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- Table row -->
   
            <!-- /.row -->

        
    
            <!-- this row will not appear when printing 
        <div class="row no-print">
            <div class="col-12">
            <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>

            <a class="btn btn-success float-right"><i class="fa fa-credit-card"></i>
                Buat Jadwal
            </a>
            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fa fa-download"></i> Generate PDF
            </button>
            </div>
        </div>-->
        </div>
    </div>
</div>

<style>
#detail_body {
padding: 0px;
}
</style>
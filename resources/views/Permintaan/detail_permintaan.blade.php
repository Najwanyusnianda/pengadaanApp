<div class="container" style="font-family:Roboto">
    <div class="row justify-content-center">
        <div class="invoice p-3 mb-3">
        
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                <h5 class="mx-auto text-center mt-4">
                    <div class="">
                            FORMULIR PERMINTAAN <br>  {{$permintaan_detail->judul}}                    
                    </div>
                    <small class="p-1">Nomor :</small>
                    <!-- <small class="float-right">Date: 2/10/2014</small>-->
                </h5>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                Kepada Yth.
                <address>
                    <strong>Pejabat Pembuat Komitmen</strong><br>
                    detail_permintaans.program<br>
                    di<br>
                    Badan Pusat Statistik<br>
                    Bersama ini disampaikan formulir permintaan uang saku Paket Meeting/FUllboard Luar Kota sebagai berikut:
    
                </address>
                </div>
                
                <!-- /.col -->
            </div>
        
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                
                <div class="col-12 table-responsive p-2">
                
                <table class="table text-left ">
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
                        <td>{{$permintaan_detail->kode_kegiatan}}{{$permintaan_detail->nama_kegiatan}}</td>
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
                    </tbody>
                </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                    <th>Qty</th>
                    <th>Product</th>
                    <th>Serial #</th>
                    <th>Description</th>
                    <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td>1</td>
                    <td>Call of Duty</td>
                    <td>455-981-221</td>
                    <td>El snort testosterone trophy driving gloves handsome</td>
                    <td>$64.50</td>
                    </tr>
                    <tr>
                    <td>1</td>
                    <td>Need for Speed IV</td>
                    <td>247-925-726</td>
                    <td>Wes Anderson umami biodiesel</td>
                    <td>$50.00</td>
                    </tr>
                    <tr>
                    <td>1</td>
                    <td>Monsters DVD</td>
                    <td>735-845-642</td>
                    <td>Terry Richardson helvetica tousled street art master</td>
                    <td>$10.70</td>
                    </tr>
                    <tr>
                    <td>1</td>
                    <td>Grown Ups Blue Ray</td>
                    <td>422-568-642</td>
                    <td>Tousled lomo letterpress</td>
                    <td>$25.99</td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        
    
            <!-- this row will not appear when printing -->
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
        </div>
        </div>
    </div>
</div>
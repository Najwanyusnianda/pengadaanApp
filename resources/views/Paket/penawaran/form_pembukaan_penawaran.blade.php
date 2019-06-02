@extends('Admin.layout')

@section('konten')
    <div class="container invoice pt-3">
        <div class="row-md-8">
                <div class="card ">
                        <div class="p-2">
                            <div class="card-header">
                                Pembukaan penawaran dari @nama_penyedia
                            </div>
                            <br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Dokumen</th>
                                        <th>Unsur</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="2" >1</td>
                                        <td rowspan="2">Surat Penawaran</td>
                                        <td>
                                            Penawaran teknis
                                        </td>
                                        <td>Lengkap</td>
                                    </tr>
                                    <tr>
                                        <td>Penawaran Harga</td>
                                        <td>Lengkap</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Surat Kuasa</td>
                                        <td>-</td>
                                        <td>Lengkap</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Pakta Integritas</td>
                                        <td>-</td>
                                        <td>Lengkap</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Form Isian Kualifikasi</td>
                                        <td>-</td>
                                        <td>Lengkap</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
        </div>
        <hr>
        <div class="row-md-8">
            <div class="card">
                <div class="card-header">
                    Evaluasi Penawaran
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Unsur</th>
                            <th>Kriteria</th>
                            <th colspan="2">Hasil Evaluasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="4">1</td>
                            <td rowspan="4">Evaluasi Administrasi</td>
                            <td >Ditandatangani oleh pihak berwenang</td>
                            <td>Ada</td>
                            <td>Memenuhi Syarat</td>
                        </tr>
                        <tr>
                            <td >Mencantumkan Harga</td>
                            <td>Ada</td>
                            <td>Memenuhi Syarat</td>
                        </tr>
                        <tr>
                            <td >Jangka Waktu Berlakunya Penawaran</td>
                            <td>Ada</td>
                            <td>Memenuhi Syarat</td>
                        </tr>
                        <tr>
                            <td >Jangka waktu pelaksanaan pekerjaan yang ditawarkan tidak kurang dari ketentuan</td>
                            <td>Ada</td>
                            <td>Memenuhi Syarat</td>
                        </tr>

                        <!--...-->
                        <tr>
                            <td rowspan="5">2</td>
                            <td rowspan="5">Evaluasi Kualifikasi</td>
                            <td >Surat Keterangan Domisili Perusahaan</td>
                            <td>Ada</td>
                            <td>Memenuhi Syarat</td>
                        </tr>
                        <tr>
                            <td>SIUP</td>
                            <td>Ada</td>
                            <td>Memenuhi Syarat</td>
                        </tr>
                        <tr>
                            <td >Akta Pendirian dan Perubahannya</td>
                            <td>Ada</td>
                            <td>Memenuhi Syarat</td>
                        </tr>
                        <tr>
                            <td>NPWP</td>
                            <td>Ada</td>
                            <td>Memenuhi Syarat</td>
                        </tr>
                        <tr>
                            <td>Bukti Setor Pajak Tahun Terakhir</td>
                            <td>Ada</td>
                            <td>Memenuhi Syarat</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
@endsection
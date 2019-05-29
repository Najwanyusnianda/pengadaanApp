@extends('Admin.layout')

@section('konten')
    <div class="container">
        <div class="card ">
            <div class="p-2">
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
@endsection
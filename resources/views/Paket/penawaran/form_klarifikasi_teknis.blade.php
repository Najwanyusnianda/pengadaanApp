@extends('admin.layout')

@section('addStyle')
    <style>
    .form-control{
        border-radius: 0%;
    }
    th{
        font-weight: 600;
        color:#566787;

    }

    tbody{
        font-family: 'Varela Round';
        font-size:13px;
    }

    thead{

    }
    </style>
@endsection

@section('konten')
    <div class="container">
        <div class="col-md-12" style="margin:auto;width:80%">
            <div class="card shadow">
                <div class="card-header" >
                    
                        <div class="row">
                                <div class="col-sm-8"style="font-family:Roboto"><h5>Klarifikasi dan Negosiasi Teknis Harga</h5></div>
                                <div class="col-sm-4">
                                       
                                </div>
                        </div>
                        

                </div>
                   
              
                <div class="card-body">
                        <form action="" method="post">
                            {{ csrf_field() }}
                                <div class="table-responsive">
                                    <table class="table table-condensed p-2">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Nama Item</th>
                                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Volume</th>
                                                <th colspan="2" style="vertical-align : middle;text-align:center;">Harga Penawaran</th>
                                                <th colspan="2" style="vertical-align : middle;text-align:center;">Harga Negosiasi</th>


                                            </tr>
                                            <tr>
                                                <th>Harga Satuan</th>
                                                <th>Jumlah</th>
                                                <th>Harga Satuan</th>
                                                <th>Jumlah</th>
                                            </tr>
                                           
                                        </thead>
                                        <tbody>
                                            @if (count($item_spek)>0)
                                                @forelse ($item_spek as $item)
                                                    <tr>
                                                        <td>{{$item->nama_item}}
                                                        <input type="text" hidden name="id[]" value="{{$item->id}}">
                                                        </td>
                                                        <td> <span class="volume_text">{{$item->volume}} </span></td>
                                                        <td>
                                                                <input type="number" name="harga_satuan_penawaran[]" class="form-control form-control-sm harga_input">
                                                        </td>
                                                        <td>
                                                                <input type="number" name="jumlah_penawaran[]" class="form-control form-control-sm harga_input">
                                                        </td>
                                                        <td>
                                                                <input type="number" name="harga_satuan_nego[]" class="form-control form-control-sm harga_input">
                                                        </td>
                                                        <td>
                                                                <input type="number" name="jumlah_nego[]" class="form-control form-control-sm harga_input">
                                                        </td>
                                                    </tr>
                                                @empty
                                                    
                                                @endforelse
                                                
                                            @else
                                                
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <input type="number" name="total_hps" id="sum_hps" hidden>
                                <hr>
                                <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                                
                        </form>
                </div>

            </div>

        </div>
    </div>
@endsection
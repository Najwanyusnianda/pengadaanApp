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
                <form action="{{route('paket.klarifikasi_teknis.store',['id'=>$id_paket])}}" method="post">
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
                                                                <input type="number" name="harga_satuan_penawaran[]" class="form-control form-control-sm harga_penawaran_input">
                                                        </td>
                                                        <td>
                                                                <span class="jml_penawaran"></span>
                                                                <input type="number" name="jumlah_penawaran[]" class="form-control form-control-sm jumlah_penawaran" hidden>
                                                        </td>
                                                        <td>
                                                                <input type="number" name="harga_satuan_nego[]" class="form-control form-control-sm harga_nego_input">
                                                        </td>
                                                        <td>
                                                                <span class="jml_nego"></span>
                                                                <input type="number" name="jumlah_nego[]" class="form-control form-control-sm jumlah_nego" hidden>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    
                                                @endforelse
                                                
                                            @else
                                                
                                            @endif
                                            <tr>
                                                <th colspan="3">Subtotal:</th>
                                                <td>
                                                    <span class="subtotal_penawaran"></span>
                                                </td>
                                                <td></td>
                                                <td><span class="subtotal_nego"></span></td>
                                            </tr>
                                            <tr>
                                                <th colspan="3">PPN:</th>
                                                <td>
                                                    <span class="ppn_penawaran"></span>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <span class="ppn_nego"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="3">Total:</th>
                                                <td>
                                                    <span class="total_penawaran"></span>
                                                    <input type="number" name="total_penawaran" id="sum_penawaran" hidden>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <span class="total_nego"></span>
                                                    <input type="number" name="total_nego" id="sum_nego" hidden>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <hr>
                                <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <a href="{{route('paket.pembukaan',[$id_paket])}}" class="btn btn-link btn-outline-primary"> Kembali</a>
                                </div>
                                
                        </form>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('addScript')
    <script>
    $(document).ready(function(){
        function number_format (number, decimals, dec_point, thousands_sep) {
            // Strip all characters but numerical ones.
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }
        $('body').on('keyup','.harga_penawaran_input',function(){
            var me=$(this);
            var harga_penawaran=parseInt(me.val());
            var volume_penawaran=me.parent().parent().find('.volume_text');
            volume_penawaran=parseInt(volume_penawaran.text());
            var jumlah_penawaran=me.parent().parent().find('.jumlah_penawaran');
            var jumlah_penawaran_text=me.parent().parent().find('.jml_penawaran');
            jumlah_penawaran.val(harga_penawaran*volume_penawaran);
            jumlah_penawaran_text.html('Rp.'+number_format(harga_penawaran*volume_penawaran,0,',','.'))
            var array_total_penawaran = $("input[name='jumlah_penawaran[]']").map(function(){return $(this).val();}).get();
            array_total_penawaran= array_total_penawaran.map((x) =>parseInt(x));
            var master_total_penawaran=0;
            for (let index = 0; index < array_total_penawaran.length; index++) {
                if(isNaN(array_total_penawaran[index])){
                    array_total_penawaran[index]=0;
                }
                master_total_penawaran=master_total_penawaran+array_total_penawaran[index];
                
             
                
            }
            $('.subtotal_penawaran').html('Rp.'+number_format(master_total_penawaran,0,',','.'));

            var ppn_penawaran=0.1*master_total_penawaran;
            var total_penawaran=ppn_penawaran+master_total_penawaran
            var sum_penawaran=$('#sum_penawaran').val(total_penawaran);
            $('.ppn_penawaran').html('Rp.'+number_format(ppn_penawaran,0,',','.'));
            $('.total_penawaran').html('<b>Rp.'+number_format(total_penawaran,0,',','.')+'</b>');
        });

        $('body').on('keyup','.harga_nego_input',function(){
            var me=$(this);
            var harga_nego=parseInt(me.val());
            var volume_nego=me.parent().parent().find('.volume_text');
            volume_nego=parseInt(volume_nego.text());
            var jumlah_nego=me.parent().parent().find('.jumlah_nego');
            var jumlah_nego_text=me.parent().parent().find('.jml_nego');
            jumlah_nego.val(harga_nego*volume_nego);
            jumlah_nego_text.html('Rp.'+number_format(harga_nego*volume_nego,0,',','.'))
            var array_total_nego=$("input[name='jumlah_nego[]']").map(function(){return $(this).val();}).get();
            array_total_nego= array_total_nego.map((x) =>parseInt(x));
            var master_total_nego=0;
            for (let index = 0; index < array_total_nego.length; index++) {
                if(isNaN(array_total_nego[index])){
                    array_total_nego[index]=0;
                }
                master_total_nego=master_total_nego+array_total_nego[index];
             

            }
            
            $('.subtotal_nego').html('Rp.'+number_format(master_total_nego,0,',','.'));
            var ppn_nego=0.1*master_total_nego;
            var total_nego=ppn_nego+master_total_nego
            var sum_nego=$('#sum_nego').val(total_nego);
            $('.ppn_nego').html('Rp.'+number_format(ppn_nego,0,',','.'));
            $('.total_nego').html('<b>Rp.'+number_format(total_nego,0,',','.')+'</b>');
        });
    })

    </script>
@endsection
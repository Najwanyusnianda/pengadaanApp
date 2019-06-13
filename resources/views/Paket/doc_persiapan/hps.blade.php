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
                                <div class="col-sm-8"style="font-family:Roboto"><h5>Harga Perkiraan Sementara: <b> <span id="total_hps">Rp.0</span></b></h5></div>
                                <div class="col-sm-4">
                                       
                                </div>
                        </div>
                        

                </div>
                   
              
                <div class="card-body">
                        <form action="{{route('paket.detail.hps.store',['id'=>$id_paket])}}" method="post">
                            {{ csrf_field() }}
                                <div class="table-responsive">
                                    <table class="table table-condensed p-2">
                                        <thead>
                                            <tr>
                                                <th>Nama Item</th>
                                                <th>Volume</th>
                                                <th>Satuan</th>
                                                <th style="width:20%">Harga Satuan (Rp)</th>
                                                <th>Ppn 10% (Rp)</th>
                                                <th>Jumlah</th>


                                            </tr>
                                           
                                        </thead>
                                        <tbody>
                                            @if (count($hps)>0)
                                                @forelse ($hps as $item)
                                                    <tr>
                                                        <td>{{$item->nama_item}}
                                                        <input type="text" hidden name="id[]" value="{{$item->id}}">
                                                        </td>
                                                        <td> <span class="volume_text">{{$item->volume}} </span></td>
                                                        <td>{{$item->satuan}}</td>
                                                        <td>
                                                            <input width=20% type="number" name="harga_satuan[]" class="form-control form-control-sm harga_input">
                                                        </td>
                                                        <td>
                                                            <span class="ppn" ></span>
                                                        </td>
                                                        <td>
                                                            <span class="total"></span>
                                                            <input type="number" hidden name="jumlah[]" class="jumlah_input"  >
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
        $('body').on('keyup','.harga_input',function(){
            var me =$(this);
            var harga=parseInt(me.val());
            var volume=me.parent().parent().find('.volume_text');
            volume=parseInt(volume.text());
            var total=harga*volume;
            var ppn = 0.1*total;
            total=total+ppn;
            var total_input=me.parent().parent().find('.total');
            total_input.html(number_format(total,0,',','.'));
            var jumlah_input=me.parent().parent().find('.jumlah_input');
            jumlah_input.val(total);


           
            //console.log(total);
            var ppn_fix=number_format(ppn,0,',','.');
            var ppn_input=me.parent().parent().find('.ppn');
            ppn_input.html(ppn_fix);

            var array_total = $("input[name='jumlah[]']").map(function(){return $(this).val();}).get();
            array_total= array_total.map((x) =>parseInt(x));
            var master_total=0;
            for (let index = 0; index < array_total.length; index++) {
                if(isNaN(array_total[index])){
                    array_total[index]=0;
                }
                master_total=master_total+array_total[index];
                
            }


            $('#total_hps').html('Rp.'+number_format(master_total,0,',','.'));
            $('#sum_hps').val(master_total);
           
            

        });

    })

    </script>
@endsection
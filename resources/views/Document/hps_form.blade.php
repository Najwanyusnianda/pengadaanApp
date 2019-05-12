@extends('Admin.layout')


@section('konten')

<style>

#con{
  margin: auto;
  width: 50%;
}
</style>
    <div class="container" id="con">
        <div class="col">

            <br>
            <div class="row-md-8 ">
    
                <div id="hps_table"></div>
             
                    
            </div>

            <div class="row-md-8 ">
    
                <div class="card">
                  <div class="card-body">
                    <button id="save_table" class="btn btn-success"> Save </button>
                  </div>
                </div>
             
                    
            </div>
        </div>
    </div>
@endsection

@section('addScript')
<script>
$(document).ready(function(){
 
//console.log(JSON.stringify(data2)));  
var container = document.getElementById('hps_table');
var hot = new Handsontable(container, {
  dataSchema: {name: null, volume:null, satuan: null,harga:null,ppn:null,jumlah:null},
  startRows: 8,
  startCols: 6,
  width: 800,
  height: 320,
  rowHeaders: true,
  colHeaders: true,
  columns: [
    {data: 'name'},
    {data: 'volume'},
    {data: 'satuan'},
    {data: 'ppn'},
    {data:'jumlah'}
  ],
  licenseKey: 'non-commercial-and-evaluation',
  colHeaders: ['Nama Barang/Jasa', 'Volume', 'Satuan', 'Harga Satuan','PPN 10%','Jumlah'],
  minSpareRows: 1
});


$('#save_table').click(function(event){
  event.preventDefault();
  //var tableData = JSON.stringify(handsontable.getData());
  var x=hot.getSourceData();
  
  x = Object.keys(x).map(i => x[i])

  //x=JSON.parse(JSON.stringify(x));
  console.log(typeof(x));
  console.log(x);

  $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
                });
               
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/hps/save',
                    data: {
                        // change data to this object
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        temp: x,   
                    },
                    success: function(response) {
                      console.log('succes') 
                       
                    }
                });
})
  

});

</script>
@endsection
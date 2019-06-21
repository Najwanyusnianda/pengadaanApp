<div class="card" style="font-family:Roboto">

        <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif;padding:0%">
            <div class="mt-2 ml-2">
               <h5>Detail Paket</h5>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="detail_table">
                  <tr>
                    <th style="width:30%">Nama Paket</th>
                    <td>: {{$permintaan->judul}} </td>
                  </tr>
                  <tr>
                      <th style="width:30%">Jenis Pengadaan</th>
                      <td>: {{$permintaan->jenis_pengadaan}} </td>
                  </tr>
                  <tr>
                      <th style="width:30%">Nilai Anggaran</th>
                      <td>: Rp.{{ number_format($permintaan->nilai,0,',','.')}} </td>
                  </tr>
                </table>
            </div>
        </div>
        <div class="card-footer">

        </div>

</div>

<style>
th{
    color: #566787;
}
</style>
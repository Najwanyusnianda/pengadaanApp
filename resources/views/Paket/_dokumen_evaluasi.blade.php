<div class="card" style="font-family:Roboto">
        <div class="card-header ">
          Dokumen Hasil Pengadaan Langsung
          <a class="btn btn-outline-info btn-sm float-right " href="{{route('paket.pembukaan',['id'=>$paket->id])}}" role="button"><i class="fas fa-plus"></i> <small>Buat Pembukaan, Evaluasi, Klarifikasi dan Negosiasi Teknis dan Harga</small></a>
        </div>
        <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif">
            <div class="div">
               
                <div class="table-responsive">
                    <table class="table table-condensed table-hover">
                        <thead>
                          <tr>
                              <th>Dokumen</th>
                              <th>Aksi</th>
                          </tr>
  
                        </thead>
                        <tbody>
                          <tr>
                            <td>BA klarifikasi dan negosiasi harga</td>
                            <td>
                              <a class="btn btn-success btn-sm shadow" href="{{route('doc.klarifikasi',['id'=>$paket->id])}}"><i class="fas fa-file-download"></i> Generate doc </a>
                            </td>
                          </tr>
                            <tr>
                              <td>BA Pembukaan, Evaluasi, Klarifikasi dan negosiasi penawaran</td>
                              <td>
                              
                                <a class="btn btn-success btn-sm shadow" href={{route('doc.evaluasi',['id'=>$paket->id])}}><i class="fas fa-file-download"></i> Generate doc </a>
                              </td>
                            </tr>
                            <tr>
                                <td>BA hasil pengadaan langsung</td>
                                <td>
                                 
                                  <a class="btn btn-success btn-sm shadow" href={{route('doc.bahpl',['id'=>$paket->id])}}><i class="fas fa-file-download"></i> Generate doc </a>
                                </td>
                              </tr>
                        </tbody>
                      </table>
                </div>

            </div>
        </div>

      </div>
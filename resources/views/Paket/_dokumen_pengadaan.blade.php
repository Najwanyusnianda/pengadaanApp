<div class="card" style="font-family:Roboto">
        <div class="card-header ">
          Dokumen Pengadaan 
        </div>
        <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif;color:#566787;">
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
                                <td>Spesifikasi Teknis</td>
                                <td>
                                  <a class="btn btn-success btn-sm shadow" href="{{route('doc.spekTeknis',['id'=>$paket->id])}}"><i class="fas fa-file-download"></i> Generate doc </a>
                                </td>
                              </tr>
                                <tr>
                                  <td>Berita Acara HPS</td>
                                  <td>
                                  
                                    <a class="btn btn-success btn-sm shadow" href={{route('doc.bahps',['id'=>$paket->id])}}><i class="fas fa-file-download"></i> Generate doc </a>
                                  </td>
                                </tr>
                                <tr>
                                    <td>HPS</td>
                                    <td>
                                     
                                      <a class="btn btn-success btn-sm shadow" href={{route('doc.hps',['id'=>$paket->id])}}><i class="fas fa-file-download"></i> Generate doc </a>
                                    </td>
                                </tr>
                                  <tr>
                                      <td>Dokumen Permohonan Pengadaan Langsung</td>
                                      <td>
                                       
                                        <a class="btn btn-success btn-sm shadow" href={{route('doc.permohonan',['id'=>$paket->id])}}><i class="fas fa-file-download"></i> Generate doc </a>
                                      </td>
                                  </tr>
                          <tr>
                            <td>Dokumen Undangan Pengadaan Langsung</td>
                            <td>
                              <a class="btn btn-success btn-sm shadow" href="{{route('doc.undangan',['id'=>$paket->id])}}"><i class="fas fa-file-download"></i> Generate doc </a>
                            </td>
                          </tr>
                          <tr>
                            <td></td>
                          </tr>
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
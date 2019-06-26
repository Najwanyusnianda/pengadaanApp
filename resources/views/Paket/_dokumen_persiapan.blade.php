<div class="card" style="font-family:Roboto">
        <div class="card-header ">
          Dokumen Persiapan Pengadaan 
          @if ($spesifikasi->isEmpty())
          <a class="btn btn-outline-info btn-sm mb-2 float-right" href="{{route('paket.persiapan',[$paket->id])}}" role="button"><i class="fas fa-plus"></i> <small>isi data Dokumen Persiapan</small></a>
          @else
              <small class="text-muted float-right">Dokumen persiapan telah dibuat <a href="{{route('paket.persiapan',[$paket->id])}}">edit dokumen?</a></small>
          @endif
          
        </div>
        <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif;">
            <div class="div">
              
                
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
                  </tbody>
                </table>
            </div>
        </div>

      </div>
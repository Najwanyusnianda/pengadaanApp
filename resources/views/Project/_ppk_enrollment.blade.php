<div class="card">
        <div class="card-header">
          Pejabat Pembuat Komitmen
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
              <thead>
                  <tr>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th width=30%>Jabatan</th>
                  <th>Kode</th>
                   </tr>
              </thead>
              @if (count($data_ppk)>0)
              <tbody>
                  
                      @forelse ($data_ppk as $ppk)
                      <tr>
                          <td>{{$ppk->nama}}</td>
                          <td>{{$ppk->nip}}</td>
                          <td>{{$ppk->jabatan_ppk}}</td>
                          <td><span class="badge badge-primary p-2">{{$ppk->kode_ppk}}</span></td>
                      </tr>    
                      @empty
                          
                      @endforelse

                  </tbody>
              @endif
          
            </table>
        </div>
    </div>
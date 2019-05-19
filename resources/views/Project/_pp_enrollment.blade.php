<div class="card">
        <div class="card-header">
          Pejabat Pengadaan
        </div>
        <div class="card-body">
            
            <table class="table table-stripped">
              <thead>
                  <tr>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th width=30%>Jabatan</th>
                  <th>Kode</th>
             
                   </tr>
              </thead>
              @if (count($data_pp)>0)
              <tbody>
                  
                      @forelse ($data_pp as $pp)
                      <tr>
                          <td>{{$pp->nama}}</td>
                          <td>{{$pp->nip}}</td>
                          <td>{{$pp->jabatan_pp}}</td>
                          <td><span class="badge badge-primary p-2">{{$pp->kode_pp}}</span></td>
                      </tr>    
                      @empty
                          
                      @endforelse

                  </tbody>
              @endif
          
            </table>
        </div>
    </div>
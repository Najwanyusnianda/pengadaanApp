<div class="card card-outline">
        <div class="card-header">
          <strong style="color:#2980b9"> Unit Layanan Pengadaan</strong>
          
        </div>
        <div class="card-body">
            
            <table class="table table-striped table-condensed" >
              <thead>
                  <tr>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th width=30%>Jabatan</th>
                   </tr>
              </thead>
              
              <tbody style="">
                    @if (count($data_kulp)>0)
                      @forelse ($data_kulp as $data)
                      <tr>
                          <td>{{$data->nama_depan}} {{$data->nama_belakang}}</td>
                          <td>{{$data->nip}}</td>
                          <td>{{$data->deskripsi}}</td>
                          
                      </tr>    
                      @empty
                        <tr>Tidak ada kepala ULP</tr>  
                      @endforelse
                    @endif

                @if (count($data_kasi)>0)
                    @forelse ($data_kasi as $data)
                    <tr>
                        <td>{{$data->nama_depan}} {{$data->nama_belakang}}</td>
                        <td>{{$data->nip}}</td>
                        <td>{{$data->deskripsi}}</td>
                        
                    </tr>    
                    @empty
                      <tr>Tidak ada kasi</tr>  
                    @endforelse
                @endif
                
                @if (count($data_staff)>0)
                    @forelse ($data_staff as $data)
                    <tr>
                        <td>{{$data->nama_depan}} {{$data->nama_belakang}}</td>
                        <td>{{$data->nip}}</td>
                        <td>{{$data->deskripsi}}</td>
                        
                    </tr>    
                    @empty
                      <tr>Tidak ada staff</tr>  
                    @endforelse
                @endif
            </tbody>
            
          
            </table>
        </div>
    </div>
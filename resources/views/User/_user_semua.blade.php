<div class="" style="font-family:QuickSand;font-size:14px;">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-bordered">
            <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Modify</th>
                    </tr>
            </thead>
            <tbody>
            @forelse ($pelaku as $data)
            <tr>
                    <td>
                        <a href="#" style="color:black;" >
                           <!-- <img src="{{asset('img/user.png')}}" class="avatar" alt="User Image" style="display:block;" width="40px" height="40px"> -->
                        <strong style="color:#0097e6">{{$data->nama}}</strong> 
                        </a>
                    </td>
                    <td>{{$data->nip}}</td>
                    <td>{{$data->deskripsi}}</td>
                    <td>
                        <span class="status text-success" style="font-size:20px;">•</span>
                        {{$data->is_active ? 'aktif' : 'tidak aktif'}}
                    </td>
                    <td>
                        <div class="btn-group">
                                <div class="btn-group">
                                        <a class="btn btn-link  " >
                                                <i class="fas fa-cog fa-lg" style="color:#0097e6;"></i> 
                                        </a>
                                        <a class="btn btn-link " >
                                                <i class="fas fa-times-circle fa-lg" style="color:#e84118;"></i>
                                        </a>
                                </div>
                        </div>
                    </td>
                </tr>
            @empty
                tidak ada data
            @endforelse    
            
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
      </div>
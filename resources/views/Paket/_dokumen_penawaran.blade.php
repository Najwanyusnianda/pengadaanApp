<div class="card" style="font-family:Roboto">
        <div class="card-header ">
        Dokumen Penawaran  
        <div class="btn-group float-right">
                    <a class="btn btn-outline-info btn-sm float-right" href="{{route('upload.penawaran.index',[$paket->id])}}" role="button"><i class="fas fa-plus"></i> <small>Upload Dok. Penawaran</small></a>
     
        <a href="{{route('paket.detail.jadwal_penawaran',['id'=>$paket->id])}}" class="btn btn-outline-info btn-sm float-right">Buat Jadwal Penawaran</a> 
       
        </div>
       </div>
        <div class="card-body" style="font-size:13px;font-family:'Varela Round'">
            <div class="div">
               

              
                @if (!empty($dokumen))
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Path</th>
                                <th>URL</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dokumen as $file)
                                <tr>
                                    <td>{{ $file->subject }}</td>
                                    <td>{{ $file->document_file }}</td>
                                    <td>
                                        <a href="{{ Storage::url($file->document_file) }}">
                                            View
                                        </a>
                                    </td>
                                    <td>{{ $file->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

            </div>
        </div>

      </div>
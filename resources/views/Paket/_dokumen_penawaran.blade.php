<div class="card" style="font-family:Roboto">
        <div class="card-header ">
        Dokumen Penawaran  
        <div class="btn-group float-right">
                    <a class="btn btn-outline-info btn-sm float-right" href="{{route('upload.penawaran.index',[$paket->id])}}" role="button"><i class="fas fa-plus"></i> <small>Upload Dok. Penawaran</small></a>
     
       
       
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
                                <th>lihat</th>
                                <th>Waktu Upload</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dokumen as $file)
                                <tr>
                                    <td>{{ $file->subject }}</td>
                                   <!-- <td>{{ $file->document_file }}</td>-->
                                    <td>
                                        <a href="{{ Storage::url($file->document_file) }} " class="badge badge-success">
                                         lihat
                                        </a>
                                    </td>
                                    <td> <span class="badge badge-info">{{ $file->created_at->diffForHumans() }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

            </div>
        </div>

      </div>
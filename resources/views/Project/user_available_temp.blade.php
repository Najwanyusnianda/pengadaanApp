<div class="container">
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIP</th>
            </tr>
        </thead>
        <tbody>
            @if (count($pegawai)>0)
            @forelse ($pegawai as $data)
            <tr>
                    <td value="{{$data->id}}">
                        {{$data->nama}}
                    </td>
                    <td>
                        {{$data->nip}}
                    </td>
            </tr>
                
            @empty
                
            @endforelse
            @else
                <tr>
                    <td rowspan="2" ><span class="text-center">Tidak ada Pegawai</span></td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
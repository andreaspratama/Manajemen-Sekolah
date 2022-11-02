<table class="table table-bordered">
    <tr>
        <th>Unit</th>
        <td>{{$item->unit}}</td>
    </tr>
    <tr>
        <th>Tanggal</th>
        <td>{{$item->tanggal}}</td>
    </tr>
    <tr>
        <th>Jam Awal</th>
        <td>{{$item->j_awal}}</td>
    </tr>
    <tr>
        <th>Jam Akhir</th>
        <td>{{$item->j_akhir}}</td>
    </tr>
    <tr>
        <th>Kelas</th>
        <td>{{$item->kelas}}</td>
    </tr>
    <tr>
        <th>Siswa</th>
        <td>{{$item->siswa}}</td>
    </tr>
    <tr>
        <th>Guru</th>
        <td>{{$item->guru}}</td>
    </tr>
    <tr>
        <th>Materi</th>
        <td>{{$item->materi}}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{$item->status}}</td>
    </tr>
    <tr>
        <th>Keterangan</th>
        <td>{{$item->ket}}</td>
    </tr>
</table>
<div class="row">
    <div class="col-12">
        <form action="{{route('pinjam.status', $item->id)}}" method="GET">
            @csrf
            <div class="form-row">
                <div class="col-md-5 mb-3">
                  <input type="text" class="form-control" name="ket" placeholder="Keterangan">
                </div>
                <div class="col-md-5 mb-3">
                  <input type="text" class="form-control" name="status" placeholder="Status">
                </div>
                <div class="col-md-2 mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
    {{-- <div class="col-6">
        <a href="{{route('pinjam.status', $item->id)}}?status=APPROVE" class="btn btn-success btn-block">
            <i class="fa fa-check"></i> Approve
        </a>
    </div>
    <div class="col-6">
        <a href="{{route('pinjam.status', $item->id)}}?status=CANCEL" class="btn btn-warning btn-block">
            <i class="fa fa-times"></i> Cancel
        </a>
    </div> --}}
</div>
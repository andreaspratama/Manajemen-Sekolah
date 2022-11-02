@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Daftar Pinjam IOT {{$item->unit}} / {{$item->guru}}</h6>
            </div>
            <div class="card-body">
                <form action="{{route('dpinjam.update', $item->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <select class="form-control" id="unit" name="unit">
                          <option>-- Pilih Unit --</option>
                          <option value="K1" @if($item->unit == 'K1') selected @endif>K1</option>
                          <option value="K2" @if($item->unit == 'K2') selected @endif>K2</option>
                          <option value="K3" @if($item->unit == 'K3') selected @endif>K3</option>
                          <option value="SMP" @if($item->unit == 'SMP') selected @endif>SMP</option>
                          <option value="SMA" @if($item->unit == 'SMA') selected @endif>SMA</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="tanggal">Tanggal</label>
                      <input type="text" class="form-control" name="tanggal" value="{{$item->tanggal}}">
                    </div>
                    <div class="form-group">
                        <label for="j_awal">Jam Awal</label>
                        <input type="time" class="form-control" id="j_awal" name="j_awal" placeholder="07.00" value="{{$item->j_awal}}">
                    </div>
                    <div class="form-group">
                        <label for="j_akhir">Jam Akhir</label>
                        <input type="time" class="form-control" id="j_akhir" name="j_akhir" placeholder="09.00" value="{{$item->j_akhir}}">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" placeholder="4 SC" value="{{$item->kelas}}">
                    </div>
                    <div class="form-group">
                        <label for="siswa">Siswa</label>
                        <input type="text" class="form-control" id="siswa" name="siswa" placeholder="30" value="{{$item->siswa}}">
                    </div>
                    <div class="form-group">
                        <label for="guru">Guru</label>
                        <input type="text" class="form-control" id="guru" name="guru" placeholder="Irawan Hery" value="{{$item->guru}}">
                    </div>
                    <div class="form-group">
                        <label for="materi">Materi</label>
                        <input type="text" class="form-control" id="siswa" name="materi" placeholder="Pengolahan angka pada matematika" value="{{$item->materi}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('dpinjam.index')}}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>

    </div>
    @include('sweetalert::alert')
@endsection


@push('prepend-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush

@push('addon-script')
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $( function() {
          $( "#datepicker" ).datepicker();
        } );
    </script>
    
@endpush
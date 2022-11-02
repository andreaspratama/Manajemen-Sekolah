@extends('layouts.admin')

@section('title')
    Daftar Ruang IOT
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pinjam IOT</h6>
            </div>
            <div class="card-body">
                <form action="{{route('dpinjam.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <select class="form-control @error('unit') is-invalid @enderror" id="unit" name="unit">
                          <option>-- Pilih Unit --</option>
                          <option value="K1">K1</option>
                          <option value="K2">K2</option>
                          <option value="K3">K3</option>
                          <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
                        </select>
                        @error('unit')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
            <div class="kj"></div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal">
                        @error('tanggal')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="j_awal">Jam Awal</label>
                        <input type="time" class="form-control @error('j_awal') is-invalid @enderror" id="j_awal" name="j_awal" placeholder="07.00">
                        @error('j_awal')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="j_akhir">Jam Akhir</label>
                        <input type="time" class="form-control @error('j_akhir') is-invalid @enderror" id="j_akhir" name="j_akhir" placeholder="09.00">
                        @error('j_akhir')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" placeholder="4 SC">
                        @error('kelas')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="siswa">Siswa</label>
                        <input type="text" class="form-control @error('siswa') is-invalid @enderror" id="siswa" name="siswa" placeholder="30">
                        @error('siswa')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="guru">Guru</label>
                        <input type="text" class="form-control @error('guru') is-invalid @enderror" id="guru" name="guru" placeholder="Irawan Hery">
                        @error('guru')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="materi">Materi</label>
                        <input type="text" class="form-control @error('materi') is-invalid @enderror" id="siswa" name="materi" placeholder="Pengolahan angka pada matematika">
                        @error('materi')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
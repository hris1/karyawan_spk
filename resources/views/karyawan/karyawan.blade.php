@extends('layouts.app-home-features')

@section('menu')
<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item active mb-5 ">
            <a class="nav-link" href="{{route('tambah_data')}}">
                <i class="material-icons">add</i>
                <p>Tambah Data</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <i class="material-icons">dashboard</i>
                <p>Beranda</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('kriteria')}}">
                <i class="material-icons">content_paste</i>
                <p>Data Kriteria</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{route('subKriteria')}}">
                <i class="material-icons">library_books</i>
                <p>Data Sub Kriteria</p>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('karyawan')}}">
                <i class="material-icons">person</i>
                <p>Data Karyawan</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{route('alternatif')}}">
                <i class="material-icons">bubble_chart</i>
                <p>Data Alternatif</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{route('perhitungan')}}">
                <i class="material-icons">calculate</i>
                <p>Hasil Perhitungan</p>
            </a>
        </li>
    </ul>
</div>
@endsection

@section('navbar-brand')
<a class="navbar-brand" href="javascript:;">Data Kriteria</a>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Data Kriteria</h4>
            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>No.</th>
                        <th>Nomor Pendaftaran</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Usia</th>
                        <th>Nomer Telepon</th>
                        <th>#</th>
                    </thead>
                    <tbody>
                        @foreach ($karyawan as $count => $k)
                        <tr>
                            <td>{{$count+1}}</td>
                            <td>{{$k->no_pendaftaran}}</td>
                            <td>{{$k->nama}}</td>
                            <td>{{$k->alamat}}</td>
                            <td>{{$k->jenis_kelamin}}</td>
                            <td>{{$k->usia}}</td>
                            <td>{{$k->no_telp}}</td>
                            <td>
                                <a href="" class="btn btn-primary"
                                    style="width: 40px; height: 30px; text-align: center; padding: 8px 10px; text-transform: none">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="{{route('home')}}" class="btn btn-primary pull-right">Kembali</a>
</div>
@endsection

@section('footer')
@include('layouts.footer')
@endsection

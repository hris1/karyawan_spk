@extends('layouts.app-home-features')

@section('menu')
<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item active mb-2">
            <a class="nav-link" href="{{route('tambah_data')}}">
                <i class="material-icons">add</i>
                <p>Tambah Data</p>
            </a>
        </li>
        <li class="nav-item active mb-5">
            <a class="nav-link" href="{{route('lihat_data')}}">
                <i class="material-icons">edit_note</i>
                <p>Edit Data </p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <i class="material-icons">dashboard</i>
                <p>Beranda</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{route('kriteria')}}">
                <i class="material-icons">content_paste</i>
                <p>Data Kriteria</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('subKriteria')}}">
                <i class="material-icons">library_books</i>
                <p>Data Sub Kriteria</p>
            </a>
        </li>
        <li class="nav-item ">
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
        <li class="nav-item active">
            <a class="nav-link" href="{{route('perhitungan')}}">
                <i class="material-icons">calculate</i>
                <p>Hasil Perhitungan</p>
            </a>
        </li>
    </ul>
</div>
@endsection

@section('navbar-brand')
<a class="navbar-brand" href="javascript:;">Data Perhitungan</a>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary mb-5">
            <h4 class="card-title ">Data Sebelum Normalisasi</h4>
            <p class="card-category"> Keterangan : K1 = Tingkat Pendidikan, K2 = Usia, K3 = Ujian Praktek, K4 =
                Kelengkapan
                Dokumen, K5 = Wawancara</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>
                            No
                        </th>
                        <th>
                            No. Pendaftaran
                        </th>
                        <th>
                            Nama Calon Karyawan
                        </th>
                        <th>
                            K1
                        </th>
                        <th>
                            K2
                        </th>
                        <th>
                            K3
                        </th>
                        <th>
                            K4
                        </th>
                        <th>
                            K5
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($perhitungan as $count => $p)
                        <tr>
                            <td>
                                {{$count +1 }}
                            </td>
                            <td>
                                {{$p->karyawan->no_pendaftaran}}
                            </td>
                            <td>
                                {{$p->karyawan->nama}}
                            </td>
                            <td>
                                {{$p->k1}}
                            </td>
                            <td>
                                {{$p->k2}}
                            </td>
                            <td>
                                {{$p->k3}}
                            </td>
                            <td>
                                {{$p->k4}}
                            </td>
                            <td>
                                {{$p->k5}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary mb-5">
            <h4 class="card-title ">Data Setelah Normalisasi</h4>
            <p class="card-category"> Keterangan : K1 = Tingkat Pendidikan, K2 = Usia, K3 = Ujian Praktek, K4 =
                Kelengkapan
                Dokumen, K5 = Wawancara</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>
                            No
                        </th>
                        <th>
                            No. Pendaftaran
                        </th>
                        <th>
                            Nama Calon Karyawan
                        </th>
                        <th>
                            K1
                        </th>
                        <th>
                            K2
                        </th>
                        <th>
                            K3
                        </th>
                        <th>
                            K4
                        </th>
                        <th>
                            K5
                        </th>
                        <th>
                            Total
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($perhitungan as $count => $p)
                        <tr>
                            <td>
                                {{$count +1 }}
                            </td>
                            <td>
                                {{$p->karyawan->no_pendaftaran}}
                            </td>
                            <td>
                                {{$p->karyawan->nama}}
                            </td>
                            <td>
                                {{$p->k1 / $perhitunganK1max}}
                            </td>
                            <td>
                                {{$perhitunganK2min / $p->k2}}
                            </td>
                            <td>
                                {{$p->k3 / $perhitunganK3max}}
                            </td>
                            <td>
                                {{$p->k4 / $perhitunganK4max}}
                            </td>
                            <td>
                                {{$p->k5 / $perhitunganK5max}}
                            </td>
                            <td>
                                {{(($p->k1 / $perhitunganK1max) * $k1) + (($perhitunganK2min / $p->k2) * $k2) + (($p->k3 / $perhitunganK3max) * $k3) + (($p->k4 / $perhitunganK4max) * $k4) + (($p->k5 / $perhitunganK5max) * $k5)}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="{{route('home')}}" class="btn btn-danger pull-right">Kembali</a>
</div>
@endsection

@section('footer')
@include('layouts.footer')
@endsection

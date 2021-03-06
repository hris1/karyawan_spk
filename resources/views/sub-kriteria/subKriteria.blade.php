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
        <li class="nav-item active">
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
<a class="navbar-brand" href="javascript:;">Data Sub-Kriteria</a>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Data Sub-Kriteria</h4>
            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>
                            No
                        </th>
                        <th>
                            Kode
                        </th>
                        <th>
                            Keterangan
                        </th>
                        <th>
                            Atribut
                        </th>
                        <th>
                            Batasan
                        </th>
                        <th>
                            Crips
                        </th>
                        <th>
                            Bobot
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($subKriteria as $sub => $s)
                        <tr>
                            <td>
                                {{$sub +1 }}
                            </td>
                            <td>
                                {{$s->kriteria->kode}}
                            </td>
                            <td>
                                {{$s->kriteria->keterangan}}
                            </td>
                            <td>
                                {{$s->kriteria->atribut}}
                            </td>
                            <td>
                                {{$s->nilai_min}} - {{$s->nilai_max}} {{$s->kategori}}
                            </td>
                            <td>
                                {{$s->crips}}
                            </td>
                            <td>
                                {{$s->bobot}}
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

@extends('layouts.app-home-features')

@section('menu')
@include('layouts.menu')
@endsection

@section('navbar-brand')
<a class="navbar-brand" href="{{route('home')}}">Beranda</a>
@endsection

@section('content')
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats" style="min-height: 222px">
        <div class="card-header card-header-warning card-header-icon" style="min-height: 160px">
            <div class="row">
                <div class="col-12">
                    <div class="card-icon">
                        <i class="material-icons">content_paste</i>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <h3 class="card-title" style="text-align: left">Data Kriteria</h3>
            </div>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons text-primary">visibility</i>
                <a href="{{route('kriteria')}}">lihat selengkapnya</a>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats" style="min-height: 222px">
        <div class="card-header card-header-danger card-header-icon" style="min-height: 160px">
            <div class="row">
                <div class="col-12">
                    <div class="card-icon">
                        <i class="material-icons">library_books</i>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <h3 class="card-title" style="text-align: left">Data Sub Kriteria</h3>
            </div>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons text-primary">visibility</i>
                <a href="{{route('subKriteria')}}">lihat selengkapnya</a>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats" style="min-height: 222px">
        <div class="card-header card-header-success card-header-icon" style="min-height: 160px">
            <div class="row">
                <div class="col-12">
                    <div class="card-icon">
                        <i class="material-icons">person</i>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <h3 class="card-title" style="text-align: left">Data Karyawan</h3>
            </div>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons text-primary">visibility</i>
                <a href="{{route('karyawan')}}">lihat selengkapnya</a>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats" style="min-height: 222px">
        <div class="card-header card-header-info card-header-icon" style="min-height: 160px">
            <div class="row">
                <div class="col-12">
                    <div class="card-icon">
                        <i class="material-icons">bubble_chart</i>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <h3 class="card-title" style="text-align: left">Data Alternatif</h3>
            </div>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons text-primary">visibility</i>
                <a href="{{route('alternatif')}}">lihat selengkapnya</a>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats" style="min-height: 222px">
        <div class="card-header card-header-secondary card-header-icon" style="min-height: 160px">
            <div class="row">
                <div class="col-12">
                    <div class="card-icon">
                        <i class="material-icons">calculate</i>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <h3 class="card-title" style="text-align: left">Hasil Perhitungan</h3>
            </div>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons text-primary">visibility</i>
                <a href="{{route('perhitungan')}}">lihat selengkapnya</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.footer')
@endsection

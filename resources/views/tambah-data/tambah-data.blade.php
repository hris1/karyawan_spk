@extends('layouts.app-home-features')

@section('menu')
<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item active mb-5">
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
        <li class="nav-item ">
            <a class="nav-link" href="">
                <i class="material-icons">calculate</i>
                <p>Hasil Perhitungan</p>
            </a>
        </li>
    </ul>
</div>
@endsection

@section('navbar-brand')
<a class="navbar-brand" href="javascript:;">Tambah Data</a>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary mb-5">
            <h4 class="card-title">Tambah Data Calon Karyawan</h4>
            {{-- <p class="card-category">Complete your profile</p> --}}
        </div>
        <div class="card-body">
            <form action="{{route('store_data')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nomer Pendaftaran</label>
                            <input type="number" class="form-control" value="{{old('no_pendaftaran')}}"
                                name="no_pendaftaran" pattern="/^-?\d+\.?\d*$/"
                                onKeyPress="if(this.value.length==13) return false;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Alamat</label>
                            <input type="text" class="form-control" name="alamat">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-control">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Usia</label>
                            <input type="number" name="usia" class="form-control" pattern="/^-?\d+\.?\d*$/"
                                onKeyPress="if(this.value.length==13) return false;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">No. Telepon</label>
                            <input type="number" name="no_telp" class="form-control" pattern="/^-?\d+\.?\d*$/"
                                onKeyPress="if(this.value.length==13) return false;">
                        </div>
                    </div>
                </div>
                <p style="font-size: 24px" class="mt-5"><strong>Data Alternatif</strong></p>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Kategori Usia</label>
                            <select id="kategori" name="kategori" class="form-control">
                                <option selected disabled>Pilih Kategori Usia</option>
                                @foreach($kategori as $g)
                                <option value="{{$g->kategori}}">{{$g->nilai_min}}-{{$g->nilai_max}} Tahun
                                    {{$g->kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Pendidikan</label>
                            <select name="pendidikan" id="pendidikan" class="form-control">
                                <option selected disabled>Pilih Pendidikan Terakhir</option>
                                @foreach($pendidikan as $pr)
                                <option value="{{$pr->crips}}">{{$pr->crips}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Kelengkapan Dokumen</label>
                            <select name="dokumen" id="dokumen" class="form-control">
                                <option selected disabled>Pilih Kelengkapan Dokumen</option>
                                @foreach($dokumen as $pk)
                                <option value="{{$pk->crips}}">{{$pk->crips}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Hasil Wawancara</label>
                            <select name="wawancara" id="wawancara" class="form-control">
                                <option value="" disabled selected>Pilih Hasil Wawancara</option>
                                @foreach($wawancara as $ni)
                                <option value="{{$ni->crips}}">{{$ni->crips}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Pengalaman Kerja</label>
                            <select name="pengalaman" id="pengalaman" class="form-control">
                                <option value="" disabled selected>Pilih Pengalaman Kerja</option>
                                @foreach($pengalaman as $s)
                                <option value="{{$s->crips}}">{{$s->crips}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-left mt-5">Tambah Data</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.footer')
@endsection

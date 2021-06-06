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
<a class="navbar-brand" href="javascript:;">Edit Data</a>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary mb-5">
            <h4 class="card-title">Edit Data Calon Karyawan </h4>
            {{-- <p class="card-category">Complete your profile</p> --}}
        </div>
        <div class="card-body">
            <form action="{{route('update_data', $edit_data->karyawan->id)}}" method="post"
                onsubmit="return validateForm();">
                @csrf
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nomer Pendaftaran lama</label>
                            <input type="text" disabled value="{{$edit_data->karyawan->no_pendaftaran}}"
                                class="form-control" id="no_pendaftaran1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Ganti nomer pendaftaran dengan :</label>
                            <input type="number" class="form-control" id="no_pendaftaran" name="no_pendaftaran"
                                pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama Lengkap</label>
                            <input type="text" disabled value="{{$edit_data->karyawan->nama}}" class="form-control"
                                id="nama1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Ganti nama lengkap dengan :</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Alamat</label>
                            <input type="text" disabled value="{{$edit_data->karyawan->alamat}}" class="form-control"
                                id="alamat1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Ganti alamat dengan :</label>
                            <input type="text" class="form-control" name="alamat" id="alamat">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Jenis kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-control">
                                <option value="" selected disabled>{{$edit_data->karyawan->jenis_kelamin}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Ganti jenis kelamin dengan :</label>
                            <select name="jenis_kelamin" id="" class="form-control">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Usia</label>
                            <input type="text" disabled value="{{$edit_data->karyawan->usia}}" class="form-control"
                                id="usia1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Ganti usia dengan :</label>
                            <input type="number" name="usia" class="form-control" pattern="/^-?\d+\.?\d*$/"
                                onKeyPress="if(this.value.length==13) return false;" id="usia">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">No. Telepon</label>
                            <input type="text" disabled value="{{$edit_data->karyawan->no_telp}}" class="form-control"
                                id="no_telp1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Ganti nomor telepon dengan :</label>
                            <input type="number" name="no_telp" class="form-control" pattern="/^-?\d+\.?\d*$/"
                                onKeyPress="if(this.value.length==13) return false;" id="no_telp">
                        </div>
                    </div>
                </div>
                <p style="font-size: 24px" class="mt-5"><strong>Data Alternatif</strong></p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Pendidikan</label>
                            <select name="pendidikan" id="pendidikan" class="form-control">
                                <option selected disabled>{{$edit_data->pendidikan}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Ganti pendidikan dengan :</label>
                            <select name="pendidikan" id="pendidikan" class="form-control">
                                <option selected disabled>Pilih Pendidikan Terakhir</option>
                                @foreach($pendidikan as $pr)
                                <option value="{{$pr->crips}}">{{$pr->crips}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Kategori Usia</label>
                            <select id="kategori" name="kategori" class="form-control">
                                <option selected disabled>{{$edit_data->kategori_usia}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Ganti kategori usia dengan :</label>
                            <select id="kategori" name="kategori" class="form-control">
                                <option selected disabled>Pilih Kategori Usia</option>
                                @foreach($kategori as $g)
                                <option value="{{$g->kategori}}">{{$g->nilai_min}}-{{$g->nilai_max}} Tahun
                                    {{$g->kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Ujian Praktek</label>
                            <select name="ujian_praktek" id="ujian_praktek" class="form-control">
                                <option value="" disabled selected>{{$edit_data->ujian_praktek}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Ganti ujian praktek dengan :</label>
                            <select name="ujian_praktek" id="ujian_praktek" class="form-control">
                                <option value="" disabled selected>Pilih Hasil Ujian Praktek</option>
                                @foreach($ujian_praktek as $s)
                                <option value="{{$s->crips}}">{{$s->crips}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Kelengkapan Dokumen</label>
                            <select name="dokumen" id="dokumen" class="form-control">
                                <option selected disabled>{{$edit_data->dokumen}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Ganti kelengkapan dokumen dengan :</label>
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
                                <option value="" disabled selected>{{$edit_data->wawancara}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Ganti hasil wawancara dengan :</label>
                            <select name="wawancara" id="wawancara" class="form-control">
                                <option value="" disabled selected>Pilih Hasil Wawancara</option>
                                @foreach($wawancara as $ni)
                                <option value="{{$ni->crips}}">{{$ni->crips}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary pull-left mt-5">Perbaharui Data</button>
            </form>
                <button class="btn btn-danger pull-right mt-5" data-toggle="modal"
                    data-target="#exampleModalCenter">Hapus Data</button>
                <div class="clearfix"></div>
            {{-- <form id="hapus-data" action="" method="POST" style="display: none;">
                @csrf
            </form> --}}

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Pemberitahuan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin akan menghapus data ini ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <form action="{{ route('hapus_data', $edit_data->karyawan->id) }}" method="POST" >
                            @csrf
                            <button type="submit" class="btn btn-primary">Hapus Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    function validateForm() {
        var proxied = window.alert;
        window.alert = function () {
            modal = $(
                `<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Pemberitahuan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>`
            );
            modal.find(".modal-body").text(arguments[0]);
            modal.modal('show');
        };

        var no_pendaftaran1 = document.getElementById('no_pendaftaran1');
        no_pendaftaran = document.getElementById('no_pendaftaran');

        nama1 = document.getElementById('nama1');
        nama = document.getElementById('nama');

        alamat = document.getElementById('alamat');
        alamat1 = document.getElementById('alamat1');

        usia = document.getElementById('usia');
        usia1 = document.getElementById('usia1');

        no_telp = document.getElementById('no_telp');
        no_telp1 = document.getElementById('no_telp1');

        if (no_pendaftaran.value.length === 0) {
            no_pendaftaran.value = no_pendaftaran1.value;
        }

        if (nama.value.length === 0) {
            nama.value = nama1.value;
        }

        if (alamat.value.length === 0) {
            alamat.value = alamat1.value;
        }

        if (usia.value.length === 0) {
            usia.value = usia1.value;
        }

        if (no_telp.value.length === 0) {
            no_telp.value = no_telp1.value;
        }

        return true;
    }

</script>
@endsection

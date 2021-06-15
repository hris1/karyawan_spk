<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;
use App\SubKriteria;
use App\Karyawan;
use App\Alternatif;
use App\Perhitungan;

use RealRashid\SweetAlert\Facades\Alert;


class TambahDataController extends Controller
{
    public function __construct()
    {
        $this->perhitungan = new Hitungcontroller;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendidikan = SubKriteria::where('kriteria_id', 1)->get();

        $kategori = SubKriteria::where('kriteria_id', 2)->get();
                
        $ujian_praktek = SubKriteria::where('kriteria_id', 3)->get();
        
        $dokumen = SubKriteria::where('kriteria_id', 4)->get();

        $wawancara = SubKriteria::where('kriteria_id', 5)->get();

        return view('tambah-data.tambah-data', compact('pendidikan', 'dokumen', 'wawancara', 'ujian_praktek', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        
        $karyawan = Karyawan::create([
            'no_pendaftaran' => $req->no_pendaftaran,
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'jenis_kelamin' => $req->jenis_kelamin,
            'usia' => $req->usia,
            'no_telp' => $req->no_telp,
        ]);
        
        Alternatif::create([
            'karyawan_id' => $karyawan->id,
            'kategori_usia' => $req->kategori,
            'pendidikan' => $req->pendidikan,
            'dokumen' => $req->dokumen,
            'wawancara' => $req->wawancara,
            'ujian_praktek' => $req->ujian_praktek,
        ]);

        $hasil = $this->perhitungan->index(
            $req->kategori,$req->pendidikan,$req->dokumen,$req->wawancara,$req->ujian_praktek,
            2, 1, 4, 5, 3 );
        $k1 = Kriteria::where('kode','k1')->with('subKriteria')->first();
        $k2 = Kriteria::where('kode','k2')->with('subKriteria')->first();
        $k3 = Kriteria::where('kode','k3')->with('subKriteria')->first();
        $k4 = Kriteria::where('kode','k4')->with('subKriteria')->first();
        $k5 = Kriteria::where('kode','k5')->with('subKriteria')->first();

        
        $perhitunganK1max = Perhitungan::max('k1');
        $perhitunganK2max = Perhitungan::max('k2');
        $perhitunganK3max = Perhitungan::max('k3');
        $perhitunganK4max = Perhitungan::max('k4');
        $perhitunganK5max = Perhitungan::max('k5');

        $perhitunganK1min = Perhitungan::min('k1');
        $perhitunganK2min = Perhitungan::min('k2');
        $perhitunganK3min = Perhitungan::min('k3');
        $perhitunganK4min = Perhitungan::min('k4');
        $perhitunganK5min = Perhitungan::min('k5');

        
     
        // dd($perhitunganK1min);
        

        Perhitungan::create([
            'karyawan_id' => $karyawan->id,
            'k1' =>$hasil['nilaipendidikan']->bobot,
            'k2' =>$hasil['nilaikategori']->bobot,
            'k3' =>$hasil['nilaiujian_praktek']->bobot,
            'k4' =>$hasil['nilaidokumen']->bobot,
            'k5' =>$hasil['nilaiwawancara']->bobot,
        ]);
        
        Alert::success('Berhasil', 'Data baru berhasil ditambahkan');
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $edit_data = Alternatif::all();
        return view('edit-data.lihat-data', compact('edit_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_data = Alternatif::whereId($id)
            ->firstOrFail();


        $pendidikan = SubKriteria::where('kriteria_id', 1)->get();

        $kategori = SubKriteria::where('kriteria_id', 2)->get();
                
        $ujian_praktek = SubKriteria::where('kriteria_id', 3)->get();
        
        $dokumen = SubKriteria::where('kriteria_id', 4)->get();

        $wawancara = SubKriteria::where('kriteria_id', 5)->get();

        return view('edit-data.edit-data', compact('edit_data','pendidikan', 'dokumen', 'wawancara', 'ujian_praktek', 'kategori'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $karyawan = Karyawan::whereId($id)->update([
            'no_pendaftaran' => $req->no_pendaftaran,
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'jenis_kelamin' => $req->jenis_kelamin,
            'usia' => $req->usia,
            'no_telp' => $req->no_telp,
        ]);
        
        Alternatif::where('karyawan_id', $id)->update([
            'kategori_usia' => $req->kategori,
            'pendidikan' => $req->pendidikan,
            'dokumen' => $req->dokumen,
            'wawancara' => $req->wawancara,
            'ujian_praktek' => $req->ujian_praktek,
        ]);

        $hasil = $this->perhitungan->index(
            $req->kategori,$req->pendidikan,$req->dokumen,$req->wawancara,$req->ujian_praktek,
            2, 1, 4, 5, 3 );
        $k1 = Kriteria::where('kode','k1')->with('subKriteria')->first();
        $k2 = Kriteria::where('kode','k2')->with('subKriteria')->first();
        $k3 = Kriteria::where('kode','k3')->with('subKriteria')->first();
        $k4 = Kriteria::where('kode','k4')->with('subKriteria')->first();
        $k5 = Kriteria::where('kode','k5')->with('subKriteria')->first();

        $perhitunganK1max = Perhitungan::max('k1');
        $perhitunganK2max = Perhitungan::max('k2');
        $perhitunganK3max = Perhitungan::max('k3');
        $perhitunganK4max = Perhitungan::max('k4');
        $perhitunganK5max = Perhitungan::max('k5');

        $perhitunganK1min = Perhitungan::min('k1');
        $perhitunganK2min = Perhitungan::min('k2');
        $perhitunganK3min = Perhitungan::min('k3');
        $perhitunganK4min = Perhitungan::min('k4');
        $perhitunganK5min = Perhitungan::min('k5');

        
        Perhitungan::where('karyawan_id', $id)->update([
            'k1' =>$hasil['nilaipendidikan']->bobot,
            'k2' =>$hasil['nilaikategori']->bobot,
            'k3' =>$hasil['nilaiujian_praktek']->bobot,
            'k4' =>$hasil['nilaidokumen']->bobot,
            'k5' =>$hasil['nilaiwawancara']->bobot,
        ]);
        // dd($output);
            
        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->alternatif->delete();
        $karyawan->perhitungan->delete();
        $karyawan->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect('/home');
    }
}

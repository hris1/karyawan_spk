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


        // Mencari nilai maksimal dan minimal bobot kriteria
        $minK1 = $k1->subKriteria[0]->bobot;
        $maxK1 = $k1->subKriteria[count($k1->subKriteria) - 1]->bobot;

        $minK2 = $k2->subKriteria[0]->bobot;
        $maxK2 = $k2->subKriteria[count($k2->subKriteria) - 1]->bobot;

        $minK3 = $k3->subKriteria[0]->bobot;
        $maxK3 = $k3->subKriteria[count($k3->subKriteria) - 1]->bobot;

        $minK4 = $k4->subKriteria[0]->bobot;
        $maxK4 = $k4->subKriteria[count($k4->subKriteria) - 1]->bobot;

        $minK5 = $k5->subKriteria[0]->bobot;
        $maxK5 = $k5->subKriteria[count($k5->subKriteria) - 1]->bobot;


        $output['nilaikategori'] = 0;
        $output['nilaipendidikan'] = 0;
        $output['nilaidokumen'] = 0;
        $output['nilaiwawancara'] = 0;
        $output['nilaiujian_praktek'] = 0;


        if($hasil['nilaipendidikan']->kriteria->atribut == 'Benefit'){
            $output['nilaipendidikan'] = $hasil['nilaipendidikan']->bobot / $maxK1;
        }else if($hasil['nilaipendidikan']->kriteria->atribut == 'Cost'){
            $output['nilaipendidikan'] = $hasil['nilaipendidikan']->bobot / $minK1;
        }

        
        if($hasil['nilaikategori']->kriteria->atribut == 'Benefit'){
            $output['nilaikategori'] = $hasil['nilaikategori']->bobot / $maxK2;
        }else if($hasil['nilaikategori']->kriteria->atribut == 'Cost'){
            $output['nilaikategori'] = $hasil['nilaikategori']->bobot / $minK2;
        }


        if($hasil['nilaiujian_praktek']->kriteria->atribut == 'Benefit'){
            $output['nilaiujian_praktek'] = $hasil['nilaiujian_praktek']->bobot / $maxK3;
        }else if($hasil['nilaiujian_praktek']->kriteria->atribut == 'Cost'){
            $output['nilaiujian_praktek'] = $hasil['nilaiujian_praktek']->bobot / $minK3;
        }


        if($hasil['nilaidokumen']->kriteria->atribut == 'Benefit'){
            $output['nilaidokumen'] = $hasil['nilaidokumen']->bobot / $maxK4;
        }else if($hasil['nilaidokumen']->kriteria->atribut == 'Cost'){
            $output['nilaidokumen'] = $hasil['nilaidokumen']->bobot / $minK4;
        }


        if($hasil['nilaiwawancara']->kriteria->atribut == 'Benefit'){
            $output['nilaiwawancara'] = $hasil['nilaiwawancara']->bobot / $maxK5;
        }else if($hasil['nilaiwawancara']->kriteria->atribut == 'Cost'){
            $output['nilaiwawancara'] = $hasil['nilaiwawancara']->bobot / $minK5;
        }


        
        $total = ($output['nilaikategori'] * $hasil['nilaikategori']->kriteria->bobot) +
                ($output['nilaipendidikan'] * $hasil['nilaipendidikan']->kriteria->bobot) +
                ($output['nilaidokumen'] * $hasil['nilaidokumen']->kriteria->bobot) +
                ($output['nilaiwawancara'] * $hasil['nilaiwawancara']->kriteria->bobot) +
                ($output['nilaiujian_praktek'] * $hasil['nilaiujian_praktek']->kriteria->bobot);



        // $anu = $hasil['nilaidokumen']->kriteria->bobot;
        // dd($anu);
        Perhitungan::create([
            'karyawan_id' => $karyawan->id,
            'k1_sebelum' =>$hasil['nilaipendidikan']->bobot,
            'k2_sebelum' =>$hasil['nilaikategori']->bobot,
            'k3_sebelum' =>$hasil['nilaiujian_praktek']->bobot,
            'k4_sebelum' =>$hasil['nilaidokumen']->bobot,
            'k5_sebelum' =>$hasil['nilaiwawancara']->bobot,
            'k1_sesudah' => $output['nilaipendidikan'],
            'k2_sesudah' => $output['nilaikategori'],
            'k3_sesudah' => $output['nilaiujian_praktek'],
            'k4_sesudah' => $output['nilaidokumen'],
            'k5_sesudah' => $output['nilaiwawancara'],
            'total' => $total,
        ]);
        // dd($output);
        
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


        // Mencari nilai maksimal dan minimal bobot kriteria
        $minK1 = $k1->subKriteria[0]->bobot;
        $maxK1 = $k1->subKriteria[count($k1->subKriteria) - 1]->bobot;

        $minK2 = $k2->subKriteria[0]->bobot;
        $maxK2 = $k2->subKriteria[count($k2->subKriteria) - 1]->bobot;

        $minK3 = $k3->subKriteria[0]->bobot;
        $maxK3 = $k3->subKriteria[count($k3->subKriteria) - 1]->bobot;

        $minK4 = $k4->subKriteria[0]->bobot;
        $maxK4 = $k4->subKriteria[count($k4->subKriteria) - 1]->bobot;

        $minK5 = $k5->subKriteria[0]->bobot;
        $maxK5 = $k5->subKriteria[count($k5->subKriteria) - 1]->bobot;


        $output['nilaikategori'] = 0;
        $output['nilaipendidikan'] = 0;
        $output['nilaidokumen'] = 0;
        $output['nilaiwawancara'] = 0;
        $output['nilaiujian_praktek'] = 0;


        if($hasil['nilaipendidikan']->kriteria->atribut == 'Benefit'){
            $output['nilaipendidikan'] = $hasil['nilaipendidikan']->bobot / $maxK1;
        }else if($hasil['nilaipendidikan']->kriteria->atribut == 'Cost'){
            $output['nilaipendidikan'] = $hasil['nilaipendidikan']->bobot / $minK1;
        }

        
        if($hasil['nilaikategori']->kriteria->atribut == 'Benefit'){
            $output['nilaikategori'] = $hasil['nilaikategori']->bobot / $maxK2;
        }else if($hasil['nilaikategori']->kriteria->atribut == 'Cost'){
            $output['nilaikategori'] = $hasil['nilaikategori']->bobot / $minK2;
        }


        if($hasil['nilaiujian_praktek']->kriteria->atribut == 'Benefit'){
            $output['nilaiujian_praktek'] = $hasil['nilaiujian_praktek']->bobot / $maxK3;
        }else if($hasil['nilaiujian_praktek']->kriteria->atribut == 'Cost'){
            $output['nilaiujian_praktek'] = $hasil['nilaiujian_praktek']->bobot / $minK3;
        }


        if($hasil['nilaidokumen']->kriteria->atribut == 'Benefit'){
            $output['nilaidokumen'] = $hasil['nilaidokumen']->bobot / $maxK4;
        }else if($hasil['nilaidokumen']->kriteria->atribut == 'Cost'){
            $output['nilaidokumen'] = $hasil['nilaidokumen']->bobot / $minK4;
        }


        if($hasil['nilaiwawancara']->kriteria->atribut == 'Benefit'){
            $output['nilaiwawancara'] = $hasil['nilaiwawancara']->bobot / $maxK5;
        }else if($hasil['nilaiwawancara']->kriteria->atribut == 'Cost'){
            $output['nilaiwawancara'] = $hasil['nilaiwawancara']->bobot / $minK5;
        }


        
        $total = ($output['nilaikategori'] * $hasil['nilaikategori']->kriteria->bobot) +
                ($output['nilaipendidikan'] * $hasil['nilaipendidikan']->kriteria->bobot) +
                ($output['nilaidokumen'] * $hasil['nilaidokumen']->kriteria->bobot) +
                ($output['nilaiwawancara'] * $hasil['nilaiwawancara']->kriteria->bobot) +
                ($output['nilaiujian_praktek'] * $hasil['nilaiujian_praktek']->kriteria->bobot);



        // $anu = $hasil['nilaidokumen']->kriteria->bobot;
        // dd($anu);
        Perhitungan::where('karyawan_id', $id)->update([
            'k1_sebelum' =>$hasil['nilaipendidikan']->bobot,
            'k2_sebelum' =>$hasil['nilaikategori']->bobot,
            'k3_sebelum' =>$hasil['nilaiujian_praktek']->bobot,
            'k4_sebelum' =>$hasil['nilaidokumen']->bobot,
            'k5_sebelum' =>$hasil['nilaiwawancara']->bobot,
            'k1_sesudah' => $output['nilaipendidikan'],
            'k2_sesudah' => $output['nilaikategori'],
            'k3_sesudah' => $output['nilaiujian_praktek'],
            'k4_sesudah' => $output['nilaidokumen'],
            'k5_sesudah' => $output['nilaiwawancara'],
            'total' => $total,
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

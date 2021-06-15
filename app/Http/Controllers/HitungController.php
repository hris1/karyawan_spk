<?php

namespace App\Http\Controllers;

use App\SubKriteria;
use App\Kriteria;
use App\Karyawan;
use App\Alternatif;
use App\Perhitungan;
use Illuminate\Http\Request;

class HitungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($kategori,$pendidikan,$dokumen,$wawancara,$ujian_praktek, 
            $IDkategori, $IDpendidikan, $IDdokumen, $IDwawancara, $IDujian_praktek)
    {
        $output['nilaikategori'] = SubKriteria::where('kategori', $kategori)
            ->orWhere('crips',$kategori)
            ->where('kriteria_id', $IDkategori)
            ->with('kriteria')
            ->first();
        $output['nilaipendidikan'] = SubKriteria::where('kategori', $pendidikan)
            ->orWhere('crips',$pendidikan)
            ->where('kriteria_id', $IDpendidikan)
            ->with('kriteria')
            ->first();
        $output['nilaidokumen'] = SubKriteria::where('kategori', $dokumen)
            ->orWhere('crips',$dokumen)
            ->where('kriteria_id', $IDdokumen)
            ->with('kriteria')
            ->first();
        $output['nilaiwawancara'] = SubKriteria::where('kategori', $wawancara)
            ->orWhere('crips',$wawancara)
            ->where('kriteria_id', $IDwawancara)
            ->with('kriteria')
            ->first();
        $output['nilaiujian_praktek'] = SubKriteria::where('kategori', $ujian_praktek)
            ->orWhere('crips',$ujian_praktek)
            ->where('kriteria_id', $IDujian_praktek)
            ->with('kriteria')
            ->first();
        // dd($output);
        return $output;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $perhitungan = Perhitungan::all();

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

        $k1 = Kriteria::where('kode', 'k1')->firstOrFail()->bobot;
        $k2 = Kriteria::where('kode', 'k2')->firstOrFail()->bobot;
        $k3 = Kriteria::where('kode', 'k3')->firstOrFail()->bobot;
        $k4 = Kriteria::where('kode', 'k4')->firstOrFail()->bobot;
        $k5 = Kriteria::where('kode', 'k5')->firstOrFail()->bobot;

        // dd($k1);

        return view('perhitungan.perhitungan', compact('perhitungan', 'perhitunganK1max',
        'perhitunganK2max','perhitunganK3max','perhitunganK4max','perhitunganK5max',
        'perhitunganK1min','perhitunganK2min','perhitunganK3min','perhitunganK4min','perhitunganK5min',
        'k1', 'k2', 'k3', 'k4', 'k5'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

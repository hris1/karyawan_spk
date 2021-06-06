<?php

namespace App\Http\Controllers;

use App\SubKriteria;
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
        $perhitungan = Perhitungan::orderBy('total','desc')->paginate(10);

        return view('perhitungan.perhitungan', compact('perhitungan'));
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

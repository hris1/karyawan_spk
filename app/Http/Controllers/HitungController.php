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
    public function index($kategori,$pendidikan,$dokumen,$wawancara,$pengalaman)
    {
        $output['nilaikategori'] = SubKriteria::where('kategori', $kategori)
            ->orWhere('crips',$kategori)
            ->with('kriteria')
            ->first();
        $output['nilaipendidikan'] = SubKriteria::where('kategori', $pendidikan)
            ->orWhere('crips',$pendidikan)
            ->with('kriteria')
            ->first();
        $output['nilaidokumen'] = SubKriteria::where('kategori', $dokumen)
            ->orWhere('crips',$dokumen)
            ->with('kriteria')
            ->first();
        $output['nilaiwawancara'] = SubKriteria::where('kategori', $wawancara)
            ->orWhere('crips',$wawancara)
            ->with('kriteria')
            ->first();
        $output['nilaipengalaman'] = SubKriteria::where('kategori', $pengalaman)
            ->orWhere('crips',$pengalaman)
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

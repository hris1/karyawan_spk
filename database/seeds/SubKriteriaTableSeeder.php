<?php

use Illuminate\Database\Seeder;
use App\SubKriteria;

class SubKriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tingkat Pendidikan
        SubKriteria::create([
            'kriteria_id'=>1,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'SMA',
            'bobot'=>25,
        ]);

        SubKriteria::create([
            'kriteria_id'=>1,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'D2',
            'bobot'=>50,
        ]);

        SubKriteria::create([
            'kriteria_id'=>1,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'D3',
            'bobot'=>75,
        ]);

        SubKriteria::create([
            'kriteria_id'=>1,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'S1',
            'bobot'=>100,
        ]);



        // USIA
        SubKriteria::create([
            'kriteria_id'=>2,
            'nilai_min'=>17,
            'nilai_max'=>25,
            'kategori'=>'(Kategori Usia 1)',
            'crips'=>'-',
            'bobot'=>100,
        ]);

        SubKriteria::create([
            'kriteria_id'=>2,
            'nilai_min'=>26,
            'nilai_max'=>30,
            'kategori'=>'(Kategori Usia 2)',
            'crips'=>'-',
            'bobot'=>80,
        ]);

        SubKriteria::create([
            'kriteria_id'=>2,
            'nilai_min'=>31,
            'nilai_max'=>40,
            'kategori'=>'(Kategori Usia 3)',
            'crips'=>'-',
            'bobot'=>60,
        ]);

        SubKriteria::create([
            'kriteria_id'=>2,
            'nilai_min'=>41,
            'nilai_max'=>50,
            'kategori'=>'(Kategori Usia 4)',
            'crips'=>'-',
            'bobot'=>40,
        ]);

        SubKriteria::create([
            'kriteria_id'=>2,
            'nilai_min'=>51,
            'nilai_max'=>55,
            'kategori'=>'(Kategori Usia 5)',
            'crips'=>'-',
            'bobot'=>20,
        ]);



        // Ujian Praktek
        SubKriteria::create([
            'kriteria_id'=>3,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'C',
            'bobot'=>20,
        ]);

        SubKriteria::create([
            'kriteria_id'=>3,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'BC',
            'bobot'=>40,
        ]);

        SubKriteria::create([
            'kriteria_id'=>3,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'B',
            'bobot'=>60,
        ]);

        SubKriteria::create([
            'kriteria_id'=>3,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'AB',
            'bobot'=>80,
        ]);

        SubKriteria::create([
            'kriteria_id'=>3,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'A',
            'bobot'=>100,
        ]);



        // Kelengkapan Dokumen
        SubKriteria::create([
            'kriteria_id'=>4,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'C',
            'bobot'=>20,
        ]);

        SubKriteria::create([
            'kriteria_id'=>4,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'BC',
            'bobot'=>40,
        ]);

        SubKriteria::create([
            'kriteria_id'=>4,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'B',
            'bobot'=>60,
        ]);

        SubKriteria::create([
            'kriteria_id'=>4,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'AB',
            'bobot'=>80,
        ]);

        SubKriteria::create([
            'kriteria_id'=>4,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'A',
            'bobot'=>100,
        ]);



        // Wawancara
         SubKriteria::create([
            'kriteria_id'=>5,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'Kurang',
            'bobot'=>25,
        ]);

        SubKriteria::create([
            'kriteria_id'=>5,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'Cukup',
            'bobot'=>50,
        ]);

        SubKriteria::create([
            'kriteria_id'=>5,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'Baik',
            'bobot'=>75,
        ]);

        SubKriteria::create([
            'kriteria_id'=>5,
            'nilai_min'=>null,
            'nilai_max'=>null,
            'kategori'=>null,
            'crips'=>'Sangat Baik',
            'bobot'=>100,
        ]);
    }
}

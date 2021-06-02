<?php

use Illuminate\Database\Seeder;
use App\Kriteria;

class KriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Kriteria::create([
            'kode'=>'k1',
            'keterangan'=>'Tingkat Pendidikan',
            'atribut'=>'Benefit',
            'bobot'=>'25',
        ]);

        Kriteria::create([
            'kode'=>'k2',
            'keterangan'=>'Usia',
            'atribut'=>'Cost',
            'bobot'=>'10',
        ]);

        Kriteria::create([
            'kode'=>'k3',
            'keterangan'=>'Pengalaman',
            'atribut'=>'Benefit',
            'bobot'=>'25',
        ]);

        Kriteria::create([
            'kode'=>'k4',
            'keterangan'=>'Kelengkapan Dokumen',
            'atribut'=>'Benefit',
            'bobot'=>'10',
        ]);

        Kriteria::create([
            'kode'=>'k5',
            'keterangan'=>'Wawancara',
            'atribut'=>'Benefit',
            'bobot'=>'30',
        ]);
    }
}

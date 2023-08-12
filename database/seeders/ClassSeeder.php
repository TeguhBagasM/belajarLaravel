<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classroom;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Classroom::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['nama_kelas' =>'1A'],
            ['nama_kelas' =>'1B'],
            ['nama_kelas' =>'1C'],
            ['nama_kelas' =>'1D'],
        ];

        foreach ($data as $kelas) {
            Classroom::insert([
                'nama_kelas' => $kelas['nama_kelas'],
                'created_at' => Carbon::now(),
                'updated_at' =>Carbon::now()
            ]);
        }
        
    }
}

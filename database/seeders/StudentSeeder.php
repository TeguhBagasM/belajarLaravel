<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        Schema::disableForeignKeyConstraints();
        student::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['nama' =>'bagas', 'class_id' => 1, 'gender' =>'L', 'nim' =>'22110397'],
            ['nama' =>'wanda', 'class_id' => 2, 'gender' =>'P', 'nim' =>'22110405'],
            ['nama' =>'evi', 'class_id' => 1, 'gender' =>'p', 'nim' =>'22110142'],
            ['nama' =>'rifki', 'class_id' => 2, 'gender' =>'P', 'nim' =>'22110380'],
        ];

        foreach ($data as $pelajar) {
            student::insert([
                'nama' => $pelajar['nama'],
                'class_id' => $pelajar['class_id'],
                'gender' => $pelajar['gender'],
                'nim' => $pelajar['nim'],
                'created_at' => Carbon::now(),
                'updated_at' =>Carbon::now()
            ]);
        }
        */
        student::factory()->count(20)->create();
    }
}

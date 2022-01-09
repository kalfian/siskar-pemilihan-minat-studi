<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Study;
use Carbon\carbon;

class StudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = carbon::now();
        $data = [
            ['created_at' => $now, 'updated_at' => $now, 'name' => 'Informatika'],
            ['created_at' => $now, 'updated_at' => $now, 'name' => 'Sistem'],
            ['created_at' => $now, 'updated_at' => $now, 'name' => 'Arsitektur'],
            ['created_at' => $now, 'updated_at' => $now, 'name' => 'Desain Produk'],
            ['created_at' => $now, 'updated_at' => $now, 'name' => 'Akuntansi'],
            ['created_at' => $now, 'updated_at' => $now, 'name' => 'Manajemen'],
            ['created_at' => $now, 'updated_at' => $now, 'name' => 'Kedokteran'],
            ['created_at' => $now, 'updated_at' => $now, 'name' => 'Bioteknologi'],
            ['created_at' => $now, 'updated_at' => $now, 'name' => 'Teologi'],
            ['created_at' => $now, 'updated_at' => $now, 'name' => 'Pendidikan Bahasa Inggris'],
        ];
        
        Study::insert($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fact;
use Carbon\carbon;

class FactSeeder extends Seeder
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
            ['created_at' => $now, 'updated_at'=> $now, 'name'=>'Sekolah asal adalah SMA'],
            ['created_at' => $now, 'updated_at'=> $now, 'name'=>'Jurusan adalah IPA'],
            ['created_at' => $now, 'updated_at'=> $now, 'name'=>'Tertarik masuk teknik'],
            ['created_at' => $now, 'updated_at'=> $now, 'name'=>'Rata-rata nilai matematika,bahasa inggris, kimia, fisika,biologi kelas 10 dan kelas 11  >= 75'],
            ['created_at' => $now, 'updated_at'=> $now, 'name'=>'Tertarik dengan bidang kompute'],
            ['created_at' => $now, 'updated_at'=> $now, 'name'=>'Ingin mempelajari komputasi yang lebih dalam'],
            ['created_at' => $now, 'updated_at'=> $now, 'name'=>'Tertarik dengan konstruksi bangunan'],
            ['created_at' => $now, 'updated_at'=> $now, 'name'=>'Tertarik dengan bidang komputer'],
            ['created_at' => $now, 'updated_at'=> $now, 'name'=>'Tertarik dengan ilmu bisnis'],
            ['created_at' => $now, 'updated_at'=> $now, 'name'=>'Senang belajar tentang pembukuan keuangan'],
            ['created_at' => $now, 'updated_at'=> $now, 'name'=>'Tertarik dengan ilmu biologi'],
            ['created_at' => $now, 'updated_at'=> $now, 'name'=>'Ingin belajar tentang kesehatan dan penyembuhan'],
            ['created_at' => $now, 'updated_at'=> $now, 'name'=>'Ingin mendalami tentang agama Kristen'],
            ['created_at' => $now, 'updated_at'=> $now, 'name'=>'Tertarik belajar bahasa inggris'],
        ];
        
        Fact::insert($data);
    }
}

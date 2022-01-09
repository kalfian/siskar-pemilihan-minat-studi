<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudyFact;


class FactStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["study_id" => 1, "fact_id" => 1],
            ["study_id" => 1, "fact_id" => 3],
            ["study_id" => 1, "fact_id" => 2],
            ["study_id" => 1, "fact_id" => 4],
            ["study_id" => 1, "fact_id" => 5],
            ["study_id" => 1, "fact_id" => 6],
            ["study_id" => 2, "fact_id" => 1],
            ["study_id" => 2, "fact_id" => 2],
            ["study_id" => 2, "fact_id" => 3],
            ["study_id" => 2, "fact_id" => 4],
            ["study_id" => 2, "fact_id" => 5],
            ["study_id" => 3, "fact_id" => 1],
            ["study_id" => 3, "fact_id" => 2],
            ["study_id" => 3, "fact_id" => 3],
            ["study_id" => 3, "fact_id" => 4],
            ["study_id" => 3, "fact_id" => 7],
            ["study_id" => 4, "fact_id" => 1],
            ["study_id" => 4, "fact_id" => 2],
            ["study_id" => 4, "fact_id" => 3],
            ["study_id" => 4, "fact_id" => 4],
            ["study_id" => 4, "fact_id" => 5],
            ["study_id" => 5, "fact_id" => 2],
            ["study_id" => 5, "fact_id" => 9],
            ["study_id" => 5, "fact_id" => 10],
            ["study_id" => 6, "fact_id" => 1],
            ["study_id" => 6, "fact_id" => 2],
            ["study_id" => 6, "fact_id" => 3],
            ["study_id" => 7, "fact_id" => 1],
            ["study_id" => 7, "fact_id" => 2],
            ["study_id" => 7, "fact_id" => 11],
            ["study_id" => 7, "fact_id" => 12],
            ["study_id" => 8, "fact_id" => 1],
            ["study_id" => 8, "fact_id" => 2],
            ["study_id" => 8, "fact_id" => 11],
            ["study_id" => 9, "fact_id" => 2],
            ["study_id" => 9, "fact_id" => 13],
            ["study_id" => 10, "fact_id" => 2],
            ["study_id" => 10, "fact_id" => 14]
        ];

        StudyFact::insert($data);
    }
}

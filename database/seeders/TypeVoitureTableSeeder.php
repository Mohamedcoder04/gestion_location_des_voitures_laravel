<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeVoitureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("type_voitures")->insert([

            ["nom" => "coupé"],
            ["nom" => "limousine"],
            ["nom" => "fourgonnette"],
            ["nom" => "minibus"],
            ["nom" => "pick-up"],


        ]);
    }
}

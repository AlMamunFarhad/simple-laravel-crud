<?php

namespace Database\Seeders;

use App\Models\Citie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/json/cities.json');
        $cities = collect(json_decode($json));
        

        $cities->each(function ($cities) {
          Citie::create([
            'city_name'=> $cities->city_name,
          ]);
    });
    }
}

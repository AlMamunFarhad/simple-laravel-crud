<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $json = File::get('database/json/students.json');
        $students = collect(json_decode($json));
        

        $students->each(function ($students) {
          Student::create([
            'name'=> $students->name,
            'email'=> $students->email,
            'age'=> $students->age,
            'city'=> $students->city
          ]);
    });
 }
}

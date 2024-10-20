<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    // Using Query Builder
    public function showStudents()
    {
        // $students = DB::table("students")
        // // ->join("cities","students.city","=","cities.id")
        // ->rightJoin("cities","students.city","=","cities.id")
        // // ->select('students.*','cities.city_name')
        // // ->select(DB::raw("count(*) as count_user"), 'city_name')
        // // ->groupBy("city_name")
        // // // ->orderBy("count_user")
        // // // ->where("cities.city_name","=","Dhaka")
        // // ->havingBetween("count_user",[1,2])
        // ->get();

        // return $students;

        $students = DB::table("students")
        // ->join("cities","students.city","=","cities.id")
        ->Join("cities", function(JoinClause $json){
            // $json->on("students.city","=","cities.id")
            // ->where("students.name","like", 'a%');
           })
        ->paginate(10);

        return view('welcome', compact('students'));
    }

    public function chunkMethod()
    {
        $students = DB::table('students')->orderBy('id')
        ->chunk(3, function($students) {
            echo "<div style='border: 5px solid red; padding: 2rem; margin: 1rem'>";
           foreach ($students as $student) {
             echo $student->name . "<br>";
           }
           echo "</div>";
        });
    }
    // Using Custom Query 
    public function allStudents()
    {
        // $allStudents = DB::select("SELECT name, age FROM students WHERE age > ? AND name like ?", [19,'a%']);
        // name bindings sql
        // $allStudents = DB::select("SELECT name, age FROM students WHERE id = :id", ['id'=>1]);
        // $allStudents = DB::insert("INSERT INTO students (name, email, age, city) VALUES (?, ?, ?, ?)", ['Mikky', 'mikky@gmail.com', 23, 1]);
        // $allStudents = DB::update("UPDATE students SET email = 'abdullah@gmail.com' WHERE id = ?", [13]);
        // $allStudents = DB::delete("DELETE FROM students WHERE id = ?", [14]);
        // Drop table 
        // $allStudents = DB::statement("drop table hello_table");

        // $allStudents = DB::table('students')
        // ->selectRaw('count(*) as students_group, age')
        // // ->whereRaw('age > ? and name like ?', [21, 'a%'])
        // // ->orderByRaw('name, age')
        // // ->where(DB::raw('age > ? and name like ?'), [20, 'a%'])
        // ->groupByRaw('age')
        // ->havingRaw('age > ?',[20])
        // ->toSql();

        $allStudents = DB::table('students')->get();
        // return $allStudents;

        return view("allStudents", compact("allStudents"));
    }
}

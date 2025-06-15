<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
// crud operations student controller
class StudentController extends Controller
{
    private $students = [
            ['id'=> 1 , 'name' => 'Ahmed', 'age' => 20],
            ['id'=> 2 , 'name' => 'Sara', 'age' => 22],
            ['id'=> 3 , 'name' => 'Mohamed', 'age' => 21],
        ];
    

    function listStudents(){
        $track = "PHP Track";
        // return $this->students; // call view + send students data
        return view('students.list',['myStd' => $this->students, 'myTrack' => $track, ] ); // resources/views
    }

    function getStudent($id){
        // dd($id); // die and dump
        foreach( $this->students as $student){
            // dd($students); // die and dump 
            // dump($student['id'] == $id);
            if($student['id'] == $id){
                // dump($student); // dump the student
                // return $student; // call views (html, css)
                return view('students.student', ['std' => $student]);

                 // return the student with the given id
            }
        };
        return abort(404);
    }


    
}

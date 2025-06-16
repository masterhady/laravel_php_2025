<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher; // Import the Teacher model

class TeacherController extends Controller
{
    function index(){
        // call model to get data --> teacher 
        $teachers = Teacher::all(); // select * from teachers
        // dd($teachers); // dump and die to see the data
        // return view with data
        return view('teachers.index', ['my_teachers' => $teachers]);
    }

    function show($id){
        $teacher = Teacher::findorfail($id); // find teacher by id
        // dd($teacher); // dump and die to see the data
        return view('teachers.show', ['my_teacher'=> $teacher]);
    }


    function create(){
        // return form to create teacher
        // dd("create teacher form");
        return view('teachers.create'); // form
    }

    function store(){
        // create new teacher 
        $teacher = new Teacher(); // insert into teachers
        // dd(request()->all()); // dump and die to see the data
                 // column       // the name of input 
        $teacher->name= request()->name; // get name from request
        $teacher->age= request()->age; // get name from request
        $teacher->salary= request()->salary; // get name from request
        $teacher->photo= request()->image; // get name from request
        $teacher->info= request()->info; // get name from request
        $teacher->courses= request()->courses; // get name from request
        $teacher->save(); // save to database
        // redirect to index page // view index // route index 
        // // return view('teachers.index');
        return to_route('teachers.index');
    }

    function delete($id){
        $teacher = Teacher::findorfail($id); // find teacher by id
        $teacher->delete(); // delete teacher
        return to_route('teachers.index');
    }






}

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
        $teacher = new Teacher(); 
        request()->validate([
            // validation rules
            'name'=> ["required", "string", "min:3", "regex:/^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/"],
            'salary' => ["numeric"],
            'age' => ["numeric"],
        ],[
            // validation messages
            'name.required' => "Name Must Be Required - From PHP Track",
            'name.string' => "Name Must Be String - From PHP Track",
            'name.min' => "Name Must Be At Least 3 Characters - From PHP Track",
            'name.regex' => "Name Must Be Valid add first name and last name - From PHP Track",
            'salary.numeric' => "Salary Must Be Numeric - From PHP Track",
        ]);

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

    function edit($id){
        // find teacher by id
        $teacher  = Teacher::findorfail($id); // find teacher by id
        // dd($teacher);
        return view('teachers.edit', ['myteacher' => $teacher]); // return view with teacher data
    }

    function update($id){
        // update into table ...... where id 
        $teacher = Teacher::findorfail($id); // find teacher by id
        // catch data form 
        // dd(request()->all()); // dump and die to see the data
        $name  = request('name');
        $salary  = request('salary');
        $age  = request('age');
        $courses  = request('courses');
        $image  = request('image');
        $info  = request('info');

        $teacher ->name = $name; // update name
        $teacher ->salary = $salary; // update name
        $teacher ->age = $age; // update name
        $teacher ->photo = $image; // update name
        $teacher ->courses = $courses; // update name
        $teacher ->info = $info; // update name

        $teacher->save(); // save to database
        // alert updated successfully
        return to_route('teachers.index');


    }



    function delete($id){
        $teacher = Teacher::findorfail($id); // find teacher by id
        $teacher->delete(); // delete teacher
        return to_route('teachers.index');
    }






}

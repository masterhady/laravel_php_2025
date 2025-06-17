<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        // dd($departments);
        return view('departments.index', compact('departments') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $department = Department::create($request->all()); // don't forget to add the fillable attributes in the model 
        // rfedirect to index page
        return to_route('departments.index');
        // ->with('success', 'Department created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::findorfail($id);
        // dd($department);
        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department = Department::findorfail($id);
        return view("departments.edit", compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $department = Department::findorfail($id);
        $department->update($request->all());
        // redirect to index page
        return to_route('departments.index');
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::findorfail($id);
        $department->delete();
        // redirect to index page
        return to_route('departments.index');
    }
}

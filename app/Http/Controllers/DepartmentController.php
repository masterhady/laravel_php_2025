<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Gate; // Import the Gate facade
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     // check the user is authenticated or not
    public function __construct(){
        // $this->middleware('auth'); // all controller methods are protected by auth middleware
        // $this->middleware('auth')->except(['index', 'show']); // only index method is public, all other methods are protected by auth middleware
        $this->middleware('auth')->only(['index']); // only index method is protected by auth middleware
    }



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

        $department = new Department();
        $department->name = $request->name;
        $department->description = $request->description;
        $department->user_id = auth()->user()->id; // catch all data of the logged in user 
        $department->save();

        // dd(auth()->user()->id);
        // $department = Department::create($request->all()); // don't forget to add the fillable attributes in the model 
            // $department->user_id = auth()->user()->id; // set the user_id to the authenticated user id
        
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
        $department = Department::findorfail($id); // id
         // get the authenticated user

        if(Gate::allows("manage-department", $department) === false){
            // if the user is not allowed to delete the department, redirect to index page with error message
            return to_route('departments.index');
        }

        $department->delete();
        // redirect to index page
        return to_route('departments.index');
    }
}

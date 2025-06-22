<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use App\Http\Resources\CourseResource;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Course::all();
        return CourseResource::collection(Course::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
    
        $course = Course::create($request->validated());
        // return response()->json($course, 201);
        return new CourseResource($course);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id); // find fail -- 404 html 
        if (!$course) {
            return response()->json(['message' => "This Course Not Found"]);
        }else{

            return new CourseResource($course);
            // return response()->json(CourseResource::collection($course), 200);
        //  return  CourseResource::collection()
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $course = Course::findorfail($id);
        $course->update([
            'name' => $request-> name,
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request-> duration
        ]);
        // return response()->json($course);
        return new CourseResource($course);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findorfail($id);
        $course->delete();
        return response()->json(['message' => "Course Deleted Succsfully"]);
    }
}

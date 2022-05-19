<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $authUser = auth()->user();
        $courses = Course::with([
            'attempts' => function ($query) use ($authUser) {
                $query->where('user_id', $authUser->id);
            }
        ]
        )->get();

        return response()->json($courses);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Course $course)
    {
        $course->load("questions");
        
        return response()->json($course);
    }

    public function edit(Course $course)
    {
        //
    }

    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}

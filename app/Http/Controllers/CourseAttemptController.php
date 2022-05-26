<?php

namespace App\Http\Controllers;

use Illuminate\{
    Http\Request,
};
use App\{
    Models\Course,
    Models\Attempt,
};

class CourseAttemptController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Course $course, Request $request)
    {
        $authUser = auth()->user();

        $attempt = new Attempt();
        $attempt
            ->user()
            ->associate($authUser);
        $attempt
            ->course()
            ->associate($course);
        $attempt->save();

        return response()->json($attempt);
    }

    public function show(Course $course, Attempt $attempt, Request $request)
    {
        $course = $course
            ->load([
                'questions' => function ($query) {
                    $query
                        ->with('options.answers')
                        ->orderBy('theory', 'desc')
                        ;
                } 
            ]);

        return response()->json($course);
    }

    public function update(Course $course, Attempt $attempt, Request $request)
    {
        $attempt->last_page = $request->page;
        $attempt->submitted_at = $request->submittedAt;
        $attempt->save();

        return response()->json($attempt);
    }

    public function destroy($id)
    {
        //
    }
}

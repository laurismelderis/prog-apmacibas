<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    Models\Answer,
    Models\Course,
};

class AnswerController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $answer = new Answer();

        $answer->option_id = $request->optionId;
        $answer->user_id = auth()->user()->id;
        $answer->course_id = $request->courseId;
        $answer->text = $request->text;
        $answer->save();

        return response()->json($answer);
    }

    public function show(Answer $answer)
    {
        //
    }

    public function update(Request $request, Answer $answer)
    {
        $answer->option_id = $request->optionId;
        $answer->text = $request->text;
        $answer->save();

        return response()->json($answer);
    }

    public function destroy(Answer $answer)
    {
        //
    }
}

<?php

namespace App\Http\Service;

use App\Events\AnswerCreated;
use App\Models\Answer;

class AnswerService
{
    public function createAnswer($request) {
        $answer = Answer::create([
            'text' => $request->text,
            'user_id' => auth()->user()->id,
            'answerable_id' => $request->answerable_id,
            'answerable_type' => Answer::ANSWERABLE_TYPE[$request->answerable_type],
        ]);

        broadcast(new AnswerCreated($answer));
    }
}
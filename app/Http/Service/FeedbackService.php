<?php

namespace App\Http\Service;

use App\Events\FeedbackCreated;
use App\Http\Requests\CreateFeedbackRequest;
use App\Models\Feedback;

class FeedbackService
{

    /**
     * @return mixed
     */
    public function getFeedbacks()
    {
        return Feedback::paginate(5);
    }

    /**
     * @param CreateFeedbackRequest $data
     * @return mixed
     */
    public function createFeedback(CreateFeedbackRequest $data)
    {
        $feedback = Feedback::create(
            [
                'text' => $data->text,
                'user_id' => auth()->user()->id
            ]);

        broadcast(new FeedbackCreated($feedback));

        return $feedback;
    }
}
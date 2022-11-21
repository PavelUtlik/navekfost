<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreateFeedbackRequest;
use App\Http\Resources\FeedbackResource;
use App\Http\Controllers\Controller;
use App\Http\Service\FeedbackService;
use Illuminate\Http\JsonResponse;

class FeedbackController extends Controller
{
    private FeedbackService $feedbackService;

    public function __construct(FeedbackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $feedbacks = $this->feedbackService->getFeedbacks();

        return response()->json(
            [
                'feedbacks' => FeedbackResource::collection($feedbacks),
                'lastPage' => $feedbacks->lastPage(),
                'currentPage' => $feedbacks->currentPage()
            ]);

    }

    /**
     * @param  CreateFeedbackRequest  $request
     * @return JsonResponse
     */
    public function store (CreateFeedbackRequest $request): JsonResponse
    {
        $feedBack = $this->feedbackService->createFeedback($request);

        return response()->json(['status' => 'OK', 'feedback' => new FeedbackResource($feedBack)]);
    }
}

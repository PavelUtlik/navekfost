<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAnswerRequest;
use App\Http\Resources\AnswerResource;
use App\Http\Service\AnswerService;
use Illuminate\Http\JsonResponse;

class AnswerController extends Controller
{
    private AnswerService $answerService;

    public function __construct(AnswerService $answerService)
    {
        $this->answerService = $answerService;
    }

    /**
     * @param  CreateAnswerRequest  $request
     * @return JsonResponse
     */
    public function store(CreateAnswerRequest $request): JsonResponse
    {
        $answer = $this->answerService->createAnswer($request);

        return response()->json(['status' => 'OK', 'answer' => new AnswerResource($answer)]);
    }
}

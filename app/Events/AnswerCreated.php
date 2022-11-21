<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


class AnswerCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $answer;


    /**
     * Create a new event instance.
     *
     * @param $answer
     */
    public function __construct($answer)
    {
        $this->answer = $answer;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return PrivateChannel
     */
    public function broadcastOn()
    {
        return new PrivateChannel('answer-channel.' . $this->answer->answerable_id);
    }

    public function broadcastWith()
    {
        return [
            'data' => 'Answer create'
        ];
    }
}

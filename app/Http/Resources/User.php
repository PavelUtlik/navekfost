<?php

namespace App\Http\Resources;

use App\Models\StreamRectificator;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserTextAttachment as UserTextAttachmentResource;
use App\Http\Resources\UserFollower as UserFollowerResource;
use App\Http\Resources\Publication as PublicationResource;
use App\Models\Stream as StreamModel;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'chat'       => [
                "id"          => $this->chat->id ,
                "created_at"  => $this->chat->created_at ,
                "updated_at"  => $this->chat->updated_at ,
            ],
            'user'          => [
                'id'    => $this->user->id,
                'name'    => $this->user->name,
                'email'    => $this->user->email,
                'phone'    => $this->user->phone,
                'photo'    => asset( 'assets/img/users/' . ($this->user->photo ?? 'default_photo.jpg') ),
            ],
        ];
    }
}

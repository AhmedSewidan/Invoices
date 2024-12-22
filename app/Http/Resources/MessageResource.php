<?php

namespace App\Http\Resources;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           =>  $this->id,
            "user_id"      =>  $this->user_id,
            "message"      =>  $this->message,
            'is_sender'    => ($this->user_id == Auth::user()->id) ? false : true,
            "read_at"      =>  $this->read_at,
            "created_at"   =>  Carbon::parse($this->created_at)->format('Y-m-d H:i'),
            "updated_at"   =>  Carbon::parse($this->updated_at)->format('Y-m-d H:i')
        ];
    }
}
 
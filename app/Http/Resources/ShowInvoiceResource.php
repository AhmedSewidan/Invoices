<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowInvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'client_id' => $this->user_id,
            'invoice_number' => $this->invoice_number,
            'due_date' => $this->due_date,
            'invoice_date' => $this->invoice_date,
            'description' => $this->description,
            'discount' => strval(round(  $this->discount * 100, 2)),
            'tax' => strval(round(  $this->tax * 100, 2)),
            'amount' => $this->amount,
            'status' => $this->status,
        ];
    }
}

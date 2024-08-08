<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StepResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'stepsCount' => $this->step_count,
            'start_time' => $this->start_time->format('Y-m-d H:i:s O'),
            'end_time' => $this->end_time->format('Y-m-d H:i:s O'),
            'user' => $this->user
        ];
    }
}

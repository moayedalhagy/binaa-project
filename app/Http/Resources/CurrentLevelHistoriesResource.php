<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrentLevelHistoriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "points" => $this->points,
            "answer" => ((float)$this->points == 0) ? 0 : 1,
            "question_id" => $this->question_id,
            "option_id" => $this->option_id,
            "questions" =>  $this->questions,
            "options" => $this->options,
        ];
    }
}

<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "label" => $this->label,
            "points" => $this->points,
            'day' => $this->day,
            'type' => $this->type,
            'sort_order' => $this->sort_order,
            //TODO: refactore
            // 'level' => new LevelResource($this->whenLoaded('level')),
            'version' => $this->whenLoaded('version.level'),
            'options' =>   OptionResource::collection($this->whenLoaded('options'))
        ];
    }
}

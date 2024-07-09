<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoadLevelsResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        //todo we must replace versions[0] with level->currentversion
        return [
            "id" => $this->id,
            "label" => $this->label,
            "value" => $this->versions[0]->value,
            "published" => $this->versions[0]->published,
            "sort_order" => $this->sort_order,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "questions" => $this->versions[0]->questions
        ];
    }
}

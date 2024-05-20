<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LevelResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "label" => $this->label,
            "value" => $this->value,
            "sort_order" => $this->sort_order,
            // "created_by" => $this->created_by,
            // "updated_by" => $this->updated_by,
            // "updated_at" => $this->updated_by,
            // "created_at" => $this->updated_by,

        ];
    }
}

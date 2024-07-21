<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LevelResource extends JsonResource
{
    private bool $filter;

    public function __construct($resource, $filter = false)
    {
        $this->filter = $filter;
        parent::__construct($resource);
    }
    public function toArray(Request $request): array
    {
        // 
        return [
            "id" => $this->id,
            "label" => $this->label,
            'published' => $this->when($this->whenLoaded('currentVersion') && !$this->filter,  $this->currentVersion->published),
            "sort_order" => $this->when(!$this->filter, $this->sort_order),
            'value' => $this->when($this->whenLoaded('currentVersion') && !$this->filter, (float) $this->currentVersion->value)

        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class WrapCollection extends ResourceCollection
{

    public function __construct($resource, $resourceTransformer)
    {
        $this->collects = $resourceTransformer;

        parent::__construct($resource);
    }
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'data' => $this->collection
        ];
    }
}

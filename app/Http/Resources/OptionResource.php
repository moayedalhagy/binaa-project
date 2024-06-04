<?php

namespace App\Http\Resources;

use App\Enums\Roles;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OptionResource extends JsonResource
{


    public function toArray(Request $request): array
    {
        $isAdmin =  auth()->user()->role->name == Roles::Admin;
        return [
            'id' => $this->id,
            'label' => $this->label,
            'is_correct' =>  $this->is_correct
            // 'is_correct' => $this->when($isAdmin, $this->is_correct)
        ];
    }
}

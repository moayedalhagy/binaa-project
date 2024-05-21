<?php

namespace App\Http\Resources;

use App\Enums\Roles;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "username" => $this->username,
            $this->mergeWhen($request->user()->role->name == Roles::Admin, [
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at,
            ]),

            // "last_activity_time" => $this->last_activity_time,
            // "created_by" => $this->created_by,
            // "updated_by" => $this->updated_by,

        ];
    }
}

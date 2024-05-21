<?php

namespace App\Http\Controllers;

use App\Enums\Days;
use Illuminate\Http\Request;

class DaysController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $days = [];
        foreach (Days::cases() as $item) {
            $days[$item->name] = $item->value;
        }

        return $this->successJson($days);
    }
}

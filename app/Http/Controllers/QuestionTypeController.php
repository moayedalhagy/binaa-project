<?php

namespace App\Http\Controllers;

use App\Enums\QuestionType;
use Illuminate\Http\Request;

class QuestionTypeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $types = [];
        foreach (QuestionType::cases() as $item) {
            $types[$item->name] = $item->value;
        }

        return $this->successJson($types);
    }
}

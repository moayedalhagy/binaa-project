<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExceptionMessagesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return $this->successJson([
            'full' => __('exceptions'),
            'keys' => array_keys(__('exceptions'))
        ]);
    }
}

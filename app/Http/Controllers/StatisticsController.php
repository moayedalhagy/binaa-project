<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        return $this->successJson([
            'users_count' => 20,
            'active_users_count' => 18,
            'inactive_users_count' => 2,
        ]);
    }
}

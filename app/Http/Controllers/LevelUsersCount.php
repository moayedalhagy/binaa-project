<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LevelUsersCount extends Controller
{

    public function __invoke(Request $request)
    {
        $collection =  User::with('version.level')->get();
        // we must count by the unique filed (level.label not unique)
        // but we use level.label (temp) most clear compared to using (sort_order , id)
        return $this->successJson($collection->countBy('version.level.label'));
    }
}

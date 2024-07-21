<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class StatisticsController extends Controller
{

    public function usersStatus()
    {

        // $x = \App\Models\Level::max('sort_order');

        // dd($x);
        $st = sprintf("SUM(CASE WHEN level_assigned_at <= '%s' THEN 1 ELSE 0 END) as inactive_users", Carbon::now()->subDays(30));

        $result = \App\Models\User::select([
            DB::raw('COUNT(*) as total_users'),
            DB::raw($st)
        ])
            ->first();


        return $this->successJson([
            'users_count' => $result['total_users'],
            'active_users_count' => $result['total_users'] - $result['inactive_users'],
            'inactive_users_count' => (int) $result['inactive_users'],
        ]);
    }

    public function levelUsersCount()
    {
        $collection =  \App\Models\User::with('version.level')->get();
        // we must count by the unique filed (level.label not unique)
        // but we use level.label (temp) most clear compared to using (sort_order , id)
        return $this->successJson($collection->countBy('version.level.label'));
    }

    public function versionsSuccessRate(string $id)
    {
        $result = (new \App\Services\LevelService)->versionsSuccessRate($id);

        return $this->successJson($result);
    }
}

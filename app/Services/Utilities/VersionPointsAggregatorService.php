<?php

namespace App\Services\Utilities;


use App\Models\Version;
use Illuminate\Support\Facades\Cache;

class VersionPointsAggregatorService
{
    private Version $version;

    public function __construct(string|Version $versionId)
    {
        $this->version =
            $versionId instanceof Version
            ? $versionId : Version::find($versionId);
    }


    public function __invoke()
    {
        $key = CacheKeys::version($this->version->id);

        $questions = Cache::remember($key, null, function () {
            return   $this->version
                ->questions()
                ->selectRaw('SUM(points) as sum,COUNT(points) as count')
                ->first();
        });

        return [
            'questions_points' => (float)$questions->sum,
            'questions_count' => $questions->count,
        ];
    }
}

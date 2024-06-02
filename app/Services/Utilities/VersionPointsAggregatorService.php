<?php

namespace App\Services\Utilities;


use App\Models\Version;

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
        $questions =   $this->version
            ->questions()
            ->selectRaw('SUM(points) as sum,COUNT(points) as count')
            ->first();

        return [
            'questions_points' => (float)$questions->sum,
            'questions_count' => $questions->count,
        ];
    }
}

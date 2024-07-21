<?php

namespace App\Services;

use App\Models\Level;
use App\Models\Version;
use Exception;
use Illuminate\Support\Facades\DB;

class LevelService
{
    public function getAll()
    {
        return Level::orderBy('sort_order')->with('currentVersion')->simplePaginate();
    }

    public function versions(string $levelId)
    {
        return $this->get($levelId)->load('versions');
    }

    public function firstLevel()
    {
        return Level::where('sort_order', 1)
            ->first()
            ->load('currentVersion');
    }

    public function create(mixed $data): Level
    {

        DB::beginTransaction();
        try {
            $level  = Level::create($data) ?? ExceptionService::createFailed();

            $level
                ->versions()
                ->create([
                    'value' => $data['value'],
                ]) ?? ExceptionService::createFailed();

            DB::commit();
        } catch (Exception $e) {

            DB::rollBack();

            throw $e;
        }

        return $level;
    }

    public function get(string $id): Level
    {

        return Level::find($id)->load('currentVersion') ?? ExceptionService::notFound();
    }

    public function update(mixed $request, string $id)
    {
        $level = $this->get($id);

        if ($level->currentVersion->published) {
            ExceptionService::updatingForPublishedForbidden();
        }

        $level->update($request) == 0 ? ExceptionService::updateFailed() : null;
    }

    public function storeVersion($levelId, mixed $data): Level
    {
        $level = $this->get($levelId);

        if ($level->currentVersion->published == false) {
            ExceptionService::lastVersionIsNotPublished();
        }

        $level
            ->versions()
            ->create(['value' => $data['value']]) ?? ExceptionService::createFailed();

        return $level->load('currentVersion');
    }


    public function currentVersion(string|Level $levelId): Version
    {
        $level = $levelId instanceof Level ? $levelId : $this->get($levelId);

        if (!$level->versions()->exists()) {
            throw ExceptionService::unhandledExceptionThrowable();
        }

        return
            $level
            ->currentVersion;
    }

    // version is published ( usually we handle the latest version)
    public function isPublished(string|Level $level): bool
    {
        return $this->currentVersion($level)->published == true;
    }

    public function getVersions(string $levelId)
    {
        return $this->get($levelId)->versions;
    }


    public function getVersionQuestions(string $levelId, string $versionId)
    {
        return $this->get($levelId)
            ->versions()
            ->where('id', $versionId)
            ->first()
            ?->questions ?? ExceptionService::notFound();
    }



    public function publishLevel(string $levelId)
    {
        $level = Level::find($levelId);

        $version = $level->currentVersion;

        if ($version->published == 1) {
            ExceptionService::updatingForPublishedForbidden();
        }


        $count = $version
            ->questions()
            ->selectRaw('COUNT(DISTINCT day) as count')
            ->first()
            ?->count;

        if ($count < 7) {
            ExceptionService::levelMustHaveSevenDays();
        }



        $level->currentVersion()->update(['published' => true]);
    }


    public function LoadLevels()
    {
        return Level::with(['versions', 'versions.questions'])->get();
    }


    private function successRateCalc(Version $version)
    {
        $select = sprintf('(SUM(points)/%s) * 100 as points , user_id', $version->questions->sum('points'));


        return $version
            ->histories()
            ->groupBy('version_id')
            ->groupBy('user_id')
            ->selectRaw($select)
            ->pluck('points')
            ->avg();
    }
    public function versionsSuccessRate(string $levelId)
    {
        $level = $this->get($levelId)
            ->with('versions')
            ->first();

        $result = [
            'id' => $level->id,
            'label' => $level->label,
            'versions' => []
        ];
        foreach ($level->versions as $version) {

            $result['versions'][] =
                [
                    'id' => $version->id,
                    'avg' => $this->successRateCalc($version)
                ];
        }

        return $result;
    }
}
// (new \App\Services\LevelService)->publishLevel(1)

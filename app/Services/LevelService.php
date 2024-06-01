<?php

namespace App\Services;

use App\Models\Level;
use App\Models\Version;



class LevelService
{
    public function getAll()
    {
        return Level::orderBy('sort_order')->simplePaginate();
    }

    public function versions(string $levelId)
    {
        return $this->get($levelId)->load('versions');
    }

    //TODO: try to after create level to create first version (version one)
    public function create(mixed $data): Level
    {
        return Level::create($data) ?? ExceptionService::createFailed();
    }

    public function get(string $id): Level
    {

        return Level::find($id)->load('currentVersion') ?? ExceptionService::notFound();
    }

    public function update(mixed $request, string $id)
    {
        $this->get($id)
            ->update($request) == 0
            ? ExceptionService::updateFailed() : null;
    }

    public function currentVersion(string $levelId): Version
    {
        $level = $this->get($levelId);

        if (!$level->versions()->exists()) {
            throw ExceptionService::unhandledExceptionThrowable();
        }

        return
            $level
            ->versions()
            ->orderBy('id', 'desc')
            ->first();
    }

    // version is published ( usually we handle the latest version)
    public function isPublished(string $id): bool
    {
        return $this->currentVersion($id)->published == true;
    }
}

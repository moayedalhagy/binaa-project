<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelRequests\StoreLevelRequest;
use App\Http\Requests\LevelRequests\StoreLevelVersionRequest;
use App\Http\Requests\LevelRequests\UpdateLevelRequest;
use App\Http\Resources\LevelResource;
use App\Http\Resources\WrapCollection;

class LevelController extends Controller
{

    private $service;

    private string $resourceTransformer;

    public function __construct()
    {
        $this->service = new \App\Services\LevelService;

        $this->resourceTransformer = LevelResource::class;
    }

    public function index()
    {
        return new WrapCollection($this->service->getAll(), $this->resourceTransformer);
    }


    public function store(StoreLevelRequest $request)
    {

        $created = $this->service->create($request->validated());

        return $this->successJson(new LevelResource($created), 201);
    }


    //TODO:  refactor
    public function show(int $id)
    {

        $record =  $this->service->get($id);


        return $this->successJson(new LevelResource($record), 200);
    }


    public function update(UpdateLevelRequest $request, string $id)
    {
        $this->service->update($request->validated(), $id);

        return $this->successJson([], 204);
    }

    //TODO:  refactor
    public function storeVersion(StoreLevelVersionRequest $request)
    {
        $created = $this->service->create($request->validated());

        return $this->successJson(new LevelResource($created), 201);
    }
}

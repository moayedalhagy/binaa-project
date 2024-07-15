<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequests\StoreUserRequest;
use App\Http\Requests\UserRequests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\WrapCollection;

class UserController extends Controller
{

    private $service;

    private string $resourceTransformer;

    public function __construct()
    {
        $this->service = new \App\Services\UserService;

        $this->resourceTransformer = UserResource::class;
    }

    public function index()
    {
        return new WrapCollection($this->service->getAll(), $this->resourceTransformer);
    }


    public function store(StoreUserRequest $request)
    {

        $created = $this->service->create($request->validated());

        return $this->successJson(new UserResource($created), 201);
    }


    public function show(int $id)
    {
        $record = $this->service->get($id);

        return $this->successJson(new UserResource($record), 200);
    }


    public function update(UpdateUserRequest $request, string $id)
    {

        $this->service->update($request, $id);

        return $this->successJson([], 204);
    }


    public function currentLevelHistories()
    {

        $data = $this->service->currentLevelHistories(auth()->user()->id);

        return $this->successJson($data, 200);
    }
}

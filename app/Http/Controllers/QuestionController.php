<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequests\StoreQuestionRequest;
use App\Http\Requests\QuestionRequests\UpdateQuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\WrapCollection;

class QuestionController extends Controller
{

    private $service;

    private string $resourceTransformer;

    public function __construct()
    {
        $this->service = new \App\Services\QuestionService;

        $this->resourceTransformer = QuestionResource::class;
    }

    public function index()
    {
        return new WrapCollection($this->service->getAll(), $this->resourceTransformer);
    }


    public function store(StoreQuestionRequest $request)
    {

        $created = $this->service->create($request);

        return $this->successJson(new QuestionResource($created), 201);
    }


    public function show(int $id)
    {
        $record = $this->service->get($id);

        return $this->successJson(new QuestionResource($record), 200);
    }


    public function update(UpdateQuestionRequest $request, string $id)
    {
        $this->service->update($request, $id);

        return $this->successJson([], 204);
    }
}

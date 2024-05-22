<?php

namespace App\Http\Controllers;

use App\Http\Requests\OptionRequests\StoreOptionRequest;
use App\Http\Requests\OptionRequests\UpdateOptionRequest;
use App\Http\Requests\QuestionRequests\StoreQuestionRequest;
use App\Http\Requests\QuestionRequests\UpdateQuestionRequest;
use App\Http\Resources\OptionResource;
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

        $created = $this->service->create($request->validated());

        return $this->successJson(new QuestionResource($created), 201);
    }


    public function show(int $id)
    {
        $record = $this->service->get($id);

        return $this->successJson(new QuestionResource($record), 200);
    }


    public function update(UpdateQuestionRequest $request, string $id)
    {
        $this->service->update($request->validated(), $id);

        return $this->successJson([], 204);
    }

    //

    public function getOptions($ques_id)
    {
        $records = $this->service->getOptions($ques_id);

        return $this->successJson(new QuestionResource($records), 200);
    }


    public function createOption(StoreOptionRequest $request, string $ques_id)
    {

        $created = $this->service->createOption($request->validated(), $ques_id);

        return $this->successJson(new OptionResource($created), 201);
    }


    public function updateOption(UpdateOptionRequest $request, string $ques_id, string $option_id)
    {

        $this->service
            ->updateOption($request->validated(), $ques_id, $option_id);

        return $this->successJson([], 204);
    }
}

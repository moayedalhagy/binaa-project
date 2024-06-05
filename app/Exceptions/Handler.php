<?php

namespace App\Exceptions;

use App\Services\ExceptionService;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Throwable;



class Handler extends ExceptionHandler
{



    protected $dontReport = [
        ApiLevelException::class
    ];



    public function register(): void
    {
        // $this->renderable(function (AuthenticationException $e, Request $request) {

        // });


    }


    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {


            if ($exception instanceof AuthenticationException) {
                ExceptionService::authRequired();
            }

            if ($exception instanceof AuthorizationException) {
                ExceptionService::unauthorizedAction();
            }

            if ($exception instanceof ValidationException) {
                ExceptionService::validation($exception->validator->errors()->toArray());
            }

            if ($exception instanceof UniqueConstraintViolationException) {
                ExceptionService::UniqueConstraint();
            }


            if (
                config('app.env') != 'local'
                && !($exception  instanceof ApiLevelException)
            ) {
                Log::error($exception->getMessage());

                $exception = ExceptionService::unhandledExceptionThrowable();
            }
        }


        return parent::render($request, $exception);
    }
}

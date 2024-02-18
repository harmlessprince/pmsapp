<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if ($request->expectsJson() || Str::contains($request->path(), 'api')) {
            if ($e instanceof AuthenticationException) {
                $statusCode = ResponseAlias::HTTP_UNAUTHORIZED;
                return sendError("Unauthenticated or Token expired, please try to login again", $statusCode);
            }
            if ($e instanceof NotFoundHttpException) {
                return sendError($e->getMessage(), $e->getStatusCode());
            }
            if ($e instanceof ValidationException) {
                $statusCode = ResponseAlias::HTTP_UNPROCESSABLE_ENTITY;
                return sendError("Validation failed", $statusCode, $e->errors());
            }
            if ($e instanceof ModelNotFoundException) {
                $statusCode = ResponseAlias::HTTP_NOT_FOUND;
                return sendError("Resource could not be found", $statusCode);
            }

            if ($e instanceof UniqueConstraintViolationException) {
                $statusCode = ResponseAlias::HTTP_INTERNAL_SERVER_ERROR;
                return sendError("Duplicate entry found", $statusCode);
            }
            if ($e instanceof QueryException) {
                Log::error($e);
                $statusCode = ResponseAlias::HTTP_INTERNAL_SERVER_ERROR;

                return sendError("Could not execute query", $statusCode);
            }
            if ($e instanceof MethodNotAllowedHttpException) {
                return sendError($e->getMessage(), ResponseAlias::HTTP_METHOD_NOT_ALLOWED);
            }
            if ($e instanceof \Exception) {
                Log::error($e);
                $statusCode = ResponseAlias::HTTP_INTERNAL_SERVER_ERROR;
                return sendError("We could not handle your request, please try again later", $statusCode);
            }

            if ($e instanceof \Error) {
                Log::error($e);
                $statusCode = ResponseAlias::HTTP_INTERNAL_SERVER_ERROR;
                return sendError("We could not handle your request, please try again later", $statusCode);
            }
        }
        if ($e instanceof ValidationException) {
            session()->flash('validation', 'The form could not be processed, kindly check the form.');
        }
        return parent::render($request, $e);
    }
}

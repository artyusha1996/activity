<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        $httpCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        $statusCode =  $exception->getCode();
        $details = [
            'message' => $exception->getMessage(),
        ];

        if ($exception instanceof ValidationException) {
            $httpCode = Response::HTTP_BAD_REQUEST;
            $statusCode = BusinessLogicException::VALIDATION_FAILED;
            $details['message'] = $exception->getMessage();
            foreach ($exception->errors() as $key => $error) {
                $details['errors'][$key] = $error[0] ?? 'Unknown error';
            }
        }

        if ($exception instanceof NotFoundHttpException) {
            $httpCode = Response::HTTP_NOT_FOUND;
            $statusCode = Response::HTTP_NOT_FOUND;
            $details['message'] = 'Not found';
        }

        if ($exception instanceof BadRequestHttpException) {
            $httpCode = Response::HTTP_BAD_REQUEST;
            $statusCode = Response::HTTP_BAD_REQUEST;
            $details['message'] = 'Bad Request';
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            $httpCode = Response::HTTP_METHOD_NOT_ALLOWED;
            $statusCode = Response::HTTP_METHOD_NOT_ALLOWED;
            $details['message'] = 'Method Not Allowed';
        }

        if ($exception instanceof AuthorizationException) {
            $httpCode = Response::HTTP_UNAUTHORIZED;
            $statusCode = Response::HTTP_UNAUTHORIZED;
            $details['message'] = 'Unauthorized';
        }

        if ($exception instanceof BusinessLogicException) {
            $httpCode = Response::HTTP_BAD_REQUEST;
            $statusCode = $exception->statusCode();
            $details['message'] = $exception->message();
        }

        $data = [
            'status'  => $statusCode,
            'details' => $details,
        ];

        if ($httpCode === Response::HTTP_INTERNAL_SERVER_ERROR && !config('app.debug')) {
            $data['details'] = [
                'message' => 'Server error',
            ];
        }

        return response()->json($data, $httpCode);
    }
}

<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}

//<?php
//
//namespace App\Exceptions;
//
//use \Exception;
//use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
//
//class Handler extends ExceptionHandler
//{
//    /**
//     * A list of the exception types that are not reported.
//     *
//     * @var array
//     */
//    protected $dontReport = [
//        //
//    ];
//
//    /**
//     * A list of the inputs that are never flashed for validation exceptions.
//     *
//     * @var array
//     */
//    protected $dontFlash = [
//        'password',
//        'password_confirmation',
//    ];
//
//    /**
//     * Report or log an exception.
//     *
//     * @return mixed|void
//     * @throws Exception
//     */
//    public function report($exception)
//    {
//        parent::report($exception);
//    }
//
//    /***
//     * Render an exception into an HTTP response.
//     *
//     * @param \Illuminate\Http\Request $request
//     * @param Exception $exception
//     */
//    public function render($request, $exception)
//    {
//        $status = 409;
//        $response = [
//            "status" => "error",
//            "errorCode" => 9999
//        ];
//
//        switch (get_class($exception)) {
//            case "Symfony\Component\HttpKernel\Exception\NotFoundHttpException":
//            case "Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException":
//            case "Symfony\Component\HttpKernel\Exception\HttpException":
//                $status = $exception->getStatusCode();
//                $response['errorCode'] = $exception->getStatusCode();
//                break;
//            case "Illuminate\Database\Eloquent\ModelNotFoundException":
//                $status = 404;
//                $response['errorCode'] = 404;
//                break;
//            case "Illuminate\Validation\ValidationException":
//                $status = $exception->status;
//                $errors = $exception->errors();
//                $errorsKeys = array_keys($errors);
//                $response['errorCode'] = $errors[$errorsKeys[0]][0];
//                break;
//            case "Illuminate\Auth\AuthenticationException":
//                if ($exception->getMessage() == 'Unauthenticated.') {
//                    $response['errorCode'] = 401;
//                    $status = 401;
//                }
//                break;
//            case "Spatie\Permission\Exceptions\PermissionDoesNotExist":
//            case "Spatie\Permission\Exceptions\UnauthorizedException":
//                $status = 403;
//                $response['errorCode'] = 403;
//                break;
//            case "Illuminate\Auth\Access\AuthorizationException":
//                $status = 401;
//                $response['errorCode'] = 401;
//                break;
//            default:
//                $response['errorCode'] = $exception->getCode() ?? 9999;
//        }
//
//        if (env('APP_ENV') != 'production') {
//            $response['url'] = $request->getRequestUri();
//            $response['file'] = $exception->getFile();
//            $response['line'] = $exception->getLine();
//            $response['message'] = $exception->getMessage();
//            $response['method'] = $_SERVER['REQUEST_METHOD'];
//            $response['trace'] = $exception->getTrace();
//        }
//
//        $response['errorCode'] = (int)$response['errorCode'];
//
//        return ["status" => "error", "data" => $response];
//    }
//}

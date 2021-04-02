<?php

namespace App\Exceptions;

use Illuminate\Database\QueryException;
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

    public function render($request, Throwable $e) {
        if($e instanceof QueryException) {
            $message = ['error' => '', 'errors' => ['SQL' => []]];
            $matches = NULL;

            preg_match('/{(.*)}/', $e->getMessage(), $matches);
//            $message = isset($matches[1])?$matches[1]:'';
            if(isset($matches[1])) {
                $message = $matches[1];
            } else {
                return parent::render($request, $e);
            }
            return response()->json([
                'message' => $message ,
                'errors' => ['SQL' => [$message]]
            ], 422);
        }

        return parent::render($request, $e);
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            $this->renderable(function (MSSQLException $e, $request) {
                return response()->json([
                    'error' => $e->getMessage(),
                ]);

            });


        });
    }
}

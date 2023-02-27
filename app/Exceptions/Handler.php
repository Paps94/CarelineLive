<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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
        'current_password',
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
        // $this->reportable(function (Throwable $e) {
        //     //
        // });

        /*
            Addition of logic to update our api call return messages in case we get an error
            as we do not want the end user or anyone else to see things such as

            "message": "No query results for model [App\\Models\\Proposal] 10123",
            "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
            "file": "C:\\Interview Tests\\recruitment-backend-test\\api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",

            of course it goes without saying on a production server we would have debug off in the .env file :D
        */
        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->error('Object Not Found', 404);
            }
        });
    }
}

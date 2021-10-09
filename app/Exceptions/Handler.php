<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    $this->reportable(function (Throwable $e) {
      //
    });
  }

  public function render($request, Throwable $e)
  {
    if ($e instanceof ModelNotFoundException) {
      $e = new NotFoundHttpException(__('model.errors.notFound'), $e);
    }
    return parent::render($request, $e);
  }

  /**
   * Convert an authentication exception into a response.
   *
   * @param Request $request
   * @param AuthenticationException $exception
   *
   * @return JsonResponse
   */
  protected function unauthenticated($request, AuthenticationException $exception)
  {
    return $request->expectsJson()
      ? response()->json(['message' => $exception->getMessage()], 401)
      : redirect()->guest(url('/login'));
  }
}

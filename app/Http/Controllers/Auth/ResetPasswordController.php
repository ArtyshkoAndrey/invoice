<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
  use ResetsPasswords;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
   * Get the response for a successful password reset.
   *
   * @param Request $request
   * @param string  $response
   *
   * @return array
   */
  protected function sendResetResponse(Request $request, $response): array
  {
    return ['status' => trans($response)];
  }

  /**
   * Get the response for a failed password reset.
   *
   * @param Request $request
   * @param string  $response
   *
   * @return JsonResponse
   */
  protected function sendResetFailedResponse(Request $request, $response): JsonResponse
  {
    return response()->json(['email' => trans($response)], 400);
  }
}
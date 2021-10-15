<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
  use SendsPasswordResetEmails;

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
   * Get the response for a successful password reset link.
   *
   * @param Request $request
   * @param string  $response
   *
   * @return array
   */
  protected function sendResetLinkResponse(Request $request, $response): array
  {
    return ['status' => trans($response)];
  }

  /**
   * Get the response for a failed password reset link.
   *
   * @param Request $request
   * @param string  $response
   *
   * @return JsonResponse
   */
  protected function sendResetLinkFailedResponse(Request $request, $response): JsonResponse
  {
    return response()->json(['email' => trans($response)], 400);
  }
}
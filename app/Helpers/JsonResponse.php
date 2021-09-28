<?php
/*
 * Copyright (c) 2021.
 * This code is the property of the Fulliton developer.
 * Write all questions and suggestions on the Vkontakte social network https://vk.com/fulliton
 */

namespace App\Helpers;


/**
 * return response data
 */
class JsonResponse {

  /**
   * Success work
   *
   * @param array $data
   * @param int   $status
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public static function success (array $data, int $status = 200): \Illuminate\Http\JsonResponse
  {
    return self::answer($data, true, $status);
  }

  /**
   * if Error in server
   *
   * @param array $data
   * @param int   $status
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public static function error (array $data, int $status = 400): \Illuminate\Http\JsonResponse
  {
    return self::answer($data, false, $status);
  }

  /**
   * @param array $data
   * @param bool  $success
   * @param int   $status
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public static function answer (array $data, bool $success, int $status): \Illuminate\Http\JsonResponse
  {
    return response()->json(['success' => $success, 'payload' => $data,], $status);
  }
}

<?php

namespace App\Http\Controllers\Auth\Dashboard;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(Request $request)
  {
    $query = User::query();

    $query = $query->orderByDesc('updated_at');

    if (($search = $request->get('search', '')) !== '') {
      $query = $query->where('email', 'like', "%{$search}%")
        ->orWhere('name', 'like', "%{$search}%");
    }

    $paginate = $request->get('per_page', null);
    if ($paginate) {
      $users = $query->paginate($paginate);
    } else {
      $users = $query->get();
    }

    return JsonResponse::success(['users' => $users]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function store(Request $request): \Illuminate\Http\JsonResponse
  {
    $request->validate([
      'name' => 'required|string',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|string|min:6',
    ]);
    $user = new User($request->except('password'));
    $user->password = Hash::make($request->input('password'));
    $user->save();

    return JsonResponse::success(['user' => $user]);
  }

  /**
   * Display the specified resource.
   *
   * @param User $user
   *
   * @return Response
   */
  public function show(User $user)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param User    $user
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function update(Request $request, User $user): \Illuminate\Http\JsonResponse
  {
    $request->validate([
      'name' => 'required|string',
      'email' => 'required|email|unique:users,email,' . $user->id,
      'password' => 'nullable|string',
    ]);

    $user->update($request->except('password'));
    if ($request->has('password') ||
      $request->get('password') !== '' ||
      $request->get('password') !== null) {
      $user->password = Hash::make($request->input('password'));
    }
    $user->save();

    return JsonResponse::success(['user' => $user]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param User $user
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function destroy(User $user): \Illuminate\Http\JsonResponse
  {
    $user->delete();

    return JsonResponse::success(['user' => $user]);
  }
}

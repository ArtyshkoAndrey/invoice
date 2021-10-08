<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CompanyController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @param Request $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function index (Request $request): \Illuminate\Http\JsonResponse
  {
    $query = Company::query();

    $query = $query->orderByDesc('updated_at');

    if (($search = $request->get('search', '')) !== '') {
      $query = $query->where('name', 'like', "%{$search}%");
    }

    $paginate = $request->get('per_page', null);
    if ($paginate) {
      $companies = $query->paginate($paginate);
    } else {
      $companies= $query->get();
    }

    return JsonResponse::success(['companies' => $companies]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function store (Request $request): \Illuminate\Http\JsonResponse
  {
    $request->validate([
      'name' => 'required|string|unique:companies,name',
      'code' => 'required|string|unique:companies,code'
    ]);

    $company = new Company($request->all());
    $company->save();

    return JsonResponse::success([
      'company' => $company
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   *
   * @return Response
   */
  public function show (int $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param int     $id
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function update (Request $request, int $id): \Illuminate\Http\JsonResponse
  {
    try {
      $company = Company::findOrFail($id);

      $request->validate([
        'name' => 'required|string|unique:companies,name,' . $id,
        'code' => 'required|string|unique:companies,code,' . $id
      ]);

      $company->update($request->all());
      $company->save();

      return JsonResponse::success(['company' => $company]);
    } catch (ModelNotFoundException $exception) {
      return response()->json(['message' => $exception->getMessage()], 400);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function destroy (int $id): \Illuminate\Http\JsonResponse
  {
    try {
      $company = Company::findOrFail($id);
      $company->delete();

      return JsonResponse::success(['company' => $company]);
    } catch (ModelNotFoundException $e) {
      return response()->json(['message' => $e->getMessage()], 400);
    }
  }
}

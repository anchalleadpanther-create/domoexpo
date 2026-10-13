<?php

namespace App\Http\Controllers\Customer\Buyer;

use App\Traits\FileUpload;
use App\Models\Buyer\Package;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Buyer\PackageRequest;

class PackageController extends ApiController
{
  use FileUpload;
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(): JsonResponse
  {
    try {
      return $this->successResponse(Package::latest()->where('user_id', '=', Auth::guard('buyer')->user()->id)->get(), 'Package has been successfully created');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\Buyer\PackageRequest $request
   * @return Illuminate\Http\JsonResponse
   */
  public function store(PackageRequest $request): JsonResponse
  {
    try {
      if ($request->hasfile('package_photo'))
        $request->request->add(['photo' => $this->handleSingleFileUpload($request->package_photo, 'uploads/package/')]);

      Package::create($request->validated() + ['user_id' => Auth::guard('buyer')->user()->id, 'is_default' => Auth::guard('buyer')->user()->packages()->count() === 0 ? 1 : 0, 'photo' => $request->photo]);
      return $this->successResponse([], 'Package has been successfully created');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Buyer\Package  $package
   * @return \Illuminate\Http\Response
   */
  public function show(Package $package)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Buyer\Package  $package
   * @return \Illuminate\Http\Response
   */
  public function edit(Package $package): JsonResponse
  {
    try {
      return $this->successResponse($package);
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\Buyer\PackageRequest $request
   * @param  \App\Models\Buyer\Package $package
   * @return Illuminate\Http\JsonResponse
   */
  public function update(PackageRequest $request, Package $package): JsonResponse
  {
    try {
      if ($request->hasfile('package_photo'))
        $request->request->add(['photo' => $this->handleSingleFileUpload($request->package_photo, 'uploads/package/')]);

      $package->update($request->validated() + ['photo' => isset($request->photo) ? $request->photo : $package->photo]);
      return $this->successResponse([], 'Package details has been updated');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }

  public function toggleStatus(int $id, bool $status): JsonResponse
  {
    try {
      Package::findOrFail($id)->update(['status' => $status]);
      return $this->successResponse([], 'Package status has been changed!');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }

  public function setDefault(int $id): JsonResponse
  {
    try {
      $package = Package::findOrFail($id);
      $package->is_default = !$package->is_default;
      $package->save();
      Package::where([['id', '!=', $package->id], ['user_id', '=', Auth::guard('buyer')->user()->id]])->update(['is_default' => !$package->is_default]);
      return $this->successResponse([], 'New default package has been changed!');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Buyer\Package  $package
   * @return \Illuminate\Http\Response
   */
  public function destroy(Package $package)
  {
    try {
      $package->delete();
      return $this->successResponse([], 'Package has been deleted!');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }
}

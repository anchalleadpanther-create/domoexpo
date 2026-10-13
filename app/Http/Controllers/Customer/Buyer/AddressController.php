<?php

namespace App\Http\Controllers\Customer\Buyer;

use App\Models\Customer\Address;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Customer\AddressRequest;
use Illuminate\Validation\ValidationException;

class AddressController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      
      return view('customer.buyer.profile.address');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('customer.buyer.profile.create-address');
    return view('customer.address.create-address');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(AddressRequest $request)
  {
    try {
      Address::create($request->validated() + ['user_id' => Auth::guard('buyer')->user()->id]);
      return $this->successResponse([], 'New Address added successfully!', 201);
    } catch (ValidationException $th) {
      return $this->errorResponse($th->validator->errors()->getMessages(), 403);
    } catch (\Exception $th) {
      return $this->errorResponse($th->getMessage(), 500);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Customer\Address  $address
   * @return \Illuminate\Http\Response
   */
  public function show(Address $address)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Customer\Address  $address
   * @return \Illuminate\Http\Response
   */
  public function edit(int $id)
  {
    return $this->successResponse(Address::find($id), 'Address found!');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Customer\Address  $address
   * @return \Illuminate\Http\Response
   */
  public function update(AddressRequest $request, int $id)
  {
    try {
      Address::find($id)->update($request->validated());
      return $this->successResponse([], 'Address updated successfully!', 201);
    } catch (ValidationException $th) {
      return $this->errorResponse($th->validator->errors()->getMessages(), 403);
    } catch (\Exception $th) {
      return $this->errorResponse($th->getMessage(), 500);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Customer\Address  $address
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id)
  {
    Address::find($id)->delete();
    return back();
  }
}

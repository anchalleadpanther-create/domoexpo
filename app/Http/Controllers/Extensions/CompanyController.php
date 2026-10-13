<?php

namespace App\Http\Controllers\Extensions;

use App\Models\Extensions\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Extensions\CompanyRequest;
use App\Repositories\Extensions\CompanyRepository;

class CompanyController extends Controller
{
  public function __construct(CompanyRepository $CompanyRepository)
  {
    $this->CompanyRepository = $CompanyRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $companies = Company::orderBy('company_name')->get();
    return view('extensions.companies', compact('companies'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('extensions.create-company');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CompanyRequest $request)
  {
    $response = $this->CompanyRepository->store($request);
    return redirect()->route('admin.company.index')->with('success', 'New company has been added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Extensions\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function show(Company $company)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Extensions\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function edit(Company $company)
  {
    return view('extensions.create-company', compact('company'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Extensions\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function update(CompanyRequest $request, int $id)
  {
    $response = $this->CompanyRepository->update($request, $id);
    return redirect()->route('admin.company.index')->with('success', 'Company has been successfully updated');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->CompanyRepository->toggleStatus($id, $status);
    return back()->with('success', 'Company status has been changed.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Extensions\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function destroy(Company $company)
  {
    Company::find($company->id)->delete();
    return back()->withErrors('Company has been deleted successfully.');
  }
}

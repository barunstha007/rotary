<?php

namespace App\Http\Controllers\API;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utils\ResponseUtils;

class CompanyApiController extends Controller
{
    use ResponseUtils;
    public function index()
    {
      $company= Company::latest()->get();
      if (is_null($company) || empty($company)) {
        return $this->json_response("No Company found", null, 'fail', 200);
    }
    return $this->json_response("Company fetched.", $company, 'success', 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'company' => 'required',
        ]);

            $company=Company::create($request->all());
            

            if (is_null($company) || empty($company)) {
                return $this->json_response("No Company found", null, 'fail', 200);
            }
            return $this->json_response("Company fetched.", $company, 'success', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
     return view('location.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('location.index')
                        ->with('success','One country has been deleted');
    }
}

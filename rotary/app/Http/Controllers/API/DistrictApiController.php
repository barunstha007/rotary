<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\District;
use App\Utils\ResponseUtils;

class DistrictApiController extends Controller
{
    use ResponseUtils;
    public function index()
    {
        $district = District::latest()->get();

        if (is_null($district) || empty($district)) {
            return $this->json_response("No Company found", null, 'fail', 200);
        }
        return $this->json_response("Company fetched.", $district, 'success', 200);
        
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
            'districts' => 'required',
        ]);

        $district=District::create($request->all());

        if (is_null($district) || empty($district)) {
            return $this->json_response("No Company found", null, 'fail', 200);
        }
        return $this->json_response("Company fetched.", $district, 'success', 200);
             
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\district  $district
     * @return \Illuminate\Http\Response
     */
    public function show(district $district)
    {
        return view('location.show',comapct('district'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\district  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(district $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\district  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, district $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\district  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(district $district)
    {
        $district->delete();

        return redirect()->route('location.index')
                         ->with('success','One District has been deleted');   
    }
}

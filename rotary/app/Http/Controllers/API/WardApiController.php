<?php

namespace App\Http\Controllers\API;

use App\Ward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utils\ResponseUtils;


class WardApiController extends Controller
{
    use ResponseUtils;
    public function index()
    {
        $ward = Ward::latest()->get();
        if (is_null($ward) || empty($ward)) {
            return $this->json_response("No Company found", null, 'fail', 200);
        }
        return $this->json_response("Company fetched.", $ward, 'success', 200);
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
          'Ward' => 'required',
      ]);

      $ward=Ward::create($request->all());

      if (is_null($ward) || empty($ward)) {
        return $this->json_response("No Company found", null, 'fail', 200);
    }
    return $this->json_response("Company fetched.", $ward, 'success', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function show(Ward $ward)
    {
        return view('location.show',compact('ward'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function edit(Ward $ward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ward $ward)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ward $ward)
    {
        $ward->delete();

        return redirect()->route('location.index')
                        ->with('success','One Ward has been deleted');
    }
}

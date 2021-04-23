<?php

namespace App\Http\Controllers\API;

use App\Municipality;
use App\Utils\ResponseUtils;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MunicipalityApiController extends Controller
{
    use ResponseUtils;
    public function index()
    {
        $municipality = Municipality::latest()->get();

        $company= Municipality::latest()->get();
        if (is_null($municipality) || empty($municipality)) {
          return $this->json_response("No Company found", null, 'fail', 200);
      }
      return $this->json_response("Company fetched.", $municipality, 'success', 200);
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
            'municipality' => 'required',
        ]);

        $municipality=Municipality::create($request->all());

        if (is_null($municipality) || empty($municipality)) {
            return $this->json_response("No Company created", null, 'fail', 200);
        }
        return $this->json_response("Company Created.", $municipality, 'success', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function show(Municipality $municipality)
    {
        return view('location.show',compact('municipality'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipality $municipality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Municipality $municipality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipality $municipality)
    {
        $municipality->delete();

        return redirect()->route('location.index')
                        ->with('success','One Municipality has been deleted');
    }
}

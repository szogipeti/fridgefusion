<?php

namespace App\Http\Controllers;

use App\Http\Resources\MeasureResource;
use App\Models\Measure;

class MeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MeasureResource::collection(Measure::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new MeasureResource(Measure::findOrfail($id));
    }
}

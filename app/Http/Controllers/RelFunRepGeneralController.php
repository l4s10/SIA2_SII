<?php

namespace App\Http\Controllers;

use App\Models\RelFunRepGeneral;
use Illuminate\Http\Request;

class RelFunRepGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relFunRepGeneral = RelFunRepGeneral::all();
        return view('repyman.rep_inm.index',compact('relFunRepGeneral'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('repyman.rep_inm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RelFunRepGeneral $relFunRepGeneral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RelFunRepGeneral $relFunRepGeneral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RelFunRepGeneral $relFunRepGeneral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RelFunRepGeneral $relFunRepGeneral)
    {
        //
    }
}

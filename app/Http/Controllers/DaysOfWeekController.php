<?php

namespace App\Http\Controllers;

use App\Models\DaysOfWeek;
use App\Services\daysOfWeekService;
use Illuminate\Http\Request;

class DaysOfWeekController extends Controller
{
    protected $daysOfWeekService;
    public function __construct()
    {
        $this->daysOfWeekService = new daysOfWeekService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daysOfWeek = $this->daysOfWeekService->list();
        return view('backend.admin.dayOfWeek.index',compact('daysOfWeek')); 
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DaysOfWeek  $daysOfWeek
     * @return \Illuminate\Http\Response
     */
    public function show(DaysOfWeek $daysOfWeek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaysOfWeek  $daysOfWeek
     * @return \Illuminate\Http\Response
     */
    public function edit(DaysOfWeek $daysOfWeek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DaysOfWeek  $daysOfWeek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaysOfWeek $daysOfWeek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaysOfWeek  $daysOfWeek
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaysOfWeek $daysOfWeek)
    {
        //
    }
}

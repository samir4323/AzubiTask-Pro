<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DailyLog;

class DailyLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->user()->dailyLogs()->orderBy("log_date","desc")->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "log_date"=>"required|date",
            "content"=>"required|string",
            "hours_spent"=>"required|numeric|min:0.5|max:12"
        ]);

        $log=$request->user()->dailylogs()->create($validated);

        return response()->json([
            "message"=>"Daily log saved successfully!",
            "log"=>$log
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

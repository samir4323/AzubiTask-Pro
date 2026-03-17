<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DailyLogController;
use App\Http\Controllers\Api\TaskController;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->get('/admin/azubis', function (Request $request) {
    if ($request->user()->role !== 'admin') {
        return response()->json(['message' => 'Unauthorized'], 403);
    }
    return \App\Models\User::where('role', 'azubi')
        ->where('department_id', $request->user()->department_id)
        ->get();
});
Route::middleware("auth:sanctum")->group(function(){
    Route::apiResource ("tasks",TaskController::class);
    Route::post("/logout",[AuthController::class,"logout"]);
    Route::apiResource("daily-logs",DailyLogController::class);
});

Route::get('/user', function (Request $request) {
    return $request->user()->load('department'); 
})->middleware('auth:sanctum');

Route::get('/departments', function() {
    return Department::all();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
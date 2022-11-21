<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function() {
    # Method Get, route /patient
Route::get("/patients", [PatientController:: class, "index"]);

# Method Post, route /patient
Route::post("/patients", [PatientController:: class, "store"]);

# Method Get, route /patient/id (detail pasien)
Route::get("/patients/{id}", [PatientController:: class, "show"]);

# Method Put, route /patient/id
Route::put("/patients/{id}", [PatientController:: class, "update"]);

# Method Delete route /patient/id
Route::delete("/patients/{id}", [PatientController:: class, "destroy"]);

# Method Search by name
Route::get("/patients/search/{name}", [PatientController::class, "search"]);

# Method Posivive Patient
Route::get("/patients/status/positive", [PatientController::class, "positive"]);

# Method Posivive Recovered
Route::get("/patients/status/recovered", [PatientController::class, "recovered"]);

# Method Dead Patient
Route::get("/patients/status/dead", [PatientController::class, "dead"]);
});




/**
 * Endpoint Register Dan Login */
Route::post("/register", [AuthController:: class, "register"]);
Route::post("/login", [AuthController::class, "login"]);



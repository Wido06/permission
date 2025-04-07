<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Models\City;



Route::get('/', [AuthController::class, 'login']);
Route::post('/', [AuthController::class, 'auth_login']);


Route::get('/logout', [AuthController::class, 'logout']);



Route::group(['middleware' => 'useradmin'], function()
{
  Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);


  Route::get('panel/role', [RoleController::class, 'list']);
  Route::get('panel/role/add', [RoleController::class, 'add']);
  Route::post('panel/role/add', [RoleController::class, 'insert']);
  Route::get('panel/role/edit/{id}', [RoleController::class, 'edit']);
  Route::post('panel/role/edit/{id}', [RoleController::class, 'update']);
  Route::get('panel/role/delete/{id}', [RoleController::class, 'delete']);
  Route::post('panel/role/store/', [RoleController::class, 'store']);
  Route::post('/panel/role/store', [RoleController::class, 'store'])->name('panel.role.store');



  Route::get('panel/user', [UserController::class, 'list']);
  Route::get('panel/user/add', [UserController::class, 'add']);
  Route::post('panel/user/add/', [UserController::class, 'insert']);
  Route::get('panel/user/edit/{id}', [UserController::class, 'edit']);
  Route::post('panel/user/edit/{id}', [UserController::class, 'update']);
  Route::get('panel/user/delete/{id}', [UserController::class, 'delete']);
  

  Route::get('panel/category', [CategoryController::class, 'list']);
  Route::get('panel/category/add', [CategoryController::class, 'add']);
  Route::post('panel/category/add/', [CategoryController::class, 'insert']);
  Route::get('panel/category/edit/{id}', [CategoryController::class, 'edit']);
  Route::post('panel/category/edit/{id}', [CategoryController::class, 'update']);
  Route::get('panel/category/delete/{id}', [CategoryController::class, 'delete']);
//   Route::get('panel/category/restore/{id}', [CategoryController::class, 'restore']);



Route::get('panel/subcategory', [SubCategoryController::class, 'list'])->middleware('role:admin');
Route::get('panel/subcategory/add', [SubCategoryController::class, 'add'])->middleware('role:admin');
Route::post('panel/subcategory/add/', [SubCategoryController::class, 'insert'])->middleware('role:admin');
Route::get('panel/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->middleware('role:admin');
Route::post('panel/subcategory/edit/{id}', [SubCategoryController::class, 'update'])->middleware('role:admin');
Route::get('panel/subcategory/delete/{id}', [SubCategoryController::class, 'delete'])->middleware('role:admin');




Route::get('/get-cities/{countryId}', function ($countryId) {
    return City::where('country_id', $countryId)->get(); });


});

// Route::get('/', function () {
//     return view('welcome');
// });'

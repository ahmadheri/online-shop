<?php

use App\Http\Controllers\Admin\UserController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{id}', function(Request $request) {
  return User::find($request->id);
});

Route::post('/users/create', function(Request $request) {

  $validator = Validator::make($request->all(), [
    'name' => 'required',
    'email' => 'required',
    'password' => 'required',
  ]);
  // if (!$validator) {

  //   return response()->json([
  //     'message' => 'theres an error'
  //   ]);
  // }
    
  $user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => bcrypt($request->password),
    'photo' => 'null'
  ]);

  if ($user) {
    return response()->json([
      'success' => true,
      'message' => 'Data Berhasil Ditambahkan',
    ]);
  } else {
    return response()->json([
      'success' => false,
      'message' => 'Data gagal ditambahkan'
    ]);
  }

});

Route::put('/users/{id}', function(Request $request) {

  $user = User::find($request->id);

  if (!$user) {
    return response()->json([
      'success' => false,
      'message' => 'Data Gagal diupdate'
    ], 404);
  }

  $user->update([
    'name' => $request->name,
    'email' => $request->email,
    'password' => bcrypt($request->password),
  ]);

  if ($user) {
    return response()->json([
      'success' => true,
      'message' => 'Data berhasil diUPdate'
    ], 200);
  } else {
    return response()->json([
      'success' => false,
      'message' => 'Data Gagal diupdate'
    ], 404);
  }

});

Route::delete('/users/{id}', function(Request $request) {

  $user = User::findOrFail($request->id);
  $user->delete();

  if ($user) {
    return response()->json([
      'success' => 'Data berhasil dihapus!'
    ]);
  } else {
    return response()->json([
      'error' => 'Data gagal dihapus!'
    ]);
  }

});


Route::get('/products', function() {

  $products = Product::all();

  return $products;

});
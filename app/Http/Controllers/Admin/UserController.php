<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * index 
     * 
     */
    public function index() 
    {
      $users = User::all();

      if ($users) {
        return response()->json([
          'success' => true,
          'message' => 'List User',
          'users' => $users,
        ], 200);
      } else {
        return response()->json([
          'success' => 'true',
          'message' => 'Data tidak ditemukan'
        ], 404);
      }

    }

    /**
     * 
     * 
     */
    public function store(Request $request)
    {
      $validatedInput = $request->validate($request, [
        'name' => 'required',
        'email' => 'required|unique',
        'password' => 'required'
      ]);

      if ($validatedInput->fail()) {
        return response()->json([
          'success' => false,
          'message' => 'Validasi gagal'
        ]);
      }

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
      ]);

      if ($user) {
        return response()->json([
          'success' => true,
          'message' => 'User berhasil disimpan!'
        ], 200);
      } else {
        return response()->json([
          'success' => false,
          'message' => 'User gagal disimpan'
        ], 404);
      }

    }
}

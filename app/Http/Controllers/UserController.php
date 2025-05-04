<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Log;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        Log::info('GET /users');
        return response()->json([
            'status' => true,
            'message' => 'Berhasil mengambil data user',
            'data' => $users
        ], 200);
    }

    public function show($id) {
        $user = User::findOrFail($id);
        
        Log::info("GET /users/{$id}");
        return response()->json([
            'status' => true,
            'message' => 'Berhasil mengambil data user dengan id ' . $id,
            'data' => $user
        ], 200);   
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'age' => 'required|numeric',
        ]);

        $user = User::create($validated);
        
        Log::info('POST /users', $validated);
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menambahkan data user',
            'data' => $user,
        ], 200);         
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => "required|email|unique:users,email,{$id}",
            'age' => 'required|numeric',
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        Log::info("PUT /users/{$id}", $validated);
        return response()->json([
            'status' => true,
            'message' => 'Berhasil mengedit data user',
            'data' => $user
        ], 200);
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        
        Log::info("DELETE /users/{$id}");
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menghapus data user',
        ], 200);
    }
}

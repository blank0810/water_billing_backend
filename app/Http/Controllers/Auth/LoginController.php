<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // dd($request);
        try {
            // Test database connection by attempting a simple query
            DB::connection('mysql')->select('SELECT 1');
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Database connection failed',
                'error' => 'Could not connect to the database. Please check your database configuration.'
            ], 500);
        }

        $user = DB::table('users')
            ->where('email', $request->email)
            ->first();

        if (!$user || $user->password !== $request->password) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        return response()->json([
            'message' => 'Login successful',
            'user' => [
                'user_id' => $user->user_id,
                'email' => $user->email,
            ]
        ]);
    }

    public function logout(Request $request)
    {
        return response()->json([
            'message' => 'Logout successful'
        ]);
    }
}

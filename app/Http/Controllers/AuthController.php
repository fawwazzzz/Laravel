<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Fitur Registrasi */
    public function register (Request $request) {
        $input = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ];

        $user = User::create($input);

        $data = [
            "Pesan" => "Registrasi Berhasil",
            "input" => $user
        ];
        # Mengembalikan data (json) dan kode 200
        return response()->json($data, 200);
    }

    /**
     * Fitur Login */
    public function login (Request $request) {
        $input = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if (Auth::attempt($input)) {
            $user = User::where("email", $input["email"]) ->first();

            $token = $user->createToken("auth_token");

            $data = [
                "Pesan" => "Login Berhasil",
                "token" => $token->plainTextToken
            ];
            # Mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        }
        else {
            $data = [
                "Pesan" => "Login Gagal"
            ];

            # Mengembalikan data (json) dan kode 401
            return response()->json($data, 401);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public  function register(Request $request) {
        User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> Hash::make($request->password),
        ]);
        return response()->json([
            "status"=> "success",
            "message"=> "Usuario Creado"
            ], 201);
    }

    public function login(Request $request) {
        $user = User::where("email", $request->email)->first();

        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken("token")->plainTextToken;
            return response()->json([
                "status"=> "success",
                "token"=> $token,  
            ]);
        }
        return response()->json([
            "status"=> "error",
            "message"=> "Error en las credenciales"
            ], 409);
    }
           
        

        

}

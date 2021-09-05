<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register;
use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Node\Scalar\String_;

class AuthController extends Controller
{


    /**
     * @param Register $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Register $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken(Str::random(10))->accessToken;

        return response()->json([
            'token' => $token
        ], 200);
    }


    /**
     * @param Login $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Login $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken(Str::random(10))->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Wrong Credentials'], 401);
        }
    }
}

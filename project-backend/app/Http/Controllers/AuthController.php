<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register;
use App\Models\Login;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @param Register $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Register $request)
    {
        $verification_token = Str::random(128);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_token' => $verification_token,
        ]);

        $this->sendEmail($user, $verification_token);

        return response()->json([
            'success' => 'user created',
        ], 200);

        // $token = $user->createToken(Str::random(10))->accessToken;

        // return response()->json([
        //     'token' => $token
        // ], 200);
    }

    /**
     * @param $user
     * @param $token
     */
    public function sendEmail($user, $token){
        Mail::send('mail.verify', ['user' => $user, 'token' => $token],
            function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Please Verify your Email');
        });
    }

    public function verify(Request $request){
            $currentUser = User::query()->
            where('email', $request->get('email'))->
            where('verification_token', $request->get('token'))->first();

            if(Hash::check($currentUser['password'], $request->get('password'))){
                $currentUser::update([
                    'verification_token'=> null,
                    'email_verified_at'=> Carbon::now()->timestamp()
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'You are registered'
                ], 200);
            }
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

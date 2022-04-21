<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    public function register(Request $request): array
    {

        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:7|max:255',
        ];
        $response = array( 'success'=>false);
        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            $response['errors'] = $validator->messages();
        } else {

            $validated = $validator->validated();

            $validated['password'] = Hash::make($request->password);


            //   $attributes['password'] =  Hash::make($request->password);
            $user =  User::create($validated);

            $response['response'] = $user;
            $response['success'] = true;


        }

        return $response;

    }
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $attributes =        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            //   'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $token = $user->createToken('token-name')->plainTextToken;
        return response()->json([
            'token' => $token
        ]);

    }


    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logout successful'
        ]);
    }
}

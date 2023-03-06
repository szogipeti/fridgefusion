<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistRequest;
use App\Http\Resources\AuthResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $data = $request->only('email','password');
        if (Auth::attempt($data)){
          return  response()->json(new AuthResource(Auth::user(),200));
        }
    }


    public function register(RegistRequest $request):JsonResponse
    {
        $data = $request->validated();
        $data["password"] = Hash::make($data["password"]);
        $user = User::create($data);

        return response()->json(["data" => ["message" => "Successful registration!"]],201);


    }
    public function users()
    {
        return response()->json(Auth::user(),200);


    }
}

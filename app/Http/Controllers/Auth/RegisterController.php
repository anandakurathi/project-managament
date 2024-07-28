<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Roles;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(RegisterRequest $request)
    {
        $data = $request->validated();

        $data['role_id'] = Roles::where('name', 'user')->first()->id;

        try {
            $user = User::create($data);
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            return ApiResponse::error("Don't panic. Please try again!", 500);
        }

        $token = $user->createToken($request->email);

        $response = [
            'token' => $token->plainTextToken
        ];

        return ApiResponse::success(
            $response,
            'User registered successfully',
            201
        );
    }
}

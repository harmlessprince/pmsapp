<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Error;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{

    public function login(LoginRequest $request): JsonResponse
    {
        try {
            /* @var User $user */
            $user = User::query()->where('email', Str::lower($request->email))->with(['tenant', 'site'])->first();
            if (!$user || !Hash::check($request->input('password'), $user->password)) {
                return sendError('The provided credentials are incorrect.', 401);
            }
            if (!$user->status) {
                return sendError('Your account has been deactivated, kindly contact the dashboard.', 403);
            }
            $token = $user->createToken('Access Token')->plainTextToken;
            return sendSuccess(['token' => $token, 'user' => $user], 'Logged in successfully');
        } catch (\Throwable $th) {
            Log::info($th);
            return sendError('An error occurred', 500);
        }
    }


    /**
     * Logout
     *
     *This endpoint  is used to log the user out of the system
     *
     * @authenticated
     *
     * @throws ValidationException
     */
    public function logout(Request $request): JsonResponse
    {
        $this->validate($request, [
            'pin' => ['required', 'string', 'max:4']
        ]);
        $user = $request->user()->load('site');
        if (!$user || !Hash::check($request->input('pin'), $user->site->logout_pin)) {
            return sendError('The provided pin is incorrect.', 401);
        }
        $request->user()->tokens()->delete();
        return sendSuccess(null, 'Successfully logged out');
    }

    public function user(Request $request): JsonResponse
    {
        $user = $request->user()->load('company', 'site');
        return sendSuccess(['user' => $user], 'User profile');
    }
}

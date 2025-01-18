<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class VerificationController extends Controller
{

    public function verify(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'otp' => [
                'required',
                Rule::exists('users')->where(function ($query) use ($user) {
                    return $query->where('id', $user->id);
                })
            ]
        ]);

        $user->update([
            "verified_at" => now(),
            "otp" => null
        ]);

        $user->token()->revoke();
        $token = $user->createToken('Personal access token to apis')->accessToken;
        return $this->success("verified successfully", ['token' => $token, "user" => new UserResource($user)]);
    }

    public function changeEmail(Request $request)
    {
        $user = auth()->user();
        $user->update($request->validate([
            'email' => "required|email|unique:users,email,$user->id"
        ]));

        $user->sendOTP();

        $user->token()->revoke();
        $token = $user->createToken('Personal access token to apis')->accessToken;
        return $this->success("verified successfully", ['token' => $token, "user" => new UserResource($user)]);
    }

    public function sendOTP(Request $request)
    {
        $request->validate([
            'email' => "nullable|required_without:phone|exists:users,email",
            'phone' => "nullable|required_without:email|exists:users,phone",
        ]);
        $user = User::whereEmail($request->email)->orWhere('phone', $request->phone)->first();

        $user->sendOTP();

        return $this->success("otp sent successfully", $user->otp);
    }

}

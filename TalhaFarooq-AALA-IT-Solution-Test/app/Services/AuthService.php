<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\ResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    use ResponseTrait;
    public function registerNewUser(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password)  // Hash the password before storing it in the database
        ]);
        $user['token'] = $user->createToken('authToken')->plainTextToken;

        return $user;
    }

    public function loginUser(Request $request){
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            throw new Exception('Invalid credentials!');
        }
        $user['token'] = $user->createToken('authToken')->plainTextToken;

        return $user;
    }
}

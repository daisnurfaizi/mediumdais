<?php

namespace App\Http\Service;

use App\Http\Repository\UserRepositoryImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserService
{
    private $userRepository;
    public function __construct(UserRepositoryImpl $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function createNewUser(Request $request)
    {

        // validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        // create new user
        $createuser = $this->userRepository->create($request);
        if ($createuser) {
            return response()->json(['success' => 'User Created Successfully']);
        }
        return response()->json(['error' => 'User Creation Failed']);
    }
}

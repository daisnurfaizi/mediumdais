<?php

namespace App\Http\Controllers;

use App\Http\Repository\UserRepositoryImpl;
use App\Http\Service\UserService;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function createNewUser(Request $request)
    {
        $userRepository = new UserRepositoryImpl();
        $userService = new UserService($userRepository);
        $user = $userService->createNewUser($request);
        return $user;
    }
}

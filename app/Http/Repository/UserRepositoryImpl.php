<?php

namespace App\Http\Repository;

use App\Models\User;

class UserRepositoryImpl implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::all();
    }
    public function getById($id)
    {
        return User::find($id);
    }
    public function create($request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }
    public function update($id, $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return $user;
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return $user;
    }
}

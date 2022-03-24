<?php

namespace App\Http\Repository;

interface UserRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function create($request);
    public function update($id, $request);
    public function delete($id);
}

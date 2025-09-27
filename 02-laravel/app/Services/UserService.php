<?php

namespace App\Services;

use App\Models\User;


class UserService {
    
    public function findById(String $id)
    {
        return User::find($id);
    }
}
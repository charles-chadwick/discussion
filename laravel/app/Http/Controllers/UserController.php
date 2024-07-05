<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return User::with(['createdBy'])->get();
    }

    public function profile(User $user) {
        return $user;
    }
}

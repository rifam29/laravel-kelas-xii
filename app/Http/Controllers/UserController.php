<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function store(Request $request)
    {
        if (Gate::denies('create_users')) {
            abort(403);
        }
    }
}
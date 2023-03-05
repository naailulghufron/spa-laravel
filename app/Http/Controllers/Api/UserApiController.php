<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function index()
    {
        $users = User::take(100)->get();
        return response()->json(compact('users'));
    }
    public function show($id)
    {
        $users = User::find($id);
        return response()->json(compact('users'));
    }
}

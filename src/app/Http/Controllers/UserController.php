<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display all users.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $users = User::all();

        return response()->json($users);
    }

    /**
     * Update the user.
     * @param  Request $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $user = User::find($id);
        $user->username = $request->username;
        $user->firstname = $request->firstname;
        $user->surname = $request->surname;
        $user->address = $request->address;
        $user->save();

        return response()->json($user);
    }
}

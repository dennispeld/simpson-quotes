<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * Show the quotes of a user.
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $quotes = Quotation::join('users', 'users.id', 'quotations.user_id')
            ->select(DB::raw("CONCAT(users.firstname,' ',users.surname) as user"), 'quotations.quotation')
            ->where('users.id', '=', $id)
            ->get();

        if ($quotes) {
            return response()->json([
                'quotes' => $quotes
            ]);
        }

        return response()->json([
            'quotes' => []
        ]);
    }

    /**
     * Store a new quotation.
     * @param  Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $quote = new Quotation();
        $quote->user_id = $request->user_id;
        $quote->quotation = $request->quotation;
        $quote->save();

        return response()->json($quote);
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

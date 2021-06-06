<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotationController extends Controller
{
    /**
     * Save a new quote.
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
     * Show the quotes by user id.
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
}

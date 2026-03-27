<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleSheetsController extends Controller
{
    public function appendRow(Request $request)
    {
        return response()->json([
            'success' => false,
            'message' => 'Форма временно недоступна.'
        ], 503);
    }
}

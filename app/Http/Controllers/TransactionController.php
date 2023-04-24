<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = Transaction::where('is_active', true)->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|integer',
            'id_user' => 'required|integer',
            'id_campaign' => 'required|integer',
            'sukuk' => 'required|string|max:255',
            'administration_fee' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = Transaction::create([
            'amount' => $request->amount,
            'id_user' => $request->id_user,
            'id_campaign' => $request->id_campaign,
            'sukuk' => $request->sukuk,
            'administration_fee' => $request->administration_fee,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data created successfully',
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        $data = Transaction::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|integer',
            'id_user' => 'required|integer',
            'id_campaign' => 'required|integer',
            'sukuk' => 'required|string|max:255',
            'administration_fee' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = Transaction::find($id);
        $data->amount = $request->amount;
        $data->id_user = $request->id_user;
        $data->id_campaign = $request->id_campaign;
        $data->sukuk = $request->sukuk;
        $data->administration_fee = $request->administration_fee;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully',
            'data' => $data,
        ]);
    }
}

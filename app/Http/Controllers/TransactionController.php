<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $current_page = $request->query('current_page', 1);
        $data = new Transaction;

        // Apply filters
        $fillable_column = (new Transaction())->getFillable();
        foreach ($fillable_column as $column) {
            if ($request->query($column)) {
                $data = $data->where($column, 'like', '%' . $request->query($column) . '%');
            }
        }

        // Apply is_active condition and paginate
        $data = $data->where('is_deleted', false)->paginate(10, ['*'], 'page', $current_page);

        return response()->json([
            'status' => 'success',
            'data' => $data->items(),
            'meta' => [
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'total_records' => $data->total(),
            ],
            'server_time' => (int) round(microtime(true) * 1000),
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
                'server_time' => (int) round(microtime(true) * 1000),
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
            'server_time' => (int) round(microtime(true) * 1000),
        ]);
    }

    public function show($id)
    {
        $data = Transaction::find($id);
        return response()->json([
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $data,
            'server_time' => (int) round(microtime(true) * 1000),
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
                'server_time' => (int) round(microtime(true) * 1000),
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
            'server_time' => (int) round(microtime(true) * 1000),
        ]);
    }
}

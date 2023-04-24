<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = Payment::where('is_active', true)->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payment_method' => 'required|string|max:255',
            'service_fee' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'id_user' => 'required',
            'id_campaign' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = Payment::create([
            'payment_method' => $request->payment_method,
            'service_fee' => $request->service_fee,
            'status' => $request->status,
            'id_user' => $request->id_user,
            'id_campaign' => $request->id_campaign,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data created successfully',
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        $data = Payment::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'payment_method' => 'required|string|max:255',
            'service_fee' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'id_user' => 'required',
            'id_campaign' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = Payment::find($id);
        $data->payment_method = $request->payment_method;
        $data->service_fee = $request->service_fee;
        $data->status = $request->status;
        $data->id_user = $request->id_user;
        $data->id_campaign = $request->id_campaign;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully',
            'data' => $data,
        ]);
    }


    public function destroy($id)
    {
        $data = Payment::find($id);
        $data->is_active = false;
        $data->save();
        // $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully',
            'data' => $data,
        ]);
    }
}

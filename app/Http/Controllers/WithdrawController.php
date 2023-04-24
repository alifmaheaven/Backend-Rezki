<?php

namespace App\Http\Controllers;

use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WithdrawController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = Withdraw::where('is_active', true)->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|integer',
            'id_campaign_report_detail' => 'required|integer',
            'amount' => 'required|integer',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = Withdraw::create([
            'id_user' => $request->id_user,
            'id_campaign_report_detail' => $request->id_campaign_report_detail,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data created successfully',
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        $data = Withdraw::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|integer',
            'id_campaign_report_detail' => 'required|integer',
            'amount' => 'required|integer',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = Withdraw::find($id);
        $data->id_user = $request->id_user;
        $data->id_campaign_report_detail = $request->id_campaign_report_detail;
        $data->amount = $request->amount;
        $data->date = $request->date;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully',
            'data' => $data,
        ]);
    }


    public function destroy($id)
    {
        $data = Withdraw::find($id);
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

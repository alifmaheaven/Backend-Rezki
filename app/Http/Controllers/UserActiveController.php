<?php

namespace App\Http\Controllers;

use App\Models\UserActive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserActiveController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = UserActive::where('is_active', true)->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'id_card' => 'required|string|max:255',
            'tax_registration_number' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = UserActive::create([
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'id_card' => $request->id_card,
            'tax_registration_number' => $request->tax_registration_number,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data created successfully',
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        $data = UserActive::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'id_card' => 'required|string|max:255',
            'tax_registration_number' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = UserActive::find($id);
        $data->phone_number = $request->phone_number;
        $data->email = $request->email;
        $data->id_card = $request->id_card;
        $data->tax_registration_number = $request->tax_registration_number;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully',
            'data' => $data,
        ]);
    }


    public function destroy($id)
    {
        $data = UserActive::find($id);
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

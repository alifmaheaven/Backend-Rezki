<?php

namespace App\Http\Controllers;

use App\Models\UserBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserBankController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = UserBank::all();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = UserBank::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'UserBank created successfully',
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        $data = UserBank::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = UserBank::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'UserBank updated successfully',
            'data' => $data,
        ]);
    }
    

    public function destroy($id)
    {
        $data = UserBank::find($id);
        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'UserBank deleted successfully',
            'data' => $data,
        ]);
    }
}

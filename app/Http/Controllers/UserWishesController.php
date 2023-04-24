<?php

namespace App\Http\Controllers;

use App\Models\UserWishes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserWishesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = UserWishes::where('is_active', true)->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'id_wish' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = UserWishes::create([
            'id_user' => $request->id_user,
            'id_wish' => $request->id_wish,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data created successfully',
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        $data = UserWishes::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'id_wish' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = UserWishes::find($id);
        $data->id_user = $request->id_user;
        $data->id_wish = $request->id_wish;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully',
            'data' => $data,
        ]);
    }


    public function destroy($id)
    {
        $data = UserWishes::find($id);
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


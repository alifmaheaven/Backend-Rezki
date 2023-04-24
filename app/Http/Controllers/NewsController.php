<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = News::where('is_active', true)->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'tittle' => 'required|string|max:255',
            'body' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publish_date' => 'required|string|max:255',
            'banner' => 'required|string|max:255',
            'id_user' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = News::create([
            'tittle' => $request->tittle,
            'body' => $request->body,
            'author' => $request->author,
            'publish_date' => $request->publish_date,
            'banner' => $request->banner,
            'id_user' => $request->id_user,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data created successfully',
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        $data = News::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tittle' => 'required|string|max:255',
            'body' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publish_date' => 'required|string|max:255',
            'banner' => 'required|string|max:255',
            'id_user' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = News::find($id);
        $data->tittle = $request->tittle;
        $data->body = $request->body;
        $data->author = $request->author;
        $data->publish_date = $request->publish_date;
        $data->banner = $request->banner;
        $data->id_user = $request->id_user;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully',
            'data' => $data,
        ]);
    }


    public function destroy($id)
    {
        $data = News::find($id);
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


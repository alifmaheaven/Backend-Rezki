<?php

namespace App\Http\Controllers;

use App\Models\CampaignReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CampaignReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = CampaignReport::where('is_active', true)->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_campaign' => 'required|integer',
            'document_name' => 'required|string|max:255',
            'document_url' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = CampaignReport::create([
            'id_campaign' => $request->id_campaign,
            'document_name' => $request->document_name,
            'document_url' => $request->document_url,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data created successfully',
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        $data = CampaignReport::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_campaign' => 'required|integer',
            'document_name' => 'required|string|max:255',
            'document_url' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = CampaignReport::find($id);
        $data->id_campaign = $request->id_campaign;
        $data->document_name = $request->document_name;
        $data->document_url = $request->document_url;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully',
            'data' => $data,
        ]);
    }


    public function destroy($id)
    {
        $data = CampaignReport::find($id);
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

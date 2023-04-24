<?php

namespace App\Http\Controllers;

use App\Models\CampaignReportDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CampaignReportDetailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = CampaignReportDetail::where('is_active', true)->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_campaign_report' => 'required|integer',
            'date_time' => 'required|date',
            'amount' => 'required|integer',
            'description' => 'required|string|max:255',
            'evidence' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = CampaignReportDetail::create([
            'id_campaign_report' => $request->id_campaign_report,
            'date_time' => $request->date_time,
            'amount' => $request->amount,
            'description' => $request->description,
            'evidence' => $request->evidence,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data created successfully',
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        $data = CampaignReportDetail::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_campaign_report' => 'required|integer',
            'date_time' => 'required|date',
            'amount' => 'required|integer',
            'description' => 'required|string|max:255',
            'evidence' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = CampaignReportDetail::find($id);
        $data->id_campaign_report = $request->id_campaign_report;
        $data->date_time = $request->date_time;
        $data->amount = $request->amount;
        $data->description = $request->description;
        $data->evidence = $request->evidence;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully',
            'data' => $data,
        ]);
    }


    public function destroy($id)
    {
        $data = CampaignReportDetail::find($id);
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

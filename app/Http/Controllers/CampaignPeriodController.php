<?php

namespace App\Http\Controllers;

use App\Models\CampaignPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CampaignPeriodController extends Controller
{
    public function index()
    {
        $data = CampaignPeriod::where('is_active', true)->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'period' => 'required|string|max:255',
            'profit_share' => 'required|string|max:255',
            'expected_roi' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = CampaignPeriod::create([
            'period' => $request->period,
            'profit_share' => $request->profit_share,
            'expected_roi' => $request->expected_roi,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data created successfully',
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        $data = CampaignPeriod::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'period' => 'required|string|max:255',
            'profit_share' => 'required|string|max:255',
            'expected_roi' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = CampaignPeriod::find($id);
        $data->period = $request->period;
        $data->profit_share = $request->profit_share;
        $data->expected_roi = $request->expected_roi;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully',
            'data' => $data,
        ]);
    }


    public function destroy($id)
    {
        $data = CampaignPeriod::find($id);
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

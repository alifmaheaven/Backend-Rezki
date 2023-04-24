<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CampaignController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = Campaign::where('is_active', true)->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'target_funding_amount' => 'required|string|max:255',
            'current_funding_amount' => 'required|string|max:255',
            'start_date' => 'required|string|max:255',
            'closing_date' => 'required|string|max:255',
            'return_investment_period' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'document_name' => 'required|string|max:255',
            'document_url' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'id_campaign_period' => 'required',
            'id_user' => 'required',
            'is_approved' => 'required|string|max:255',
            'max_sukuk' => 'required|string|max:255',
            'id_campaign_banner' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = Campaign::create([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'target_funding_amount' => $request->target_funding_amount,
            'current_funding_amount' => $request->current_funding_amount,
            'start_date' => $request->start_date,
            'closing_date' => $request->closing_date,
            'return_investment_period' => $request->return_investment_period,
            'status' => $request->status,
            'document_name' => $request->document_name,
            'document_url' => $request->document_url,
            'category' => $request->category,
            'id_campaign_period' => $request->id_campaign_period,
            'id_user' => $request->id_user,
            'is_approved' => $request->is_approved,
            'max_sukuk' => $request->max_sukuk,
            'id_campaign_banner' => $request->id_campaign_banner,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data created successfully',
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        $data = Campaign::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'target_funding_amount' => 'required|string|max:255',
            'current_funding_amount' => 'required|string|max:255',
            'start_date' => 'required|string|max:255',
            'closing_date' => 'required|string|max:255',
            'return_investment_period' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'document_name' => 'required|string|max:255',
            'document_url' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'id_campaign_period' => 'required',
            'id_user' => 'required',
            'is_approved' => 'required|string|max:255',
            'max_sukuk' => 'required|string|max:255',
            'id_campaign_banner' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }

        $data = Campaign::find($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->type = $request->type;
        $data->target_funding_amount = $request->target_funding_amount;
        $data->current_funding_amount = $request->current_funding_amount;
        $data->start_date = $request->start_date;
        $data->closing_date = $request->closing_date;
        $data->return_investment_period = $request->return_investment_period;
        $data->status = $request->status;
        $data->document_name = $request->document_name;
        $data->document_url = $request->document_url;
        $data->category = $request->category;
        $data->id_campaign_period = $request->id_campaign_period;
        $data->id_user = $request->id_user;
        $data->is_approved = $request->is_approved;
        $data->max_sukuk = $request->max_sukuk;
        $data->id_campaign_banner = $request->id_campaign_banner;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully',
            'data' => $data,
        ]);
    }


    public function destroy($id)
    {
        $data = Campaign::find($id);
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

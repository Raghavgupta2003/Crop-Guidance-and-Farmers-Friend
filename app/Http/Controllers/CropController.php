<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CropRule;

class CropController extends Controller
{
    public function index()
    {
        // Fetch unique countries from the crop_rules table
        $countries = CropRule::select('country')->distinct()->get();

        return view('crop-suggestions', compact('countries'));
    }

    public function getStates(Request $request)
    {
        // Fetch unique states based on the selected country
        $states = CropRule::where('country', $request->country)
                          ->select('state')
                          ->distinct()
                          ->get();

        return response()->json($states);
    }

    public function getDistricts(Request $request)
    {
        // Fetch unique districts based on the selected state
        $districts = CropRule::where('state', $request->state)
                             ->select('district')
                             ->distinct()
                             ->get();

        return response()->json($districts);
    }

    public function getSeasons(Request $request)
    {
        // Fetch unique seasons based on the selected district
        $seasons = CropRule::where('district', $request->district)
                           ->select('season')
                           ->distinct()
                           ->get();

        return response()->json($seasons);
    }

    public function getCrops(Request $request)
    {
        // Fetch crops based on the selected country, state, district, and season
        $crops = CropRule::where('country', $request->country)
                         ->where('state', $request->state)
                         ->where('district', $request->district)
                         ->where('season', $request->season)
                         ->select('crop_name')
                         ->get();

        return response()->json($crops);
    }
}
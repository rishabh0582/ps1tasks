<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurveyResponse;
use App\Models\Surveyprev;

class ChartController extends Controller
{
    public function showChart()
    {
        $responses = SurveyResponse::all();
        $previousResponses = surveyprev::all();

        return view('chart', compact('responses','previousResponses'));
    }
}

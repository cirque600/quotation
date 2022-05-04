<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(Request $request)
    {

        $request->validate([
            'age.*' => 'required|numeric|min:18|max:70',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'currency' => 'required|integer|min:1,max:3',
        ]);

        $quotation = Quotation::create([
            'age' => $request->age,
            'start_date' => Carbon::parse($request->start_date)->startOfDay(),
            'end_date' => Carbon::parse($request->end_date)->endOfDay(),
            'currency' => $request->currency
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Quotation created successfully',
            'quotation' => $quotation,
        ]);
    }


    public function show($id)
    {
        $quotation = Quotation::find($id);
        $total = 0;
        $start = $quotation->start_date;
        $end = $quotation->end_date;

        $dateDiff = ceil(Carbon::parse($start)->floatDiffInRealDays($end));



        foreach ($quotation->age as $age ) {
            $age_load = 0;
            switch($age) {
                case ($age >= 18 && $age<=30):
                    $age_load = 0.6;
                    break;

                case ($age >= 31 && $age <= 40):
                    $age_load = 0.7;
                    break;

                case ($age >= 41 && $age <= 50):
                        $age_load = 0.8;
                        break;

                case ($age >= 51 && $age <= 60):
                        $age_load = 0.9;
                        break;

                case ($age >= 31 && $age <= 40):
                        $age_load = 1;
                        break;

            }

            $total += (3 * $age_load * $dateDiff);
        }

        return response()->json([

            'total' => round($total, 2),
            'currency' => $quotation->currency,
            'quotation_id' => $quotation->id
        ]);
    }
}

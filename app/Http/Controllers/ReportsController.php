<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\Payment;

class ReportsController extends Controller
{
    //
    public function payreports(){

        $chart_options = [
            'chart_title' => 'Payments by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Payment',
            'group_by_field' => 'date',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);

        return view('reports.payments', compact('chart1'));

    }
}

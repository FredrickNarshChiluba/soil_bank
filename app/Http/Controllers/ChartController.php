<?php

namespace App\Http\Controllers;

use App\Chart;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Attribute;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all=Attribute::all();
      $groups = DB::table('attributes')
      ->select('employee_id', DB::raw('count(*) as total'))
      ->groupBy('employee_id')
      ->pluck('total', 'employee_id')->all();
      // dd($groups);
// Generate random colours for the groups
      for ($i=0; $i<=count($groups); $i++) {
        $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
    }
// Prepare the data for returning with the view
    for ($i=0; $i<=count($groups); $i++) {
    $chart = new Chart;
    $chart->labels = (array_keys($groups));
    $chart->dataset = (array_values($groups));
    $chart->colours = $colours;
}
    return view('charts.index', compact('chart','groups','all'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))

        ->get();

        $chart = Chart::database($users, 'bar', 'highcharts')

        ->title("Monthly new Register Users")

        ->elementLabel("Total Users")

        ->dimensions(1000, 500)

        ->responsive(false)

        ->groupByMonth(date('Y'), true);

        return view('vchart',compact('chart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function edit(Chart $chart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chart $chart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chart $chart)
    {
        //
    }
}

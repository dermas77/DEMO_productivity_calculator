<?php

namespace App\Http\Controllers;

use App\Models\WorkCenter;
use App\Models\Product;
use App\Models\Shift;
use Illuminate\Http\Request;
use App\Models\Worker;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $workers = Worker::all();
        $shifts = [];

        $date_start = $request->input('check-start');
        $date_end = $request->input('check-end');

        if (!empty($request)) {
            $shifts = Shift::whereBetween('date', [$date_start, $date_end])->get();
        }

        $workers_data = array();

        foreach ($workers as $worker) {

            $worker_data = self::workerCalculations($worker, $request);

            array_push($workers_data, $worker_data);
        }

        return view('home')->with(compact('shifts', 'workers_data'));
    }



    static function calculateShiftProductivity($shift)
    {
        $product = Product::find($shift->product_id);
        $workCenter = WorkCenter::find($shift->work_center_id);
        $pieces = $shift->pieces;

        $productivity = 0;

        if ($product->pieces_per_hour == 0) {
            $productivity = $pieces / ($workCenter->pieces_per_hour * 8);
        } else {
            $productivity = $pieces / ($product->pieces_per_hour * 8);
        }

        return $productivity;
    }


    public static function workerCalculations($worker, $request)
    {
        $worker_data = array(
            'id' => $worker->id,
            'name' => $worker->name,
            'surname' => $worker->surname,
            'shifts' => 0,
            'productivity' => 0,
            'prod%' => 0,
        );

        $date_start = $request->input('check-start');
        $date_end = $request->input('check-end');

        foreach ($worker->shifts as $shift) {
            if ($date_start != '' && $date_end != '') {
                if ($shift->date >= $date_start && $shift->date <= $date_end) {
                    $worker_data['shifts']++;
                    $worker_data['productivity'] += self::calculateShiftProductivity($shift);
                }
            }
        }
        if ($worker_data['shifts'] != 0) {
            $worker_data['prod%'] = round($worker_data['productivity'] / $worker_data['shifts'] * 100, 2);
            $worker_data['productivity'] = round($worker_data['productivity'] / $worker_data['shifts'], 2);
        }

        return $worker_data;
    }
}

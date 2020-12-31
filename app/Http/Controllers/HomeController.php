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

        if(!empty($request)){
            $shifts = Shift::whereBetween('date',[$date_start,$date_end])->get();
        } 

        return view('home')->with(compact('shifts','workers'));
    }



    static function calculateShiftProductivity($shift)
    {
        $product = Product::find($shift->product_id);
        $workCenter = WorkCenter::find($shift->work_center_id);
        $pieces = $shift->pieces;

        $productivity = 0;

        if($product->pieces_per_hour == 0){
            $productivity = $pieces / ($workCenter->pieces_per_hour * 8);
        } else {
            $productivity = $pieces / ($product->pieces_per_hour * 8);
        }

        return $productivity;
    }


    public static function workerCalculations($worker)
    {
        $data = array(
            'sum' => 0,
            'productivity' => 0,
            'prod%' => 0,
        );

        foreach($worker->shifts as $shift){
            if(isset($_GET) && !empty($_GET) && $shift->date >= $_GET['check-start'] && $shift->date <= $_GET['check-end']){
                $data['sum']++;
                $data['productivity'] += self::calculateShiftProductivity($shift);
            }
        }
        if($data['sum'] != 0) {
            $data['prod%'] = round($data['productivity'] / $data['sum'] * 100,2);
            $data['productivity'] = round($data['productivity'] / $data['sum'],2);
        }

        //dd($data);
        return $data;
    }

}

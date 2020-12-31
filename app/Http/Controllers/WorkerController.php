<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkCenter;
use App\Models\Product;
use App\Models\Shift;
use App\Models\Worker;

class WorkerController extends Controller
{
    public function calculateProductivity($shift)
    {

        $Work_Center= WorkCenter::find($shift->WorkCenter_id);
        $product = Product::find($shift->product_id);
        $pieces = $shift->pieces;

        $productivity = 0;

        if($product->pieces_per_hour == 0){
            $productivity = $pieces / ($Work_Center->pieces_per_hour * 8);
        } else {
            $productivity = $pieces / ($product->pieces_per_hour * 8);
        }


        return view('data')->with('productivity',round($productivity,2));
    }

}

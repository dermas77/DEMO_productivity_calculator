<?php   use \App\Http\Controllers\HomeController; ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Shifts Chosen') }}</div>

                <div class="card-body">
                    @foreach ($shifts as $shift)
                        <li style="list-style: none">Date: {{$shift->date}} </li>
                        <li style="list-style:none">Productivity: <?= HomeController::calculateShiftProductivity($shift)?> </li>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-6">

                <div class="card-header mb-2">{{ __('Select Dates') }}</div>

                <div class="card-body" style="display: contents">

                    <form name="add-blog-post-form" id="add-blog-post-form" method="get" action="{{url('/')}}">
                        @csrf

                        <label for="start">Start date:</label>
                        <input type="date" id="start" name="check-start"
                        min="2020-01-01" max="2021-12-31"
                        placeholder="dd-mm-yyyy" value="2020-01-01">


                        <label for="start">End date:</label>
                        <input type="date" id="start" name="check-end"
                            min="2020-01-01" max="2021-12-31"
                            placeholder="dd-mm-yyyy" value="2020-01-04">
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>

        </div>

        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Shifts</th>
                            <th scope="col">Average Productivity</th>
                            <th scope="col">Average Productivity %</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($workers as $worker)
                            <tr>
                                <th scope="row">{{$worker->id}}</th>
                                <td>{{$worker->name}}</td>
                                <td>{{$worker->surname}}</td>
                                <td><?= HomeController::workerCalculations($worker)['sum']?></td>
                                <td><?= HomeController::workerCalculations($worker)['productivity']?></td>
                                <td><?= HomeController::workerCalculations($worker)['prod%']?>%</td>
                              </tr>
                            <li style="list-style: none"> </li>
                            @endforeach
                        </tbody>
                      </table>

                </div>
            </div>

        </div>

    </div>
</div>
@endsection

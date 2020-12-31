<?php   use \App\Http\Controllers\HomeController; ?>

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
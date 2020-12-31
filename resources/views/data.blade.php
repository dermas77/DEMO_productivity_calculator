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
                        <th scope="col">Productivity Bar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($workers_data as $worker)
                        <tr>
                            <th scope="row">{{ $worker['id'] }}</th>
                            <td>{{ $worker['name'] }}</td>
                            <td>{{ $worker['surname'] }}</td>
                            <td>{{ $worker['shifts'] }}</td>
                            <td>{{ $worker['productivity'] }}</td>
                            <td>{{ $worker['prod%'] }}%</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $worker['prod%'] }}"
                                        aria-valuemin="0" aria-valuemax="100" style="width:{{ $worker['prod%'] }}%">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

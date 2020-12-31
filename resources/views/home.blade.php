@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Shifts Chosen  ') }} @if (isset($_GET['check-start']) == 1){{$_GET['check-start']}} @else No start date @endif - @if (isset($_GET['check-end']) == 1){{$_GET['check-end']}} @else No end date @endif</div>
                    <div class="card-body">
                        @foreach ($shifts as $shift)
                            <li style="list-style: none">Date: <i>{{ $shift->date }}</i> </li>
                            <li style="list-style:none">Pieces produced: <b>{{ $shift->pieces }}</b> </li>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card-header mb-2">{{ __('Select Dates') }}</div>
                <div class="card-body" style="display: contents">
                    <form name="add-blog-post-form" id="add-blog-post-form" method="get" action="{{ url('/') }}"
                        style="margin-left: 10px;">
                        @csrf

                        <label for="start">Start date:</label>
                        <input type="date" id="start" name="check-start" min="2020-01-01" max="2021-12-31"
                            placeholder="dd-mm-yyyy" value="">
                        <label for="start">End date:</label>
                        <input type="date" id="start" name="check-end" min="2020-01-01" max="2021-12-31"
                            placeholder="dd-mm-yyyy" value="">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
            @include('data')
        </div>
    </div>
@endsection

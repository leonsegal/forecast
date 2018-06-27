@extends('forecast::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($forecast->list as $day)
                <div class="col-4">
                    <h2>({{$day->dt_txt}})</h2>
                    <img class="img-fluid"
                         src="http://openweathermap.org/img/w/{{$day->weather[0]->icon}}.png"
                         alt="weather icon">
                    <h2>{{$day->weather[0]->description}}</h2>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>
@endsection()
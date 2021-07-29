@extends('layout.app')

<head>
<link href="{{ secure_asset('css/event.css') }}" rel="stylesheet">
</head>


@section('content')
    <div class="details-container">
        <h1>{{$event->name}}</h1>
        <h2>{{$event->date}}</h2>
        <p>{{$event->location}}</p>
        <img src="{{URL('/storage/'.$event->picture)}}">   
        <p>{{$event->description}}</p>
        <p>Organised by: {{$event->organiser_name}}</p>
        <p>Contact: {{$event->email}}, {{$event->phone_number}}</p>
        <button onclick="window.location='{{ url("events/updateinterest/{$event->id}") }}'">Show Interest</button>
    </div>
    <div class="details-container">
        <h2>Similar Events you may be interested in:</h2>
        @foreach($similarEvents as $other)
            @if($other->id != $event->id)
               <a onclick="window.location='{{ url("events/$other->id}") }}'"> {{$other->name}}</a></br>
            @endif   
        @endforeach
    </div>  


@endsection
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="event-container">

        <div class="event-content">
            <img src = {{$event->imageurl}} alt = 'event' />
            <h1>{{$event->name}}</h1>
            <p>{{$event->discription}}</p>
        </div>
    </div>

</div>


@endsection

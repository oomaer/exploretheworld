

@extends('layouts.app')

@section('content')


    <div class = 'recommendation-container'>
        <div class = 'recommendations-content'>
            <h1>{{$filter}}</h1>
            @if (sizeof($result) == 0)
                <h1>No Results Found</h1>
            @else
                <ul>
                    @foreach ($result as $location)
                        <li>
                            <div class = 'recommendation-card-container'>
                                <div class = 'recommendation-card-content'>
                                    <a href = "/location/{{$location->id}}">
                                        <div class = 'recommendation-card-image-container'>
                                            <img alt = 'location image' src = {{$location->imageurl}} />
                                        </div>
                                    </a>
                                    <div class = 'recommendation-card-details'>
                                        <p id = 'recommendation-card-details-country'>{{$location->country}}</p>
                                        <div class = 'recommendation-card-header'>
                                            <a href = "/location/{{$location->id}}">
                                                <h3 id = 'recommendation-card-details-title'>{{$location->name}}</h3>
                                            </a>
                                            @if (property_exists($location, 'avg_rating'))
                                                <p id = 'recommendation-card-details-rating'>★ {{$location->avg_rating}}</p>
                                            @else
                                                <p id = 'recommendation-card-details-rating'>🗽 {{$location->popularity}}</p>
                                            @endif
                                        </div>
                                        <p id = 'recommendation-card-detail-overview'>{{$location->overview}}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>


@endsection

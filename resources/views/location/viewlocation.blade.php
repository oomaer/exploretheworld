


@extends('layouts.app')

@section('content')



    <div class = 'location-cover d-flex justify-content-center align-items-center'
        style="background-image: url({{$location->cover_imageurl}})">

        <div class="location-cover-white">
        </div>

    </div>


    <div class="location-details-container">

        <div class="container">
            <div class="location-details-content row g-0">

                <div class="col-12 col-xl-8 location-details-white ">
                    <p class="location-details-country">{{$location->country}}</p>
                    <div class="location-details-block">
                        <div class="d-flex align-items-center mb-4">
                            <h1 class="location-details-header mb-0 me-3">{{$location->name}}</h1>
                            <a class = 'btn btn-danger' onclick="return confirm('Are you sure?')" href = '/deletelocation/{{$location->id}}'>delete</a>
                        </div>
                        <p class="location-details-overview">{{$location->overview}}</p>
                        <p class="location-details-discription">{{$location->discription}}</p>
                    </div>
                </div>

                <div class="col-xl-4"></div>
            </div>
        </div>

    </div>

    <div class="location-events-container">
        <div class="container">
            <h1>Events</h1>
            <div class="d-flex justify-content-center">
                <div class="location-events-cols location-events-content d-flex flex-wrap justify-content-center">
                    <div class="location-events-col1">
                        @for ($i = 0; $i < sizeof($events); $i+=2)
                            <div class="location-event-card" style = "background-image: url({{$events[$i]->imageurl}})">
                                <h2 class="location-event-card-name">{{$events[$i]->name}}</h2>
                            </div>
                        @endfor
                    </div>
                    <div class="location-events-col2">
                        @for ($i = 1; $i < sizeof($events); $i+=2)
                            <div class="location-event-card" style = "background-image: url({{$events[$i]->imageurl}})">
                                <h2 class="location-event-card-name">{{$events[$i]->name}}</h2>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="comments-container">

        <div class="container">

            <h1 class="mb-5">Comments</h1>

            <div class="d-flex justify-content-center">
                @if (auth()->user())

                    @if(sizeof($currUserReview) != 0)

                        <form class = 'review-form' action = '/updatereview/{{$currUserReview[0]->id}}' method = 'post'>
                            @csrf
                            <h3>Your Review </h3>

                            <div class="reivew-form-card">

                                <div class="d-flex align-items-center mb-3">
                                    <label class = "me-3" for = 'update_review_form_rating'>Rate</label>
                                    <input type = 'number' min = '0' max = '10' id = 'update_review_form_rating' name = 'update_review_form_rating'
                                    class = "@error('update_review_form_rating') input_err @enderror me-3" value = "{{old('update_review_form_rating', $currUserReview[0]->rating)}}"/>
                                    <p class="m-0"> out of 10</p>
                                </div>
                                @error('update_review_form_rating')
                                    <div class="err-msg">{{$message}}</div>
                                @enderror

                                <textarea id = 'update_review_form_comment' name = 'update_review_form_comment'
                                class = "@error('update_review_form_comment') input_err @enderror mb-3">{{old('update_review_form_comment', $currUserReview[0]->comment)}}</textarea>
                                @error('update_review_form_comment')
                                    <div class="err-msg">{{$message}}</div>
                                @enderror
                                <div>
                                    @if(Session::has('message'))
                                        <h4>{{ Session::get('message') }}</h4>
                                    @endif
                                </div>


                                <div class="d-flex align-items-center">
                                    <button class = "me-2" type= 'submit' >Update</button>
                                    <a onclick="return confirm('Are you sure?')" href = '/deletereview/{{$currUserReview[0]->id}}'>Delete</a>
                                </div>

                            </div>

                        </form>

                    @else

                        <form class = 'review-form' action = '/postreview/{{$location->id}}' method = 'post'>
                            @csrf
                            <h3>Post Your Review</h3>

                            <div class="reivew-form-card">

                                <div class="d-flex align-items-center mb-3">
                                    <label class = "me-3" for = 'review_form_rating'>Rate</label>
                                    <input type = 'number' pattern="[0-9]" min = '0' max = '10' id = 'review_form_rating' name = 'review_form_rating'
                                    class = "@error('review_form_rating') input_err @enderror me-3" value = "{{old('review_form_rating')}}"/>
                                    <p class="m-0"> out of 10</p>
                                </div>
                                @error('review_form_rating')
                                    <div class="err-msg">{{$message}}</div>
                                @enderror

                                <textarea id = 'review_form_comment' name = 'review_form_comment'
                                class = "@error('review_form_comment') input_err @enderror mb-3">{{old('review_form_comment')}}</textarea>
                                @error('review_form_comment')
                                    <div class="err-msg">{{$message}}</div>
                                @enderror
                                <div>
                                    @if(Session::has('message'))
                                        <h4>{{ Session::get('message') }}</h4>
                                    @endif
                                </div>

                                <button type= 'submit' >Post</button>

                            </div>

                        </form>

                    @endif

                @else
                    <p><a href = '/login'>Sign In </a>to add your review</p>
                @endif
            </div>

            <div class="d-flex justify-content-center">
                <div class="location-comments">
                    @foreach ($reviews as $review)
                        @if (auth()->user() && auth()->user()->id === $review->user_id)
                        @else
                             <div class="review-card">
                                <div class="d-flex align-items-center">
                                    <p class="mb-1">⭐ </p>
                                    <p class="rating">{{$review->rating}} of 10</p>
                                </div>

                                <div class="review-header">
                                    <h3>{{$review->name}}</h3>
                                    <p>{{$review->review_date}}</p>
                                </div>
                                <p>
                                    {{$review->comment}}
                                </p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

    </div>



@endsection

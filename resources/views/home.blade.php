@extends('layouts.app')

@section('content')





<div class="home-container">



    <div class="home-cover-container">

        <div class="home-cover-content">

            <h2 class="cover-header">Plan your Next</h2>
            <h1 class="cover-header">Adventure</h1>
            <a href = '#'>down</a>
            <img src = '/assets/images/upbaloon.png' class="upbaloon"/>
            {{-- <img src = '/assets/images/forestvector.jpg' class="forest"/> --}}
            {{-- <img src = '/assets/images/clif.jpg' class="upbaloon"/> --}}
        </div>


    </div>

    <div class="home-intro-container">

        <div class="home-intro-content">
            <p>
                We all want to travel the world, explore, or know about new places.
                Here You will get to know about many beautiful places and experience of other people in those places.

            </p>
        </div>

    </div>


    <div class = 'cardsection1-container'>
        <div class = 'cardsection1-content '>
            <div class = 'cardsection1-header mb-5'>
                <h2>Popular Spots</h2>
                <p></p>
            </div>
            <div class = "cardsection1-cards">
                <a href = "#">
                    <div class = 'cardsection1-leftcard-container' style = "background-image : LINEAR-GRADIENT(46deg, RGB(0, 0, 0, 0.7) 10%, transparent 90%), url('{{$popular[0]->cover_imageurl}}')">
                        <div class = 'cardsection1-leftcard-content' >
                            <p class = 'cardsection1-card-date'>{{$popular[0]->country}}</p>
                            <p>{{$popular[0]->name}}</p>
                        </div>
                    </div>
                </a>
                <div class = 'cardsection1-rightcards-container'>
                    <div class = 'cardsection1-rightcards-content'>
                        @for ($i = 1; $i < sizeof($popular); $i+=1)

                            <a href = "/content/${content.ID}">
                                <div class = 'cardsection1-smallcard-container'
                                style = "background-image : LINEAR-GRADIENT(TO RIGHT top, RGB(0, 0, 0, 0.8) 5%, transparent 90%), url('{{$popular[$i]->imageurl}}')">
                                        <div class = 'cardsection1-smallcard-content'>
                                            <p class = 'cardsection1-card-date'>{{$popular[$i]->country}}</p>
                                            <p>{{$popular[$i]->name}}</p>
                                        </div>
                                    </div>
                            </a>

                        @endfor

                    </div>
                </div>
            </div>
        </div>
    </div>














    {{-- <div class="parallax1">
        <h1>Hello1</h1>
    </div>
    <p class="home-para">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet quae nihil, possimus et natus inventore molestias animi aspernatur dolore quis voluptatibus deleniti optio aperiam doloribus rem excepturi ea accusantium. Reiciendis.</p>


    <div class="parallax2container">
    <div class="parallax2">
        <h1 class="parallax2-heading">Hello2</h1>
    </div>
    </div>

    <p class="home-para">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet quae nihil, possimus et natus inventore molestias animi aspernatur dolore quis voluptatibus deleniti optio aperiam doloribus rem excepturi ea accusantium. Reiciendis.</p>

    <div class="parallax3">
        <h1>Hello2</h1>

    </div>
    <p class="home-para">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet quae nihil, possimus et natus inventore molestias animi aspernatur dolore quis voluptatibus deleniti optio aperiam doloribus rem excepturi ea accusantium. Reiciendis.</p> --}}



</div>
@endsection


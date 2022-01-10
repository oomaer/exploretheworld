<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/location.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/inputforms.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/home.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/recommendations.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/event.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src = "{{ URL::asset('assets/js/home.js') }}"></script>
    <script src = "{{ URL::asset('assets/js/location.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
              <a class="navbar-brand" href="#">Explore the World</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/recommendations/ourpicks">Our Picks</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/recommendations/toprated">Top Rated</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/recommendations/popular">Popular</a>
                  </li>
                  @if(auth()->user())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/editprofile">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>

                    @if (auth()->user()->email == 'admin@admin.eth')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/addlocation">Add Location</a></li>
                            <li><a class="dropdown-item" href="/addevent">Add Event</a></li>
                            </ul>
                        </li>
                    @endif

                  @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>

                  @endif

                </ul>
              </div>
            </div>
          </nav>


    </header>


    @yield('content')




</body>

</html>

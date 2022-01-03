@extends('layouts.authpages')

@section('content')

    <h2>Login<h2>

    <form action = '/login' method = 'post'>
        @csrf

        <div>
            <input type = 'email' name = 'email' id = 'email' placeholder = 'email'
                class = "@error('email') input_err @enderror form-control" value = "{{old('email')}}"
            />
            @error('email')
                <div class = "error-msg">{{$message}}</div>
            @enderror
        </div>

        <div>
            <input type = 'password' name = 'password' id = 'password' placeholder = 'password'
                class = "@error('password') input_err @enderror form-control"
            />
            @error('password')
                <div class = "error-msg">{{$message}}</div>
            @enderror
        </div>



        <div>
            @if(Session::has('error'))
                <h4>{{ Session::get('error') }}</h4>
            @endif
        </div>

        <button type = 'submit'>Login</button>

        or
        <a href = '/register'>Register</a>

    </form>

@endsection

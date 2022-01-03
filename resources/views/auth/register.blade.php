@extends('layouts.authpages')

@section('content')

    <h2>Register<h2>

    <form action = '/register' method = 'post'>
        @csrf

        <!-- if there is error in any of the input field which will be checked inside our Controller validate function
            it will redirect back to this page
            anything that we want to do if there is error we will put it inside error(errorname) directive
            {old(name)} keeps the old text inside the input field when we are redirected back to
            this page after page refresh
            if we don't use old(name) then input fields become empty if any error occurs.
        -->

        <div>
            <input type = 'text' name = 'name' id = 'name' placeholder = 'name'
                class = "@error('name') input_err @enderror form-control" value = "{{old('name')}}"
            />

            <!-- to display that error message we use error directive and message  -->
            @error('name')
                <div class = "error-msg">{{$message}}</div>
            @enderror
        </div>

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
            <!-- must use password_confirmation as name because php looks for this to confirm password -->
            <input type = 'password' name = 'password_confirmation' id = 'password_confirmation' placeholder = 'confirm_password'
            />

        </div>

        <div>
            @if(Session::has('error'))
                <h4>{{ Session::get('error') }}</h4>
            @endif
        </div>

        <button type = 'submit'>Register</button>

        or
        <a href = '/login'>Login</a>

    </form>


@endsection

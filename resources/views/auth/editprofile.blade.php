

@extends('layouts.app')

@section('content')

    <div class="input-form-container">

        <div class="container">

            <div class="d-flex justify-content-center">
                <div class="input-form-content d-flex flex-column justify-content-center align-items-center">

                    <h2 class="mb-5">Edit Profile</h2>
                    <form action = '/editprofile' method = 'post'>
                        @csrf

                        <div class="mb-3">
                            <label for = 'name' class="mb-2 fs-5 fw-bold">Name</label>
                            <input type = 'text' name = 'name' id = 'name' placeholder = 'name'
                            class = "@error('name') input_err @enderror form-control" value = "{{old('name', auth()->user()->name)}}"
                        />
                            @error('name')
                                <div class="error-msg">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for = 'discription' class="mb-2 fs-5 fw-bold">Email</label>
                            <input type = 'email' name = 'email' id = 'email' placeholder = 'email'
                                class = "@error('email') input_err @enderror form-control" value = "{{old('email', auth()->user()->email)}}"
                            />
                            @error('email')
                                <div class = "error-msg">{{$message}}</div>
                            @enderror
                        </div>


                        <div>
                            @if(Session::has('message'))
                                <h4 class="error-msg">{{ Session::get('message') }}</h4>
                            @endif
                        </div>

                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success" type = 'submit'>Update</button>
                        </div>



                    </form>

                </div>

            </div>
        </div>

    </div>

@endsection

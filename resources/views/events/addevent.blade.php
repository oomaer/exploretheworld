

@extends('layouts.app')

@section('content')

    <div class="input-form-container">

        <div class="container">

            <div class="d-flex justify-content-center">
                <div class="input-form-content d-flex flex-column justify-content-center align-items-center">

                    <h2 class="mb-5">Add Event</h2>
                    <form action = '/addevent' method = 'post'>
                        @csrf

                        <div class="mb-3">
                            <label for = 'name' class="mb-2 fs-5 fw-bold">Name</label>
                            <input type = 'text' name = 'name' id = 'name' placeholder = 'name'
                                class = "@error('name') input_err @enderror form-control" value = "{{old('name')}}"
                            />
                            @error('name')
                                <div class="error-msg">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for = 'discription' class="mb-2 fs-5 fw-bold">Discription</label>
                            <textarea type = 'text' name = 'discription' id = 'discription' placeholder = 'discription'
                                class = "@error('discription') input_err @enderror form-control">{{old('discription')}}</textarea>
                            @error('discription')
                                <div class="error-msg">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for = 'imageurl' class="mb-2 fs-5 fw-bold">Image URL</label>
                            <input type = 'text' name = 'imageurl' id = 'imageurl' placeholder = 'image url'
                                class = "@error('imageurl') input_err @enderror form-control" value = "{{old('imageurl')}}"
                            />
                            @error('imageurl')
                                <div class="error-msg">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for = 'date' class="mb-2 fs-5 fw-bold">Date</label>
                            <input type = 'date' name = 'date' id = 'eventdate' placeholder = 'date'
                                class = "@error('date') input_err @enderror form-control" value = "{{old('date')}}"
                            />
                            @error('date')
                                <div class="error-msg">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for = 'location' class="mb-2 fs-5 fw-bold">Location</label>
                            <input type = 'text' name = 'location' id = 'autocomplete-search' placeholder = 'location search'
                                class = "@error('location') input_err @enderror form-control" value = "{{old('location')}}"
                            />
                            @error('location')
                                <div class="error-msg">{{$message}}</div>
                            @enderror
                        </div>



                        <div>
                            @if(Session::has('message'))
                                <h4 class="error-msg">{{ Session::get('message') }}</h4>
                            @endif
                        </div>

                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success" type = 'submit'>Submit</button>
                        </div>



                    </form>

                </div>

            </div>
        </div>

    </div>

@endsection



@extends('layouts.app')

@section('content')

    <div class="input-form-container location-input-form-container">

        <div class="container">

            <div class="d-flex justify-content-center">
                <div class="input-form-content d-flex flex-column justify-content-center align-items-center">

                    <h2>Update Location</h2>

                    <form action = '/updatelocation/{{$id}}' method = 'post'>
                        @csrf

                        <div class = 'mb-3'>
                            <label for = 'name' class="mb-2 fs-5 fw-bold">Name</label>
                            <input type = 'text' name = 'name' id = 'name' placeholder = 'name'
                                class = "@error('name') input_err @enderror form-control" value = "{{old('name', $data->name)}}"
                            />
                            @error('name')
                                <div class = "error-msg">{{$message}}</div>
                            @enderror
                        </div>

                        <div class = 'mb-3'>
                            <label for = 'country' class="mb-2 fs-5 fw-bold">Country</label>
                            <input type = 'text' name = 'country' id = 'country' placeholder = 'country'
                                class = "@error('country') input_err @enderror form-control" value = "{{old('country', $data->country)}}"
                            />
                            @error('country')
                                <div class = "error-msg">{{$message}}</div>
                            @enderror
                        </div>

                        <div class = 'mb-3'>
                            <label for = 'overview' class="mb-2 fs-5 fw-bold">Overview</label>
                            <textarea name = 'overview' id = 'overview' placeholder = 'overview'
                                class = "@error('overview') input_err @enderror form-control" >{{old('overview', $data->overview)}}</textarea>

                            @error('overview')
                                <div class = "error-msg">{{$message}}</div>
                            @enderror
                        </div>

                        <div class = 'mb-3'>
                            <label for = 'discription' class="mb-2 fs-5 fw-bold">Discription</label>
                            <textarea type = 'text' name = 'discription' id = 'discription' placeholder = 'discription'
                                class = "@error('discription') input_err @enderror form-control">{{old('discription', $data->discription)}}</textarea>
                            @error('discription')
                                <div class = "error-msg">{{$message}}</div>
                            @enderror
                        </div>

                        <div class = 'mb-3'>
                            <label for = 'cover_imageurl' class="mb-2 fs-5 fw-bold">Cover Image URL</label>
                            <input type = 'text' name = 'cover_imageurl' id = 'cover_imageurl' placeholder = 'cover image url'
                                class = "@error('cover_imageurl') input_err @enderror form-control" value = "{{old('cover_imageurl', $data->cover_imageurl)}}"
                            />
                            @error('cover_imageurl')
                                <div class = "error-msg">{{$message}}</div>
                            @enderror
                        </div>

                        <div class = 'mb-3'>
                            <label for = 'imageurl' class="mb-2 fs-5 fw-bold">Image URL</label>
                            <input type = 'text' name = 'imageurl' id = 'imageurl' placeholder = 'image url'
                                class = "@error('imageurl') input_err @enderror form-control" value = "{{old('imageurl', $data->imageurl)}}"
                            />
                            @error('imageurl')
                                <div class = "error-msg">{{$message}}</div>
                            @enderror
                        </div>

                        <div class = 'mb-3'>
                            <label for = 'popularity' class="mb-2 fs-5 fw-bold">Popularity</label>
                            <input type = 'number' max = '100' name = 'popularity' id = 'popularity' placeholder = 'popularity'
                                class = "@error('popularity') input_err @enderror form-control" value = "{{old('popularity', $data->popularity)}}"
                            />
                            @error('popularity')
                                <div class = "error-msg">{{$message}}</div>
                            @enderror
                        </div>



                        <div class = 'mb-3'>
                            @if(Session::has('message'))
                                <h4>{{ Session::get('message') }}</h4>
                            @endif
                        </div>

                        <button type = 'submit'>Update</button>



                    </form>

                </div>

            </div>
        </div>

    </div>

@endsection

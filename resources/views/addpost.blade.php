@extends('tamplate')
@section('main-content')

    <div class="container my-5 p-4 shadow">
    <form action="{{ route('storepost') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Product Name:</label>
            <input
                    type="text"
                    class="form-control"
                    id="title"
                    name="title"

            >
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Select Image:</label>
            <input
                    class="form-control"
                    type="file"
                    id="formFile"
                    name="img"
            >
        </div>
        {{--<div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Active</label>
        </div>--}}
            <button type="submit" class="btn btn-sm btn-primary w-100" value="Add Post">Submit</button>


    </form>
    </div>

@endsection
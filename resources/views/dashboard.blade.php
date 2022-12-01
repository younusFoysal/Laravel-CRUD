@extends('tamplate')
@section('main-content')

    <h2>Dashboard</h2>

    <div class="container my-5 p-4 shadow">
        <table class="table table-light table-hover">

                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td><img src="{{asset($post->img_url)}}" style="height: 50px"></td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('editpost', $post->id) }}" role="button">Edit</a>
                        <a class="btn btn-primary" href="{{ route('deletepost', $post->id) }}" role="button" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                @endforeach

                </tbody>

        </table>


    </div>

@endsection
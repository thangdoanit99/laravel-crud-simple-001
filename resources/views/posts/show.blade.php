@extends('layouts.app')

@section('content')

<div style="padding: 20px 0">
    @if ($post != null)

    <button type="button" class="btn btn-dark"><a href="{{route('posts.index')}}">Back</a></button>

    <div style="padding: 20px 0">
        <h3 style="padding: 30px 0">Title: {{$post->title}}</h3>
        <h5 style="padding: 30px 0">Content: {{$post->content}}</h5>
    </div>


    <div class="d-flex flex-row bd-highlight mb-3" style="border: 1px solid black;">

        @if ($photos != null)
        @foreach ($photos as $photo)
        <div class="p-2 bd-highlight"><img style="width: 200px; height: auto;" src="{{$photo->path}}"
                class="img-thumbnail" alt="{{$photo->path}}" /></div>
        @endforeach
        @else
        <p>No Image</p>
        @endif

    </div>

    <button type="button" class="btn btn-success"><a href="{{route('posts.edit',$post->id)}}">Edit</a></button>

    {{-- <form action="/posts/{{$post->id}}" method="POST">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="_method" value="DELETE" />

    <button type="submit" name="submit" class="btn btn-danger">Delete</button>
    </form> --}}

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteForm">
        Delete
    </button>

    <!-- Modal -->
    <div class="modal fade" id="deleteForm" tabindex="-1" aria-labelledby="deleteFormLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="deleteFormLabel">Delete Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete {{$post->title}} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="/posts/{{$post->id}}" method="POST">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="DELETE" />

                        <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <p>No Post</p>
    @endif
</div>


@endsection

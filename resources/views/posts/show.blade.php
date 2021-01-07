@extends('layouts.app')

@section('title')
<p>SHOW {{$id}}</p>
@endsection

@section('content')

@if ($post != null)
<button type="button" class="btn btn-light"><a style="color: black;"
        href="{{route('posts.index')}}">{{$post->title}}</a></button>
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
@endsection

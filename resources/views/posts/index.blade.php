@extends('layouts.app')

@section('title')
<p>INDEX</p>
@endsection

@section('content')
<button type="button" class="btn btn-primary"><a href="{{route('posts.create')}}">create</a></button>

@if (count($posts)>0)
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>
                <button type="button" class="btn btn-light"><a style="color: black;"
                        href="{{route('posts.show',$post->id)}}">Show</a>
                </button>
                <button type="button" class="btn btn-success"><a
                        href="{{route('posts.edit',$post->id)}}">Edit</a></button>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteForm">
                    Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="deleteForm" tabindex="-1" aria-labelledby="deleteFormLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="deleteFormLabel">Delete Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Do you want to delete {{$post->title}} ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                {{-- <form action="/posts/{{$post->id}}" method="POST">
                                @csrf
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="_method" value="DELETE" />

                                <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                                </form> --}}

                                {{-- Collective Form --}}
                                {!! Form::open(['method' => 'DELETE','action' => ['PostController@destroy',$post->id]])
                                !!}
                                {{Form::token()}}

                                {{Form::submit('Delete',['class'=>"btn btn-danger"])}}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@else
<p>No Posts</p>
@endif
@endsection

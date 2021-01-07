@extends('layouts.app')

@section('title')
<p>INDEX</p>
@endsection

@section('content')

@if ($posts !=null)
<ul class="list-group">
    @foreach ($posts as $post)
    <li class="list-group-item" style="width:300px">
        <a style="color: black;" href="{{route('posts.show',$post->id)}}">{{$post->title}}</a>
    </li>
    @endforeach
</ul>
@else
<p>No Posts</p>
@endif

<button type="button" class="btn btn-success"><a href="{{route('posts.create')}}">create</a></button>
@endsection

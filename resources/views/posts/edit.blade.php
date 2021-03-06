@extends('layouts.app')

@section('title')
<p>EDIT {{$post->title}}</p>
@endsection

@section('content')

{{-- <form action="/posts/{{$post->id}}" method="POST">
@csrf
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<input type="hidden" name="_method" value="PUT" />
<div class=" mb-3">
    <label for="title" class="form-label"></label>
    <input name='title' value='{{$post->title}}' type="text" class="form-control" id="title" style="width:300px">
</div>
<div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea name="content" class="form-control" id="content" rows="3"
        style="width:300px">{{$post->content}}</textarea>
</div>
<button type="submit" name="submit" class="btn btn-success">Edit</button>
</form> --}}


{{-- Collective Form --}}
{!! Form::model($post,['method' => 'PATCH','action' => ['PostController@update',$post->id]]) !!}

{{Form::token()}}

<div class="mb-3">
    {{Form::label('title', 'Enter Title',['class'=>'form-label'])}}
    {{Form::text('title',$post->title,[
    'name'=>'title',
    'type'=>"text",
    'class'=>"form-control",
    'id'=>"title",
    'style'=>"width:300px"],
    ['placeholder' => 'Enter Title...'])}}
</div>

<div class="mb-3">
    {{Form::label('content', 'Enter Content',['class'=>'form-label'])}}
    {{Form::textArea('content',$post->content,[
    'name'=>'content',
    'type'=>"text",
    'class'=>"form-control",
    'id'=>"title",
    'rows'=>"3",
    'style'=>"width:300px"],
    ['placeholder' => 'Enter Content...'])}}
</div>

{{Form::submit('Edit',['class'=>"btn btn-success"])}}
{!! Form::close() !!}

@endsection

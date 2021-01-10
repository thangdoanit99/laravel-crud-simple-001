@extends('layouts.app')

@section('title')
<p>CREATE</p>
@endsection

@section('content')
{{-- Validate Form --}}

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger mb-3" role="alert">
    {{$error}}
</div>
@endforeach
@endif
{{-- <form action="/posts" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input name='title' type="text" class="form-control" id="title" style="width:300px">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea name="content" class="form-control" id="content" rows="3" style="width:300px"></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form> --}}


{{-- Collective Form --}}
{!! Form::open([
'method' => 'POST',
'action' => 'PostController@store',
'files' => true,
'enctype'=>"multipart/form-data"])!!}

{{Form::token()}}

<div class="mb-3">
    {{Form::label('title', 'Enter Title',['class'=>'form-label'])}}
    {{Form::text('title','',[
    'name'=>'title',
    'type'=>"text",
    'class'=>"form-control",
    'id'=>"title",
    'style'=>"width:300px"],
    ['placeholder' => 'Enter Title...'])}}
</div>

<div class="mb-3">
    {{Form::label('content', 'Enter Content',['class'=>'form-label'])}}
    {{Form::textArea('content','',[
    'name'=>'content',
    'type'=>"text",
    'class'=>"form-control",
    'id'=>"title",
    'rows'=>"3",
    'style'=>"width:300px"],
    ['placeholder' => 'Enter Content...'])}}
</div>

<div class="mb-3">
    {{Form::file('files[]',[
    'class'=>'form-control',
    'style'=>"width:300px",
    'id'=>'files',
    'multiple'])}}

    {{-- Add multiple to upload many image --}}
</div>

{{Form::submit('Create',['class'=>"btn btn-primary"])}}
{!! Form::close() !!}



{{-- <div id="drag-drop-area"></div>

<script src="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.js"></script>
<script>
    var uppy = Uppy.Core()
        .use(Uppy.Dashboard, {
          inline: true,
          target: '#drag-drop-area'
        })
        .use(Uppy.Tus, {endpoint: 'https://master.tus.io/files/'}) //you can put upload URL here, where you want to upload images

      uppy.on('complete', (result) => {
        console.log('Upload complete! We’ve uploaded these files:', result.successful)
      });
</script> --}}

@endsection

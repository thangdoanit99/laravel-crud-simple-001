@extends('layouts.app')

@section('title')
<p>CREATE</p>
@endsection

@section('content')

<form action="/posts" method="POST">
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
</form>

@endsection

@extends('layouts.app')

@section('title') Create @endsection

@section('content')

    <form action="/posts/update/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input name='title' type="text" class="form-control" id="exampleFormControlInput1" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$post->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
            <select class="form-control" name="select_post">
                <option value="{{$post->user_id}}">{{$post->user->name ?? 'Not Found'}}</option>

                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach

            </select>
        </div>
        <button class="btn btn-primary mt-4 mb-4" type="submit">Update</button>
    </form>

@endsection

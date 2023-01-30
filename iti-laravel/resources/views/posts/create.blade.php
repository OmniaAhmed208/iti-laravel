@extends('layouts.app')

@section('title') Create @endsection

@section('content')

    <form action="/posts" method="POST">
        @csrf {{-- to store method--}}
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
            <select name="select_post" class="form-control">
                @foreach($Users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary mt-4 mb-4" type="submit">Submit</button>
    </form>

@endsection

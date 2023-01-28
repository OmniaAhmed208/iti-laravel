@extends('layouts.app')

@section('title') Create @endsection

@section('content')

    <form action="/posts" method="PUT">
        @method('PUT')
        @csrf
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$title}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{$description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
            <select class="form-control">
                <option>{{$posted_by}}</option>
                <option>Ali</option>
                <option>sara</option>
            </select>
        </div>
        <button class="btn btn-primary mt-4 mb-4" type="submit">Update</button>
    </form>

@endsection

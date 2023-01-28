@extends('layouts.app')

@section('title') Create @endsection

@section('content')

    <form action="/posts" method="POST">
        @csrf {{-- to store method--}}
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
            <select class="form-control">
                <option>Ali</option>
                <option>sara</option>
            </select>
        </div>
        <button class="btn btn-primary mt-4 mb-4" type="submit">Submit</button>
    </form>

@endsection

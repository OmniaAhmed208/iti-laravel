@extends('layouts.app')

@section('title') Show @endsection

@section('content')

<div class="card mt-4">
  <h5 class="card-header">Post Info</h5>
  <div class="card-body">

    <span class="card-title" style="font-weight:bold">Title:</span>
    <span>{{$post->title}}</span>
    <br><br>
    <span class="card-title" style="font-weight:bold">Description:</span>
    <span class="card-title">{{$post->description}}</span>
  </div>
</div>

<div class="card mt-4">
  <h5 class="card-header">Post created Info</h5>
  <div class="card-body">

    <span class="card-title" style="font-weight:bold">Name:</span>
    <span>{{$post->posted_by}}</span>
    <br><br>
    <span class="card-title" style="font-weight:bold">created_at:</span>
    <span class="card-title">{{$post->created_at}}</span>
  </div>
</div>

@endsection

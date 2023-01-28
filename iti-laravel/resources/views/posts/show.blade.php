@extends('layouts.app')

@section('title') Show @endsection

@section('content')

<div class="card mt-4">
  <h5 class="card-header">Post Info</h5>
  <div class="card-body">

    <span class="card-title" style="font-weight:bold">Title:</span>
    <span>{{$title}}</span>
    <br><br>
    <span class="card-title" style="font-weight:bold">Description:</span>
    <span class="card-title">{{$description}}</span>
  </div>
</div>

<div class="card mt-4">
  <h5 class="card-header">Post created Info</h5>
  <div class="card-body">

    <span class="card-title" style="font-weight:bold">Name:</span>
    <span>{{$posted_by}}</span>
    <br><br>
    <span class="card-title" style="font-weight:bold">created_at:</span>
    <span class="card-title">{{$created_at}}</span>
  </div>
</div>

@endsection

@extends('layouts.app')

@section('title') index @endsection

@section('content')

    <div class="d-grid gap-2 col-6 mx-auto">
        <a href="{{route('posts.create')}}" class="btn btn-primary mt-4 mb-4">Create Post</a>
    </div>

  <table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted by</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    {{-- @dd($post) ==>//  print first row in array and die --}}
    <tr>
      <th scope="row">{{$post['id']}}</th>
      <td>{{$post['title']}}</td>
      <td>{{$post['posted_by']}}</td>
      <td>{{$post['created_at']}}</td>
      <td>
        {{--<!-- <a href="/posts/{{$post['id']}}" class="btn btn-secondary">View</a> -->--}}
        <a href="{{route('posts.show', $post['id'])}}" class="btn btn-secondary">View</a>
        <a href="{{route('posts.edit', $post['id'])}}" class="btn btn-primary">Edit</a>
        <a href="" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
  </table>

  @endsection
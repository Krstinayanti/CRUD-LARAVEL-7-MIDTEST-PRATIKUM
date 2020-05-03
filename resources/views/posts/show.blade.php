@extends('layouts.app')

@section('title', $post->title)

@section('sidebar')
  
@section('content')
<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header"> {{$post->title}}</div>
        <div class="card-body">
          <p class="card-text">{{$post->description}}</p>
        </div> 

@endsection
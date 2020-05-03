@extends('layouts.app')

@section('title', 'Edit Data'.$post->id)

@section('sidebar')
  
@section('content')
<div class="row">
<div class="col-lg-6 mx-auto">
    @if ($errors->any())
    <div class ="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if($message = Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif
<form method="POST" action="{{route('post.update',$post)}}">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="post-title">Nama</label>
        <input type="text" name="title" class="form-control" id="post-title"{{$post->title}}>
    </div>
    <div class="form-group">
        <label for="post-title">Write Document</label>
        <textarea name="description" class="form-control" id="post-description"{{$post->description}}> </textarea>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
   
  </form>
</div>
</div>
  @endsection
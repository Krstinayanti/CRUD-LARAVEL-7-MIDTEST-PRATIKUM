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
        <input type="text" name="title" class="form-control title-input" id="post-title" value="{{$post->title}}">
    </div>
    <div class="form-group">
            <label for="post-title">Slug</label>
            <input type="text" name="slug" class="form-control slug-input" id="post-slug value="{{$post->slug}}>
        </div>
    <div class="form-group">
        <label for="post-title">Write Document</label>
        <textarea name="description" class="form-control" id="post-description">{{$post->description}}</textarea>
    </div>
    <div class="form-group">
        <label for="post-title">Kategori</label>
        <input type="text" name="kategori" class="form-control" id="post-kategori" value="{{$post->Kategori}}">
    </div>
    <div class="form-group">
        <input type="checkbox" name="status" class="form-control" id="post-status" {{ $post->status == 'publish' ? 'checked': ''}}> Publish?
    </div>
    <button type="submit" class="btn btn-success">Save</button>
   
  </form>
</div>
</div>
  @endsection
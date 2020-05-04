@extends('layouts.app')

@section('title', 'MID TEST PRATIKUM')

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
<form method="POST" action="{{route('post.store')}}">
    @csrf
    <div class="form-group">
        <label for="post-title">Nama</label>
        <input type="text" name="title" class="form-control title-input" id="post-title">
    </div>
    <div class="form-group">
            <label for="post-slug">Slug</label>
            <input type="text" name="slug" class="form-control slug-input" id="post-slug">
        </div>
    <div class="form-group">
        <label for="post-title">Write Document</label>
        <textarea name="description" class="form-control" id="post-description"> </textarea>
    </div>
    
    <div class="form-group">
        <label for="post-title">Kategori</label>
        <input type="text" name="kategori" class="form-control" id="post-kategori">
    </div>
    <div class="form-group">
        <input type="checkbox" name="status" class="form-control" id="post-status"> Publish?
     </div>
    <button type="submit" class="btn btn-success">Save</button>
   
  </form>
</div>
</div>
  @endsection
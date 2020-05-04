@extends('layouts.app')

@section('title','MID TEST PRATIKUM')

@section('sidebar')
  
@section('content')
<a href="{{ route('post.create')}}" class="btn btn-success">New Post</a>
@if($message = Session::has('success'))
  <div class="alert alert-success">
      {{ Session::get('success') }}
  </div>
@endif
@if(count($posts) > 0)
<table class="table table-striped mt-5">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Post Title</th>
      <th scope="col">Write Description</th>
      <th scope="col">Kategori</th>
      <th scope="col">Status</th>
      <th scope="col">Slug</th>
      <th scope="col">Tanggal Dibuat</th>
      <th scope="col">Terakhir Diubah</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  @php 
    $no = 1;
  @endphp
  @foreach($posts as $post)
    <tr>
      <th scope="row">{{ $no }}</th>
      <td>{{ $post->title }}</td>
      <td>{{ $post->description }}</td>
      <td>{{ $post->Kategori }}</td>
      <td>{{ $post->status}}</td>
      <td>{{ $post->slug}}</td>
      <td>{{ date('d M Y H:i:s', strtotime($post->created_at)) }}</td>
      <td>{{ $post->updated_at }}</td>
      
    <td class="table-buttons">
        <div class="btn-group">
            <a href="{{ route('post.show',$post->id)}}" class="btn btn-success mr-2">
                <i class="fa fa-eye"></i>
            </a>
            <a href="{{ route('post.edit',$post->id)}}" class="btn btn-primary mr-2">
                <i class="fa fa-pencil" ></i>
            </a>
            <form method="POST" action="{{ route('post.destroy',$post->slug)}}">
              @csrf
              @method('DELETE')
                 <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                 </button>
            </form>
        </div>
      </td>
    </tr>
    @php 
      $no++;
    @endphp
    @endforeach
  </tbody>
</table>
  @else
  <div class="d-flex mt-5">
    tidak ada postingan, silahkan buat terlebih dahulu.
  </div>
@endif
@endsection
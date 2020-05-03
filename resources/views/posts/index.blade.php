@extends('layouts.app')

@section('title','MID TEST PRATIKUM')

@section('sidebar')
  
@section('content')
<a href="{{ route('post.create')}}" class="btn btn-success">New Post</a>
<table class="table table-striped mt-5">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Post Title</th>
            <th scope="col">Write Description</th>
            <th scope="col">Tanggal Dibuat</th>
            <th scope="col">Terakhir Diubah</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
          <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>
            <td>{{ date('d M Y H:i:s', strtotime($post->created_at)) }}</td>
            <td>{{ $post->updated_at }}</td>
            
          <td class="table-buttons d-flex">
                <a href="{{ route('post.show',$post->id)}}" class="btn btn-success mr-2">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route('post.edit',$post->id)}}" class="btn btn-primary mr-2">
                    <i class="fa fa-pencil" ></i>
                </a>
                <form method="POST" action="{{ route('post.destroy',$post->id)}}">
                  @csrf
                  @method('DELETE')
                     <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                     </button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection
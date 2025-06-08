@extends('layouts.app')
@section('subtitle', $title)
@section('content_body')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">{{ $title }}</h3>
                        <div class="float-right">
                            <a href="{{ route('posts.publish', ['post' => $post->id]) }}"
                                class="btn btn-success {{ $post->published ? 'disabled' : '' }}">Publish</a>
                            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('posts.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h1>Judul : {{ $post->title }}</h1>
                    <h5 class="text-teal mb-3">Kategori : {{ $post->category->category }}</h5>
                    <img src="{{ asset('storage/public/berita') }}/{{ $post->image }}" alt="Post view" width="600"
                        height="400" class="img-fluid img-thumbnail"><br />
                    <div class="mt-4">
                        {!! $post->body !!}
                    </div>
                </div>
            </div>

            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

@endsection

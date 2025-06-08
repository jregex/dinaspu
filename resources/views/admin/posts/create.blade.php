@extends('layouts.app')
@section('subtitle', $title)
@section('plugins.Select2', true)
@section('content_body')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    @if (session()->get('errors'))
                        <x-adminlte-alert title="error!" theme="danger" dismissable>
                            @foreach ($errors->all() as $item)
                                {{ $item }}<br>
                            @endforeach
                        </x-adminlte-alert>
                    @endif
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <x-adminlte-select2 name="category_id">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->category }}</option>
                                    @endforeach
                                </x-adminlte-select2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                {{-- Penulis field --}}
                                <div class="input-group mb-3">
                                    <input type="text" name="penulis"
                                        class="form-control @error('penulis') is-invalid @enderror"
                                        placeholder="Input penulis">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('penulis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        {{-- Judul field --}}
                        <div class="input-group mb-3">
                            <input type="text" id="title" name="title"
                                class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                                placeholder="Input judul" autofocus>

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-newspaper"></span>
                                </div>
                            </div>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="body">body</label>
                            {{-- @trix(\App\Post::class, 'body') --}}
                            {{-- {!! app('laravel-trix')->make($post, 'body') !!} --}}
                            <textarea name="editor" id="editor" rows="15" cols="5"></textarea>
                        </div>

                        <div class="form-group">
                            <img id="previewImg" width="250" height="250" class="img-fluid img-thumbnail mb-5"
                                alt="">
                            <div class="custom-file mb-2">
                                <input type="file" class="form-control @error('profile') is-invalid @enderror"
                                    id="profile" name="profile" lang="en">
                                @error('profile')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label class="custom-file-label" for="profile">Select Image</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('users.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

@endsection

@section('css')
    <style>
        .ck-editor__editable_inline {
            min-height: 20em;
            overflow-y: hidden;
        }
    </style>
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.min.js') }}"></script>
    <script src="{{ asset('vendor/custom/custom-post.js') }}"></script>
    <script src="{{ asset('vendor/custom/custom-upload.js') }}"></script>
@endsection

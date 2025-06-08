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
                    <form action="{{ route('galleries.store') }}" method="post" enctype="multipart/form-data"
                        id="image-upload" class="dropzone">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <x-adminlte-select2 name="gallery_categories_id">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->category }}</option>
                                    @endforeach
                                </x-adminlte-select2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                {{-- Title field --}}
                                <div class="input-group mb-3">
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" placeholder="Input title">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <style>
        .dz-preview .dz-image img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
        }
    </style>
@stop

@section('js')
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <script src="{{ asset('vendor/custom/custom-upload.js') }}"></script>
@endsection

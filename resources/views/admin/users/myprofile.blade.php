@extends('layouts.app')
@section('subtitle', $title)
@section('content_body')
    @php
        $nama = auth()->user()->nama;
        $email = auth()->user()->email;
        $image = auth()->user()->image;
    @endphp
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <x-adminlte-profile-widget name="{{ $nama }}" desc="{{ $role }}" theme="dark" class="elevation-0"
                img="{{ asset('storage/public/profile/') }}/{{ $image }}" footer-class="bg-gradient-white">
                <x-adminlte-profile-col-item class="text-dark" icon="fas fa-envelope fa-lg" title="{{ $email }}"
                    size=12 />
            </x-adminlte-profile-widget>
            <a href="{{ route('changepassword') }}" class="btn btn-primary">Ganti password</a>
            <button class="btn btn-info" id="btnEdit">Edit profile</button>
        </div>
        <div class="col-md-8 col-sm-12">

            <div class="card elevation-0">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    @if (session()->get('errors'))
                        <x-adminlte-alert title="error!" icon="" theme="danger" dismissable>
                            @foreach ($errors->all() as $item)
                                {{ $item }}<br>
                            @endforeach
                        </x-adminlte-alert>
                    @endif
                    <form action="{{ route('myprofile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Name field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                value="{{ $nama }}" placeholder="{{ __('adminlte::adminlte.full_name') }}"
                                autofocus disabled>

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>

                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Email field --}}
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ $email }}" placeholder="{{ __('adminlte::adminlte.email') }}" disabled>

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <img id="previewImg" src="{{ asset('storage/public/profile') }}/{{ $image }}"
                                width="300" height="300" class="img-thumbnail mb-5" alt="">
                            <div class="custom-file mb-2">
                                <input type="file" class="form-control @error('profile') is-invalid @enderror"
                                    id="profile" name="profile" lang="en" value="{{ $image }}" disabled>
                                @error('profile')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label class="custom-file-label" for="profile">Select Profile</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success d-none" id="btnUpdate">Update</button>
                            <button type="button" class="btn btn-danger d-none" id="btnBatal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendor/adminlte/custom/custom-script.js') }}"></script>
    <script>
        $('#btnEdit').click(() => {
            $('input[name="nama"]').removeAttr("disabled");
            $('input[name="email"]').removeAttr("disabled");
            $('input[name="profile"]').removeAttr("disabled");
            $('#btnUpdate').removeClass("d-none");
            $('#btnBatal').removeClass("d-none");
            $('#btnEdit').addClass("d-none");
        });
        $('#btnBatal').click(() => {
            $('input[name="nama"]').attr("disabled", true);
            $('input[name="email"]').attr("disabled", true);
            $('input[name="profile"]').attr("disabled", true);
            $('#btnUpdate').addClass("d-none");
            $('#btnBatal').addClass("d-none");
            $('#btnEdit').removeClass("d-none");
        });
        let profile = document.querySelector('#profile');
        profile.onchange = function() {
            getURL(this);
        };

        function getURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                let filename = profile.value;
                filename = filename.substring(filename.lastIndexOf('\\') + 1);
                reader.onload = function(e) {
                    // debugger;
                    let previewImg = document.querySelector('#previewImg');
                    // $('#previewImg').attr('src', e.target.result);
                    previewImg.src = e.target.result;
                    hide(previewImg);
                    // $('#previewImg').fadeIn(500);
                    // $('.custom-file-label').text(filename);
                    fadeIn2(previewImg, 500);
                    let label = document.querySelector('.custom-file-label').innerText = filename;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop

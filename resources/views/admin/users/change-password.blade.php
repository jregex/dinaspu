@extends('layouts.app')
@section('subtitle', $title)
@section('content_body')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <x-adminlte-alert title="berhasil!" theme="success" dismissable>
                            <span class="text-white">{{ session()->get('success') }}</span>
                        </x-adminlte-alert>
                    @elseif(session()->has('failed'))
                        <x-adminlte-alert title="gagal!" theme="danger" dismissable>
                            <span class="text-white">{{ session()->get('failed') }}</span>
                        </x-adminlte-alert>
                    @endif
                    <form action="{{ route('changepassword') }}" method="post">
                        @csrf

                        {{-- current Password field --}}
                        <div class="input-group mb-3">
                            <input type="password" name="current_password"
                                class="form-control @error('current_password') is-invalid @enderror"
                                placeholder="Current Password">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>

                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Password field --}}
                        <div class="input-group mb-3">
                            <input type="password" name="new_password"
                                class="form-control @error('new_password') is-invalid @enderror" placeholder="New Password">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>

                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Confirm password field --}}
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                placeholder="{{ __('adminlte::adminlte.retype_password') }}">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>

                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('myprofile') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

@endsection

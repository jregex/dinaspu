@extends('adminlte::page')
@include('sweetalert2::index')

{{-- Extend and customize the browser title --}}

@section('title')
    @hasSection('subtitle')
        @yield('subtitle') |
    @endif
    {{ config('adminlte.title') }}
@stop

{{-- Extend and customize the page content header --}}
{{--
@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')

            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop --}}

{{-- Rename section content to content_body --}}

@section('content')
    <div class="container-fluid py-4">
        @yield('content_body')
    </div>
@stop

{{-- Create a common footer --}}

@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div>

    <strong>
        <a href="{{ route('dashboard') }}">
            {{ config('app.company_name', 'Dinas PU Bantaeng') }}
        </a>
    </strong>
@stop

{{-- Add common Javascript/Jquery code --}}

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.16.1/sweetalert2.min.js"></script>
    <script src="{{ asset('vendor/custom/custom-toast.js') }}"></script>
    {{-- <script src="{{ asset('vendor/custom/sweet-confirm.js') }}"></script> --}}
@endpush

{{-- Add common CSS customizations --}}
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.16.1/sweetalert2.min.css"
        integrity="sha512-WnmDqbbAeHb7Put2nIAp7KNlnMup0FXVviOctducz1omuXB/hHK3s2vd3QLffK/CvvFUKrpioxdo+/Jo3k/xIw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@extends('layouts.app')
@section('subtitle', $title)
@section('plugins.Select2', true)
@section('plugins.DateRangePicker', true)
@section('content_body')
    @php
        $config = [
            'singleDatePicker' => true,
            'showDropdowns' => true,
            'startDate' => "js:moment('1897-12-30','YYYY-MM-DD')",
            'minYear' => 1898,
            'maxYear' => "js:parseInt(moment().format('YYYY'),10)",
            'cancelButtonClasses' => 'btn-info',
            'locale' => ['format' => 'YYYY-MM-DD'],
        ];
    @endphp

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
                    <form action="{{ route('pegawai.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- NIP field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror"
                                value="{{ old('nip') }}" placeholder="Input nip" autofocus>

                            <div class="input-group-append">
                                <div class="input-group-text bg-dark">
                                    <span class="fas fa-id-card-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>

                            @error('nip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <x-adminlte-select2 name="jabatan_id">
                            @foreach ($jabatans as $item)
                                <option value="{{ $item->id }}">{{ $item->jabatan }}</option>
                            @endforeach
                        </x-adminlte-select2>
                        {{-- Name field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama') }}" placeholder="Input nama" autofocus>

                            <div class="input-group-append">
                                <div class="input-group-text bg-dark">
                                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>

                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Golongan field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="golongan"
                                class="form-control @error('golongan') is-invalid @enderror" value="{{ old('golongan') }}"
                                placeholder="Input golongan" autofocus>

                            <div class="input-group-append">
                                <div class="input-group-text bg-dark">
                                    <span class="fas fa-users {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>

                            @error('golongan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <x-adminlte-date-range name="tmt1" igroup-size="md" :config="$config"
                            placeholder="Input tamatan 1">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-calendar-day"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-date-range>
                        <x-adminlte-date-range name="tmt2" igroup-size="md" :config="$config"
                            placeholder="Input tamatan 2">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-calendar-day"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-date-range>
                        <x-adminlte-date-range name="masa_kerja" igroup-size="md" :config="$config"
                            placeholder="Input masa kerja">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-calendar-day"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-date-range>

                        {{-- Pelatihan field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="nama_pelatihan"
                                class="form-control @error('nama_pelatihan') is-invalid @enderror"
                                value="{{ old('nama_pelatihan') }}" placeholder="Input pelatihan" autofocus>

                            <div class="input-group-append">
                                <div class="input-group-text bg-dark">
                                    <span
                                        class="fas fa-chalkboard-teacher {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>

                            @error('nama_pelatihan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- Lulus pelatihan field --}}
                        <div class="input-group mb-3">
                            <input type="number" name="lulus_pelatihan"
                                class="form-control @error('lulus_pelatihan') is-invalid @enderror" min="1899"
                                max="2025" step="1" placeholder="Input tahun lulus pelatihan" />

                            <div class="input-group-append">
                                <div class="input-group-text bg-dark">
                                    <span class="fas fa-calendar {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>

                            @error('lulus_pelatihan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number" name="lama_kerja"
                                class="form-control @error('lama_kerja') is-invalid @enderror" min="0" max="400"
                                step="1" placeholder="Input lama kerja" />
                            <span class="text-muted font-italic ml-1 text-sm">*Notes : Berapa jam</span>

                            @error('lama_kerja')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- Pelatihan field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="pendidikan"
                                class="form-control @error('pendidikan') is-invalid @enderror"
                                value="{{ old('pendidikan') }}" placeholder="Input pendidikan" autofocus>

                            <div class="input-group-append">
                                <div class="input-group-text bg-dark">
                                    <span
                                        class="fas fa-user-graduate {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>

                            @error('pendidikan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- Lulus pelatihan field --}}
                        <div class="input-group mb-3">
                            <input type="number" name="thn_lulus"
                                class="form-control @error('thn_lulus') is-invalid @enderror" min="1899"
                                max="2025" step="1" placeholder="Input tahun lulus pendidikan" />

                            <div class="input-group-append">
                                <div class="input-group-text bg-dark">
                                    <span class="fas fa-calendar {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>

                            @error('thn_lulus')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <x-adminlte-date-range name="tgl_lahir" igroup-size="md" :config="$config"
                            placeholder="Input tanggal lahir">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-calendar-day"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-date-range>
                        {{-- <x-adminlte-date-range name="lulus_pelatihan" igroup-size="md" class="tahun" :config="$configyear"
                            placeholder="Input lulus pelatihan">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-calendar-day"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-date-range> --}}

                        <div class="form-group">
                            <img id="previewImg" width="300" height="300" class="img-thumbnail mb-5"
                                alt="">
                            <div class="custom-file mb-2">
                                <input type="file" class="form-control @error('profile') is-invalid @enderror"
                                    id="profile" name="profile" lang="en">
                                @error('profile')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label class="custom-file-label" for="profile">Select Profile</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('pegawai.index') }}" class="btn btn-danger">Batal</a>
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
    <script src="{{ asset('vendor/custom/custom-upload.js') }}"></script>
@stop

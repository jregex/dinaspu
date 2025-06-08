@extends('layouts.app')
@section('plugins.Datatables', true)
@section('subtitle', $title)
@php
    $heads = [
        ['label' => 'No', 'width' => 3],
        'Nama',
        'Email',
        ['label' => 'Role', 'width' => 10],
        ['label' => '#', 'no-export' => true, 'width' => 10],
    ];

    $config = [
        'ordering' => false,
        'paging' => false,
        'lengthMenu' => [5, 10, 20, 50],
    ];
@endphp
@section('content_body')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('users.create') }}" class="btn btn-default bg-teal">Tambah</a>
                    {{-- <x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#modalCustom" class="bg-teal" /> --}}
                    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped
                        hoverable>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role->role }}</td>
                                <td>
                                    <nobr>
                                        <a href="{{ route('users.edit', ['user' => $item->id]) }}"
                                            class="btn btn-xs btn-default text-primary mx-1" title="Edit">
                                            <i class="fa fa-lg fa-fw fa-pen"></i>
                                        </a>
                                        <form action="{{ route('users.delete', ['user' => $item->id]) }}" class="d-inline"
                                            id="myform" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="button"
                                                class="btn btn-default btn-xs text-danger konfirmasi mx-1"
                                                data-toggle="tooltip" title='Delete'><i
                                                    class="fa fa-lg fa-fw fa-trash"></i></button>
                                        </form>
                                    </nobr>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

@endsection

@section('js')
    <script src="{{ asset('vendor/custom/sweet-confirm.js') }}"></script>
@endsection

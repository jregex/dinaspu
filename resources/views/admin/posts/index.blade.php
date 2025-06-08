@extends('layouts.app')
@section('plugins.Datatables', true)
@section('subtitle', $title)
@php
    $heads = [
        ['label' => 'No', 'width' => 3],
        'Title',
        'Kategori',
        ['label' => '#', 'no-export' => true, 'width' => 10],
    ];
    $btnDetails = '<a class="btn btn-xs btn-default text-teal mx-1" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </a>';

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
                    <a href="{{ route('posts.create') }}" class="btn btn-default bg-teal">Tambah</a>
                    <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config" striped
                        hoverable>
                        @forelse ($posts as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('posts.show', ['post' => $item->id]) }}"
                                        class="text-primary">{{ ucwords($item->title) }}</a></td>
                                <td>{{ $item->category->category }}</td>
                                <td>
                                    <nobr>
                                        <a href="{{ route('posts.edit', ['post' => $item->id]) }}"
                                            class="btn btn-xs btn-default text-primary mx-1" title="Edit">
                                            <i class="fa fa-lg fa-fw fa-pen"></i>
                                        </a>
                                        <form action="{{ route('posts.destroy', ['post' => $item->id]) }}" class="d-inline"
                                            method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-default btn-xs text-danger mx-1" type="submit"
                                                data-toggle="tooltip" title='Delete'><i
                                                    class="fa fa-lg fa-fw fa-trash"></i></button>
                                        </form>

                                    </nobr>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" align="center">Data tidak ada</td>
                            </tr>
                        @endforelse
                    </x-adminlte-datatable>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

@endsection

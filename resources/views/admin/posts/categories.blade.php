@extends('layouts.app')
@section('plugins.Datatables', true)
@section('subtitle', $title)
@php
    $heads = [['label' => 'No', 'width' => 3], 'Kategori', ['label' => '#', 'no-export' => true, 'width' => 10]];
    // $btnDetails = '<a class="btn btn-xs btn-default text-teal mx-1" title="Details">
//                <i class="fa fa-lg fa-fw fa-eye"></i>
//            </a>';

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
                    @if (session()->get('errors'))
                        <x-adminlte-alert title="error!" icon="" theme="danger" dismissable>
                            @foreach ($errors->all() as $item)
                                {{ $item }}<br>
                            @endforeach
                        </x-adminlte-alert>
                    @endif
                    <!-- Button trigger modal -->
                    <button type="button" class="btn bg-teal" id="btnTambah">
                        Tambah
                    </button>
                    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped
                        hoverable>
                        @forelse ($categories as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->category }}</td>
                                <td>
                                    <nobr>
                                        <button type="button" data-id="{{ $item->id }}"
                                            class="btn btn-xs btn-default text-primary btnEdit mx-1" title="Edit">
                                            <i class="fa fa-lg fa-fw fa-pen"></i>
                                        </button>
                                        <form action="{{ route('categories.destroy', ['category' => $item->id]) }}"
                                            class="d-inline" method="POST">
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
                        @empty
                            <tr>
                                <td colspan="3" align="center">Data Tidak ada</td>
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
    <!-- Modal -->
    {{-- <div class="modal fade" id="modalTambah" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="modalTambahCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahTitle">{{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <input type="text" name="category" id="category" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    <!-- Modal -->
    <div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="modalEditCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditTitle">{{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="formEdit">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <input type="text" name="category" id="categoryEdit" class="form-control" autofocus>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info" id="btnAction">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('vendor/custom/sweet-confirm.js') }}"></script>
    <script src="{{ asset('vendor/custom/custom-category.js') }}"></script>
@stop

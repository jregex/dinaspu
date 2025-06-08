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
                    <form action="{{ route('export.pegawai') }}" method="post" id="formExport" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input name="pegawai" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                    role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 0%"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Upload</button>
                            <a href="{{ route('pegawai.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

@endsection

@push('js')
    <script>
        $(function() {
            $(document).ready(function() {
                $('#formExport').ajaxForm({
                    beforeSend: function() {
                        var percentage = '0';
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        $('.progress .progress-bar').css("width", percentage + '%', function() {
                            return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                    },
                    complete: function(xhr) {
                        if (xhr.status == 200) {
                            Swal.fire({
                                icon: "success",
                                title: "berhasil diupload"
                            })
                        } else {
                            console.log(xhr.responseJSON.message);
                        }
                    }
                });
            });
        });
    </script>
@endpush

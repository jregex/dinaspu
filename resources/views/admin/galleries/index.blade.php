@extends('layouts.app')
@section('subtitle', $title)
@section('plugins.ekkoLightbox', true)
@section('plugins.Sweetalert2', true)
@section('content_body')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <a href="{{ route('gallery-categories.index') }}" class="btn btn-danger float-right">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($images as $item)
                            <div class="div col-md-2 col-sm-6 bungkus">
                                <a href="{{ $item->location }}" data-toggle="lightbox" data-title="{{ $item->name }}"
                                    data-max-width="1000" data-gallery="{{ $category_name }}" class="tombol-light"
                                    data-type="image">
                                    <img src="{{ $item->location }}" class="img-fluid" alt="{{ $item->name }}">
                                </a>
                                <form action="{{ route('galleries.destroy', ['gallery' => $item->id]) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete"><i
                                            class="fa fa-lg fa-fw fa-trash"></i></button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <form action="{{ route('galleries.delete', ['category' => $category]) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus Semua</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Upload Image</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('galleries.store') }}" method="post" enctype="multipart/form-data"
                        id="image-upload" class="dropzone p-3">

                        <input type="hidden" name="category_id" value="{{ $category }}" id="category_id">
                        @csrf
                        <div class="form-group d-flex justify-content-center">
                            <button type="button" id="uploadFile" class="btn btn-success">Upload</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
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

        .bungkus {
            position: relative;
        }

        .ekko-lightbox .modal-content {
            box-shadow: none;
        }

        .bungkus .tombol-light:hover {
            -webkit-filter: brightness(50%);
            -webkit-transition: all 500ms ease;
            -moz-transition: all 500ms ease;
            -o-transition: all 500ms ease;
            -ms-transition: all 500ms ease;
            transition: all 500ms ease;
        }

        .bungkus form {
            position: absolute;
            top: 10%;
            left: 10%;
            border: none;
            cursor: pointer;
        }

        .dropzone {
            border: 1px dashed silver;
        }

        .dz-default {
            padding: 4rem;
            border: 1px dashed silver;
        }

        .dz-default:hover {
            background-color: rgba(0, 0, 0, 0.3);
            color: #fff;
            -webkit-filter: brightness(50%);
            -webkit-transition: all 500ms ease;
            -moz-transition: all 500ms ease;
            -o-transition: all 500ms ease;
            -ms-transition: all 500ms ease;
            transition: all 500ms ease;
        }

        .dz-max-files-reached {
            background-color: red
        }

        ;

        .dz-progress .dz-upload {
            background-color: teal;
            color: teal;
        }
    </style>
@stop

@section('js')
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <script type="text/javascript">
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
        Dropzone.autoDiscover = false;

        let images = {{ Js::from($images) }};
        const category_id = document.querySelector('#category_id').value;
        let myDropzone = new Dropzone(".dropzone", {
            parallelUploads: 10,
            init: function() {
                let myDropzone = this;
                this.element.querySelector('#uploadFile').addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.options.autoProcessQueue = true;
                    myDropzone.processQueue();
                });
                this.on("maxfilesexceeded", function(file) {
                    alert("No more files please!");
                });

                // $.each(images, function(key, value) {
                //     let mockFile = {
                //         name: value.name,
                //         size: value.filesize
                //     };

                //     myDropzone.emit("addedfile", mockFile);
                //     myDropzone.emit("thumbnail", mockFile, value.path);
                //     myDropzone.emit("complete", mockFile);

                // });
                this.on("successmultiple", function(files, response) {

                    Swal.fire({
                        title: "gambar berhasil diupload",
                        icon: "success",
                    });
                    myDropzone.options.autoProcessQueue = false;
                    location.reload();
                    // console.log(response);
                });
                this.on("addedfile", function(file) {
                    file.previewElement.addEventListener("click", function() {
                        myDropzone.removeFile(file);
                    });
                });
                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                });
                this.on("errormultiple", function(files, response) {
                    console.log(response);
                });
            },
            autoProcessQueue: false,
            params: {
                'category_id': category_id
            },
            paramName: 'files',
            dictDefaultMessage: 'Upload gambar di sini.',
            uploadMultiple: true,
            maxFiles: 10,
            maxFilesize: 10,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.webp"
        });
        // $('#uploadFile').click(function() {
        //     myDropzone.processQueue();
        // });
    </script>
@endsection

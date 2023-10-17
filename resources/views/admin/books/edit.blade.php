@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-dark mb-4">Update the <n class="font-monospace text-info">{{ $book->title }}</n> book</h2>
                        <div class="card-body table-responsive p-0">
                            <form action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Title</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" name='title' class="form-control form-control-lg"
                                                   value="{{ old('title') ?  old('title') : $book->title }}"/>
                                            @error('title')
                                            <div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <hr class="mx-n3">

                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Description</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                        <textarea class="form-control" name='description'
                                                  placeholder="Description of your books" style="max-height: 150px">
                                            {{ old('description') ? old('description') : $book->description }}
                                        </textarea>
                                            @error('description')
                                            <div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <hr class="mx-n3">

                                    <div class="row align-items-center py-3">
                                        <div class="text-center my-2">
                                            <img class="card-img-top w-50" style="height: 300px"
                                                 src="{{asset($book->main_image ? 'storage/'. $book->main_image : 'storage/doesnotexist.jpg')}}"
                                                 alt="main_image">
                                        </div>
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Upload new image</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="file" name='main_image' class="form-control form-control-lg"
                                                   id="formFileLg"/>
                                            <div class="small text-muted mt-2">Upload your image or any other relevant file.
                                                Max file
                                                size 5 MB
                                            </div>
                                            @error('main_image')
                                            <div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <hr class="mx-n3">

                                    <div class="px-5 py-4">
                                        <button type="submit" class="btn btn-success btn-lg">Update</button>

                                        <a class="btn btn-info btn-lg mx-4" href="{{ URL::previous()}}"
                                           role="button">
                                            Cancel
                                        </a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

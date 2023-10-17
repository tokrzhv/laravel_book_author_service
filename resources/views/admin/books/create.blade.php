@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create new book</h3>
                        <div class="card-body table-responsive p-0">
                            <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-6">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                           value="{{ old('title') }}" placeholder="name">
                                    @error('title')<small id="emailHelp" class="form-text text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="form-group col-6">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" name="description" id="description"
                                           value="{{ old('description') }}" aria-describedby="emailHelp"
                                           placeholder="Enter description">
                                    @error('description')<small id="emailHelp" class="form-text text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="author">Author select</label>
                                    <select class="form-control" name="author_id" id="author">
                                        <option selected disabled></option>
                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}" {{ $author->id == old('author_id') ? ' selected' : '' }}>
                                                {{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('author_id')<small id="emailHelp" class="form-text text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="form-group mt-3">
                                    <input type="file" class="form-control-file" name="main_image" id="main_image"
                                           aria-describedby="emailHelp"><br>
                                    @error('main_image')<small id="emailHelp" class="form-text text-danger">{{ $message }}</small>@enderror
                                </div>

                                <button type="submit" class="btn btn-success px-5 mt-3">Send</button>

                                <a href="{{ route('books.index') }}" class="btn btn-info px-5 mt-3">Back</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

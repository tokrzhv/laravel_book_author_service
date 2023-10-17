@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create new Author</h3>
                        <div class="card-body table-responsive p-0">
                            <form action="{{ route('author.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="{{ old('name') }}" placeholder="name">
                                    @error('name')<small id="emailHelp" class="form-text text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="form-group col-6">
                                    <label for="age">Age</label>
                                    <input type="text" class="form-control" name="age" id="age"
                                           value="{{ old('age') }}" aria-describedby="emailHelp"
                                           placeholder="Enter age">
                                    @error('age')<small id="emailHelp" class="form-text text-danger">{{ $message }}</small>@enderror
                                </div>

                                <button type="submit" class="btn btn-success px-5 mt-3">Send</button>

                                <a href="{{ route('authors.index') }}" class="btn btn-info px-5 mt-3">Back</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

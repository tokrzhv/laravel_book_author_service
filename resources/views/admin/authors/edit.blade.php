@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-dark mb-4">Update the <n class="font-monospace text-info">{{ $author->name }}</n> author</h2>
                        <div class="card-body table-responsive p-0">
                            <form action="{{ route('author.update', $author->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Title</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" name='name' class="form-control form-control-lg"
                                                   value="{{ old('name') ?  old('name') : $author->name }}"/>
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <hr class="mx-n3">

                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Age</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                        <textarea class="form-control" name='age'
                                                  placeholder="Age of your authors" style="max-height: 150px">
                                            {{ old('age') ? old('age') : $author->age }}
                                        </textarea>
                                            @error('age')
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

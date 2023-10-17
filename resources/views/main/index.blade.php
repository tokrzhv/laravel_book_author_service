@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            @if(isset($books))
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Books list</h3>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Published</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($books as $book)
                                        <tr>
                                            <td>{{ $book->id }}</td>
                                            <td><img class="card-img-top " style="height: 50px"
                                                     src="{{url($book->main_image ? 'storage/'. $book->main_image : 'storage/doesnotexist.jpg')}}"
                                                     alt="blog book"></td>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->author->name}}</td>
                                            <td>{{ $book->formattedCreatedAt() }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
            @if(isset($authors))
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Authors list</h3>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Total books</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($authors as $author)
                                            <tr>
                                                <td>{{ $author->id }}</td>
                                                <td>{{ $author->name }}</td>
                                                <td>{{ $author->age }}</td>
                                                <td>{{ $author->books_count }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
        </div>
    </div>
@endsection

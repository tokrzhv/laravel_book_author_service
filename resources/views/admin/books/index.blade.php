@extends('layouts.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Books list</h3>
                        <div class="card-body table-responsive p-0">
                            <div class="d-flex flex-column align-items-end">
                                <h4 class="btn btn-info"><a href="{{ route('book.create') }}" class="text-decoration-none">Add new entity</a></h4>
                            </div>
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
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
                                        <td>{{ $book->description }}</td>
                                        <td>{{ $book->author->name}}</td>
                                        <td>{{ $book->formattedCreatedAt() }}</td>
                                        <td>
                                            <a href="{{ route('book.edit', $book->id) }}" style="text-decoration: none">
                                                <i class="fas fa-pencil-alt fa-2x text-info"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-transparent"
                                                    onclick="deleteBook({{ $book }})">
                                                <i class="fas fa-trash-alt fa-2x text-danger"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @push('other-scripts')
                                        <script>
                                            function deleteBook(book) {
                                                Swal.fire({
                                                    title: 'Are you sure?',
                                                    text: "You won't be able to revert this!",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Yes, delete it!'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {

                                                        let url = '{{ route("book.destroy", ":id") }}'
                                                        url = url.replace(":id", book.id)

                                                        $.ajax({
                                                            type: 'POST',
                                                            url: url,
                                                            data: {
                                                                '_method': 'DELETE',
                                                                '_token': '{{ csrf_token()}}'
                                                            },
                                                            success: function () {
                                                                Swal.fire(
                                                                    'Deleted!',
                                                                    'Post has been deleted.',
                                                                    'success'
                                                                )
                                                                setTimeout(function () {
                                                                    window.location.reload();
                                                                }, 2000);
                                                            }
                                                        })
                                                    }
                                                })
                                            }
                                        </script>
                                    @endpush
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

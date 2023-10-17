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
                        <h3 class="card-title">Authors list</h3>
                        <div class="card-body table-responsive p-0">
                            <div class="d-flex flex-column align-items-end">
                                <h4 class="btn btn-info"><a href="{{ route('author.create') }}" class="text-decoration-none">Add new entity</a></h4>
                            </div>
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Books</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($authors as $author)
                                    <tr>
                                        <td>{{ $author->id }}</td>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ $author->age }}</td>
                                        <td>{{ $author->books_count}}</td>
                                        <td>
                                            <a href="{{ route('author.edit', $author->id) }}" style="text-decoration: none">
                                                <i class="fas fa-pencil-alt fa-2x text-info"></i>
                                            </a>
                                        </td>
                                        <td>
                                            @if($author->books_count == 0)
                                                <button class="btn btn-transparent"
                                                        onclick="deleteAuthor({{ $author }})">
                                                    <i class="fas fa-trash-alt fa-2x text-danger"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @push('other-scripts')
                                        <script>
                                            function deleteAuthor(author) {
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

                                                        let url = '{{ route("author.destroy", ":id") }}'
                                                        url = url.replace(":id", author.id)

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

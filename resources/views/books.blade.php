@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1>Danh Sách</h1>
        <a href="{{ route('book.create') }}" class="btn btn-success">Add</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Thumbnail</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Price</th>
                    <th>Publication Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td><img src="{{ $book->thumbnail }}" alt="{{ $book->title }}" style="width: 100px;"></td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td>${{ $book->price }}</td>
                        <td>{{ $book->publication }}</td>
                        <td class="">
                            <div class="d-flex">
                                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('book.delete', $book->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ms-3"
                                        onclick="return confirm('Are you sure you want to delete this book?');">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Không có sách nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $books->links() }}
    </div>
@endsection

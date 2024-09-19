@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sách theo danh mục: {{ $category->name }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Thumbnail</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Price</th>
                    <th>Publication Date</th>
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Không có sách nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

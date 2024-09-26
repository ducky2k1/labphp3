@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ isset($book) ? 'Edit' : 'Create' }}</h1>
        <form action="{{ isset($book) ? route('book.update', $book->id) : route('book.store') }}" method="POST">
            @csrf
            @if (isset($book))
                @method('PUT')
            @endif

            {{-- Title input --}}
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="title">Title</label>
                <input type="text" id="title" name="title"
                    class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                    value="{{ old('title', $book->title ?? '') }}" />
                @if ($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>

            {{-- Thumbnail input --}}
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="thumbnail">Thumbnail</label>
                <input type="text" id="thumbnail" name="thumbnail"
                    class="form-control {{ $errors->has('thumbnail') ? 'is-invalid' : '' }}"
                    value="{{ old('thumbnail', $book->thumbnail ?? '') }}" />
                @if ($errors->has('thumbnail'))
                    <div class="invalid-feedback">
                        {{ $errors->first('thumbnail') }}
                    </div>
                @endif
            </div>

            {{-- Author input --}}
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="author">Author</label>
                <input type="text" id="author" name="author"
                    class="form-control {{ $errors->has('author') ? 'is-invalid' : '' }}"
                    value="{{ old('author', $book->author ?? '') }}" />
                @if ($errors->has('author'))
                    <div class="invalid-feedback">
                        {{ $errors->first('author') }}
                    </div>
                @endif
            </div>

            {{-- Publisher input --}}
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="publisher">Publisher</label>
                <input type="text" id="publisher" name="publisher"
                    class="form-control {{ $errors->has('publisher') ? 'is-invalid' : '' }}"
                    value="{{ old('publisher', $book->publisher ?? '') }}" />
                @if ($errors->has('publisher'))
                    <div class="invalid-feedback">
                        {{ $errors->first('publisher') }}
                    </div>
                @endif
            </div>

            {{-- Publication input --}}
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="publication">Publication</label>
                <input type="datetime-local" id="publication" name="publication"
                    class="form-control {{ $errors->has('publication') ? 'is-invalid' : '' }}"
                    value="{{ old('publication', $book->publication ?? '') }}" />
                @if ($errors->has('publication'))
                    <div class="invalid-feedback">
                        {{ $errors->first('publication') }}
                    </div>
                @endif
            </div>

            <div class="row mb-4">
                <div class="col">
                    {{-- Price input --}}
                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="price">Price</label>
                        <input type="number" id="price" name="price"
                            class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                            value="{{ old('price', $book->price ?? '') }}" />
                        @if ($errors->has('price'))
                            <div class="invalid-feedback">
                                {{ $errors->first('price') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col">
                    {{-- Quantity input --}}
                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="quantity"
                            class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}"
                            value="{{ old('quantity', $book->quantity ?? '') }}" />
                        @if ($errors->has('quantity'))
                            <div class="invalid-feedback">
                                {{ $errors->first('quantity') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Category input --}}
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="category_id">Category</label>
                <select name="category_id" id="category_id"
                    class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                    <option value=""></option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $book->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category_id') }}
                    </div>
                @endif
            </div>

            {{-- Submit button --}}
            <div class="d-flex justify-content-center">
                <button data-mdb-ripple-init type="submit"
                    class="btn btn-primary btn-block mb-4">{{ isset($book) ? 'Update' : 'Create' }}</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var inputs = document.querySelectorAll('.form-control');

            inputs.forEach(function(input) {
                input.addEventListener('input', function() {
                    if (this.classList.contains('is-invalid')) {
                        this.classList.remove('is-invalid');

                        var feedback = this.parentNode.querySelector('.invalid-feedback');
                        if (feedback) {
                            feedback.style.display = 'none';
                        }
                    }
                });
            });
        });
    </script>
@endsection

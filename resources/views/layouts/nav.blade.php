<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Book Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Loại Sách
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                        @foreach($categories as $category)
                            <li class="dropdown-submenu" data-category-id="{{ $category->id }}">
                                <a class="dropdown-item dropdown-toggle" href="#">{{ $category->name }}</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('category.books', ['id' => $category->id, 'sort' => 'high']) }}">Sản phẩm giá cao</a></li>
                                    <li><a class="dropdown-item" href="{{ route('category.books', ['id' => $category->id, 'sort' => 'low']) }}">Sản phẩm giá thấp</a></li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books') }}">Sách</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

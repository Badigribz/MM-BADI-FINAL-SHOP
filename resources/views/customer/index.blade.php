<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MiniShopLite - Products</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>

  <style>
    .prices2 { text-decoration: none; color: chartreuse; }
    .card img { object-fit: cover; }
  </style>
</head>
<body>
    <nav
    class="bg-white shadow-md fixed top-0 h-16 flex items-center justify-between px-6 z-10 transition-all duration-300"
    :class="open ? 'left-64 right-0' : 'left-20 right-0'">
    <div class="text-xl font-semibold">Admin Dashboard</div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">
            Logout
        </button>
    </form>
</nav>
  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg bg-body-tertiary p-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logo.png') }}" height="60" alt="Logo">
      </a>
        <form class="d-flex ms-auto" method="GET" action="{{ route('customer.index') }}">
            <input
                class="form-control me-2"
                type="search"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search Products">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      <i class="fas fa-shopping-cart ms-3"></i>
      <i class="fa fa-user ms-3"></i>
    </div>
  </nav>

  {{-- Category Filter --}}
  <div class="container my-4">
    <form method="GET" action="{{ route('customer.index') }}" class="d-flex justify-content-end">
      <select name="category" class="form-select w-auto me-2">
        <option value="">All Categories</option>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
      <button type="submit" class="btn btn-primary">Filter</button>
    </form>
  </div>

{{-- Products Grid --}}
<div class="album py-5 bg-body-tertiary">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      @foreach ($products as $product)
      <div class="col">
        <div class="card shadow-sm position-relative">

          @if ($product->stock > 0)
            {{-- Clickable tile when in stock --}}
            <a href="{{ route('customer.product.show', $product->id) }}" class="text-decoration-none text-dark">
              <img src="{{ asset('product/' . $product->product_img) }}" alt="{{ $product->name }}" height="200" width="100%">
              <div class="card-body">
                <p class="card-text fw-bold">{{ $product->name }}</p>
                <p class="text-muted">{{ $product->category->name ?? 'Uncategorized' }}</p>
                <p><span class="prices2">KES {{ number_format($product->price) }}</span></p>
              </div>
            </a>
            <a href="#" class="btn btn-success w-100">Add to Cart</a>
          @else
            {{-- Not clickable when out of stock --}}
            <img src="{{ asset('product/' . $product->product_img) }}" alt="{{ $product->name }}" height="200" width="100%" class="opacity-50">
            <div class="card-body">
              <p class="card-text fw-bold">{{ $product->name }}</p>
              <p class="text-muted">{{ $product->category->name ?? 'Uncategorized' }}</p>
              <p><span class="prices2">KES {{ number_format($product->price) }}</span></p>
              <span class="badge bg-danger">Out of Stock</span>
            </div>
            <a href="#" class="btn btn-secondary w-100 disabled">Add to Cart</a>
          @endif

        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

  {{-- Footer --}}
  <footer class="py-5 bg-dark text-light text-center">
    <p>&copy; {{ date('Y') }} MiniShopLite. All Rights Reserved.</p>
  </footer>
</body>
</html>


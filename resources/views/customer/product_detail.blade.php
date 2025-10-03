<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $product->name }} - MiniShopLite</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>

  <style>
    .prices2 { text-decoration: none; color: chartreuse; }
    .card img { object-fit: cover; }
  </style>
</head>
<body>
  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg bg-body-tertiary p-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('customer.index') }}">
        <img src="{{ asset('images/logo.png') }}" height="60" alt="Logo">
      </a>
      <form class="d-flex ms-auto" method="GET" action="{{ route('customer.index') }}">
          <input class="form-control me-2" type="search" name="search" placeholder="Search Products">
          <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <a href="{{ route('cart.view') }}" class="text-dark text-decoration-none position-relative ms-3">
        <i class="fas fa-shopping-cart"></i>
        @if(session('cart'))
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ count(session('cart')) }}
            </span>
        @endif
      </a>
      <i class="fa fa-user ms-3"></i>
    </div>
  </nav>

  {{-- Product Detail --}}
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <img src="{{ asset('product/' . $product->product_img) }}" alt="{{ $product->name }}" height="400" class="card-img-top">

          <div class="card-body">
            <h2 class="fw-bold">{{ $product->name }}</h2>
            <p class="text-muted">{{ $product->category->name ?? 'Uncategorized' }}</p>

            {{-- Price --}}
            <h4 class="text-success mb-3">KES {{ number_format($product->price) }}</h4>

            {{-- Full Description --}}
            <p>{{ $product->description }}</p>

            @php
              $cart = session('cart', []);
            @endphp

            @if(isset($cart[$product->id]))
              {{-- Already in cart --}}
              <button class="btn btn-warning w-100" disabled>In Cart</button>
            @else
              {{-- Add to cart then redirect --}}
              <form action="{{ route('cart.add', $product->id) }}" method="POST">
                  @csrf
                  <input type="hidden" name="redirect" value="index">
                  <button type="submit" class="btn btn-success w-100">Add to Cart</button>
              </form>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Footer --}}
  <footer class="py-5 bg-dark text-light text-center">
    <p>&copy; {{ date('Y') }} MiniShopLite. All Rights Reserved.</p>
  </footer>
</body>
</html>

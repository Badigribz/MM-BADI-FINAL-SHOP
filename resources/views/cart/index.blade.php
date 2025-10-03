
<div class="container py-5">
    <h2>Your Cart</h2>

    {{-- Flash error for stock issues --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($cart && count($cart) > 0)
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th style="width:150px;">Qty</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($cart as $id => $item)
                    @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                    <tr>
                        <td><img src="{{ asset('product/'.$item['image']) }}" width="50"></td>
                        <td>{{ $item['name'] }}</td>
                        <td>KES {{ number_format($item['price']) }}</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" name="action" value="decrease" class="btn btn-sm btn-outline-secondary">-</button>
                            </form>
                            <span class="mx-2">{{ $item['quantity'] }}</span>
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" name="action" value="increase" class="btn btn-sm btn-outline-secondary">+</button>
                            </form>
                        </td>
                        <td>KES {{ number_format($subtotal) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-end"><strong>Total:</strong></td>
                    <td><strong>KES {{ number_format($total) }}</strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Checkout</button>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>

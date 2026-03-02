<div class="container">
    <h2>Product Details: {{ $product->product_name }}</h2>
    <p><strong>Product Code:</strong> {{ $product->product_code }}</p>
    <p><strong>Current Price:</strong> ₱{{ number_get($product->price, 2) }}</p>
    <p><strong>Total Stock on Hand:</strong> {{ $product->current_stock }}</p>
    
    <hr>

    <h3>Supply & Delivery History</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Supplier Name</th>
                <th>Quantity Delivered</th>
                <th>Delivery Reference</th>
                <th>Date Received</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product->suppliers as $supplier)
            <tr>
                <td>{{ $supplier->supplier_name }}</td>
                <td>{{ $supplier->pivot->quantity }}</td>
                <td>{{ $supplier->pivot->delivery_reference }}</td>
                <td>{{ $supplier->pivot->created_at->format('M d, Y') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="table-info">
                <th colspan="1">Total Lifetime Supply:</th>
                <th colspan="3">{{ $totalStockHistory }} units</th>
            </tr>
        </tfoot>
    </table>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
</div>
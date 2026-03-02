<div class="container">
    <h2>Supplier Profile: {{ $supplier->supplier_name }}</h2>
    <hr>
    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Supplier Code:</strong> {{ $supplier->supplier_code }}</p>
            <p><strong>Email:</strong> {{ $supplier->contact_email }}</p>
            <p><strong>Phone:</strong> {{ $supplier->contact_number }}</p>
        </div>
    </div>

    <h3>Products Delivered by this Supplier</h3>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Quantity Delivered</th>
                <th>Reference #</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($supplier->products as $product)
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_code }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ $product->pivot->delivery_reference }}</td>
                <td>{{ $product->pivot->created_at->format('M d, Y h:i A') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No delivery history found for this supplier.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('suppliers.index') }}" class="btn btn-primary">Back to Supplier List</a>
</div>
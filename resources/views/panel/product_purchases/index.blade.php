@extends('panel.layout.app')

@section('content')
<div class="container">
    <h1>Product Purchases</h1>
    <a href="{{ route('product_purchases.create') }}" class="btn btn-primary">Create Product Purchase</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productPurchases as $productPurchase)
            <tr>
                <td>{{ $productPurchase->id }}</td>
                <td>{{ $productPurchase->name }}</td>
                <td>
                    <a href="{{ route('product_purchases.edit', $productPurchase->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('product_purchases.destroy', $productPurchase->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

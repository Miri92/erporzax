@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product Purchase</h1>
    <form action="{{ route('product_purchases.update', $productPurchase->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $productPurchase->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

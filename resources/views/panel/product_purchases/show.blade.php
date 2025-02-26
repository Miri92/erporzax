@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product Purchase Details</h1>
    <p>ID: {{ $productPurchase->id }}</p>
    <p>Name: {{ $productPurchase->name }}</p>
</div>
@endsection

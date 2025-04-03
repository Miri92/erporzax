@extends('panel.layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product Purchases</h4>
                    <a href="{{ route('panel.product_purchases.create') }}" class="btn btn-primary">Add New Purchase</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Invoice Number</th>
                                    <th>Grand Total Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Due Amount</th>
                                    <th>Status</th>
                                    <th>Purchase By</th>
                                    <th>Purchase Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productPurchases as $purchase)
                                    <tr>
                                        <td>{{ $purchase->invoice_number }}</td>
                                        <td>{{ $purchase->grand_total_amount }}</td>
                                        <td>{{ $purchase->paid_amount }}</td>
                                        <td>{{ $purchase->due_amount }}</td>
                                        <td>{{ $purchase->status }}</td>
                                        <td>{{ $purchase->purchase_by }}</td>
                                        <td>{{ $purchase->purchase_date }}</td>
                                        <td>
                                            <a href="{{ route('panel.product_purchases.edit', $purchase->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('panel.product_purchases.destroy', $purchase->id) }}" method="POST" style="display:inline-block;">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

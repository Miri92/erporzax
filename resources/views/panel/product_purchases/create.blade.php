@extends('panel.layout.app')

@section('content')
<style>
    .select2-container {
        max-width: 200px;
        width: 100% !important;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Product Purchase</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('panel.product_purchases.store') }}" method="POST">
                        @csrf


                        <div class="form-group">
                            <label for="name">İstehsalçı * :</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <table class="table repeater">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Batch ID</th>
                                    <th>Son istifadə tarixi*</th>
                                    <th>Stok Miqdarı</th>
                                    <th>Qutu Nümunəsi*</th>
                                    <th>Qutu Miqdarı*</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody data-repeater-list>
                                <tr data-repeater-item>
                                    <td style="width: 225px;">
                                        <select class="form-control product_name_ajax"></select>
                                    </td>
                                    <td><input type="text" name="batch_id" class="form-control" required></td>
                                    <td><input type="date" name="batch_id" class="form-control" required></td>
                                    <td><input type="number" name="quantity" class="form-control" required></td>
                                    <td><input type="number" name="price" class="form-control" required></td>
                                    <th></th>
                                </tr>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">
                                        <button data-repeater-create type="button" class="btn btn-primary">Add</button>
                                    </td>
                                </tr>
                        </table>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-js-bottom')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ url('/panel/repeater/jquery.repeater.min.js') }}"></script>

<script>
    // $('.product_name_ajax').select2({
    //     ajax: {
    //         url: "{{ route('panel.products.search') }}",
    //         dataType: 'json',
    //         processResults: function (data) {
    //             return {
    //                 results: data.map(function (item) {
    //                     return {
    //                         id: item.id,
    //                         text: item.name // Map 'name' to 'text'
    //                     };
    //                 })
    //             };
    //         }
    //     }
    // });


    $('.repeater').repeater({
        ready: function () {
            $('.product_name_ajax').select2({
                width: 'style', // Uses CSS-defined width
                placeholder: "Select a product",
                ajax: {
                    url: "{{ route('panel.products.search') }}",
                    dataType: 'json',
                    processResults: function (data) {
                        return {
                            results: data.map(function (item) {
                                return {
                                    id: item.id,
                                    text: item.name // Map 'name' to 'text'
                                };
                            })
                        };
                    }
                }
            });
        },
        show: function () {
            $(this).slideDown();

            // Reinitialize Select2 for the newly added item
            $(this).find('.product_name_ajax').select2({
                width: 'style', // Uses CSS-defined width
                placeholder: "Select a product",
                ajax: {
                    url: "{{ route('panel.products.search') }}",
                    dataType: 'json',
                    processResults: function (data) {
                        return {
                            results: data.map(function (item) {
                                return {
                                    id: item.id,
                                    text: item.name // Map 'name' to 'text'
                                };
                            })
                        };
                    }
                }
            });
            
        },
        hide: function (deleteElement) {
            if (confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);
            }
        }
    });
</script>
@endsection
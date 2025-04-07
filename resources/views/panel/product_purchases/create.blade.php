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
                    <h4 class="card-title"><i class="fas fa-money-check-alt"></i> Alış fakturası yarat</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('panel.product_purchases.store') }}" method="POST">
                        @csrf


                        <div class="row mb-5">
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">İstehsalçı * :</label>
                                </div>

                                <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Faktura nömrəsi * :</label>
                                </div>

                                
                            </div>

                            <div class="col-6">
                                
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                        <option value="1">Nağd ödəniş</option>
                                        <option value="2">Bank ödənişi</option>
                                    </select>
                                    <label for="floatingSelect">Ödəniş növü * :</label>
                                </div>

                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Təfərrüatlar:</label>
                                </div>
                            </div>
                        </div>


                        

                        <table class="table repeater">
                            <thead>
                                <tr>
                                    <th>Tibb Məlumatı*</th>
                                    <th>Toplu Id</th>
                                    <th>Son istifadə tarixi*</th>
                                    <th>Stok Miqdarı</th>
                                    <th>Qutu Miqdarı*</th>
                                    <th>İstehsalçı Qiyməti*</th>
                                    <th>Qutu MRP *</th>
                                    <th>Ümumi alış qiyməti</th>
                                    <th>Fəaliyyət</th>
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
                                    <td><input type="number" name="price" class="form-control" required></td>
                                    <td><input type="number" name="price" class="form-control" required></td>
                                    <td><input type="number" name="price" class="form-control" required></td>
                                    <td>
                                        <button data-repeater-delete type="button" class="btn btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" class="text-end">Hazır ki faktura cəmi:</td>
                                    <td><input type="text" name="batch_id" class="form-control" readonly></td>
                                    <td>
                                        <button data-repeater-create type="button" class="btn btn-outline-info">
                                        <i class="fas fa-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-end">Əvvəlki faktura ilə birlikdə:</td>
                                    <td><input type="text" name="batch_id" class="form-control" readonly></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-end">Ödənilmiş məbləğ:</td>
                                    <td><input type="text" name="batch_id" class="form-control" required></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-end">Ödənilməli Borc:</td>
                                    <td><input type="text" name="batch_id" class="form-control" readonly></td>
                                    <td></td>
                                </tr>
                        </table>


                        <div class="row">
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-success ">
                                Alış et
                                </button>
                            </div>
                        </div>

                        
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
    $('.repeater').repeater({
        ready: function () {
            initializeSelect2($('.product_name_ajax'));

        },
        show: function () {
            $(this).slideDown();

            // Reinitialize Select2 for the newly added item
            initializeSelect2($(this).find('.product_name_ajax'));
            
        },
        hide: function (deleteElement) {
            if (confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);
            }
        },
        isFirstItemUndeletable: true
    });

    // Function to initialize Select2 with AJAX search
    function initializeSelect2(element) {
        element.select2({
            width: 'style', // Uses CSS-defined width
            placeholder: "Select a product",
            ajax: {
                url: "{{ route('panel.products.search') }}",
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: data.map(item => ({
                            id: item.id,
                            text: item.name // Map 'name' to 'text'
                        }))
                    };
                }
            }
        });
    }
</script>
@endsection
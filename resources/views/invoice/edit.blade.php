@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('inv/css/AdminLTE.css') }}">
<link rel="stylesheet" href="{{ asset('inv/css/bootstrap.datetimepicker.css') }}">
<link rel="stylesheet" href="{{ asset('inv/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('inv/css/skin-green.css') }}">
<link rel="stylesheet" href="{{ asset('inv/css/skin-purple.css') }}">
<link rel="stylesheet" href="{{ asset('inv/css/styles.css') }}">
@endpush

@section('title')
Edit Invoice
@endsection

@section('content')
{{--
<!-- Content Wrapper. -> --}}

    <div class="content-wrapper overflow-y-scroll">
        <!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
    <div class="card p-3">
        <div class="card-header ">
            <h3 class="card-title">Edit Invoice </h3>


        </div>
        <div class="card-body">
            <div id="response" class="alert alert-success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <div class="message"></div>
            </div>


            <form method="" id="create_invoice" action="">
                @csrf

                <div class="row justify-content-around mb-4">

                    <div class="input-group col-md-2 ">
                        <label for="clientContact" class="control-label">Invoice Number</label>
                        <input type="text" name="number" id="invoice_id"
                            class="form-control required rounded @error('number') is-invalid @enderror"
                            placeholder="Invoice Number" aria-describedby="sizing-addon1"
                            value="{{ $invoice->number }}">

                    </div>

                    <div class="form-group">
                        <label for="date" class="control-label">Date</label>
                        <div class="input-group date">
                            <input type="date" class="form-control required" id="due_date" name="date"
                                placeholder="Date" value="{{ date('Y-m-d', strtotime($invoice->date)) }}" />
                        </div>
                    </div>


                    <div class="col-md-2 no-padding-right">
                        <div class="form-group">
                            <label for="due_date" class="control-label">Due Date</label>
                            <div class="input-group date">
                                <input type="date" class="form-control required" id="due_date" name="due_date"
                                    placeholder="Due Date" value="{{ date('Y-m-d', strtotime($invoice->due_date)) }}" />
                            </div>
                        </div>
                    </div>

                    <div class="input-group col-md-2">
                        <label for="clientContact" class="control-label">Payment Type</label>
                        <select class="form-control rounded @error('type') is-invalid @enderror" name="type"
                            id="paymentType">
                            <option value="">~~SELECT~~</option>
                            <option value="Cheque" {{ old('type', $invoice->type) == 'Cheque' ? 'selected' : ''
                                }}>Cheque</option>
                            <option value="Cash" {{ old('type', $invoice->type) == 'Cash' ? 'selected' : '' }}>Cash
                            </option>
                            <option value="Credit Card" {{ old('type', $invoice->type) == 'Credit Card' ? 'selected' :
                                '' }}>Credit Card</option>
                        </select>

                    </div>

                </div>
        </div>

        <div class="row justify-content-around">
            <div class="col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-heading d-flex align-items-center justify-content-between">
                        <h4 class="">Customer Information</h4>
                        {{-- <label for="existingCustomer" class="mr-2"><b>OR</b> Select Existing Customer:</label> --}}
                        <select class="form-control w-50 @error('customer_id') is-invalid @enderror"
                            id="existingCustomer" name="customer_id">
                            <option value="">~~SELECT~~</option>
                            @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}"
                                data-url="{{ route('invoice.getCustomerDetails', $customer) }}" {{ old('customer_id',
                                $invoice->customer_id) == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                            @endforeach
                        </select>

                    </div>


                    <div class="panel-body  ">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="">
                                    <input type="text" class="form-control margin-bottom copy-input required"
                                        name="customer_name" id="customer_name" placeholder="Enter Name" tabindex="1">
                                </div>
                                <div class="">
                                    <input type="text" class="form-control margin-bottom copy-input required"
                                        name="customer_address_1" id="customer_address_1" placeholder="Address 1"
                                        tabindex="3">
                                </div>
                                <div class="">
                                    <input type="text" class="form-control margin-bottom copy-input required"
                                        name="customer_town" id="customer_town" placeholder="Town" tabindex="5">
                                </div>
                                <div class=" no-margin-bottom">
                                    <input type="text" class="form-control copy-input required" name="customer_postcode"
                                        id="customer_postcode" placeholder="Postcode" tabindex="7">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="input-group float-right margin-bottom">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control copy-input required" name="customer_email"
                                        id="customer_email" placeholder="E-mail Address"
                                        aria-describedby="sizing-addon1" tabindex="2">
                                </div>
                                <div class="">
                                    <input type="text" class="form-control margin-bottom copy-input"
                                        name="customer_address_2" id="customer_address_2" placeholder="Address 2"
                                        tabindex="4">
                                </div>
                                <div class="">
                                    <input type="text" class="form-control margin-bottom copy-input required"
                                        name="customer_county" id="customer_county" placeholder="Country" tabindex="6">
                                </div>
                                <div class=" no-margin-bottom">
                                    <input type="text" class="form-control required" name="customer_phone"
                                        id="customer_phone" placeholder="Phone Number" tabindex="8">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 text-right">
                <div class="panel panel-default">
                    <div class="panel-heading text-left">
                        <h4>Shipping Information</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="">
                                    <input type="text" class="form-control margin-bottom required"
                                        name="customer_name_ship" id="customer_name_ship" placeholder="Enter Name"
                                        tabindex="9">
                                </div>
                                <div class="">
                                    <input type="text" class="form-control margin-bottom" name="customer_address_2_ship"
                                        id="customer_address_2_ship" placeholder="Address 2" tabindex="11">
                                </div>
                                <div class=" no-margin-bottom">
                                    <input type="text" class="form-control required" name="customer_county_ship"
                                        id="customer_county_ship" placeholder="Country" tabindex="13">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="">
                                    <input type="text" class="form-control margin-bottom required"
                                        name="customer_address_1_ship" id="customer_address_1_ship"
                                        placeholder="Address 1" tabindex="10">
                                </div>
                                <div class="">
                                    <input type="text" class="form-control margin-bottom required"
                                        name="customer_town_ship" id="customer_town_ship" placeholder="Town"
                                        tabindex="12">
                                </div>
                                <div class=" no-margin-bottom">
                                    <input type="text" class="form-control required" name="customer_postcode_ship"
                                        id="customer_postcode_ship" placeholder="Postcode" tabindex="14">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- / end client details section -->
        <table class="table table-bordered table-hover table-striped" id="invoice_table">
            <thead>
                <tr>
                    <th width="500">
                        <h4><a href="#" class="btn btn-success btn-xs add-row"><i class="fas fa-plus"></i></a>
                            Product</h4>
                    </th>
                    <th>
                        <h4>Qty</h4>
                    </th>
                    <th>
                        <h4>Price</h4>
                    </th>
                    <th width="300">
                        <h4>Discount</h4>
                    </th>
                    <th>
                        <h4>Sub Total</h4>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="invoice-row">
                    <td class="text-right">
                        <div class="-sm d-flex align-items-center ">
                            <a href="#" class="btn btn-danger btn-xs delete-row"><i class="fas fa-times"
                                    aria-hidden="true"></i></a>
                            <input type="text" class="form-control w-100 item-input invoice_product"
                                name="invoice_products[][name]" placeholder="Enter Product Item Code">
                            <input type="hidden" class="form-control -sm item-input invoice_item_code"
                                name="invoice_products[][item_code]" placeholder="Enter Item Code">
                        </div>
                        <div class="product-suggestions-container"></div>
                    </td>

                    <td class="text-right">
                        <div class="input-group  no-margin-bottom">
                            <input type="number"
                                class="form-control rounded calculate-sub invoice_product_qty calculate"
                                name="invoice_products[][quantity]" value="1">
                        </div>
                        <span class="text-danger quantity-error"></span>
                    </td>
                    <td class="text-right">
                        <div class="input-group   no-margin-bottom rounded">
                            <span class="input-group-addon " id="currencySymbol">$</span>
                            <input type="number" class="form-control  calculate-sub invoice_product_price required"
                                name="invoice_products[][price]" aria-describedby="sizing-addon1" placeholder="0.00">
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="input-group ">
                            <span class="input-group-addon" id="currencySymbol">$</span>
                            <input type="text" class="form-control  calculate-sub invoice_product_discount"
                                name="invoice_products[][discount]" value="0.00" aria-describedby="sizing-addon1">
                        </div>
                    </td>

                    <td class="text-right">
                        <div class="input-group ">
                            <span class="input-group-addon" id="currencySymbol">$</span>
                            <input type="text" class="form-control  calculate-sub invoice_product_sub_total"
                                name="invoice_products[][subtotal]" value="0.00" aria-describedby="sizing-addon1"
                                disabled>
                        </div>
                    </td>
                </tr>
            </tbody>


        </table>
        <input type="hidden" name="invoice_products" id="invoice_products">
        <div id="invoice_totals" class="padding-right row text-right">
            <div class="col-xs-6">
                <div class="input-group -sm textarea no-margin-bottom">
                    <textarea class="form-control" name="notes" placeholder="Additional Notes..."></textarea>
                    <span class="text-danger">
                        @error('notes')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="col-xs-6 no-padding-right">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-5">
                        <strong>Sub Total:</strong>
                    </div>
                    <div class="col-xs-3">
                        <span id="currencySymbol"></span><span class="invoice-sub-total">0.00</span>
                        <input type="hidden" name="subtotal" id="invoice_subtotal">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-5">
                        <strong>Discount:</strong>
                    </div>
                    <div class="col-xs-3">
                        <span id="currencySymbol"></span><span class="invoice-discount">0.00</span>
                        <input type="hidden" name="discount" id="invoice_discount">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-4 col-xs-offset-5">
                        <strong>TAX/VAT:</strong><br>Remove TAX/VAT <input type="checkbox" class="remove_vat">
                    </div>
                    <div class="col-xs-3">
                        <span id="vatSymbol"></span><span class="invoice-vat"
                            data-enable-vat="{{ config('constants.ENABLE_VAT') }}"
                            data-vat-rate="{{ config('constants.VAT_RATE') }}"
                            data-vat-method="{{ config('constants.VAT_INCLUDED') }}">0.00</span>
                        <input type="hidden" name="vat" id="invoice_vat">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-4 col-xs-offset-5">
                        <strong>Total:</strong>
                    </div>
                    <div class="col-xs-3">
                        <span id="totalSymbol"></span><span class="invoice-total">0.00</span>
                        <input type="hidden" name="total" id="invoice_total">
                    </div>
                </div>


                <div class="col-xs-6 margin-top btn-group">
                    <input type="submit" id="action_edit_invoice" class="btn btn-success float-right"
                        value="Edit Invoice" data-loading-text="Editing...">
                </div>


                </form>

                <div id="insert" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Select Product</h4>
                            </div>
                            <div class="modal-body">
                                <div id="productListPlaceholder"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-primary"
                                    id="selected">Add</button>
                                <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div id="insert_customer" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Select An Existing Customer</h4>
                            </div>
                            <div class="modal-body">
                                <div id="customerListPlaceholder"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

            </div>
        </div>
        <!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- /.content-wrapper -->
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>




<script>
    $(document).ready(function () {
        $('.add-row').on('click', function (event) {
    event.preventDefault();

    // Clone the first row excluding the template row
    var newRow = $('#invoice_table tbody tr:not(:first)').first().clone();

    // Clear the input values in the cloned row
    newRow.find('input').val('');

    // Set the quantity input to 1
    newRow.find('.invoice_product_qty').val(1);

    // Append the new row to the table
    $('#invoice_table tbody').append(newRow);

    // Trigger the input event for the new row
    newRow.find('.invoice_product, .invoice_product_qty, .invoice_product_price, .invoice_product_discount').trigger('input');
});

// Delete Row Click Event
$('#invoice_table').on('click', '.delete-row', function (event) {
    event.preventDefault();
    var currentRow = $(this).closest('tr');
    if ($('#invoice_table tbody tr').length > 1) {
        // Make an AJAX call to delete the product
        var itemCode = currentRow.find('.invoice_item_code').val();

        $.ajax({
            url: '{{ url('invoices/deleteProduct') }}/' + itemCode, // Replace with your actual route for deleting a product
            type: 'DELETE',
               data: {
        _token: '{{ csrf_token() }}', // Add the CSRF token as part of the request data
        itemCode: itemCode
    },
            success: function (response) {
                console.log(response);
                currentRow.remove();
                updateInvoiceSummary(); // Update the summary after removing the row
            },
            error: function (error) {
                console.error(error.responseText);
                alert('Error deleting the product. Please try again.');
            }
        });
    } else {
        alert('Cannot delete the only row.');
    }
});


    // Event listener for input changes
    $('#invoice_table').on('input',
        '.invoice_product, .invoice_product_qty, .invoice_product_price, .invoice_product_discount',
        function () {
            var currentRow = $(this).closest('tr');
            var quantityInput = currentRow.find('.invoice_product_qty');
            var quantity = parseFloat(quantityInput.val()) || 1;
            var maxQuantity = parseFloat(quantityInput.attr('max')) || Infinity;
            var price = parseFloat(currentRow.find('.invoice_product_price').val()) || 0;
            var discountPercentage = parseFloat(currentRow.find('.invoice_product_discount').val()) || 0;

            quantity = Math.min(quantity, maxQuantity);
            quantityInput.val(quantity);
            if (quantity > maxQuantity) {
        // Update the error message
        currentRow.find('.quantity-error').text('Quantity exceeds the maximum allowed.');
    } else {
        // Clear the error message if quantity is within the limit
        currentRow.find('.quantity-error').text('');
    }
            var discountAmount = (price * discountPercentage) / 100;
            var subtotal = quantity * (price - discountAmount);

            if (subtotal <= 0) {
                subtotal = price - discountAmount;
            }
           
            currentRow.find('.invoice_product_sub_total').val(subtotal.toFixed(2));
            currentRow.find('.invoice_item_code').val(currentRow.find('.invoice_product')
                .val()); // Replace this w
                
            updateInvoiceSummary(); // Update the invoice summary on every input change
        });
        

    function updateInvoiceSummary() {
        var total = 0;
        var discount = 0;
        var subtotal = 0;
        var products = [];

        $('#invoice_table tbody tr').each(function () {
            var quantity = parseFloat($(this).find('.invoice_product_qty').val()) || 1;
            var price = parseFloat($(this).find('.invoice_product_price').val()) || 0;
            var discountPercentage = parseFloat($(this).find('.invoice_product_discount').val()) || 0;
            var itemCode = $(this).find('.invoice_item_code').val();

            var discountAmount = (price * discountPercentage) / 100;
            var rowSubtotal = quantity * (price - discountAmount);

            total += rowSubtotal;
            discount += discountAmount;
            subtotal += quantity * price;

            var productData = {
                name: $(this).find('.invoice_product').val(),
                item_code: itemCode,
                quantity: quantity,
                price: price,
                discount: discountPercentage,
                subtotal: rowSubtotal.toFixed(2),
            };

            products.push(productData);

            $(this).find('.invoice_product_sub_total').val(rowSubtotal.toFixed(2));
        });

        $('.invoice-sub-total').text(total.toFixed(2));
        $('.invoice-discount').text(discount.toFixed(2));
        $('.invoice-total').text((total - discount).toFixed(2));

        $('#invoice_subtotal').val(total.toFixed(2));
        $('#invoice_discount').val(discount.toFixed(2));
        $('#invoice_total').val((total - discount).toFixed(2));

        $('#invoice_products').val(JSON.stringify(products));
    }

    function populateTableWithExistingProducts() {
        var existingProducts = {!! json_encode($invoice->products) !!};
        var templateRow = $('#invoice_table tbody tr:hidden').clone();

        existingProducts.forEach(function (product, index) {
            var newRow = $('#invoice_table tbody tr:first').clone();
            newRow.find('.invoice_product').val(product.product_name);
            newRow.find('.invoice_product_qty').val(product.product_quantity);
            newRow.find('.invoice_product_price').val(product.product_price);
            newRow.find('.invoice_product_discount').val(product.product_discount);
            newRow.find('.invoice_product_sub_total').val(product.product_subtotal);
            newRow.find('.product-price').text('$' + product.price);

            $('#invoice_table tbody').append(newRow);
            newRow.find(
                '.invoice_product, .invoice_product_qty, .invoice_product_price, .invoice_product_discount'
            ).trigger('input');
        });

        enableProductSearch();

        updateInvoiceSummary();
    }

    function enableProductSearch() {
    $('#invoice_table').on('input', '.invoice_product', function () {
        var searchText = $(this).val();
        var currentProductInput = $(this);
        var nameTd = currentProductInput.closest('tr').find('.product-name');
        var priceInput = currentProductInput.closest('tr').find('.invoice_product_price');
        var priceTd = currentProductInput.closest('tr').find('.product-price');
        var discountInput = currentProductInput.closest('tr').find('.invoice_product_discount');
        var maxQuantityInput = currentProductInput.closest('tr').find('.invoice_product_qty');
        var productSuggestionsContainer = currentProductInput.closest('tr').find(
            '.product-suggestions-container');

        if (searchText) {
            $.ajax({
                url: "{{ route('product.search') }}",
                type: 'GET',
                data: {
                    searchText: searchText
                },
                dataType: 'json',
                success: function (data) {
                    productSuggestionsContainer.html('');

                    if (data.length > 0) {
                        data.forEach(function (product) {
                            var suggestionDiv = $(
                                '<div class="product-suggestion">' + product
                                .item + '</div>');

                            suggestionDiv.click(function () {
                                currentProductInput.val(product.item);
                                nameTd.text(product.item);
                                priceInput.val(product.price);
                                priceTd.text('$' + product.price);
                                discountInput.val(product.discount);
                                maxQuantityInput.attr('max', product
                                    .quantity);
                                productSuggestionsContainer.html('');

                                currentProductInput.closest('tr').find(
                                    '.invoice_item_code').val(
                                    product.item_code);

                                currentProductInput.closest('tr').find(
                                    '.invoice_product_qty, .invoice_product_price, .invoice_product_discount'
                                ).trigger('input');
                            });

                            productSuggestionsContainer.append(suggestionDiv);
                        });
                    } else {
                        // No products found
                        productSuggestionsContainer.html(
                            '<div class="product-suggestion error"><span class="text-danger">Product not found</span></div>'
                        );
                    }
                },
                error: function (error) {
                    console.error('Error fetching product names:', error);
                }
            });
        } else {
            currentProductInput.closest('tr').find('.product-suggestions-container').html('');
        }
    });
}


    // Call the function to populate existing products
    populateTableWithExistingProducts();

    $('#create_invoice').submit(function (e) {
        e.preventDefault();

        // Perform additional check before submitting the form
        var invalidProducts = checkInvalidProducts();
        if (invalidProducts.length > 0) {
            // Display an error message for invalid products
            alert('Some products have invalid names or item codes. Please check and try again.');
            return;
        }

        // If all products are valid, proceed with the form submission
        $.ajax({
            type: 'PUT',
            url: '{{ route('invoice.update', $invoice) }}', // Assuming you have a route for updating invoices
            data: $(this).serialize(),
            success: function (response) {
                console.log(response);
                showToast('success', 'Invoice updated successfully');
            window.location.href = '{{ route('invoice.index') }}';
              
            },
            error: function (error) {
                console.error(error.responseText);

                var errors = error.responseJSON.errors;

                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();

                if (errors) {
                    $.each(errors, function (field, messages) {
                        $('[name="' + field + '"]').addClass('is-invalid');

                        $.each(messages, function (index, message) {
                            $('[name="' + field + '"]').after(
                                '<div class="invalid-feedback">' +
                                message + '</div>');
                        });
                    });
                }
                handleFormError();
            }
        });
    });

    function handleFormError() {
        // Add logic to handle the error state, for example, preventing further actions
        alert('Error in form submission. Please fix the errors.');
        // You can add more specific handling here, like disabling buttons or showing additional messages.
    }
    
    // Your existing functions: checkInvalidProducts, showToast, and other functions
    function checkInvalidProducts() {
    var invalidProducts = [];

    // Iterate through each product row (excluding the first row)
    $('.invoice-row:gt(0)').each(function (index, row) {
        var productName = $(row).find('.invoice_item_code').val();

        // Log the product details for debugging
        console.log('Product Name:', productName);

        // Perform additional validation as needed
        if (productName === '') {
            invalidProducts.push(index +
                1); // Store the index (row number) of the invalid product
        }
    });

    return invalidProducts;
}


    function showToast(type, message) {
        console.log(type + ': ' + message);
    }
});

</script>









{{-- customer --}}
<script>
    $(document).ready(function() {
        // Function to fetch and set customer details
        function fetchAndSetCustomerDetails(customerId) {
            if (customerId) {
                // Make an AJAX request to fetch customer details
                $.ajax({
                    url: "{{ route('invoice.getCustomerDetails', ['customer' => '__customerId__']) }}"
                        .replace('__customerId__', customerId),
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Update all input fields with customer details
                        updateAllCustomerFields(data);
                    },
                    error: function(error) {
                        console.error('Error fetching customer details:', error);
                    }
                });
            }
          else  {
                // No customer selected, set all fields to empty and make them editable
                updateAllCustomerFields({
                    name: '',
                    email: '',
                    address_1: '',
                    address_2: '',
                    town: '',
                    country: '',
                    post_code: '',
                    phone: '',
                    name_ship: '',
                    address_1_ship: '',
                    address_2_ship: '',
                    town_ship: '',
                    county_ship: '',
                    post_code_ship: ''
                });
            }
        }

        // Trigger change event with the initial customer ID when the page loads
        var initialCustomerId = "{{ old('customer_id', $invoice->customer_id) }}";
        $('#existingCustomer').val(initialCustomerId).change();

        // Fetch and set customer details when the page loads
        fetchAndSetCustomerDetails(initialCustomerId);

        // Handle change event for customer selection
        $('#existingCustomer').on('change', function() {
            var customerId = $(this).val();
            fetchAndSetCustomerDetails(customerId);
        });
        function updateAllCustomerFields(customer) {
            // Update customer details in the first panel
            $('#customer_name').val(customer.name).prop('readonly', customer.name);
            $('#customer_email').val(customer.email).prop('readonly', customer.email);
            $('#customer_address_1').val(customer.address_1).prop('readonly', customer.address_1);
            $('#customer_address_2').val(customer.address_2).prop('readonly', customer.address_2);
            $('#customer_town').val(customer.town).prop('readonly', customer.town);
            $('#customer_county').val(customer.country).prop('readonly', customer.country);
            $('#customer_postcode').val(customer.post_code).prop('readonly', customer.post_code);
            $('#customer_phone').val(customer.phone).prop('readonly', customer.phone);

            // Update customer details in the second panel (Shipping Information)
            $('#customer_name_ship').val(customer.name_ship).prop('readonly', customer.name_ship);
            $('#customer_address_1_ship').val(customer.address_1_ship).prop('readonly', customer.address_1_ship);
            $('#customer_address_2_ship').val(customer.address_2_ship).prop('readonly', customer.address_2_ship);
            $('#customer_town_ship').val(customer.town_ship).prop('readonly', customer.town_ship);
            $('#customer_county_ship').val(customer.county_ship).prop('readonly', customer.county_ship);
            $('#customer_postcode_ship').val(customer.post_code_ship).prop('readonly', customer.post_code_ship);
        }
    });
</script>
{{-- end customer --}}






@push('js')
@endpush
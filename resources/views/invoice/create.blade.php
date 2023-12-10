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
    Create Invoice
@endsection

@section('content')
    {{--
<!-- Content Wrapper. -> --}}

    <div class="content-wrapper overflow-y-scroll">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Invoice </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                </div>
                <div class="card-body">
                    <div id="response" class="alert alert-success" style="display:none;">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <div class="message"></div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" id="create_invoice" action="{{ route('invoice.store') }}">
                        @csrf

                        <div class="row justify-content-around mb-4">

                            <div class="input-group col-md-2 ">
                                <label for="clientContact" class="control-label">Invoice Number</label>
                                <input type="text" name="number" id="invoice_id"
                                    class="form-control required rounded @error('number') is-invalid @enderror"
                                    placeholder="Invoice Number" aria-describedby="sizing-addon1"
                                    value="{{ old('number') }}">
                                <span class="text-danger">
                                    @error('number')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-2 no-padding-right">
                                <label for="clientContact" class="control-label">Invoice Date</label>
                                <div class="">
                                    <div class="input-group date" id="invoice_date">
                                        <input type="date" class="form-control required" name="date"
                                            value="{{ old('date') }}" placeholder="Invoice Date" data-date-format="" />
                                        {{-- <span class="input-group-addon">
                                            <span class="far fa-calendar"></span>
                                        </span> --}}
                                    </div>
                                </div>
                                <span class="text-danger">
                                    @error('date')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-2 no-padding-right">
                                <div class="">
                                    <label for="clientContact" class="control-label">Due Date</label>
                                    <div class="input-group date" id="due_date">
                                        <input type="date" class="form-control required" value="{{ old('due_date') }}"
                                            name="due_date" placeholder="Due Date" data-date-format="" />
                                        {{-- <span class="input-group-addon">
                                            <span class="far fa-calendar"></span>
                                        </span> --}}
                                    </div>
                                </div>
                                <span class="text-danger">
                                    @error('due_date')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="input-group col-md-2">
                                <label for="clientContact" class="control-label">Payment Type</label>
                                <select class="form-control rounded @error('type') is-invalid @enderror" name="type"
                                    id="paymentType">
                                    <option value="">~~SELECT~~</option>
                                    <option value="1" {{ old('type') == 'Cheque' ? 'selected' : '' }}>Cheque</option>
                                    <option value="2" {{ old('type') == 'Cash' ? 'selected' : '' }}>Cash</option>
                                    <option value="3" {{ old('type') == 'Credit Card' ? 'selected' : '' }}>Credit Card
                                    </option>
                                </select>
                                <span class="text-danger">
                                    @error('type')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                        </div>
                </div>

                <div class="row justify-content-around">
                    <div class="col-xs-6">
                        <div class="panel panel-default">
                            <div class="panel-heading d-flex align-items-center justify-content-between">
                                <h4 class="">Customer Information</h4>
                                <label for="existingCustomer" class="mr-2"><b>OR</b> Select Existing Customer:</label>
                                <select class="form-control @error('customer_id') is-invalid @enderror"
                                    id="existingCustomer" name="customer_id">
                                    <option value="">~~SELECT~~</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}"
                                            data-url="{{ route('invoice.getCustomerDetails', $customer) }}"
                                            {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                            {{ $customer->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('customer_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="panel-body  ">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="">
                                            <input type="text" class="form-control margin-bottom copy-input required"
                                                name="customer_name" id="customer_name" placeholder="Enter Name"
                                                tabindex="1">
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control margin-bottom copy-input required"
                                                name="customer_address_1" id="customer_address_1" placeholder="Address 1"
                                                tabindex="3">
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control margin-bottom copy-input required"
                                                name="customer_town" id="customer_town" placeholder="Town"
                                                tabindex="5">
                                        </div>
                                        <div class=" no-margin-bottom">
                                            <input type="text" class="form-control copy-input required"
                                                name="customer_postcode" id="customer_postcode" placeholder="Postcode"
                                                tabindex="7">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="input-group float-right margin-bottom">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control copy-input required"
                                                name="customer_email" id="customer_email" placeholder="E-mail Address"
                                                aria-describedby="sizing-addon1" tabindex="2">
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control margin-bottom copy-input"
                                                name="customer_address_2" id="customer_address_2" placeholder="Address 2"
                                                tabindex="4">
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control margin-bottom copy-input required"
                                                name="customer_county" id="customer_county" placeholder="Country"
                                                tabindex="6">
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
                                                name="customer_name_ship" id="customer_name_ship"
                                                placeholder="Enter Name" tabindex="9">
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control margin-bottom"
                                                name="customer_address_2_ship" id="customer_address_2_ship"
                                                placeholder="Address 2" tabindex="11">
                                        </div>
                                        <div class=" no-margin-bottom">
                                            <input type="text" class="form-control required"
                                                name="customer_county_ship" id="customer_county_ship"
                                                placeholder="Country" tabindex="13">
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
                                            <input type="text" class="form-control required"
                                                name="customer_postcode_ship" id="customer_postcode_ship"
                                                placeholder="Postcode" tabindex="14">
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
                                <h4><a href="#" class="btn btn-success btn-xs add-row"><i
                                            class="fas fa-plus"></i></a>
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
                                <div class="-sm d-flex align-items-center justify-content-around">
                                    <a href="#" class="btn btn-danger btn-xs delete-row"><i class="fas fa-times"
                                            aria-hidden="true"></i></a>
                                    <input type="text" class="form-control -sm item-input invoice_product"
                                        name="" placeholder="Enter Product Item Code">
                                    <div class="product-suggestions-container"></div>
                                </div>
                            </td>

                            <td class="text-right">
                                <div class="input-group input-group-sm no-margin-bottom">
                                    <input type="number" class="form-control calculate-sub invoice_product_qty calculate"
                                        name="" value="1">

                                </div>
                            </td>
                            <td class="text-right">
                                <div class="input-group input-group-sm no-margin-bottom">
                                    <span class="input-group-addon" id="currencySymbol">$</span>
                                    <input type="number"
                                        class="form-control calculate-sub invoice_product_price required" name=""
                                        aria-describedby="sizing-addon1" placeholder="0.00">

                                </div>
                            </td>
                            <td class="text-right">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="currencySymbol">$</span>
                                    <input type="text" class="form-control calculate-sub invoice_product_discount"
                                        name="" value="0.00" aria-describedby="sizing-addon1">

                                </div>
                            </td>

                            <td class="text-right">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="currencySymbol">$</span>
                                    <input type="text" class="form-control calculate-sub invoice_product_sub_total"
                                        name="" value="0.00" aria-describedby="sizing-addon1" disabled>

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
                            <input type="submit" id="action_create_invoice" class="btn btn-success float-right"
                                value="Create Invoice" data-loading-text="Creating...">
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
    $(document).ready(function() {
        // Add Row Click Event
        $('.add-row').on('click', function(event) {
            event.preventDefault(); // Prevent default behavior
            // Clone the first row
            var newRow = $('#invoice_table tbody tr:first').clone();

            // Clear input values in the new row
            newRow.find('input').val('');

            // Set default quantity to 1
            newRow.find('.invoice_product_qty').val(1);

            // Append the new row to the table
            $('#invoice_table tbody').append(newRow);

            // Trigger input event for the new row
            newRow.find(
                '.invoice_product, .invoice_product_qty, .invoice_product_price, .invoice_product_discount'
            ).trigger('input');
        });

        // Delete Row Click Event
        $('#invoice_table').on('click', '.delete-row', function(event) {
            event.preventDefault(); // Prevent default behavior
            // Check if there is more than one row before deleting
            if ($('#invoice_table tbody tr').length > 1) {
                // Remove the current row
                $(this).closest('tr').remove();
            } else {
                alert('Cannot delete the only row.');
            }
        });

        // Event listener for input changes
        $('#invoice_table').on('input',
            '.invoice_product, .invoice_product_qty, .invoice_product_price, .invoice_product_discount',
            function() {
                var currentRow = $(this).closest('tr');
                var quantityInput = currentRow.find('.invoice_product_qty');
                var quantity = parseFloat(quantityInput.val()) || 1; // Set default quantity to 1
                var maxQuantity = parseFloat(quantityInput.attr('max')) || Infinity;
                var price = parseFloat(currentRow.find('.invoice_product_price').val()) || 0;
                var discountPercentage = parseFloat(currentRow.find('.invoice_product_discount').val()) ||
                    0;

                // Limit quantity to the maximum available quantity
                quantity = Math.min(quantity, maxQuantity);

                // Update quantity input value
                quantityInput.val(quantity);

                // Calculate subtotal with discount
                var discountAmount = (price * discountPercentage) / 100;
                var subtotal = quantity * (price - discountAmount);

                // Set default subtotal to be the price after the discount
                if (subtotal <= 0) {
                    subtotal = price - discountAmount;
                }

                // Set subtotal in the corresponding input
                currentRow.find('.invoice_product_sub_total').val(subtotal.toFixed(2));

                // Optionally, update other fields or perform additional calculations
            });

        function updateInvoiceSummary() {
            var total = 0;
            var discount = 0;
            var subtotal = 0;
            var products = [];

            // Iterate through each row in the table
            $('#invoice_table tbody tr').each(function() {
                var quantity = parseFloat($(this).find('.invoice_product_qty').val()) || 1;
                var price = parseFloat($(this).find('.invoice_product_price').val()) || 0;
                var discountPercentage = parseFloat($(this).find('.invoice_product_discount').val()) ||
                    0;

                var discountAmount = (price * discountPercentage) / 100;
                var rowSubtotal = quantity * (price - discountAmount);

                total += rowSubtotal;
                discount += discountAmount;
                subtotal += quantity * price;

                // Collect product data
                var productData = {
                    name: $(this).find('.invoice_product').val(),
                    quantity: quantity,
                    price: price,
                    discount: discountPercentage,
                    subtotal: rowSubtotal.toFixed(2),
                    // Add other product attributes as needed
                };

                products.push(productData);

                // Update the subtotal for each row
                $(this).find('.invoice_product_sub_total').val(rowSubtotal.toFixed(2));
            });

            // Update the summary values
            $('.invoice-sub-total').text(total.toFixed(2));
            $('.invoice-discount').text(discount.toFixed(2));
            $('.invoice-total').text((total - discount).toFixed(2));

            // Update the hidden input values
            $('#invoice_subtotal').val(total.toFixed(2));
            $('#invoice_discount').val(discount.toFixed(2));
            $('#invoice_total').val((total - discount).toFixed(2));

            // Update the hidden input for products
            $('#invoice_products').val(JSON.stringify(products));
        }

        // Event listener for input changes
        $('#invoice_table').on('input',
            '.invoice_product, .invoice_product_qty, .invoice_product_price, .invoice_product_discount',
            function() {
                var currentRow = $(this).closest('tr');

                // Your existing input change logic here...

                // Call the function to update the invoice summary
                updateInvoiceSummary();
            });

        // Call the function on page load to initialize the summary
        updateInvoiceSummary();

        // Input listener for product suggestions
        $('#invoice_table').on('input', '.invoice_product', function() {
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
                    success: function(data) {
                        // Clear previous suggestions
                        productSuggestionsContainer.html('');

                        if (data.length > 0) {
                            // Append product names to the suggestion list
                            data.forEach(function(product) {
                                // Create a div for each product suggestion
                                var suggestionDiv = $(
                                    '<div class="product-suggestion">' + product
                                    .item + '</div>');

                                // Attach a click event to the suggestion to handle selection
                                suggestionDiv.click(function() {
                                    // Set the selected product in the input
                                    currentProductInput.val(product.item);

                                    // Set the name in the corresponding td
                                    nameTd.text(product.item);

                                    // Set the price in the corresponding input
                                    priceInput.val(product.price);

                                    // Set the price in the corresponding td
                                    priceTd.text('$' + product.price);

                                    // Set the discount in the corresponding input
                                    discountInput.val(product.discount);

                                    // Set the max quantity in the corresponding input
                                    maxQuantityInput.attr('max', product
                                        .quantity);

                                    // Clear the suggestions after selection
                                    productSuggestionsContainer.html('');

                                    // Trigger input event for the updated row
                                    currentProductInput.closest('tr').find(
                                        '.invoice_product_qty, .invoice_product_price, .invoice_product_discount'
                                    ).trigger('input');
                                });

                                // Append the suggestion to the container
                                productSuggestionsContainer.append(suggestionDiv);
                            });
                        } else {
                            // Show an error message for no results
                            productSuggestionsContainer.html(
                                '<div class="product-suggestion error">Product not found</div>'
                            );
                        }
                    },
                    error: function(error) {
                        console.error('Error fetching product names:', error);
                    }
                });
            } else {
                // Clear suggestions when the input is empty
                currentProductInput.closest('tr').find('.product-suggestions-container').html('');
            }
        });

        // Event listener for form submission
        // $('#create_invoice').on('submit', function (event) {
        //     event.preventDefault(); // Prevent default form submission

        //     // Disable the submit button to prevent multiple submissions
        //     $('#action_create_invoice').prop('disabled', true);

        //     // Serialize the form data
        //     var formData = $(this).serialize();

        //     // Send an AJAX request to the server
        //     $.ajax({
        //         url: "{{ route('invoice.store') }}",
        //         type: 'POST',
        //         data: formData,
        //         dataType: 'json',
        //         success: function (response) {
        //             // Handle the success response from the server

        //             // Optionally, redirect to a success page or perform other actions
        //         },
        //         error: function (error) {
        //             // Handle the error response from the server

        //             // Optionally, display error messages or perform other actions

        //             // Enable the submit button again
        //             $('#action_create_invoice').prop('disabled', false);
        //         },
        //     });
        // });
    });
</script>










{{-- customer --}}
<script>
    $(document).ready(function() {
        $('#paymentType, #existingCustomer').on('change', function() {
            var customerId = $(this).val();

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
        });

        function updateAllCustomerFields(customer) {
            // Update customer details in the first panel
            $('#customer_name').val(customer.name).prop('readonly', true);
            $('#customer_email').val(customer.email).prop('readonly', true);
            $('#customer_address_1').val(customer.address_1).prop('readonly', true);
            $('#customer_address_2').val(customer.address_2).prop('readonly', true);
            $('#customer_town').val(customer.town).prop('readonly', true);
            $('#customer_county').val(customer.country).prop('readonly', true);
            $('#customer_postcode').val(customer.post_code).prop('readonly', true);
            $('#customer_phone').val(customer.phone).prop('readonly', true);

            // Update customer details in the second panel (Shipping Information)
            $('#customer_name_ship').val(customer.name_ship).prop('readonly', true);
            $('#customer_address_1_ship').val(customer.address_1_ship).prop('readonly', true);
            $('#customer_address_2_ship').val(customer.address_2_ship).prop('readonly', true);
            $('#customer_town_ship').val(customer.town_ship).prop('readonly', true);
            $('#customer_county_ship').val(customer.county_ship).prop('readonly', true);
            $('#customer_postcode_ship').val(customer.post_code_ship).prop('readonly', true);
        }
    });
</script>
{{-- end customer --}}




@push('js')
@endpush

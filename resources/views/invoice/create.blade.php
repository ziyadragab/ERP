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
    {{-- <!-- Content Wrapper. -> --}}

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

                    <form method="post" id="create_invoice">
                        <input type="hidden" name="action" value="create_invoice">

                        <div class="row justify-content-around mb-4">

                            <div class="input-group col-md-2 ">
                                <label for="clientContact" class=" control-label">Invoice Number</label>

                                <input type="text" name="invoice_id" id="invoice_id"
                                    class="form-control required rounded" placeholder="Invoice Number"
                                    aria-describedby="sizing-addon1" value="">
                            </div>
                            <div class="col-md-2 no-padding-right">
                                <label for="clientContact" class=" control-label">Invoice Date</label>

                                <div class="">
                                    <div class="input-group date" id="invoice_date">
                                        <input type="text" class="form-control required" name="invoice_date"
                                            placeholder="Invoice Date" data-date-format="" />
                                        <span class="input-group-addon">
                                            <span class="far fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 no-padding-right">


                                <div class="">
                                    <label for="clientContact" class=" control-label">Due Date</label>

                                    <div class="input-group date" id="invoice_date">
                                        <input type="text" class="form-control required" name="due_date"
                                            placeholder="Due Date" data-date-format="" />
                                        <span class="input-group-addon">
                                            <span class="far fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group col-md-2 ">
                                <label for="clientContact" class=" control-label">Payment Type</label>



                                <select class="form-control rounded" name="paymentType" id="paymentType">
                                    <option value="">~~SELECT~~</option>
                                    <option value="1">Cheque</option>
                                    <option value="2">Cash</option>
                                    <option value="3">Credit Card</option>
                                </select>

                            </div>
                        </div>


                        <div class="row justify-content-around">
                            <div class="col-xs-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading d-flex align-items-center justify-content-between">
                                        <h4 class="">Customer Information</h4>
                                        <label for="existingCustomer" class="mr-2"><b>OR</b> Select Existing Customer:</label>
                                        <select class="form-control" id="existingCustomer" name="existingCustomer">
                                            <option value="">~~SELECT~~</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}" data-url="{{ route('invoice.getCustomerDetails', $customer) }}">
                                                    {{ $customer->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="panel-body  ">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="">
                                                    <input type="text"
                                                        class="form-control margin-bottom copy-input required"
                                                        name="customer_name" id="customer_name" placeholder="Enter Name"
                                                        tabindex="1">
                                                </div>
                                                <div class="">
                                                    <input type="text"
                                                        class="form-control margin-bottom copy-input required"
                                                        name="customer_address_1" id="customer_address_1"
                                                        placeholder="Address 1" tabindex="3">
                                                </div>
                                                <div class="">
                                                    <input type="text"
                                                        class="form-control margin-bottom copy-input required"
                                                        name="customer_town" id="customer_town" placeholder="Town"
                                                        tabindex="5">
                                                </div>
                                                <div class=" no-margin-bottom">
                                                    <input type="text" class="form-control copy-input required"
                                                        name="customer_postcode" id="customer_postcode"
                                                        placeholder="Postcode" tabindex="7">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="input-group float-right margin-bottom">
                                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                    <input type="email" class="form-control copy-input required"
                                                        name="customer_email" id="customer_email"
                                                        placeholder="E-mail Address" aria-describedby="sizing-addon1"
                                                        tabindex="2">
                                                </div>
                                                <div class="">
                                                    <input type="text" class="form-control margin-bottom copy-input"
                                                        name="customer_address_2" id="customer_address_2"
                                                        placeholder="Address 2" tabindex="4">
                                                </div>
                                                <div class="">
                                                    <input type="text"
                                                        class="form-control margin-bottom copy-input required"
                                                        name="customer_county" id="customer_county" placeholder="Country"
                                                        tabindex="6">
                                                </div>
                                                <div class=" no-margin-bottom">
                                                    <input type="text" class="form-control required"
                                                        name="customer_phone" id="customer_phone"
                                                        placeholder="Phone Number" tabindex="8">
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
                                                        name="customer_town_ship" id="customer_town_ship"
                                                        placeholder="Town" tabindex="12">
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
                                                    class="fas fa-plus"></i></a> Product</h4>
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
                                <tr>
                                    <td>
                                        <div class="-sm d-flex align-items-center justify-content-around">
                                            <a href="#" class="btn btn-danger btn-xs delete-row"><i class="fas fa-times" aria-hidden="true"></i></a>
                                            <input type="text" class="form-control -sm item-input invoice_product" id="itemCodeInput" placeholder="Enter Product Item Code">
                                            
                                            <!-- Display the filtered products here -->
                                            <ul id="filteredProductList" class="list-group" style="position: absolute; z-index: 1000;"></ul>
                                        </div>
                                        
                                    </td>
                                    <td class="text-right">
                                        <div class=" -sm no-margin-bottom">
                                            <input type="number"
                                                class="form-control calculate-sub invoice_product_qty calculate"
                                                name="invoice_product_qty[]" value="1">
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="input-group input-group-sm no-margin-bottom">
                                            <span class="input-group-addon" id="currencySymbol">$</span>
                                            <input type="number"
                                                class="form-control calculate-sub invoice_product_price required"
                                                name="invoice_product_price[]" aria-describedby="sizing-addon1"
                                                placeholder="0.00">
                                        </div>
                                    </td>

                                    <td class="text-right">
                                        <div class=" -sm d-flex align-items-center justify-content-around">
                                            <a href="#" class="btn btn-danger btn-xs delete-row"><i class="fas fa-times" aria-hidden="true"></i></a>
                                            <input type="text" class="form-control -sm item-input invoice_product" name="invoice_product[]" placeholder="Enter Product Item Code">
                                            <select id="productSuggestionsSelect" class="form-control"></select>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="currencySymbol">$</span>
                                            <input type="text" class="form-control calculate-sub"
                                                name="invoice_product_sub[]" id="invoice_product_sub" value="0.00"
                                                aria-describedby="sizing-addon1" disabled>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="invoice_totals" class="padding-right row text-right">
                            <div class="col-xs-6">
                                <div class="input-group -sm textarea no-margin-bottom">
                                    <textarea class="form-control" name="invoice_notes" placeholder="Additional Notes..."></textarea>
                                </div>


                            </div>


                            <div class="col-xs-6 no-padding-right">
                                <div class="row">
                                    <div class="col-xs-4 col-xs-offset-5">
                                        <strong>Sub Total:</strong>
                                    </div>
                                    <div class="col-xs-3">
                                        <span id="currencySymbol"></span><span class="invoice-sub-total">0.00</span>
                                        <input type="hidden" name="invoice_subtotal" id="invoice_subtotal">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 col-xs-offset-5">
                                        <strong>Discount:</strong>
                                    </div>
                                    <div class="col-xs-3">
                                        <span id="currencySymbol"></span><span class="invoice-discount">0.00</span>
                                        <input type="hidden" name="invoice_discount" id="invoice_discount">
                                    </div>
                                </div>
                                {{-- <div class="row">
				<div class="col-xs-4 col-xs-offset-5">
					<strong class="shipping">Shipping:</strong>
				</div>
				<div class="col-xs-3">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" id="currencySymbol">$</span>
                        <input type="text" class="form-control calculate shipping" name="invoice_shipping" aria-describedby="sizing-addon1" placeholder="0.00">
                    </div>
                </div>
			</div> --}}
                                @if (config('constants.ENABLE_VAT') == true)
                                    <div class="row">
                                        <div class="col-xs-4 col-xs-offset-5">
                                            <strong>TAX/VAT:</strong><br>Remove TAX/VAT <input type="checkbox"
                                                class="remove_vat">
                                        </div>
                                        <div class="col-xs-3">
                                            <span id="vatSymbol"></span><span class="invoice-vat"
                                                data-enable-vat="{{ config('constants.ENABLE_VAT') }}"
                                                data-vat-rate="{{ config('constants.VAT_RATE') }}"
                                                data-vat-method="{{ config('constants.VAT_INCLUDED') }}">0.00</span>

                                            <input type="hidden" name="invoice_vat" id="invoice_vat">
                                        </div>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-xs-4 col-xs-offset-5">
                                        <strong>Total:</strong>
                                    </div>
                                    <div class="col-xs-3">
                                        <span id="totalSymbol"></span><span class="invoice-total">0.00</span>
                                        <input type="hidden" name="invoice_total" id="invoice_total">
                                    </div>
                                </div>


                                <div class="col-xs-6 margin-top btn-group">
                                    <input type="submit" id="action_create_invoice" class="btn btn-success float-right"
                                        value="Create Invoice" data-loading-text="Creating...">
                                </div>


                            </div>
                            <div class="row">

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

            // Append the new row to the table
            $('#invoice_table tbody').append(newRow);
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
    });
</script> 

<script>
    function getInvoiceId() {
        // Make an AJAX request to the server-side script
        $.ajax({
            url: 'path/to/your/server-side-script.php', // Replace with the actual path
            method: 'GET',
            success: function(data) {
                // Handle the response from the server
                console.log('Next Invoice ID:', data);
                // You can update your HTML element with the received invoice ID
                $('#invoice_id').val(data);
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
            }
        });
    }

    // Call the function to get the next invoice ID
    getInvoiceId();
</script>
<script>
    // Define the invoice prefix
    var invoicePrefix = 'MD';

    // Set the value of the invoice prefix span
    document.getElementById('invoicePrefixSpan').textContent = '#' + invoicePrefix;
</script>
 <script>
    // Define the currency symbol using JavaScript
    var currencySymbol = '$';

    // Set the currency symbol to the element with id "currencySymbol"
    document.getElementById('currencySymbol').innerText = currencySymbol;
</script> 
<script>
    // Define the currency symbol using JavaScript
    var currencySymbol = '$';

    // Set the currency symbol to the elements with id "vatSymbol" and "totalSymbol"
    document.getElementById('vatSymbol').innerText = currencySymbol;
    document.getElementById('totalSymbol').innerText = currencySymbol;
</script>


<script>
    $(document).ready(function() {
        // Fetch product list and populate the dropdown
        fetchProductList();

        function fetchProductList() {
            $.ajax({
                url: '/get-products', // Adjust the route to your Laravel route
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    populateProductDropdown(data);
                },
                error: function(error) {
                    console.error('Error fetching product list:', error);
                }
            });
        }

        function populateProductDropdown(products) {
            var selectHtml = '<select class="form-control item-select">';
            $.each(products, function(index, product) {
                selectHtml += '<option value="' + product.product_price + '">' + product.product_name +
                    ' - ' + product.product_desc + '</option>';
            });
            selectHtml += '</select>';

            $('#productListPlaceholder').html(selectHtml);
        }
    });
</script> 

<script>
    $(document).ready(function () {
        $('#paymentType, #existingCustomer').on('change', function () {
            var customerId = $(this).val();

            if (customerId) {
                // Make an AJAX request to fetch customer details
                $.ajax({
                    url: "{{ route('invoice.getCustomerDetails', ['customer' => '__customerId__']) }}".replace('__customerId__', customerId),
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        // Update all input fields with customer details
                        updateAllCustomerFields(data);
                    },
                    error: function (error) {
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
<script>
  $(document).ready(function () {
    // Select element to display product suggestions
    var productSuggestionsSelect = $('#productSuggestionsSelect');

    $('.invoice_product').on('input', function () {
        var searchText = $(this).val();

        if (searchText) {
            $.ajax({
                url: "{{ route('product.search') }}",
                type: 'GET',
                data: { searchText: searchText },
                dataType: 'json',
                success: function (data) {
                    // Clear previous options
                    productSuggestionsSelect.empty();

                    if (data.length > 0) {
                        // Append product names to the select dropdown
                        data.forEach(function (product) {
                            // Create an option for each product suggestion
                            var option = $('<option value="' + product.id + '">' + product.item + '</option>');

                            // Append the option to the select
                            productSuggestionsSelect.append(option);
                        });
                    } else {
                        // Add a default option for no results
                        productSuggestionsSelect.append('<option value="">No products found</option>');
                    }
                },
                error: function (error) {
                    console.error('Error fetching product names:', error);
                }
            });
        } else {
            // Clear suggestions when the input is empty
            productSuggestionsSelect.empty();
        }
    });
});

</script>





@push('js')
    <script src="{{ asset('inv/js/app.js') }}"></script>
    <script src="{{ asset('inv/js/app.min.js') }}"></script>
    <script src="{{ asset('inv/js/bootstrap.datetime.js') }}"></script>
    <script src="{{ asset('inv/js/scripts.js') }}"></script>
    <script src="{{ asset('inv/js/npm.js') }}"></script>
    <script src="{{ asset('inv/js/moment.js') }}"></script>
    <script src="{{ asset('inv/js/bootstrap.password.js') }}"></script>
    <script src="{{ asset('inv/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('inv/js/bootstrap.js') }}"></script>
@endpush
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Order</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'>
    </script>
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js'
        integrity='sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p' crossorigin='anonymous'>
    </script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js'
        integrity='sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF' crossorigin='anonymous'>
    </script>
    <script src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js'></script>
    <script src='http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js' type='text/javascript'></script>
</head>

<body>
    <div class="container">
        <form id='form' name='form'>
            <div class='row'>
                <div class='col-lg-7'>
                    <h3 class='text-upcase'>Billing Details</h3>
                    <div class='row'>
                        <div class='col-lg-6'>
                            <label for='firstNameInput' class='form-label'>First Name *</label>
                            <input type='text' class='form-control' id='firstNameInput' name='first_name'
                                value='{{ $first_name }}' readonly>
                        </div>
                        <div class='col-lg-6'>
                            <label for='lastNameInput' class='form-label'>Last Name *</label>
                            <input type='text' class='form-control' id='lastNameInput' name='last_name'
                                value='{{ $last_name }}' readonly>
                        </div>
                    </div>

                    <label for='companyInput' class='form-label'>Company Name (Optional)</label>
                    <input type='text' class='form-control' id='companyInput' name='company_name'
                        value='{{ $company_name }}' readonly>

                    <label for='countrySelect' class='form-label'>Country / Region *</label>
                    <input class='form-select form-control' aria-label='Default select example' id='countrySelect'
                        name='country' readonly value='{{ $country }}'>

                    <label for='streetInput' class='form-label'>Street Address *</label>
                    <input type='text' class='form-control' id='streetInput'
                        placeholder='House number and street name' name='address' value='{{ $address }}' readonly>

                    <input type='text' class='form-control' name='address2'
                        placeholder='Apartment, suite, unit, etc. (optional)' value='{{ $address2 }}' readonly>

                    <div class='row'>
                        <div class='col-lg-6'>
                            <label for='townInput' class='form-label'>Town / City *</label>
                            <input type='text' class='form-control' id='townInput' name='town'
                                value='{{ $town }}' readonly>
                        </div>
                        <div class='col-lg-6'>
                            <label for='stateInput' class='form-label'>State *</label>
                            <input type='text' class='form-control' id='stateInput' name='state'
                                value='{{ $state }}' readonly>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-6'>
                            <label for='zipInput' class='form-label'>Zip *</label>
                            <input type='text' class='form-control' id='zipInput' name='zip'
                                value='{{ $zip }}' readonly>
                        </div>
                        <div class='col-lg-6'>
                            <label for='phoneInput' class='form-label'>Phone *</label>
                            <input type='text' class='form-control' id='phoneInput' name='phone'
                                value='{{ $phone }}' readonly>
                        </div>
                    </div>

                    <label for='emaillInput' class='form-label'>Email Address *</label>
                    <input type='text' class='form-control' id='emaillInput' name='email'
                        value='{{ $email }}' readonly>

                    <label for='zipInput' class='form-label'>Order Notes (Optional)</label>
                    <textarea class='form-control pb-2 pt-2 mb-0' cols='30' rows='5'
                        placeholder='Notes about your order, e.g. special notes for delivery' style='width: 700px; height: 125px;'
                        name='order_note' readonly>{{ $order_note }}</textarea>
                </div>

                <div class='col-lg-5'>
                    <div style='padding: 25px 30px 30px; border: 1px solid #eee;'>
                        <h3 style='padding-bottom: 22px; margin-bottom: 19px; border-bottom: 1px #eee solid;'>Your
                            Order
                        </h3>
                        <table class='oder-table'>
                            <thead>
                                <tr>
                                    <th>
                                        <h4>Product</h4>
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class='product-name'>Fashionable Overnight Bag <span
                                            class='product-quantity'>×&nbsp;1</span></td>
                                    <td class='total-product'>$110.00</td>
                                </tr>
                                <tr>
                                    <td class='product-name'>Mackintosh Poket backpack <span
                                            class='product-quantity'>×&nbsp;1</span></td>
                                    <td class='total-product'>$180.00</td>
                                </tr>
                                <tr class='item-border'>
                                    <td>
                                        <h4 class='title'>Subtotal</h4>
                                    </td>
                                    <td class='total-product'>$290.00</td>
                                </tr>

                                <tr class='item-border'>
                                    <td>
                                        <h4 class='title'>Calculate Shipping</h4>
                                        <div class='form-check'>
                                            <input class='form-check-input' type='radio' name='cal_shipping'
                                                id='flatRateBtn' value='0' checked>
                                            <label class='form-check-label'
                                                for='flatRateBtn'>{{ $cal_shipping }}</label>
                                        </div>
                                        {{-- 
                                                    0 Flat rate
                                                    1 Free shipping
                                                    2 Local pickup 
                                                --}}
                                    </td>
                                </tr>
                                <tr class='item-border'>
                                    <td>
                                        <h4 class='title'>Total</h4>
                                    </td>
                                    <td>$290.00</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class='item-border'>
                            <h4 class='title'>Payment Methods</h4>
                            <div class='form-check'>
                                <input class='form-check-input' type='radio' name='payment_method'
                                    id='checkPayment' value='0' checked>
                                <label class='form-check-label' for='checkPayment'>{{$payment_method}}</label>
                            </div>
                                    {{--0 Check payments
                                    1 Cash on delivery --}}
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Checkout</title>
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
    <script src='http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js' type='text/javascript'>
    </script>
    <style>
    .form-control {
        /* margin-top: 10px; */
        margin-bottom: 10px;
    }

    .container {
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .oder-table {
        width: 100%;
    }

    td {
        line-height: 200%;
    }

    .title {
        padding: 20px 0;
        /* border-bottom: 1px solid #eee; */
    }

    .form-check {
        margin-bottom: 8px;
    }

    .btn-submit {
        width: 100%;
        border-color: #333;
        background-color: #333;
    }

    .btn-submit:hover {
        background-color: #333;
        border-color: #333;
    }

    .item-border {
        border-top: 1px solid #eee;
    }
    </style>
</head>

<body>
    <div class='container'>
        <form id='form' name='form'>
            @csrf
            <div class='row'>
                <div class='col-lg-7'>
                    <h3 class='text-upcase'>Billing Details</h3>
                    <div class='row'>
                        <div class='col-lg-6'>
                            <label for='firstNameInput' class='form-label'>First Name *</label>
                            <input type='text' class='form-control' id='firstNameInput' name='firstName'>
                        </div>
                        <div class='col-lg-6'>
                            <label for='lastNameInput' class='form-label'>Last Name *</label>
                            <input type='text' class='form-control' id='lastNameInput' name='lastName'>
                        </div>
                    </div>

                    <label for='companyInput' class='form-label'>Company Name (Optional)</label>
                    <input type='text' class='form-control' id='companyInput' name='companyName'>

                    <label for='countrySelect' class='form-label'>Country / Region *</label>
                    <select class='form-select form-control' aria-label='Default select example' id='countrySelect' name='country'>
                        <option selected value='us'>United States (US)</option>
                        <option value='uk'> United Kingdom</option>
                        <option value='fr'>France</option>
                        <option value='aus'>Austria</option>
                    </select>

                    <label for='streetInput' class='form-label'>Street Address *</label>
                    <input type='text' class='form-control' id='streetInput' placeholder='House number and street name' name='address'>

                    <input type='text' class='form-control' name='address2'
                        placeholder='Apartment, suite, unit, etc. (optional)'>

                    <div class='row'>
                        <div class='col-lg-6'>
                            <label for='townInput' class='form-label'>Town / City *</label>
                            <input type='text' class='form-control' id='townInput' name='town'>
                        </div>
                        <div class='col-lg-6'>
                            <label for='stateInput' class='form-label'>State *</label>
                            <input type='text' class='form-control' id='stateInput' name='state'>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-6'>
                            <label for='zipInput' class='form-label'>Zip *</label>
                            <input type='text' class='form-control' id='zipInput' name='zip'>
                        </div>
                        <div class='col-lg-6'>
                            <label for='phoneInput' class='form-label'>Phone *</label>
                            <input type='text' class='form-control' id='phoneInput' name='phone'>
                        </div>
                    </div>

                    <label for='emaillInput' class='form-label'>Email Address *</label>
                    <input type='text' class='form-control' id='emaillInput' name='email'>

                    <div>
                        <input type='checkbox' class='form-check-input' id='createAccountCheckbox' name='chBoxCreateAccount'>
                        <label class='form-check-label' for='createAccountCheckbox'>Create an account?</label>
                    </div>

                    <div>
                        <input type='checkbox' class='form-check-input' id='shipToAddCheckbox' name='chBoxShipToAddress'>
                        <label class='form-check-label' for='shipToAddCheckbox'>Ship to a different address?</label>
                    </div>

                    <h3 class='text-uppercase'>Additional Information</h3>
                    <label for='zipInput' class='form-label'>Order Notes (Optional)</label>
                    <textarea class='form-control pb-2 pt-2 mb-0' cols='30' rows='5'
                        placeholder='Notes about your order, e.g. special notes for delivery'
                        style='width: 700px; height: 125px;' name='oderNote'></textarea>
                </div>
                
                <div class='col-lg-5'>
                    <div style='padding: 25px 30px 30px; border: 1px solid #eee;'>
                        <h3 style='padding-bottom: 22px; margin-bottom: 19px; border-bottom: 1px #eee solid;'>Your Order
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
                                            <input class='form-check-input' type='radio' name='shipping'
                                                id='flatRateBtn' value='Flat rate'>
                                            <label class='form-check-label' for='flatRateBtn'>Flat rate</label>
                                        </div>
                                        <div class='form-check'>
                                            <input class='form-check-input' type='radio' name='shipping'
                                                id='freeShipBtn' checked value='Free shipping'>
                                            <label class='form-check-label' for='freeShipBtn'>
                                                Free shipping
                                            </label>
                                        </div>
                                        <div class='form-check'>
                                            <input class='form-check-input' type='radio' name='shipping'
                                                id='localPickupBtn' checked value='Local pickup'>
                                            <label class='form-check-label' for='localPickupBtn'>
                                                Local pickup
                                            </label>
                                        </div>
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
                                <input class='form-check-input' type='radio' name='paymentMethod' id='checkPayment' value='Check payments'>
                                <label class='form-check-label' for='checkPayment'>Check payments</label>
                            </div>
                            <div class='form-check'>
                                <label class='form-check-label'>Please send a check to Store Name, Store Street,
                                    Store Town, Store State / County, Store Postcode.
                                </label>
                            </div>
                            <div class='form-check'>
                                <input class='form-check-input' type='radio' name='paymentMethod' id='cashOnDel'
                                    checked value='Cash on delivery'>
                                <label class='form-check-label' for='cashOnDel'>
                                    Cash on delivery
                                </label>
                            </div>
                        </div>

                        <div class='item-border title'>
                            <input type='checkbox' class='form-check-input' id='lastConfirmChBox'>
                            <label class='form-check-label' for='lastConfirmChBox'>I have read and agree to the
                                website
                                terms and conditions</label>
                        </div>
                        <button type='submit' class='btn btn-primary btn-submit'>Place Oder</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $().ready(function() {
            $('#form').validate({
                submitHandler: function(form) {
                    submitForm()
                }
            });
        })
        function submitForm() {
            // var token =  $('input[name="_token"]').attr('value')
            // $.ajaxSetup({
            //     beforeSend: function(xhr) {
            //         xhr.setRequestHeader('Csrf-Token', token);
            //     }
            // });
            var queryString = $('#form').serialize();
            $.ajax({
                url: 'res_checkout',
                data : queryString,
                method: 'POST',
                success: function(res) {
                    alert(res)
                },
                error: function (res) {
                    alert(res)
                }
            })
        }
    </script>

</body>

</html>

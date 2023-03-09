<div class='row'>
        <div class='col-lg-7'>
            <h3 class='text-upcase'>Billing Details</h3>
            <div class='row'>
                <div class='col-lg-6'>
                    <label for='firstNameInput' class='form-label'>First Name *</label>
                    <input type='text' class='form-control' id='firstNameInput' name='first_name'>
                </div>
                <div class='col-lg-6'>
                    <label for='lastNameInput' class='form-label'>Last Name *</label>
                    <input type='text' class='form-control' id='lastNameInput' name='last_name'>
                </div>
            </div>

            <label for='companyInput' class='form-label'>Company Name (Optional)</label>
            <input type='text' class='form-control' id='companyInput' name='company_name'>

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
                <input type='checkbox' class='form-check-input' id='createAccountCheckbox' name='create_account'>
                <label class='form-check-label' for='createAccountCheckbox'>Create an account?</label>
            </div>

            <div>
                <input type='checkbox' class='form-check-input' id='shipToAddCheckbox' name='ship_to_address'>
                <label class='form-check-label' for='shipToAddCheckbox'>Ship to a different address?</label>
            </div>

            <h3 class='text-uppercase'>Additional Information</h3>
            <label for='zipInput' class='form-label'>Order Notes (Optional)</label>
            <textarea class='form-control pb-2 pt-2 mb-0' cols='30' rows='5'
                placeholder='Notes about your order, e.g. special notes for delivery'
                style='width: 700px; height: 125px;' name='order_note'></textarea>
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
                                    <input class='form-check-input' type='radio' name='cal_shipping'
                                        id='flatRateBtn' value='0'>
                                    <label class='form-check-label' for='flatRateBtn'>Flat rate</label>
                                </div>
                                <div class='form-check'>
                                    <input class='form-check-input' type='radio' name='cal_shipping'
                                        id='freeShipBtn' checked value='1'>
                                    <label class='form-check-label' for='freeShipBtn'>
                                        Free shipping
                                    </label>
                                </div>
                                <div class='form-check'>
                                    <input class='form-check-input' type='radio' name='cal_shipping'
                                        id='localPickupBtn' checked value='2'>
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
                        <input class='form-check-input' type='radio' name='payment_method' id='checkPayment' value='0'>
                        <label class='form-check-label' for='checkPayment'>Check payments</label>
                    </div>
                    <div class='form-check'>
                        <label class='form-check-label'>Please send a check to Store Name, Store Street,
                            Store Town, Store State / County, Store Postcode.
                        </label>
                    </div>
                    <div class='form-check'>
                        <input class='form-check-input' type='radio' name='payment_method' id='cashOnDel'
                            checked value='1'>
                        <label class='form-check-label' for='cashOnDel'>
                            Cash on delivery
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
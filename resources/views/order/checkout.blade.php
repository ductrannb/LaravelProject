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
    <script src='http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js' type='text/javascript'></script>
    <style>
        .container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        td {
            line-height: 200%;
        }

        .title {
            padding: 20px 0;
        }

        .alert {
            position: fixed;
            display: none;
        }

        .alert-primary {
            background-color: green;
            color: white;
        }
        .oder-table {
            width: 100%;
        }

        .form-control {
            /* margin-top: 10px; */
            margin-bottom: 10px;
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
        <div class="alert" id='alert' role="alert">
        </div>
        <form id='form' name='form'>
            @csrf
            @include('order.order_form_body')
            <div class='item-border title'>
                <input type='checkbox' class='form-check-input' id='lastConfirmChBox' name='last_confirm'>
                <label class='form-check-label' for='lastConfirmChBox'>I have read and agree to the
                    website
                    terms and conditions</label>
            </div>
            <button type='submit' class='btn btn-primary btn-submit'>Place Oder</button>
        </form>
    </div>

    <script>
        $().ready(function() {
            $('#form').validate({
                rules: {
                    "first_name": {
                        required: true
                    },
                    "last_name": {
                        required: true
                    },
                    "country": {
                        required: true
                    },
                    "address": {
                        required: true
                    },
                    "town": {
                        required: true
                    },
                    "state": {
                        required: true
                    },
                    "zip": {
                        required: true
                    },
                    "phone": {
                        required: true
                    },
                    "email": {
                        required: true
                    }
                },
                submitHandler: function(form) {
                    submitForm()
                }
            });
        })

        function submitForm() {
            var queryString = $('#form').serialize();
            $.ajax({
                url: 'checkout',
                data: queryString,
                dataType: 'json',
                method: 'POST',
                success: function(res) {
                    showMessage(res.success, res.message)
                },
                error: function(res) {
                    showMessage(res.success, res.message)
                }
            })
        }

        function showMessage(success, message) {
            var alert = document.getElementById('alert')
            if (success) {
                alert.classList.add('alert-primary')
            } else {
                alert.classList.add('alert-danger')
            }
            alert.innerHTML = message
            alert.style.display = "block"
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 2000);
        }
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Orders</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'>
    </script>
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js'
        integrity='sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p' crossorigin='anonymous'>
    </script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js'
        integrity='sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF' crossorigin='anonymous'>
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js'></script>
    <script src='http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js' type='text/javascript'></script>
    <style>
        /* .modal {
            width: 100vw;
        } */
    </style>
</head>

<body>
    <div class='container'>
        {{-- @include('order.modal') --}}
        <table class='table table-hover' id="table-orders">
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Full Name</th>
                    <th scope='col'>Company</th>
                    <th scope='col'>Phone</th>
                    <th scope='col'>Email</th>
                    <th scope='col'>Detail</th>
                    <th scope='col'>Edit</th>
                    <th scope='col'>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                use App\Http\Controllers\PaymentController;
                $ctrl = new PaymentController();
                $orders = $ctrl->getOrders();
                ?>
                @foreach ($orders as $order)
                    <tr>
                        <th scope='row'>{{ $order->id }}</th>
                        <td>{{ $order->first_name . ' ' . $order->last_name }}</td>
                        <td>{{ $order->company_name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->email }}</td>
                        <td><i type='button' data-bs-toggle="modal-dialog" data-bs-target="#exampleModal"
                                class="fa-regular fa-eye" onclick="viewOrder({{ $order->id }})"></i></td>
                        <td><i type='button' class="fa-regular fa-pen-to-square"
                                onclick="editOrder({{ $order->id }})"></i></td>
                        <td><i type='button' class="fa-regular fa-trash-can"
                                onclick="deleteOrder({{ $order->id }})"></i></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function refreshTable() {
            // var table = $('#table-orders').DataTable();
            $('#table-orders').load("orders", "#table-orders");
        }

        function viewOrder(_id) {

        }

        function editOrder(_id) {
            // alert('edit')
        }

        function deleteOrder(_id) {
            $.ajax({
                url: '/delete_order',
                method: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: _id
                },
                dataType: 'json',
                success: function(result) {
                    alert(result.message)
                },
                error: function(result) {
                    alert(result.message)
                }
            })
            refreshTable()
        }
    </script>
</body>

</html>

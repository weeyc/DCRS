<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Customer Repair Status List</title>
    @include('layouts.bootstrap')
    <title>Rider Accepted Pick up Page</title>
</head>
<style>
        h2{
            margin-top: 100px;
            text-align: center;
        }
    </style>
</head>
<body>
    @include('layouts.riderNavBar')
    <div class="container">
        <h2>Your order</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                <th>No</th>
					<th scope="col">Customer Name</th>
					<th scope="col">Customer Address</th>
					<th scope="col">Customer Phone</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Delivery Status</th>
					<th scope="col">Action</th>  
                </tr>
            </thead>
            <tbody>
            @php ($i=0)
            @foreach ($data as $row)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$row->cust_name}}</td>
                    <td>{{$row->cust_address}}</td>
                    <td>{{$row->cust_phone}}</td>
                    <td>{{$row->product_name}}</td>
                    <td>{{$row->delivery_status}}</td>
                    <td><a class="btn btn-primary" href="{{url('/UpdateDeliveryService',$row->request_id)}}">Update</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
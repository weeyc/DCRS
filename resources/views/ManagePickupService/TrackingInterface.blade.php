<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @include('layouts.bootstrap')
    <title>Customer Tracking Page</title>
</head>
<style>
        h2{
            margin-top: 100px;
            text-align: center;
        }
    </style>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
</head>
<body>
    @include('layouts.navbar')
    <div class="container">
        <h2>Track Your barang</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                <th>No</th>
					<th scope="col">Product Name</th>
					<th scope="col">Customer Address</th>
					<th scope="col">pickup_date</th>
                    <th scope="col">Delivery status</th>
					<th scope="col">Repair Status</th>
					<th scope="col">Action Receive</th>
                </tr>
            </thead>
            <tbody>
            @php ($i=0)
            @foreach ($data as $row)
                <tr>
                    <td>{{++$i}}<input type="hidden" value="{{$row->request_id}}" name="request_id"></td>
                    <td>{{$row->product_name}}</td>
                    <td>{{$row->pickup_address}}
                    <td>{{$row->pickup_date}}</td>
                    <td>{{$row->delivery_status}}</td>
                    <td>{{$row->repair_status}}</td>
                    <td><a class="btn btn-primary" href="{{url('/TrackingInterface',$row->request_id)}}">Receive</a></td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

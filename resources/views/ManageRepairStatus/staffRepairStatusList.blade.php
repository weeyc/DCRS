<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Staff Repair Status List</title>
    @include('layouts.bootstrap')
    <style>
        h2{
            margin-top: 100px;
            text-align: center;
        }
    </style>
</head>
<body>
    @include('layouts.staffNavbar')
    <div class="container">
        <h2>Service List</h2>
        <table class="table table-bordered">
            <caption>List of services</caption>
            <thead class="thead-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Status</th>
                <th scope="col">Reason</th>
                <th scope="col">Price (RM)</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @php ($i=1)
            @foreach ($data as $row)
                <tr>
                    <td>{{$i}}<input type="hidden" value="{{$row->request_id}}" name="request_id"></td>
                    <td>{{$row->cust_name}}</td>
                    <td>{{$row->product_name}}</td>
                    <td>{{$row->repair_status}}</td>
                    <td>{{$row->reason}}</td>
                    <td>{{$row->cost}}</td>
                    <td><a href="{{url('/updateStatusForm',$row->request_id)}}" class="btn btn-primary">Update Status</a></td>
                </tr>
                <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
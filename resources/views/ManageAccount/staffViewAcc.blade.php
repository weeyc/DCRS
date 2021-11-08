<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Manage Account</title>
    @include('layouts.bootstrap')
    <style>
        h2{
            margin-top: 100px;
            text-align: center;
        }
    </style>
</head>
<body>
    @include('layouts.staffNavBar')
    <div class="container">
        <h2>Customer Account</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Email Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Status</th>
                <th scope="col-px-md-5">Action</th>
                </tr>
            </thead>
            <tbody>
            @php ($i=1)
            @foreach($cust as $customer) 
                <tr>
                    <td>{{$customer->cust_name}}</td>
                    <td>{{$customer->cust_email}}</td>
                    <td>{{$customer->cust_phone}}</td>
                    <td>{{$customer->cust_address}}</td>
                    <td>{{$customer->cust_status}}</td>
                    <td><a href="/editStaffAcc/{{$customer->cust_id}}" class="btn btn-primary">Edit</a>
                    <a href="/deleteCustAcc/{{$customer->cust_id}}" class="btn btn-warning">Delete</a>
                    <a href="/banCustAcc/{{$customer->cust_id}}" class="btn btn-danger">Ban</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <span>
        {{$cust->links()}}
        </span>
    </div>
    
</body>
</html>
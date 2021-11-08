<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Rider Update Delivery Status </title>
    @include('layouts.bootstrap')
    <style>
        h2{
            margin-top: 100px;
            text-align: center;
        }
        .border-form{
            border:thin black solid;
            margin:20px;
            padding:20px;
        }
        .form-control{
            border: none;
            border-color: transparent;
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
    @include('layouts.RiderNavBar')
    <div class="container">
        <h2>Update Delivery Status Form</h2>
       
        @foreach ($data as $row)
        <form class="border-form" action="/UpdateDeliveryService/{{$row->request_id}}" method="post">    
        @csrf
            <div class="form-group form-inline">
                <label class="control-label col-lg-3" for="">Customer Name</label>
                <input type="text" class="form-control col-lg-6" value="{{$row->cust_name}}" name="customer_name" readonly>
            </div>
            <div class="form-group form-inline">
                <label class="control-label col-lg-3" for="">Customer Phone</label>
                <input type="text" class="form-control col-lg-6" value="{{$row->cust_phone}}" name="customer_phone" readonly>
            </div>
            <div class="form-group form-inline">
                <label class="control-label col-lg-3" for="">Product Name</label>
                <input type="text" class="form-control col-lg-6" value="{{$row->product_name}}" name="product_name"  readonly>
            </div>
            <div class="form-group form-inline">
                <label class="control-label col-lg-3" for="">pickup address</label>
                <input type="text" class="form-control col-lg-6" value="{{$row->pickup_address}}" name="pickup_address"  readonly>
            </div>
            <div class="form-group form-inline">
                <label class="control-label col-lg-3" for="">Delivery Address</label>
                <input type="text" class="form-control col-lg-6" value="{{$row->delivery_address}}" name="delivery_address" readonly>
            </div>
            <div class="form-group form-inline">
                <label class="control-label col-lg-3" for="">Delivery Status</label>
                <input type="text" class="form-control col-lg-6" value="{{$row->delivery_status}}" name="delivery_status">
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-success col-lg-1">Update</button>
            </div>
        </form>
        @endforeach
       
    </div>
</body>
</html>
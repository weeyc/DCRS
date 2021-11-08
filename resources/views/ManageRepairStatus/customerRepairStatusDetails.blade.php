<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Customer Repair Status Details</title>
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
</head>
<body>
    @include('layouts.navbar')
    <div class="container">
        <h2>Service Details</h2>
        @foreach ($data as $row)
        <form class="border-form" action="">    
            <div class="form-group form-inline">
                <label class="control-label col-lg-3" for="">Product Name</label>
                <input type="text" class="form-control col-lg-6" value="{{$row->product_name}}" name="product_name" readonly>
            </div>
            <div class="form-group form-inline">
                <label class="control-label col-lg-3" for="">Date</label>
                <input type="text" class="form-control col-lg-6" value="{{$row->pickup_date}}" name="pickup_date" readonly>
            </div>
            <div class="form-group form-inline">
                <label class="control-label col-lg-3" for="">Pickup Address</label>
                <input type="text" class="form-control col-lg-6" value="{{$row->pickup_address}}" name="pickup_address" readonly>
            </div>
            <div class="form-group form-inline">
                <label class="control-label col-lg-3" for="">Delivery Address</label>
                <input type="text" class="form-control col-lg-6" value="{{$row->delivery_address}}" name="delivery_address" readonly>
            </div>
            <div class="form-group form-inline">
                <label class="control-label col-lg-3" for="">Status</label>
                <input type="text" class="form-control col-lg-6" value="{{$row->repair_status}}" name="repair_status" readonly>
            </div>
            <div class="form-group form-inline">
            <label class="control-label col-lg-3" for="">Reason</label>
                <input type="text" class="form-control col-lg-6" value="{{$row->reason}}" name="reason" readonly>
            </div>
            <div class="form-group form-inline">
            <label class="control-label col-lg-3" for="">Cost (RM)</label>
                <input type="number" class="form-control col-lg-6" value="{{$row->cost}}" name="cost" readonly>
            </div>
        </form>
        @endforeach
        <div class="text-center">
            <a href="/customerRepairStatusList" class="btn btn-success col-lg-1">Confirm</a>
        </div>
    </div>
</body>
</html>
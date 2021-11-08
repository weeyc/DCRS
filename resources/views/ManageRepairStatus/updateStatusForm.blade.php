<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Update Status Form</title>
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
    @include('layouts.staffNavbar')
    <div class="container">
        <h2>Update Status Form</h2>
        @foreach ($data as $row)
        <form class="border-form" action="/updateStatusForm/{{$row->request_id}}" method="post">
        @csrf
            <div class="form-group form-inline">
                <label class="control-label col-lg-3" for="">Customer Name</label>
                    <input type="text" class="form-control col-lg-6" value="{{$row->cust_name}}" name="cust_name" readonly>
            </div>
            <div class="form-group form-inline">
            <label class="control-label col-lg-3" for="">Product Name</label>
                <input type="text" class="form-control col-lg-6" value="{{$row->product_name}}" name="product_name" readonly>
            </div>
            <div class="form-group form-inline">
            <label class="control-label col-lg-3" for="">Repair Status</label>
            <input type="hidden" value="{{$row->repair_status}}" name="repair_status">
            <select name="repair_status" value="" class="custom-select col-lg-6" >
                <option disabled selected>-----------------------------Choose a status-----------------------------</option>
                <option value="On Progress">On Progress</option>
                <option value="Pending">Pending</option>
                <option value="Cannot be repaired">Cannot be repaired</option>
                <option value="Completed">Completed</option>
            </select>
            </div>
            <div class="form-group form-inline">
            <label class="control-label col-lg-3" for="">Reason</label>
                <input type="text" class="form-control col-lg-6" value="{{$row->reason}}" name="reason">
            </div>
            <div class="form-group form-inline">
            <label class="control-label col-lg-3" for="">Price (RM)</label>
                <input type="number" class="form-control col-lg-6" value="{{$row->cost}}" name="cost">
            </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success col-lg-1">Confirm</button>
            <a type="button" class="btn btn-danger col-lg-1" href="/staffRepairStatusList">Cancel</a>
        </div>
        </form>
        @endforeach
    </div>
</body>
</html>

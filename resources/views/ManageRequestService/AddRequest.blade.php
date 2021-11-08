<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Add Request</title>
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
</head>
<body>
@include('layouts.navbar')

<div class="container mx-auto">
  <div class="list-group list-group-horizontal" style="margin:25px;height:90%;">
  <a href="/AddRequest" class=" btn btn-primary list-group-item list-group-item-action active">Add Request</a>
  <a href="/ViewRequestStatus" class=" btn btn-primary list-group-item list-group-item-action">View Request Status</a>          
</div>
<form class="border-form" action="/AddRequest" method="post">
@csrf
              <div class="form-group">
                  <label class="control-label col-lg-3" for="ProductName">Product Name</label>
                  <input type="text" class="form-control col-lg-6" name="product_name" required>
              </div>
              <div class="form-group">
                  <label class="control-label col-lg-3" for="DamageInfo">Damage information</label>
                  <input type="text" class="form-control col-lg-6" name="dmg_info" required>
              </div>
              <div class="form-group">
              <label class="control-label col-lg-3" for="PickupAddress">Pickup address</label>
                  <input type="text" class="w-75 form-control col-lg-6" name="pickup_address" required>
              </div>
              <div class="form-group">
              <label class="control-label col-lg-3" for="DeliveryAddress">Delivery address</label>
                  <input type="text" class="w-75 form-control col-lg-6" name="delivery_address" required>
              </div>
              <div class="form-group">
              <label class="control-label col-lg-3" for="PickupTime">Pickup time</label>
                  <input type="time" class="form-control col-lg-6" name="pickup_time" required>
              </div>
              <div class="form-group">
              <label class="control-label col-lg-3" for="PickupDate">Pickup date</label>
                  <input type="date" class="form-control col-lg-6" name="pickup_date" required>
              </div>
              
              <div class="text-center">
              <button type="submit" class="btn btn-success col-lg-1">Submit</button>
              <button class="btn btn-danger col-lg-1">Cancel</button>
              </div>
</form>
</div>
</body>
</html>
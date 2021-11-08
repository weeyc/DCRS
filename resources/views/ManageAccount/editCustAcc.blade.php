<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Customer Profile</title>
    @include('layouts.bootstrap')
    <style>
        h2{
            text-align: center;
        }

        .labels {
            font-size: 18px
        }

    </style>
</head>
<body>
    @include('layouts.navbar')
    <form method="POST" action="/editCustAcc">
	@csrf
        <div class="container">
            <div class="row">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" name="cust_name" value="{{$cust->cust_name}}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">PhoneNumber</label><input type="text" class="form-control" name="cust_phone" value="{{$cust->cust_phone}}"></div>
                        <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" name="cust_address" value="{{$cust->cust_address}}"></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" name="cust_email" value="{{$cust->cust_email}}"></div>
                    </div>
                    <div class="mt-5 text-center"><button type="submit" class="btn btn-primary">Update</button>
                    </div>
            </div>
            </div>
        </div>
        
    </form>
</body>
</html>
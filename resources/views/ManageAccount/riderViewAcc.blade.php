<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Rider Profile</title>
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
    @include('layouts.riderNavBar')
        <div class="container">
            <div class="row">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" name="rider_name" value="{{$rider->rider_name}}" disabled></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">PhoneNumber</label><input type="text" class="form-control" name="rider_phone" value="{{$rider->rider_phone}}" disabled></div>
                        <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" name="rider_address" value="{{$rider->rider_address}}" disabled></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" name="rider_email" value="{{$rider->rider_email}}" disabled></div>
                    </div>
                    <div class="mt-5 text-center"><a href="/editRiderAcc" class="btn btn-primary">Edit</a>
                    </div>
            </div>
            </div>
        </div>
    </form>
</body>
</html>
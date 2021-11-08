<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Request List</title>
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
@include('layouts.staffNavBar')

<div class="container">
<h2>Request List</h2>
<table class="table table-bordered">
  <thead>
    <tr>
    <th>Product Name</th>
    <th>Damage Info</th>
    <th colspan="2">Action</th>
  </tr>
  </thead>

  @foreach($data as $row) 
  <tr>
                <td>{{$row->product_name}}</td>
                <td>{{$row->dmg_info}}</td>
                    <form method="post" action="{{ route('ManageRequestService.Approve') }}">
                    @csrf
                        <input type="hidden" name="request_id" value="{{ $row->request_id}}">
                <td><button type="submit" name="approve" class="btn btn-success">Approve</button></td>
                    </form>

                    <form method="post" action="{{ route('ManageRequestService.Reject') }}">
                    @csrf
                        <input type="hidden" name="request_id" value="{{ $row->request_id}}">
                <td><button type="submit" name="reject" class="btn btn-danger">Reject</button></td>
                    </form>
            </tr>
  @endforeach 

</table>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>View Request Status</title>
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
<div class="list-group list-group-horizontal" style="margin:25px;height:90%;">
<a href="/AddRequest" class=" btn btn-primary list-group-item list-group-item-action ">Add Request</a>
<a href="/ViewRequestStatus" class=" btn btn-primary list-group-item list-group-item-action active">View Request Status</a>                    
    
          </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Product Name</th>
                <th scope="col">Request Status</th>
                </tr>
            </thead>
            <tbody>

            <tr>
            @php ($i=1)
            @foreach($data as $row)
                <td>{{$i}}</td>
                <td>{{$row->product_name}}  </td>
                <td>{{$row->request_status}}</td>
                </tr>
                <?php $i++; ?>
                @endforeach 
        </table>
</div>
</body>
</html>

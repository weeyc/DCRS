<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Customer Manage Payment</title>
    @include('layouts.bootstrap')
    @include('layouts.navbar')

    <style>
        h2{
            margin-top: 50px;
            text-align: center;
        }
    </style>
</head>
<body>


    <div class="container">
        <h2><U>Manage Payment</u></h2>

        <br><br><h6><b>To Pay:</b></h6>


        <table  width=100% class = "w3-table-all w3-hoverable">
            <tr>
                <th>No.</th>
                <th>Request ID </th>
                <th>Device Name</th>
                <th>Repair Status</th>
                <th>Payment Status</th>
                <th>Total Cost</th>
                <th>Action</th>
            </tr>
            <?php  $count=1; ?>
            @if ($data['CountToPay'] > 0)
                @foreach($data['ToPay'] as $i)

                    <tr>
                        <td> {{ $count }}</td>
                        <td>{{ $i->request_id}}</td>
                        <td>{{ $i->product_name }}</td>
                        <td>{{ $i->repair_status }}</td>
                        <td>{{ $i->payment_status }}</td>
                        <td>RM {{ $i->cost }}</td>
                        <td> <button type="submit" name="upload" onclick="location.href='/checkout/request_id/{{ $i->request_id}}'" class = "w3-center w3-btn w3-teal w3-small w3-round-large";>Check Out</button></td>

                </tr>
                <?php $count++; ?>
                @endforeach
            @else

                        <td colspan =8> <div class="alert alert-info"> <p>You have no request to pay yet</p></div></td>
              @endif


        </table>

        <br><br><h6><b>To Upload Proof (COD):</b></h6>

        <table  width=100% class = "w3-table-all w3-hoverable">
            <tr>
                <th>No.</th>
                <th>Request ID </th>
                <th>Payment Cod ID </th>
                <th>Payment Status</th>
                <th>Total Cost</th>
                <th>Upload Proof</th>
                <th>Preview</th>

                <th>Action</th>
            </tr>
            @if ($data['CountCod'] > 0)
            <?php  $count=1; ?>
            @foreach($data['Cod'] as $i)
            <tr>
                <td> {{ $count }}</td>
                <td>{{ $i->request_id}}</td>
                <td>{{ $i->payment_id}}</td>
                <td>{{ $i->payment_status }}</td>
                <td>RM {{ $i->total_cost }}</td>
                <td>
                        <form method="POST" action="{{ route('ManagePayment.UploadProof') }}" enctype="multipart/form-data">
                            @csrf
                             <input type="file" name="file" onchange="previewFile(this)"/>
                             <input type="hidden" name="id" value="{{ $i->payment_id}}">
                </td>

                <td><img id="previewImg" alt="proof" style="max-width:130px;" /></td>
                <td> <button type="submit" name="upload" class = "w3-center w3-btn w3-teal w3-small w3-round-large"; >Upload</button> </td>
            </tr>
            <?php $count++; ?>
            @endforeach
            @else

            <td colspan=8> <div class="alert alert-info"> <p>You have dont have any Cash On delivery payment yet.</p></div></td>
         @endif
        </table>


        <script>

            function previewFile(input){
                var file = $("input[type=file]").get(0).files[0];
                if(file){
                    var reader = new FileReader();
                    reader.onload = function(){
                        $('#previewImg').attr("src",reader.result);

                    }
                    reader.readAsDataURL(file);

                }

            }

        </script>







    </div>
</body>
</html>

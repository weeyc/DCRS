<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Staff Manage Payment</title>
    @include('layouts.bootstrap')
    @include('layouts.staffNavBar')

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
        <br><br><h6><b>List of Customer Uploaded Proof for Approval (COD):</b></h6>

        <table  width=100% class = "w3-table-all w3-hoverable">
            <tr>
                <th>No.</th>
                <th>Request ID </th>
                <th>Payment ID</th>
                <th>Payment Status</th>
                <th>Total Cost</th>
                <th>Uploaded Proof</th>
                <th colspan="2"><center>Action</center></th>
            </tr>
            <?php  $count=1; ?>

            @foreach($photos as $i)

             <tr>
                <td>{{ $count }}</td>
                <td>{{ $i->request_id}}</td>
                <td>{{ $i->payment_id}}</td>
                <td>{{ $i->payment_status}}</td>
                <td>RM {{ $i->total_cost}}</td>

                <td><a href="{{ asset('Images/ManagePayment/Proofs')}}/{{$i->proof_of_payment  }}" target="_blank">
                    <img src="{{ asset('Images/ManagePayment/Proofs')}}/{{$i->proof_of_payment  }}" style="max-width:130px; max-height:85px;"> </a></td>

                        <form method="POST" action="{{ route('ManagePayment.Approve') }}">
                        @csrf
                        <input type="hidden" name="payment_id" value="{{ $i->payment_id}}">
                        <input type="hidden" name="request_id" value="{{ $i->request_id}}">
                <td>        <button type="submit" name="approve" class = "w3-center w3-btn w3-teal w3-large w3-round-large "; >Approve</button> </td>
                     </form>

                     <form method="POST" action="{{ route('ManagePayment.Reject') }}">
                        @csrf
                        <input type="hidden" name="payment_id" value="{{ $i->payment_id}}">
                        <input type="hidden" name="request_id" value="{{ $i->request_id}}">
                <td> <button type="submit" name="reject" class = "w3-center w3-btn w3-red w3-large w3-round-large"; >Reject</button> </td>
            </form>
            </tr>
            <?php $count++; ?>
            @endforeach

        </table>






    </div>
</body>
</html>

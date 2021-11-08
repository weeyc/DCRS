<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/payment.css">
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
        .container{
            text-align: center;
            width: 60%;
        }
        .table {
            margin: 0 auto; /* or margin: 0 auto 0 auto */
        }
    </style>
</head>
<body>

    <div class="container pt-1">
        <h2><U>Payment</u></h2>
        <div class="container pt-3">
            <table width=50%; class = "w3-table-all w3-hoverable">
                    @foreach($data as $i)
                        <tr>
                            <th><center>DELIVERY ADDRESS</center></th>
                        </tr>
                        <form action="{{ route('ManagePayment.UpdateAddress') }}" method="POST" id="address">

                            @if(Session::get('success'))
                            <script>
                                alert("Address Updated!");
                                window.location.href = "/checkout/request_id/{{ $i->request_id }}";
                            </script>

                            @endif

                          @csrf

                            <tr>
                                <td><textarea rows="2" cols="62" form="address" name="add"> {{ $i->delivery_address }}</textarea></td>
                            </tr>
                            <tr>
                                <input name="request_id" type="hidden" value="{{ $i->request_id }}">

                                <td> <button type="submit" name="save" class = "w3-right w3-btn w3-blue w3-small w3-round-large mr-2";>Update</button> </td>
                            </form>
                        </tr>
                    @endforeach
            </table>


        </div>


        <div class="container pt-5">
        <table width=50%; class = "w3-table-all w3-hoverable">

            @foreach($data as $i)
                <tr>
                    <th colspan="2"><center>ORDER SUMMARY</center></th>
                </tr>
                <tr>

                    <td>Request ID:</td>
                    <td>{{ $i->request_id }}</td>
                </tr>
                <tr>
                    <td>Device:</td>
                    <td>{{ $i->product_name }}</td>
                </tr>
                <tr>
                    <td>Damage Info:</td>
                    <td>{{ $i->dmg_info }}</td>
                </tr>
                <tr>
                    <td>Repair Status:</td>
                    <td>{{ $i->repair_status }}</td>
                </tr>
                <tr>
                    <td><b>Total Cost:</b></td>
                    <td><b>RM {{ $i->cost }}</b></td>

                    <?php $req_id =  $i->request_id ;
                            $cost= $i->cost;
                            $add = $i->delivery_address;
                            ?>
                </form>

         @endforeach
        </table>
        </div>


        <div class="container pt-5 pb-3">
        <table width=50%; class = "w3-table-all w3-hoverable">
            <tr>
                <th colspan="2"><center>PAYMENT METHOD</center></th>
            </tr>
            <tr>
                <form action="{{ route('ManagePayment.AddCoDOrder') }}" method="POST">
                    @csrf
                    <td>  <div class="wrapper">
                        <input type="radio" name="payment_method" id="option-1" value="Cash On Delivery" onclick="show(0)" checked>
                        <input type="radio" name="payment_method" id="option-2" value="Online Banking" onclick="show(1)">
                        <label for="option-1" class="option option-1">
                            <div class="dot"></div>
                            <span>Cash On Delivery</span>
                            </label>
                        <label for="option-2" class="option option-2">
                            <div class="dot"></div>
                            <span>Online Banking</span>
                        </label>
                    </div>
                </td>
                </tr>
            </table>
            </div>
                <input type="hidden" name="req_id" value="{{ $req_id }}">
                <input type="hidden" name="cost" value="{{ $cost }}">
                <div id="cod" >
            <td> <button type="submit" name="confirm" class = "container w3-center w3-btn w3-teal w3-large w3-round-large mb-5"; >CONFIRM ORDER</button> </td>
                </div>
            </form>

        <div id="paypay-payment-button" class="container mb-5" style="display:none">
            <div class="container">
                <table border="0" width=100%;  >
                <tr>
                    <td align="left">email:</td>
                    <td align="right">dcrs@personal.example.com </td>
                </tr>
                <tr>
                    <td align="left">password:</td>
                    <td align="right">11223344</td>
            </tr>

            </table>
            </div>

        </div>

    <script>
        function show(x){
            if(x==0){
                document.getElementById('cod').style.display='block';
                 document.getElementById('paypay-payment-button').style.display='none';
            }
            else if(x==1){
                document.getElementById('cod').style.display='none';
                 document.getElementById('paypay-payment-button').style.display='block';
            }
        }

    </script>

    <script src="https://www.paypal.com/sdk/js?client-id=AfydF0URrTocPgU9BeWsSxVEN_SJjsF21Y-D3-4XigGP7Cq0bwLdg49ghhO40yS1XY_HucRYcQkGo3v1&currency=MYR&disable-funding=credit,card"></script>
<script>paypal.Buttons({
  style: {
    color: 'blue',
    shape: 'pill'
  },
  createOrder:function(data,actions){
    return actions.order.create({
      purchase_units: [{
          amount:{
            currency_code: 'MYR',
            value: '{{ $cost }}'
          }

      }]

    } );
  },
  onApprove: function(data,actions){
      return actions.order.capture().then(function(details){
       console.log(details)
       alert('Transaction Has Been Made');
       window.location.href = "/paymentnotification/{{ $req_id }}"

      })
  }


}).render('#paypay-payment-button');</script>
 </body>




</body>
</html>

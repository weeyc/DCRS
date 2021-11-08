<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Customer Notification</title>
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
        <h2><U>Payment Notification</u></h2>

        <center>
        <div style="height: 50%; width: 60%; margin: 40px;">
            <div style="height: 100%; border: 2px solid black;  padding: 50px;">

                <a ><img src="/Images/ManagePayment/success.png" width="100" height="100" /> </a>
                <h1 style="color:green; padding:20px" class="order__title no-margin"><b>Your Order Has Been Placed!</b><b>(CoD)</b> </h1>


                    <form action="/cusmanagepayment" method="">
                    <button type="submit" name="okay" class = "w3-center w3-btn w3-blue w3-large w3-round-large"; >Okay</button>
                </form>
            </div>
        </div>

</center>





    </div>
</body>
</html>

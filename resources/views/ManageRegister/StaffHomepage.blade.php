<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Staff Homepage</title>
    @include('layouts.bootstrap')
    @include('layouts.staffNavBar')

    <style>
        h2{
            margin-top: 50px;
            text-align: center;
        }
    </style>
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active" data-interval="2000">
                    <img src="/Images/Others/admin.png" class="d-block w-100" alt="..." width="1100" height="600">
                </div>
                <div class="carousel-item" data-interval="2000">
                    <img src="/Images/Others/admin.png" class="d-block w-100" alt="..." width="1100" height="600">
                </div>
                <div class="carousel-item" data-interval="2000">
                    <img src="/Images/Others/admin.png" class="d-block w-100" alt="..." width="1100" height="600">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <td><button type="button" style="width: 120px;height: 120px" onclick="window.location.href='../staffmanagepayment'"> payment <br> <br> <img src="../../Images/Others/payment.jpg" style="width:50px;height:50px;border:0"/>  </button></td>

      <td><button type="button" style="width: 120px;height: 120px" onclick="window.location.href='../staffRepairStatusList'"> Repair status <br> <br> <img src="../../Images/Others/repair.png" style="width:50px;height:50px;border:0"/>  </button></td>

        <td><button type="button" style="width: 120px;height: 120px" onclick="window.location.href='../ApproveOrReject'"> Request service <br> <br> <img src="../../Images/Others/service.png" style="width:50px;height:50px;border:0"/>  </button></td>

    </div>
</body>
</html>

</head>
<body>

    {{ session('LoggedUser') }}









    </div>
</body>
</html>

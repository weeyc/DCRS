<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="/riderhomepage">
    <img src="/Images/Others/dcrs.png" alt="logo" style="width:70px; margin-top:-5px">
  </a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item mr-sm-5">
      <a class="nav-link" href="/PickupOrderInterface">Order</a>
    </li>
    <li class="nav-item mr-sm-5">
      <a class="nav-link" href="/AcceptedOrderInterface">Update Order</a>
    </li>


  </ul>

  <!-- Links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="/riderViewAcc"><i class="fas fa-user"> Profile</i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('ManageRegister.Logout') }}"><i class="fas fa-sign-out-alt"> Log Out</i></a>
    </li>
  </ul>
</nav>

<style>
    body {
            background-image: url("/Images/Others/background.jpg"); no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
    }

</style>

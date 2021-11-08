<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="">
    <img src="/Images/Others/dcrs.png" alt="logo" style="width:70px; margin-top:-5px">
  </a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item mr-sm-5">
      <a class="nav-link" href="/staffhomepage">Home</a>
    </li>
    <li class="nav-item mr-sm-5">
      <a class="nav-link" href="/ApproveOrReject">Request Service</a>
    </li>
    <li class="nav-item mr-sm-5 ">
      <a class="nav-link" href="/staffRepairStatusList">Repair Status</a>
    </li>
    <li class="nav-item mr-sm-5">
      <a class="nav-link" href="/staffmanagepayment">Payment</a>
    </li>

  </ul>

  <!-- Links -->
  <ul class="navbar-nav ml-auto">
  <form class="form-inline" method="post" action="/searchService">
  @csrf
    <input class="form-control mr-sm-2" type="search" name="cust_name" placeholder="Search">
    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
  </form>
    <li class="nav-item">
      <a class="nav-link" href="/staffViewAcc"><i class="fas fa-user"> Profile</i></a>
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

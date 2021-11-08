<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand pl-5" href="#">
      <img src="/Images/Others/dcrs.png" alt="logo" style="width:70px; margin-top:-16px">
    </a>
    <ul class="navbar-nav pr-5" >
        <li class="nav-item mr-5">
          <a class="nav-link" href="">DCRS</a>
        </li>

      </ul>

    <!-- Links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link pr-5" href="{{ route('ManageRegister.StaffRegistration') }}"><i class="fas fa-user"> Staff Register</i></a>
      </li>
      <li class="nav-item pl-5">
        <a class="nav-link " href="{{ route('ManageRegister.RiderRegistration') }}"><i class="fas fa-motorcycle"> Runner Register</i></a>
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

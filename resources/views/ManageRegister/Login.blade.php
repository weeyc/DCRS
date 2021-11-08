<!DOCTYPE html>
<html>
    <head>
        <title>DCRS Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="/css/login.css">

        @include('layouts.loginNav')
        @include('layouts.bootstrap')

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script>
            function showPassword() {
                var x = document.getElementById("password");

                if(x.type === "password"){
                    x.type = "text";
                }
                else{
                    x.type = "password";
                }
            }
        </script>


    <body>
    <br><br><br><br><br>

        <p><strong><i>DCRS Login</i></strong>:</p>
        <br>
        <form action="{{ route('ManageRegister.Check') }}" method="POST">

            @if(Session::get('fail'))
            <script>
                alert(" {{ Session::get('fail') }} ");
            </script>
            @endif

            @csrf
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="userEmail" id="email" placeholder="Email Address" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="password" class="form-control form-control input-lg" name="userpassword" id="password" placeholder="Password" required>
                    </div>
                    <div class="showPwd"><input type="checkbox" onclick="showPassword()">&nbsp;Show Password</div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true" style="font-size: larger;"></i></span>
                        <select name="role" id="LoginSelect"  class="form-control" required>
                            <option value="">Choose User Type</option>
                            <option value="Customer">Customer</option>
                            <option value="Staff">Staff</option>
                            <option value="Rider">Rider</option>


                          </select>
                    </div>
                    <br>
                    <button type="submit" name="login" value="LOGIN" class="loginBtn" id="buttonLogin"><label style="font-size: larger;">Log In</label></button>
                </div>
            </div>
        </form>
        <br>
        <div style="text-align: center; font-size: medium;">
            Don't have an account? <a class="register" href="{{ route('ManageRegister.CusRegistration') }}"><u>Register here</u></a>.
        </div>




    </body>

</html>




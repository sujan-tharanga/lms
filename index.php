<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet">
  </head>
  <body>
  <?php
    if (isset($_SESSION['user'])){
        header("location:leave.php");
    }
   ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <h1 class="center-text f-48 mt-30">LMS</h1>
                <form action="login.php" method="post" id="login-form" class="mt-15 ">

                    <div class="form-outline mb-4">
                        <input type="text" id="username" name="username" class="form-control"/>
                        <label class="form-label" for="username">User Name</label>
                    </div>


                    <div class="form-outline mb-4">
                        <input type="password" id="password" name="password" class="form-control"/>
                        <label class="form-label" for="password">Password</label>
                    </div>


                    <button type="submit" class="btn btn-primary">Sign in</button>

                </form>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
        /*$(document).ready(function () {console.log("sdsd");
            $("form").submit(function (event) {
                var formData = {
                username: $("#username").val(),
                password: $("#password").val(),
                };
console.log(formData);
                $.ajax({
                type: "POST",
                url: "login.php",
                data: formData,
                dataType: "json",
                encode: true,
                }).done(function (data) {
                console.log(data);
                });

                event.preventDefault();
            });
            });*/
    </script>
  </body>
</html>



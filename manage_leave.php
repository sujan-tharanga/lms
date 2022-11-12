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
    session_start();
    if (isset($_SESSION['usertype'])){
        $userType = $_SESSION['usertype'];
    }else{
        $userType = null;
    }
    $connection = new Connection();
    $conn = $connection->getConnection();
    if($conn != null){
        $sql = "SELECT * FROM employee";
        $result = $conn->query($sql);
    }else{
        $result = null; 
    }    
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">LMS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="leave.php">Leave</a>
                    </li>
                    <?php if($userType == 1){?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manage Leave Settings</a>
                    </li>
                    <?php }?>
                    
                    <?php ?>
                    <li class="nav-item">
                        <a class="nav-link" href="approve_leave.php">Leave Request For Approval</a>
                    </li>
                    <?php ?>
                    </ul>
                </div>
            </nav>
            </div>

            <div class="col-md-12 mt-30">
                <h1 class="center-text f-48 mt-30">LMS</h1>
                <form action="add_employee_data.php" method="post" id="add-emp-form" class="mt-15 ">

                    <div class="form-outline mb-4">
                        <input type="text" id="fname" name="fname" class="form-control"/>
                        <label class="form-label" for="fname">First Name</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="lname" name="lname" class="form-control"/>
                        <label class="form-label" for="lname">Last Name</label>
                    </div>

                    <div class="form-outline mb-4">
                    <select id="approver" name="approver" class="form-select" aria-label="Default select example">
                        <option selected></option>
                        <?php if($result != null){
                            while($row = $result->fetch_assoc()) {
                            ?>
                        <option value="<?php echo $row["emp_id"]?>"><?php echo $row["first_name"] . " " . $row["last_name"]?></option>
                        <?php }}?>
                    </select>
                    <label class="form-label" for="approver">Leave Approver</label>
                    </div>   

                    <div class="form-outline mb-4">
                        <input type="number" min="0" step="1" id="pleave" name="pleave" class="form-control"/>
                        <label class="form-label" for="pleave">Paid Leave</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="number" min="0" step="1" id="sleave" name="sleave" class="form-control"/>
                        <label class="form-label" for="sleave">Sick Leave</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary">Save</button>

                </form>
            </div>
            
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $("#add-emp-form").submit(function (event) {
                var formData = {
                fname: $("#fname").val(),
                lname: $("#lname").val(),
                approver: $("#approver").val(),
                pleave: $("#pleave").val(),
                sleave: $("#sleave").val(),
                };
                $.ajax({
                type: "POST",
                url: "add_employee_data.php",
                data: formData,
                dataType: "json",
                encode: true,
                }).done(function (data) {

                });
                event.preventDefault();
            });
            });
    </script>
  </body>
</html>



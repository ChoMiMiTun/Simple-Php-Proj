<?php

include_once "views/top.php";
include_once "views/nav.php";
include_once "views/header.php";
include_once "systemgem/membership.php";

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $ret = loginUser ($email, $password);
    $message = "";

    switch ($ret) {
        case "Login Success!": 
            $message = "Login Success!";
            if (getSession("username") === "chomimi" && getSession("email") === "chomimitun@gmail.com") {
                header("Location:admin.php");
            } else {
                header("Location:index.php");
            }
         break;
         case "Login Fail!":
            $message = "Login Fail!";
         break;
         case "Auth Fail!":
            $message = "Auth Fail!";
         break;
         default : break;

    }

    echo "<div class='container mt-3'>
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
    " . $message . "
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>
    </div>";
}

?>

<section id="content-text">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-2">
                <form method="post" action="login.php">
                    <h1 class="font mb-4 text-danger">Login In</h1>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="">
                    </div>
                    <button type="submit" name="submit" vale="submit" class="btn btn-primary justify-content-end">Submit</button>
                </form>
            </div>
        </div>
    </div>

</section>

<?php

include_once "views/footer.php";
include_once "views/bottom.php";

?>
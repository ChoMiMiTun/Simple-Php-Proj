<?php

include_once "views/top.php";
include_once "views/nav.php";
include_once "views/header.php";
include_once "systemgem/membership.php";


if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $ret = registerUser($username, $email, $password);
    $message = "";

    switch ($ret) {
        case "Register Success!":
            $message = "Register Success!";
            setSession("username", $username);
            setSession("email", $email);
            if ($username === "chomimi" && $email === "chomimitun@gmail.com") {
                header("Location:admin.php");
            }else{
                header("Location:index.php");
            }
            break;
        case "Email is already in used!":
            $message = "Email is already in used!";
            break;
        case "Register Fail!":
            $message = "Register Fail!";
            break;
        case "Auth Fail!":
            $message = "Auth Fail!";
            break;
        default:
            break;
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
                    <form method="post" action="register.php">
                        <h1 class="font mb-4 text-danger">Register</h1>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="">
                        </div>
                        <button type="submit" name="submit" value="submit" class="btn btn-primary justify-content-end">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <?php

    include_once "views/footer.php";
    include_once "views/bottom.php";

    ?>
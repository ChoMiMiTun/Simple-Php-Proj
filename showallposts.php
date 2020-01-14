<?php

include_once "views/top.php";
include_once "views/nav.php";
include_once "views/header.php";
include_once "systemgem/postgenerator.php";

if (checkSession("username")) {
    if (getSession("username") != "chomimi") {
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}

if (isset($_POST['submit'])) {
    $title = $_POST["title"];
    $postype = $_POST["postype"];
    $postwriter = $_POST["postwriter"];
    $postcontent = $_POST["postcontent"];

    $imglink = time() . "_" . $_FILES["file"]["name"];
    move_uploaded_file($_FILES['file']['tmp_name'], 'assets/uploads/' . $imglink);
    $file = $_FILES["file"];

    $bol = insertPost($title, $postype, $postwriter, $imglink, $postcontent);

    if ($bol) {

        echo "<div class='container mt-3'>
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
    Post Successfully inserted
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>
    </div>";
    } else {
        echo "<div class='container mt-3'>
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
    Post insert fial!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>
    </div>";
    }
}



?>

<section id="content-text">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <?php include_once "views/sidebar.php"; ?>
            </div>

            <div class="col-md-8">
                <h1 class="text-center text-danger font mb-3">Show all posts</h1>
                <div class="row">

                    <?php

                    $result= getAllPost(2);
                    foreach ($result as $post) {
                        $pid = $post["id"];
                        echo '<div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header"><h3>' . $post["title"] . '</h3></div>
                                    <div class="card-body">
                                    
                                    <p><img src=' . "assets/uploads/" . $post["imglink"] . ' class="float-left mr-3" style="width:130px;">' . substr($post["content"], 0, 100) . '</p>
                                    </div>
                                    <div class="card-footer">
                                    <a href="edit.php?pid='.$post["id"].'" class="btn btn-primary float-right btn-sm">Edit</a>
                                    </div>
                                </div>
                            </div>';
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>
</section>


<?php

include_once "views/footer.php";
include_once "views/bottom.php";

?>
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
    $subject = $_POST["subject"];

    $imglink = time() . "_" . $_FILES["file"]["name"];
    move_uploaded_file($_FILES['file']['tmp_name'], 'assets/uploads/' . $imglink);
    $file = $_FILES["file"];

    $bol = insertPost($title, $postype, $postwriter, $imglink, $postcontent, $subject);

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
                <h1 class="text-center text-danger font">Post Insert Form</h1>
                <form method="post" action="admin.php" enctype="multipart/form-data" class="p-2">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="postype">Post Type</label>
                        <select class="form-control" id="postype" name="postype">
                            <option>Please Select</option>
                            <option value="1">Free Post</option>
                            <option value="2">Pay Post</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">subject</label>
                        <select class="form-control" id="subject" name="subject">
                            <option>Please Select</option>

                            <?php

                            $subjects = getAllSubject();
                            foreach ($subjects as $subject) {
                                echo "<option value ='" . $subject["id"] . "'>" . $subject["name"] . "</option>";
                            }

                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="postwriter">Post Writer</label>
                        <input type="text" class="form-control" id="postwriter" name="postwriter">
                    </div>
                    <div class="custom-file my-3">
                        <input type="file" class="custom-file-input" name="file" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="form-group">
                        <label for="postcontent">Post Content</label>
                        <textarea class="form-control" id="postcontent" name="postcontent" rows="5"></textarea>
                    </div>
                    <div class="row no-gutters float-right">
                        <button class="btn btn-secondary mr-2">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php

include_once "views/footer.php";
include_once "views/bottom.php";

?>
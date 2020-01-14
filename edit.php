<?php

include_once "views/top.php";
include_once "views/nav.php";
include_once "views/header.php";
include_once "systemgem/postgenerator.php";

if (isset($_GET["pid"])) {
    $pid = $_GET["pid"];
    $result = getSinglePost($pid);
    $posts = [];

    foreach ($result as $post) {
        $posts["title"] = $post["title"];
        $posts["type"] = $post["type"];
        $posts["writer"] = $post["writer"];
        $posts["imglink"] = $post["imglink"];
        $posts["content"] = $post["content"];
        $posts["subject"] = $post["subject"];
    }
}

if (isset($_POST['submit'])) {
    $file = $_FILES["file"];
    $imgname = "";
    if ($_FILES["file"]["name"] != null) {
        $imgname = time() . "_" . $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], "assets/uploads/".$imgname);
    }else{
        $imgname = $_POST["oldimg"];
    }
//echo $imgname;
    $title = $_POST["title"];
    $postype = $_POST["postype"];
    $postwriter = $_POST["postwriter"];
    $postcontent = $_POST["postcontent"];

    $imglink = $imgname;
    $pid = $_GET["pid"];
    echo $pid;

    updatePost($title, $postype, $postwriter, $imglink, $postcontent, $pid);
}

?>

<section id="content-text">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <?php include_once "views/sidebar.php"; ?>
            </div>

            <div class="col-md-8">
                <h1 class="text-center text-danger font">Post Edit Form</h1>
                <form method="post" action="edit.php?pid=<?php echo $pid ?>" enctype="multipart/form-data" class="p-2">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $posts["title"]; ?>">
                        
                    </div>
                    <div class="form-group">
                        <label for="postype">Post Type</label>
                        <select class="form-control" id="postype" name="postype">
                            <option value="1">Free Post</option>
                            <option value="2">Pay Post</option>
                        </select>
                    </div>
                  
                    <div class="form-group">
                        <label for="postwriter">Post Writer</label>
                        <input type="text" class="form-control" id="postwriter" name="postwriter" value="<?php echo $posts["writer"]; ?>">
                    </div>
                    <div class="custom-file my-3">
                        <input type="file" class="custom-file-input" name="file" id="customFile">
                        <input type="hidden" name="oldimg" value="<?php echo $posts["imglink"]; ?>">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <p style="text-align:right;"><img src="assets/uploads/<?php echo $posts["imglink"]; ?>" style="width:100px;"></p>
                    <div class="form-group">
                        <label for="postcontent">Post Content</label>
                        <textarea class="form-control" id="postcontent" name="postcontent" rows="5">
                        <?php echo $posts["content"]; ?>
                        </textarea>
                    </div>
                    <div class="row no-gutters float-right">
                        <button class="btn btn-secondary mr-2">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
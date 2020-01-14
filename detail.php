<?php

include_once "views/top.php";
include_once "views/nav.php";
include_once "views/header.php";
include_once "systemgem/postgenerator.php";

if (isset($_GET["pid"])) {
    $pid = $_GET["pid"];
}

?>

<section id="content-text">
    <div class="container">
        <div class="card mb-4">
            <?php
                $result = getSinglePost($pid);
                
                foreach($result as $res){
                    echo '<div class="card-header">
                    ' . $res["title"] . '
                    <span class="float-right">' . $res["created_at"] . '</span>
                    </div>';
                    echo '<div class="card-body">
                    <p><img src=' . "assets/uploads/" . $res["imglink"] . ' class="img-float"></p>
                    <p>' . $res["content"] . '</p></div>';
                    echo '<div class="card-footer">
                    Post by ' . $res["writer"] . '
                    <a href="index.php" class="btn btn-secondary float-right">Back</a>
                    </div>';
                }
            ?>

        </div>
    </div>
</section>

<?php

include_once "views/footer.php";
include_once "views/bottom.php";

?>
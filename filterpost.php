<?php

include_once "views/top.php";
include_once "views/nav.php";
include_once "systemgem/postgenerator.php";

// if(isset($_GET["sid"])){
//     $sid = $_GET["sid"];
//     echo $sid;
// }

?>

<section id="content-text">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <?php include_once "views/sidebar.php"; ?>
            </div>

            <div class="col-md-8">
                <div class="row">

                    <?php

                    $result = "";
                    if (checkSession("username")) {
                        $result = getFilteredPost($_GET["sid"],2);
                    } else {
                        $result = getFilteredPost($_GET["sid"],1);
                    }

                    foreach ($result as $post) {
                        $pid = $post["id"];
                        echo '<div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header"><h3>' . $post["title"] . '</h3></div>
                                    <div class="card-body">
                                    <p><img src=' . "assets/uploads/" . $post["imglink"] . ' class="img-float"></p>
                                    <p>' . substr($post["content"], 0, 100) . '</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="detail.php?pid='.$pid.'" class="btn btn-primary btn-sm float-right">Read more</a>
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
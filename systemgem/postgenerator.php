<?php

require_once "systemgem/database.php";

function insertPost($title, $type, $writer, $imglink, $content, $subject){

    $created_at = getTimeNow();
    $db =  dbConnect();
    $qry = "INSERT INTO post(title,type,writer,imglink,content,subject,created_at) 
    VALUES
    ('$title', '$type', '$writer', '$imglink', '$content','$subject', '$created_at')";

    $result = mysqli_query($db, $qry);

    return $result;
}

function updatePost($title, $type, $writer, $imglink, $content, $id){

    $db =  dbConnect();
    $qry = "UPDATE post SET title='$title', type='$type', writer='$writer', imglink='$imglink', content='$content' WHERE id='$id'";

    $result = mysqli_query($db, $qry);

    if($result){
        header("Location:showallposts.php");
    }else{
        echo "<script>alert('Post Update Fail!')</script>";
    }
}

function getAllPost($type){

    $db = dbConnect();
    $qry = "";
    if ($type == 1) {
        $qry = "SELECT * FROM post WHERE type=$type";
    } else {
        $qry = "SELECT * FROM post";
    }
    $result = mysqli_query($db, $qry);
    return $result;
}

function getSinglePost($pid){
    $db = dbConnect();
    $qry = "SELECT * FROM post WHERE id = '$pid'";
    $result = mysqli_query($db, $qry);
    return $result;
}

function getFilteredPost($subject, $type){
    $db = dbConnect();
    $qry = "SELECT * FROM post WHERE subject = $subject && type = $type";
    $result = mysqli_query($db, $qry);
    return $result;
}


function getAllSubject(){
    
    $db = dbConnect();
    $qry = "SELECT * FROM subject";
    $result = mysqli_query($db, $qry);
    return $result;
}
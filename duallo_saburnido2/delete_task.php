<?php
session_start();    
include("config.php");

if(isset($_POST["delete"])){

    $id = $_POST['id'];


    $query = "DELETE FROM tasks WHERE id = $id";

    $query_result = mysqli_query( $con, $query );

    if($query_result){
        $_SESSION['status'] = "Task Deleted!";
        $_SESSION['status_code'] = "success";
        header("Location: index.php");
        exit();
    }else{
        $_SESSION['status'] = "Delete Failed";
        $_SESSION['status_code'] = "error";
        header("Location: index.php");
        exit();
    }
}

?>
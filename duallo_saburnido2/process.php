<?php
session_start();    
include("config.php");

if(isset($_POST["addTask"])){

$title = $_POST['title'];
$description = $_POST['description'];
$priority = $_POST['priority'];
$due_date = $_POST['due_date'];

$query = "INSERT INTO `tasks`(`title`, `description`, `priority`, `due_date`) VALUES ('$title','$description','$priority','$due_date')";

$query_result = mysqli_query( $con, $query );

if($query_result){
    $_SESSION['status'] = "Task Successfully Added!";
    $_SESSION['status_code'] = "success";
    header("Location: index.php");
    exit();
}
}



if(isset($_POST["editButton"])){

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];


    $query = "UPDATE `tasks` SET `title`='$title',`description`='$description',`priority`='$priority',`due_date`='$due_date' WHERE `id`='$id'";
    
    $query_result = mysqli_query( $con, $query );

    if($query_result){
        $_SESSION['status'] = "Task Updated Successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: index.php");
        exit();
    }else{
        $_SESSION['status'] = "Update Failed";
        $_SESSION['status_code'] = "error";
        header("Location: index.php");
        exit();
    }
}







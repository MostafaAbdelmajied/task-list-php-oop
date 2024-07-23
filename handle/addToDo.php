<?php



require_once "../inc/connection.php";
require_once '../App.php';

if(! $request->check($_POST['submit'])){
    header("location:../index.php");
}

$title = $request->filter($request->post("title"));

if(empty($title)){
    $session->set("errors",["title is required"]);
    header("location:../index.php");
}else{
    $runQuery = $conn->prepare("insert into tasks(`title`) values (:title)");
    $runQuery ->bindParam(":title",$title,PDO::PARAM_STR);
    $runQuery->execute();
    $session->set("success","added successfully");
    header("location:../index.php");
}


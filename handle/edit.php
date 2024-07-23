<?php
require_once '../App.php';
require_once '../inc/connection.php';

if(! isset($_POST['submit'])){
    header("location:../index.php");
}

$id = ($request->get("id")) ? $request->get("id") : null;
    if(! is_null($id)){
        $runQuery = $conn->query("select title from tasks where id = $id");
        if($runQuery->rowCount() == 1){
            $task = $runQuery->fetch();
        }else{
            header("location:index.php");
        }
    }else{
        header("location:index.php");
    }

$title = $request->filter($request->post("title"));
if(empty($title)){
    $title = $task['title'];
}

$runQuery = $conn->query("update tasks set title = '$title' where id = $id");
$session->set("success","updated succefully");
header("location:../index.php");
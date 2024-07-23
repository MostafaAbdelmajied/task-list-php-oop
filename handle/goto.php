<?php
require_once '../App.php';
require_once '../inc/connection.php';
if($request->check($request->get("status")) && $request->check($request->get("id"))){
    $id = $request->get("id");
    $status = $request->get("status");
    $runQuery = $conn->prepare("update tasks set status=:status where id=:id");
    $runQuery->bindParam(":status",$status,PDO::PARAM_STR);
    $runQuery->bindParam(":id",$id,PDO::PARAM_INT);
    $result = $runQuery->execute();
    if($result){
        $session->set("success","status updated successfully");
        header("location:../index.php");
    }else{
        $session->set("errors",['error occurred']);
        header("location:../index.php");
    }
}

<?php
require_once '../App.php';
require_once '../inc/connection.php';
if(isset($_SERVER['HTTP_REFERER']) && $request->check($request->get("id"))){
    $id = $request->get("id");
    $runQuery = $conn->prepare("delete from tasks where id = :id");
    $runQuery->bindParam(":id",$id,PDO::PARAM_INT);
    $result = $runQuery->execute();
    if($result){
        $session->set("success","deleted successfully");
        header("location:{$_SERVER['HTTP_REFERER']}");
    }else{
        $session->set("errors",['deleted successfully']);
        header("location:{$_SERVER['HTTP_REFERER']}");
    }
}else{
    header("location:{$_SERVER['HTTP_REFERER']}");
}

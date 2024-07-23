<?php
require_once 'inc/header.php';
require_once 'inc/connection.php';
require_once 'App.php';
?>

<?php
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
?>
<body class="container w-50 mt-5">
    <form action="handle/edit.php?id=<?php echo $id ?>" method="post">
            <textarea type="text" class="form-control"  name="title" id=""  placeholder ="<?php if(isset($task['title'])) echo $task['title'] ?>"  ></textarea>
            <div class="text-center">
                <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Update</button>
            </div>  
    </form>
</body>
</html>
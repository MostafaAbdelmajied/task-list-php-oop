<?php 
require_once "App.php";
require_once 'inc/header.php';
?>
<body>
    
    <div class="container my-3 ">    
        <div class="row d-flex justify-content-center">
        <?php require_once 'inc/success.php' ?>
                <div class="container mb-5 d-flex justify-content-center">
                    
                    <div class="col-md-4">
                        <form action="handle/addToDo.php" method="post">
                        <textarea type="text" class="form-control" rows="3" name="title" id="" placeholder="enter your note here"></textarea>
                        <?php require_once 'inc/errors.php' ?>
                        <div class="text-center">
                            <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Add To Do</button>
                        </div>
                        </form>
                    </div>
                </div>
            

                <?php 
    $runQuery = $conn->query("select * from tasks where status = 'To Do'");
    $tasks = $runQuery->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($tasks);
    //die;
?>
        </div>
        <div class="row d-flex justify-content-between">   
            <!-- to do -->
            <div class="col-md-3 "> 
                <h4 class="text-white">To Do</h4>

                
                <div class="m-2  py-3">
                    <div class="show-to-do">
                            <?php 
                            if(count($tasks) == 0):
                            ?>
                                <div class="item">
                                    <div class="alert-info text-center ">
                                    empty to do
                                    </div>
                                </div>
                    
                            <?php
                            else:
                            ?>
                            <?php 
                            foreach($tasks as $task):
                            ?>
                        <div class="alert alert-info p-2">
                                <a href="handle/delete.php?id=<?php echo $task['id'] ?>" onclick="confirm('are your sure')"  class="remove-to-do text-dark d-flex justify-content-end " ><i class="fa fa-close" style="font-size:16px;"></i></a>  
                                <h4 ><?php echo $task['title']?></h4>
                                <h5><?php echo $task['created_at']?></h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="edit.php?id=<?php echo $task['id'] ?>"class="btn btn-info p-1 text-white" >edit</a>
                                
                                    <a href="handle/goto.php?status=Doing&id=<?php echo $task['id'] ?>"class="btn btn-info p-1 text-white" >doing</a>
                                </div>
                            
                        </div>
                        <?php endforeach;?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <!-- doing -->
            <div class="col-md-3 ">
            <?php 
                $runQuery = $conn->query("select * from tasks where status = 'Doing'");
                $tasks = $runQuery->fetchAll(PDO::FETCH_ASSOC);
            ?>
                <h4 class="text-white">Doing</h4>

                
                <div class="m-2 py-3">
                    <div class="show-to-do">

                    
                    <?php 
                            if(count($tasks) == 0):
                            ?>
                                <div class="item">
                                    <div class="alert-info text-center ">
                                    empty doing
                                    </div>
                                </div>
                    
                            <?php
                            else:
                            ?>
                            <?php 
                            foreach($tasks as $task):
                            ?>
                    
                        <div class="alert alert-success p-2">
                                <a href="handle/delete.php?id=<?php echo $task['id'] ?>" onclick="confirm('are your sure')"  class="remove-to-do text-dark d-flex justify-content-end " ><i class="fa fa-close" style="font-size:16px;"></i></a>  
                                <h4 ><?php echo $task['title']?></h4>
                                <h5><?php echo $task['created_at']?></h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <a></a>
                                    <a href="handle/goto.php?status=Done&id=<?php echo $task['id'] ?>"class="btn btn-success p-1 text-white" >Done</a>
                                </div>
                            
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            
            </div>
        
            <!-- done -->
            <div class="col-md-3">
            <?php 
                $runQuery = $conn->query("select * from tasks where status = 'Done'");
                $tasks = $runQuery->fetchAll(PDO::FETCH_ASSOC);
            ?>
                <h4 class="text-white">Done</h4>

                <div class="m-2 py-3">
                    <div class="show-to-do">

                    <?php 
                            if(count($tasks) == 0):
                            ?>
                                <div class="item">
                                    <div class="alert-info text-center ">
                                    empty done
                                    </div>
                                </div>
                    
                            <?php
                            else:
                            ?>
                            <?php 
                            foreach($tasks as $task):
                            ?>
                    
                        <div class="alert alert-warning p-2">
                                <a href="handle/delete.php?id=<?php echo $task['id'] ?>" onclick="confirm('are your sure')"  class="remove-to-do text-dark d-flex justify-content-end " ><i class="fa fa-close" style="font-size:16px;"></i></a>                                                                
                                <h4 ><?php echo $task['title']?></h4>
                                <h5><?php echo $task['created_at']?></h5>
                            
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
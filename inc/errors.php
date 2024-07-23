<?php
require_once "App.php";
require_once 'inc/header.php';

if(isset($_SESSION['errors'])){
    foreach($session->get("errors") as $error): ?>
    <div class="alert alert-danger"><?php echo $error?></div>
<?php endforeach; 
$session->remove("errors");
}
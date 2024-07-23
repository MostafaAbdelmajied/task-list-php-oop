<?php
require_once 'App.php';
require_once "inc/header.php";

if(isset($_SESSION['success'])){
    ?>
    <div class="alert alert-success" ><?php echo $session->get("success") ; $session->remove("success") ?></div>
    <script>
        const divQ = document.querySelector('.alert.alert-success');
        setTimeout(function(){
            divQ.remove();
        },2000);
    </script>
<?php }
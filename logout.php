<?php ob_start();?>
<?php session_start();?>


<?php
    session_unset();
    session_destroy();

    header('location:login.php');

?>
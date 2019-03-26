<?php
    include("module/header.php");
    if(isset($_SESSION['idadmin'])) {
        if(!isset($_REQUEST['pqh']))
            include("module/teacher.php");
        else
            include("module/process.php");
    } else include("module/login.php");
    include("module/footer.php");
?>
<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $pw = mahoa(trim($_POST['pwu']));
    $s = $h->query("update admin set password='".$pw."' where id=$id");
    if($s) echo '1';
    else echo '2';
?>
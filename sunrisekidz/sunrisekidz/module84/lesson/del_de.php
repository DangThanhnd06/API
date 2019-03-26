<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s3 = $h->delete("lessons"," where id=$id");
?>
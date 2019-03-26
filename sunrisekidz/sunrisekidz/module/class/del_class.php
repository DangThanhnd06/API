<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s = $h->delete("lop"," where id=$id");
?>
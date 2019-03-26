<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s3 = $h->delete("lessons"," where lesson_id=$id");
    $s2 = $h->delete("monhoc"," where id=$id");
?>
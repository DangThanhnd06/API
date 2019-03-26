<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select noidung from communication where id=$id");
    $r = $h->fetch_array($s);
    echo $r['noidung'];
?>
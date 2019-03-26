<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s1 = $h->delete("practise"," where id=$id");
    $s = $h->query("select id from monhoc where pr_id=$id");
    while($r = $h->fetch_array($s)){
        $mid = $r['id'];
        $s3 = $h->delete("lessons"," where lesson_id=$mid");
    }
    $s2 = $h->delete("monhoc"," where pr_id=$id");
?>
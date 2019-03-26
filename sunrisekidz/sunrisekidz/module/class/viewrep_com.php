<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select noidung from communication where id_reply=$id");
    $n = $h->num_rows($s);
    if($n) {
        $r = $h->fetch_array($s);
        echo $r['noidung'];
    } else echo _chuacophanhoi;
?>
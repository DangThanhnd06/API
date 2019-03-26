<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $mkcu = mahoa(trim($_POST['mkcu']));
    $data['password'] = mahoa(trim($_POST['mk']));
    $s = $h->query("select id from teacher where id=$id and password='".$mkcu."'");
    $n = $h->num_rows($s);
    if(!$n) echo '2';
    else {
        $ss = $h->update($data,"teacher"," where id=$id");
        echo '1';
    }
?>
<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $s1 = $h->query("select id from teacher where school_id=$id");
    $n = $h->num_rows($s1);
    if($n) echo '2';
    else {
        $s = $h->delete("school_brand"," where id=$id");
        echo '1';
    }
?>
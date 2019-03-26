<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $s1 = $h->query("select id from teacher where reportto=$id");
    $n = $h->num_rows($s1);
    if($n) echo '2';
    else {
        $s2 = $h->query("select id from teacher where class_gr!='' and id=$id");
        $n2 = $h->num_rows($s2);
        if($n2) echo '3';
        else {
            $s = $h->delete("teacher"," where id=$id");
            echo '1';    
        }
    }
?>
<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $s = $h->delete("newsletter"," where id=$id");
    echo '1';
?>
<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("update children set hide=0 where id=$id");
    if($s) echo '1';
?>
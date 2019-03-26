<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("update admin set kichhoat=1 where id=$id");
    echo '<a class="kichhoat" rel="'.$id.'" style="cursor:pointer;"><img src="img/check.png" alt="Active" /></a>';
?>
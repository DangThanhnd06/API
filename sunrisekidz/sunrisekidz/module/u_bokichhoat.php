<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("update admin set kichhoat=0 where id=$id");
    echo '<a class="chuakichhoat" rel="'.$id.'" style="cursor:pointer;"><img src="img/notcheck.png" alt="Unactive" /></a>';
?>
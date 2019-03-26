<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select tungay,denngay,noidung,tuan from communication where id=$id");
    $r = $h->fetch_array($s);
    echo $r['tungay'].';;;cach;;;'.$r['denngay'].';;;cach;;;'.$r['noidung'].';;;cach;;;'.$r['tuan'];
?>
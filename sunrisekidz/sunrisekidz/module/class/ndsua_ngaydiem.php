<?php
    include("../../require_inc.php");
    $so = $_POST['so'];
    $id = $_POST['id'];
    if($so == 1) $w = 'ngay1sao';
    if($so == 2) $w = 'ngay2sao';
    if($so == 3) $w = 'ngay3sao';
    $s = $h->query("select $w from mark where id=$id");
    $r = $h->fetch_array($s);
    if($so == 1) echo $r['ngay1sao'];
    if($so == 2) echo $r['ngay2sao'];
    if($so == 3) echo $r['ngay3sao'];
?>
<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select id,mother_name,mother_number,mother_email,mother_address,mother_img,password_m from children where id=$id");
    $r = $h->fetch_array($s);
    if($r['mother_img']!='') $_SESSION['motherimg'] = $r['mother_img'];
    else $_SESSION['motherimg'] = '';
    $_SESSION['passwordm'] = $r['password_m'];
    echo $r['mother_name'].';;;'.$r['mother_number'].';;;'.$r['mother_email'].';;;'.$r['mother_address'].';;;'.$_SESSION['motherimg'];
?>
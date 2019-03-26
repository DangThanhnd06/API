<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select id,father_name,father_number,father_email,father_address,father_img,password_f from children where id=$id");
    $r = $h->fetch_array($s);
    if($r['father_img']!='') $_SESSION['fatherimg'] = $r['father_img'];
    else $_SESSION['fatherimg'] = '';
    $_SESSION['passwordf'] = $r['password_f'];
    echo $r['father_name'].';;;'.$r['father_number'].';;;'.$r['father_email'].';;;'.$r['father_address'].';;;'.$_SESSION['fatherimg'];
?>
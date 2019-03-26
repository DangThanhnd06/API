<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $data['sb_id'] = $_POST['sb_id'];
    $data['lop_id'] = $_POST['lop_id'];
    $data['thang'] = $_POST['thang'];
    $data['tieude_vn'] = str_replace("'","\'",trim($_POST['tieude_vn']));
    $data['tieude_en'] = str_replace("'","\'",trim($_POST['tieude_en']));
    $ndvn = str_replace("<p>","",str_replace("'","\'",trim($_POST['noidung_vn'])));
    $data['noidung_vn'] = str_replace("</p>","",$ndvn);
    $nden = str_replace("<p>","",str_replace("'","\'",trim($_POST['noidung_en'])));
    $data['noidung_en'] = str_replace("</p>","",$nden);
    $s = $h->update($data,"newsletter", " where id=$id");
    if($s){
        echo '1';
    }
?>
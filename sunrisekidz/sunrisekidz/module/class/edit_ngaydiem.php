<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $so = $_POST['so'];
    $ngaysao = $_POST['ngaythang'];
    if($so == 1){
        $data1['ngay1sao'] = $_POST['ngaythang'];
        $tts = _suangay1sao;
    } 
    if($so == 2){
        $data1['ngay2sao'] = $_POST['ngaythang'];
        $tts = _suangay2sao;
    } 
    if($so == 3){
        $data1['ngay3sao'] = $_POST['ngaythang'];
        $tts = _suangay3sao;
    } 
    $ss = $h->update($data1,"mark"," where id=$id");
    $ms .= '<a class="suangay" rel="'.$so.';'.$id.'" title="'.$tts.'">'.$ngaysao.'</a>';
    echo $ms;
?>
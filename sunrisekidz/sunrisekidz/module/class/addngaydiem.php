<?php
    include("../../require_inc.php");
    if($_SESSION['quyenper'] == 1) {
        $school_id = $_POST['idsc'];
        $data['school_id'] = $_POST['idsc'];
        $class_id = $_POST['tenlop'];
        $data['class_id'] = $_POST['tenlop'];
    } else {
        $school_id = $_SESSION['schoolgvcn'];
        $data['school_id'] = $_SESSION['schoolgvcn'];
        $class_id = $_SESSION['classgvcn'];
        $data['class_id'] = $_SESSION['classgvcn'];
    }
    $child_id = $_POST['idhs'];
    $data['child_id'] = $_POST['idhs'];
    $practice = $_POST['idprac'];
    $data['practice'] = $_POST['idprac'];
    $lesson = $_POST['lessonid'];
    $data['lesson'] = $_POST['lessonid'];
    $detail_id = $_POST['iddetail'];
    $data['detail_id'] = $_POST['iddetail'];
    $so = $_POST['so'];
    $ngaysao = $_POST['ngaythang'];
    if($so == 1){
        $data['ngay1sao'] = $_POST['ngaythang'];    
        $data1['ngay1sao'] = $_POST['ngaythang'];
        $tts = _suangay1sao;
    } 
    if($so == 2){
        $data['ngay2sao'] = $_POST['ngaythang'];    
        $data1['ngay2sao'] = $_POST['ngaythang'];
        $tts = _suangay2sao;
    } 
    if($so == 3){
        $data['ngay3sao'] = $_POST['ngaythang'];    
        $data1['ngay3sao'] = $_POST['ngaythang'];
        $tts = _suangay3sao;
    } 
    $yr = date("Y");
    $data['year'] = date("Y");
    $s = $h->query("select id,ngay1sao,ngay2sao,ngay3sao from mark where school_id=$school_id and class_id='$class_id' and child_id=$child_id and practice=$practice and lesson=$lesson and detail_id=$detail_id and year=$yr");
    $n = $h->num_rows($s); 
    if($n){
        $r = $h->fetch_array($s);
        $id = $r['id'];
        $ss = $h->update($data1,"mark"," where id=$id");
        $ms .= '<a class="suangay" rel="'.$so.';'.$id.'" title="'.$tts.'">'.$ngaysao.'</a>';
    } else {
        $ss = $h->insert($data,"mark");
        $sss = $h->query("select id from mark order by id desc");
        $rss = $h->fetch_array($sss);
        $id = $rss['id'];
        $ms .= '<a class="suangay" rel="'.$so.';'.$id.'" title="'.$tts.'">'.$ngaysao.'</a>';
    }
    echo $ms;
?>
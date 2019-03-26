<?php
    include("../../require_inc.php");
    if($_SESSION['quyenper'] == 1) {
        $school_id = $_POST['school_id'];
        $class_id = $_POST['class_id'];
    } else {
        $school_id = $_SESSION['schoolgvcn'];
        $class_id = $_SESSION['classgvcn'];    
    }
    $child_id = $_POST['child_id'];
    
    $practice = $_POST['practice'];
    $lesson = $_POST['lesson'];
    $detail_id = $_POST['detail_id'];
    $yr = date("Y");
    $ms = '';
    $s = $h->query("select id,ngay1sao,ngay2sao,ngay3sao from mark where school_id=$school_id and class_id='$class_id' and child_id=$child_id and practice=$practice and lesson=$lesson and detail_id=$detail_id and year=$yr");
    $n = $h->num_rows($s); 
    if(!$n){
        $ms .= '<a class="themngay" rel="1">'._add.'</a>';
        $ms .= ';;;<a class="themngay" rel="2">'._add.'</a>';
        $ms .= ';;;<a class="themngay" rel="3">'._add.'</a>';
    } else {
        $r = $h->fetch_array($s);
        if($r['ngay1sao'] != '') $ms .= '<a class="suangay" rel="1;'.$r['id'].'" title="'._suangay1sao.'">'.$r['ngay1sao'].'</a>';
        else $ms .= '<a class="themngay" rel="1">'._add.'</a>';
        if($r['ngay2sao'] != '') $ms .= ';;;<a class="suangay" rel="2;'.$r['id'].'" title="'._suangay2sao.'">'.$r['ngay2sao'].'</a>';
        else $ms .= ';;;<a class="themngay" rel="2">'._add.'</a>';
        if($r['ngay3sao'] != '') $ms .= ';;;<a class="suangay" rel="3;'.$r['id'].'" title="'._suangay3sao.'">'.$r['ngay3sao'].'</a>';
        else $ms .= ';;;<a class="themngay" rel="3">'._add.'</a>';
    }
    echo $ms;
?>
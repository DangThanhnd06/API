<?php
    include("../../require_inc.php");
    $school_id = $_POST['school_id'];
    $class_id = $_POST['class_id'];
    $child_id = $_POST['child_id'];
    $practice = $_POST['practice'];
    $lesson = $_POST['lesson'];
    $yr = date("Y");
    
    $mn = "";
    $ms = "";
    $i = 0;
    $ss = $h->query("select id,detail_vn,detail_en from lessons where lesson_id=$lesson order by id asc"); //  year=$yr and month=$month and
    $ns = $h->num_rows($ss);
    if($ns){
        while($rs = $h->fetch_array($ss)){
            if($i == 0) {
                $detail_id = $rs['id'];
                $cln = ' act';
            } else $cln = '';
            $mn .= '<a class="chonnd'.$cln.'" rel="'.$rs['id'].'">'.$rs["detail_$lang"].'</a>';
            $i++;
        }
    } else {
        $mn .= '';
        $detail_id = 0;
    }
    if($school_id != 0 && $class_id != '' && $child_id != 0){
        $s = $h->query("select id,ngay1sao,ngay2sao,ngay3sao from mark where school_id=$school_id and class_id='$class_id' and child_id=$child_id and practice=$practice and lesson=$lesson and detail_id=$detail_id and year=$yr");
        $n = $h->num_rows($s);
        if($n){
            $r = $h->fetch_array($s);
            if($r['ngay1sao'] != '') $ms .= '<a class="suangay" rel="1;'.$r['id'].'" title="'._suangay1sao.'">'.$r['ngay1sao'].'</a>';
            else $ms .= '<a class="themngay" rel="1">'._add.'</a>';
            if($r['ngay2sao'] != '') $ms .= ';;;<a class="suangay" rel="2;'.$r['id'].'" title="'._suangay2sao.'">'.$r['ngay2sao'].'</a>';
            else $ms .= ';;;<a class="themngay" rel="2">'._add.'</a>';
            if($r['ngay3sao'] != '') $ms .= ';;;<a class="suangay" rel="3;'.$r['id'].'" title="'._suangay3sao.'">'.$r['ngay3sao'].'</a>';
            else $ms .= ';;;<a class="themngay" rel="3">'._add.'</a>';
        } else {
            if($detail_id != 0){
                $ms .= '<a class="themngay" rel="1">'._add.'</a>';
                $ms .= ';;;<a class="themngay" rel="2">'._add.'</a>';
                $ms .= ';;;<a class="themngay" rel="3">'._add.'</a>';
            } else {
                $ms .= ';;;;;;';
            }
        }
    } else $ms .= ';;;;;;'; 
    echo $mn.';;;'.$ms.';;;'.$detail_id;
?>
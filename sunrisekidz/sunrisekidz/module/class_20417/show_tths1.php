<?php
    include("../../require_inc.php");
    $school_id = $_POST['school_id'];
    $class_id = $_POST['class_id'];
    $child_id = $_POST['child_id'];
    //$week = $_POST['week'];
    $practice = $_POST['practice'];
    $lesson = $_POST['lesson'];
    $detail_id = $_POST['detail_id'];
    $yr = date("Y");
    //$month = $_SESSION['mnnn'];
    $month = $_POST['thg'];
    $mdd = "";
    $s = $h->query("select id,week from lessons where year=$yr and month=$month and lesson_id=$lesson order by week asc,day asc,id asc");
    while($r = $h->fetch_array($s)){
        $id = $r['id'];
        $we = $r['week'];
        $sd = $h->query("select mark from mark where school_id=$school_id and class_id='$class_id' and child_id=$child_id and year=$yr and month=$month and practice=$practice and lesson=$lesson and detail_id=$id");
        $nd = $h->num_rows($sd);
        if($nd){
            $rd = $h->fetch_array($sd);
            $mkk = $rd['mark'];
            if($mkk == 0.5){
                $mdd .= '<div class="dd" style="padding-left:40%;">';
                $mdd .= '   <p class="ohp5 red"><img src="img/star_left.png" /></p>';
                $mdd .= '</div>';
            }
            if($mkk == 1.0){
                $mdd .= '<div class="dd" style="padding-left:40%;">';
                $mdd .= '   <p class="ohp5 red"><img src="img/star_left.png" /></p>';
                $mdd .= '   <p class="one red"><img src="img/star_right.png" /></p>';
                $mdd .= '</div>';
            }
            if($mkk == 1.5){
                $mdd .= '<div class="dd" style="padding-left:30%;">';
                $mdd .= '   <p class="ohp5 red"><img src="img/star_left.png" /></p>';
                $mdd .= '   <p class="one red"><img src="img/star_right.png" /></p>';
                $mdd .= '   <p class="op5 red"><img src="img/star_left.png" /></p>';
                $mdd .= '</div>';
            }
            if($mkk == 2.0){
                $mdd .= '<div class="dd" style="padding-left:30%;">';
                $mdd .= '   <p class="ohp5 red"><img src="img/star_left.png" /></p>';
                $mdd .= '   <p class="one red"><img src="img/star_right.png" /></p>';
                $mdd .= '   <p class="op5 red"><img src="img/star_left.png" /></p>';
                $mdd .= '   <p class="two red"><img src="img/star_right.png" /></p>';
                $mdd .= '</div>';
            }
            if($mkk == 2.5){
                $mdd .= '<div class="dd">';
                $mdd .= '   <p class="ohp5 green"><img src="img/star_left.png" /></p>';
                $mdd .= '   <p class="one green"><img src="img/star_right.png" /></p>';
                $mdd .= '   <p class="op5 green"><img src="img/star_left.png" /></p>';
                $mdd .= '   <p class="two green"><img src="img/star_right.png" /></p>';
                $mdd .= '   <p class="tp5 green"><img src="img/star_left.png" /></p>';
                $mdd .= '</div>';
            }
            if($mkk == 3.0){
                $mdd .= '<div class="dd">';
                $mdd .= '   <p class="ohp5 green"><img src="img/star_left.png" /></p>';
                $mdd .= '   <p class="one green"><img src="img/star_right.png" /></p>';
                $mdd .= '   <p class="op5 green"><img src="img/star_left.png" /></p>';
                $mdd .= '   <p class="two green"><img src="img/star_right.png" /></p>';
                $mdd .= '   <p class="tp5 green"><img src="img/star_left.png" /></p>';
                $mdd .= '   <p class="three green"><img src="img/star_right.png" /></p>';
                $mdd .= '</div>';
            }
        } else {
            $mdd .= '<div class="dd" lang="'.$id.'">';
            $mdd .= '   <p class="ohp5"><a class="chond" rel="'.$school_id.';'.$class_id.';'.$child_id.';'.$we.';'.$practice.';'.$lesson.';'.$id.';0.5"><img src="img/star_trans.png" /></a></p>';
            $mdd .= '   <p class="one"><a class="chond" rel="'.$school_id.';'.$class_id.';'.$child_id.';'.$we.';'.$practice.';'.$lesson.';'.$id.';1.0"><img src="img/star_trans.png" /></a></p>';
            $mdd .= '   <p class="op5"><a class="chond" rel="'.$school_id.';'.$class_id.';'.$child_id.';'.$we.';'.$practice.';'.$lesson.';'.$id.';1.5"><img src="img/star_trans.png" /></a></p>';
            $mdd .= '   <p class="two"><a class="chond" rel="'.$school_id.';'.$class_id.';'.$child_id.';'.$we.';'.$practice.';'.$lesson.';'.$id.';2.0"><img src="img/star_trans.png" /></a></p>';
            $mdd .= '   <p class="tp5"><a class="chond" rel="'.$school_id.';'.$class_id.';'.$child_id.';'.$we.';'.$practice.';'.$lesson.';'.$id.';2.5"><img src="img/star_trans.png" /></a></p>';
            $mdd .= '   <p class="three"><a class="chond" rel="'.$school_id.';'.$class_id.';'.$child_id.';'.$we.';'.$practice.';'.$lesson.';'.$id.';3.0"><img src="img/star_trans.png" /></a></p>';
            $mdd .= '</div>';
        }
    }
    $stn = $h->query("select count(id) as sl from mark where school_id=$school_id and class_id='$class_id' and child_id=$child_id and year=$yr and month=$month and practice=$practice and lesson=$lesson");
    $rtn = $h->fetch_array($stn);
    $sl = $rtn['sl'];
    $diem = 0;
    $sdd = $h->query("select mark from mark where school_id=$school_id and class_id='$class_id' and child_id=$child_id and year=$yr and month=$month and practice=$practice and lesson=$lesson");
    while($rdd = $h->fetch_array($sdd)){
        $diem += $rdd['mark'];
    }
    $mtb = "";
    if($sl != 0){
        $dtbb = (float)($diem/$sl);
        if($dtbb > 0 && $dtbb < 1) {
            $mtb .= '<div class="dd" style="padding-left:40%;">';
            $mtb .= '   <p class="ohp5 red"><img src="img/star_left.png" /></p>';
            $mtb .= '</div>';
        } elseif($dtbb >= 1 && $dtbb < 1.5){
            $mtb .= '<div class="dd" style="padding-left:40%;">';
            $mtb .= '   <p class="ohp5 red"><img src="img/star_left.png" /></p>';
            $mtb .= '   <p class="one red"><img src="img/star_right.png" /></p>';
            $mtb .= '</div>';
        } elseif($dtbb >= 1.5 && $dtbb < 2){
            $mtb .= '<div class="dd" style="padding-left:30%;">';
            $mtb .= '   <p class="ohp5 red"><img src="img/star_left.png" /></p>';
            $mtb .= '   <p class="one red"><img src="img/star_right.png" /></p>';
            $mtb .= '   <p class="op5 red"><img src="img/star_left.png" /></p>';
            $mtb .= '</div>';
        } elseif($dtbb >= 2 && $dtbb < 2.5){
            $mtb .= '<div class="dd" style="padding-left:30%;">';
            $mtb .= '   <p class="ohp5 red"><img src="img/star_left.png" /></p>';
            $mtb .= '   <p class="one red"><img src="img/star_right.png" /></p>';
            $mtb .= '   <p class="op5 red"><img src="img/star_left.png" /></p>';
            $mtb .= '   <p class="two red"><img src="img/star_right.png" /></p>';
            $mtb .= '</div>';
        } elseif($dtbb >= 2.5 && $dtbb < 3){
            $mtb .= '<div class="dd">';
            $mtb .= '   <p class="ohp5 green"><img src="img/star_left.png" /></p>';
            $mtb .= '   <p class="one green"><img src="img/star_right.png" /></p>';
            $mtb .= '   <p class="op5 green"><img src="img/star_left.png" /></p>';
            $mtb .= '   <p class="two green"><img src="img/star_right.png" /></p>';
            $mtb .= '   <p class="tp5 green"><img src="img/star_left.png" /></p>';
            $mtb .= '</div>';
        } else {
            $mtb .= '<div class="dd">';
            $mtb .= '   <p class="ohp5 green"><img src="img/star_left.png" /></p>';
            $mtb .= '   <p class="one green"><img src="img/star_right.png" /></p>';
            $mtb .= '   <p class="op5 green"><img src="img/star_left.png" /></p>';
            $mtb .= '   <p class="two green"><img src="img/star_right.png" /></p>';
            $mtb .= '   <p class="tp5 green"><img src="img/star_left.png" /></p>';
            $mtb .= '   <p class="three green"><img src="img/star_right.png" /></p>';
            $mtb .= '</div>';
        }
    } else $mtb = "";
     
    echo $mdd.';;;'.$mtb;
?>
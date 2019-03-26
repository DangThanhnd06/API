<?php
    include("../../require_inc.php");
    $dd = $_POST['dd'];
    $m = explode(";",$dd);
    $data['school_id'] = $m[0];
    $data['class_id'] = $m[1];
    $data['child_id'] = $m[2];
    $data['year'] = date("Y");
    $data['month'] = $_SESSION['mnnn'];
    $data['week'] = $m[3];
    $data['practice'] = $m[4];
    $data['lesson'] = $m[5];
    $data['detail_id'] = $m[6];
    $data['mark'] = $m[7];
    $s = $h->insert($data,"mark");
    $ss = $h->query("select mark from mark order by id desc");
    $rs = $h->fetch_array($ss);
    $mkk = $rs['mark'];
    $mdd = "";
            /*if($mkk == 0.5){
                $mdd .= '   <p class="ohp5 red"><img src="img/star_left.png" /></p>';
            }*/
            if($mkk == 1.0){
                $mdd .= '   <p class="one red"><img src="img/star_on.png" /></p>';
            }
            /*if($mkk == 1.5){
                $mdd .= '   <p class="ohp5 red"><img src="img/star_left.png" /></p>';
                $mdd .= '   <p class="one red"><img src="img/star_right.png" /></p>';
                $mdd .= '   <p class="op5 red"><img src="img/star_left.png" /></p>';
            }*/
            if($mkk == 2.0){
                $mdd .= '   <p class="one red"><img src="img/star_on.png" /></p>';
                $mdd .= '   <p class="two red"><img src="img/star_on.png" /></p>';
            }
            /*if($mkk == 2.5){
                $mdd .= '   <p class="ohp5 green"><img src="img/star_left.png" /></p>';
                $mdd .= '   <p class="one green"><img src="img/star_right.png" /></p>';
                $mdd .= '   <p class="op5 green"><img src="img/star_left.png" /></p>';
                $mdd .= '   <p class="two green"><img src="img/star_right.png" /></p>';
                $mdd .= '   <p class="tp5 green"><img src="img/star_left.png" /></p>';
            }*/
            if($mkk == 3.0){
                $mdd .= '   <p class="one green"><img src="img/star_on.png" /></p>';
                $mdd .= '   <p class="two green"><img src="img/star_on.png" /></p>';
                $mdd .= '   <p class="three green"><img src="img/star_on.png" /></p>';
            }
    $stn = $h->query("select count(id) as sl from mark where school_id=".$data['school_id']." and class_id='".$data['class_id']."' and child_id=".$data['child_id']." and year=".$data['year']." and month=".$data['month']." and practice=".$data['practice']." and lesson=".$data['lesson']."");
    $rtn = $h->fetch_array($stn);
    $sl = $rtn['sl'];
    $diem = 0;
    $sdd = $h->query("select mark from mark where school_id=".$data['school_id']." and class_id='".$data['class_id']."' and child_id=".$data['child_id']." and year=".$data['year']." and month=".$data['month']." and practice=".$data['practice']." and lesson=".$data['lesson']."");
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
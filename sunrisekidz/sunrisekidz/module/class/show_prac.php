<?php
    include("../../require_inc.php");
    $school_id = $_POST['school_id'];
    $class_id = $_POST['class_id'];
    $child_id = $_POST['child_id'];
    $practice = $_POST['practice'];
    $yr = date("Y");
    $month = $_SESSION['mnnn'];
    $mdd = "";
    $mh = "";
    $mn = "";
    $mtb = "";
    
    $ii = 0;
    $sh = $h->query("select id,name_vn,name_en from monhoc where pr_id=$practice order by sort asc, id asc");
    $np = $h->num_rows($sh);
    if($np){
        while($rh = $h->fetch_array($sh)){
            if($ii==0){
                $lesson = $rh['id'];
                $acth = ' act';
            } else $acth = '';
            $mh .= '<a class="chonbh'.$acth.'" rel="'.$rh['id'].'">'.$rh["name_$lang"].'</a>';
            $ii++;
        }    
        $s = $h->query("select id,week,detail_vn,detail_en from lessons where year=$yr and month=$month and lesson_id=$lesson order by week asc,day asc,id asc");
        $nsl = $h->num_rows($s);
        if($nsl){
            while($r = $h->fetch_array($s)){
                $id = $r['id'];
                $we = $r['week'];
                $mn .= '<p>'.$r["detail_$lang"].'</p>';
                /*
                if($child_id != 0) {
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
                */
            }
        } // else {
            $sd = $h->query("select mark from mark where school_id=$school_id and class_id='$class_id' and child_id=$child_id and year=$yr and month=$month and practice=$practice and lesson=$lesson and detail_id=0");
            $nd = $h->num_rows($sd);
            if($nd){
                $rd = $h->fetch_array($sd);
                $mkk = $rd['mark'];
                /*if($mkk == 0.5){
                    $mdd .= '<div class="dd" style="padding-left:40%;">';
                    $mdd .= '   <p class="ohp5 red"><img src="img/star_left.png" /></p>';
                    $mdd .= '</div>';
                }*/
                if($mkk == 1.0){
                    $mdd .= '<div class="dd" style="padding-left:40%;">';
                    $mdd .= '   <p class="one red"><img src="img/star_on.png" /></p>';
                    $mdd .= '</div>';
                }
                /*if($mkk == 1.5){
                    $mdd .= '<div class="dd" style="padding-left:30%;">';
                    $mdd .= '   <p class="ohp5 red"><img src="img/star_left.png" /></p>';
                    $mdd .= '   <p class="one red"><img src="img/star_right.png" /></p>';
                    $mdd .= '   <p class="op5 red"><img src="img/star_left.png" /></p>';
                    $mdd .= '</div>';
                }*/
                if($mkk == 2.0){
                    $mdd .= '<div class="dd" style="padding-left:30%;">';
                    $mdd .= '   <p class="one red"><img src="img/star_on.png" /></p>';
                    $mdd .= '   <p class="two red"><img src="img/star_on.png" /></p>';
                    $mdd .= '</div>';
                }
                /*if($mkk == 2.5){
                    $mdd .= '<div class="dd">';
                    $mdd .= '   <p class="ohp5 green"><img src="img/star_left.png" /></p>';
                    $mdd .= '   <p class="one green"><img src="img/star_right.png" /></p>';
                    $mdd .= '   <p class="op5 green"><img src="img/star_left.png" /></p>';
                    $mdd .= '   <p class="two green"><img src="img/star_right.png" /></p>';
                    $mdd .= '   <p class="tp5 green"><img src="img/star_left.png" /></p>';
                    $mdd .= '</div>';
                }*/
                if($mkk == 3.0){
                    $mdd .= '<div class="dd">';
                    $mdd .= '   <p class="one green"><img src="img/star_on.png" /></p>';
                    $mdd .= '   <p class="two green"><img src="img/star_on.png" /></p>';
                    $mdd .= '   <p class="three green"><img src="img/star_on.png" /></p>';
                    $mdd .= '</div>';
                }
            } else {
                $mdd .= '<div class="dd" lang="0">';
                $mdd .= '   <p class="one"><a class="chond" rel="'.$school_id.';'.$class_id.';'.$child_id.';'.$we.';'.$practice.';'.$lesson.';0;1.0"><img src="img/star_trans.png" /></a></p>';
                $mdd .= '   <p class="two"><a class="chond" rel="'.$school_id.';'.$class_id.';'.$child_id.';'.$we.';'.$practice.';'.$lesson.';0;2.0"><img src="img/star_trans.png" /></a></p>';
                $mdd .= '   <p class="three"><a class="chond" rel="'.$school_id.';'.$class_id.';'.$child_id.';'.$we.';'.$practice.';'.$lesson.';0;3.0"><img src="img/star_trans.png" /></a></p>';
                $mdd .= '</div>';
            }
        //}
    }
    echo $mdd.';;;'.$mtb.';;;'.$mh.';;;'.$mn;
?>
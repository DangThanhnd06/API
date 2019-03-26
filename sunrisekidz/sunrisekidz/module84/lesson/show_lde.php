<?php
    include("../../require_inc.php");
    $pr_id = $_POST['id'];
    $yr = date("Y");
    $msd = "";
            $sd = $h->query("select id,detail_vn,detail_en,week,day from lessons where lesson_id=$pr_id and year=$yr and month=".$_SESSION['mnn']." order by week asc,day asc,id asc");
            $id = 0;
            while($rd = $h->fetch_array($sd)){
                $iddd = $rd['id'];
                if($id==0) {
                    $dayy = $rd['day'];
                    $we = $rd['week'];
                    $cla = ' act';
                } else $cla = '';
                if($id%2==0) $cld = ' even';
                else $cld = ' odd';
                $dell = $rd["detail_$lang"];
                $msd .= '<p class="cten'.$cld.$cla.'"><a class="dell" rel="'.$iddd.'">'.$dell.'</a><a class="editde" rel="'.$iddd.'">&nbsp;</a><a class="delde" rel="'.$iddd.'">&nbsp;</a></p>';
                $id++;
            }
            $msd .= '<a class="edit" rel="'.$pr_id.'">'._addnew.'</a>';
            $mw = array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5");
            foreach($mw as $kw=>$vw){
                if($vw == $we) $clw = ' act';
                else $clw = '';
                if($vw%2==0) $cls = ' odd';
                else $cls = ' even';
                $mww .= '<p class="ctenn'.$clw.$cls.'">'._lessweek.' '.$vw.'</p>';
            }
            $md = array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5");
            foreach($md as $kd=>$vd){
                if($vd == $dayy) $cldd = ' act';
                else $cldd = '';
                if($vd%2==0) $clss = ' odd';
                else $clss = ' even';
                switch($vd){
                    case 1: $thu = _thu2; break;
                    case 2: $thu = _thu3; break;
                    case 3: $thu = _thu4; break;
                    case 4: $thu = _thu5; break;
                    case 5: $thu = _thu6; break;
                }
                $mdd .= '<p class="ctenn'.$clss.$cldd.'">'.$thu.'</p>'; 
            }
    echo $msd.';;;'.$mww.';;;'.$mdd;
?>
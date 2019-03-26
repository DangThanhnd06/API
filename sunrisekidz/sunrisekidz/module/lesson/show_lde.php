<?php
    include("../../require_inc.php");
    $pr_id = $_POST['id'];
    $yr = date("Y");
    $sl = $h->query("select thang from monhoc where id=$pr_id");
    $rl = $h->fetch_array($sl);
    $thang = $rl['thang'];
    $msd = "";
            $sd = $h->query("select id,detail_vn,detail_en,week,day,mota_vn,mota_en from lessons where lesson_id=$pr_id order by week asc,day asc,id asc"); # and month=".$_SESSION['mnn']."
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
                if($rd["mota_$lang"] != '') $mota = '<br />'._desdetail.': '.$rd["mota_$lang"];
                else $mota = '';
                $msd .= '<p class="cten'.$cld.$cla.'"><a class="dell" rel="'.$iddd.'">'.$dell.$mota.'</a><a class="editde" rel="'.$iddd.'">&nbsp;</a><a class="delde" rel="'.$iddd.'">&nbsp;</a></p>';
                $id++;
            }
            $msd .= '<a class="edit" rel="'.$pr_id.'">'._addnew.'</a>';
            $mw = array("1"=>_thang1,"2"=>_thang2,"3"=>_thang3,"4"=>_thang4,"5"=>_thang5,"6"=>_thang6,"7"=>_thang7,"8"=>_thang8,"9"=>_thang9,"10"=>_thang10,"11"=>_thang11,"12"=>_thang12);
            foreach($mw as $kw=>$vw){
                if($kw == $thang) $clw = ' act';
                else $clw = '';
                if($kw%2==0) $cls = ' odd';
                else $cls = ' even';
                $mww .= '<p class="ctenn'.$clw.$cls.'">'.$vw.'</p>';
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
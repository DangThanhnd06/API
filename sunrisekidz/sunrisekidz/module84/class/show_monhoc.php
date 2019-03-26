<?php
    include("../../require_inc.php");
    $cl = $_POST['cl'];
    $sci = $_POST['sci'];
    $s = $h->query("select id,name_vn,name_en from practise where clg='$cl' order by sort asc,id asc");
    $i = 0;
    $msg = "";
    $mh = "";
    $mn = "";
    $mdd = "";
    $idp = 0;
    $we = 0;
    $yr = date("Y");
    while($r = $h->fetch_array($s)){
        if($i==0) {
            $cls = ' class="act"';
            $idp = $r['id'];
        }
        else $cls = '';
        $msg .= '<p'.$cls.'><a class="monhoc" rel="'.$r['id'].'">'.$r["name_$lang"].'</a></p>';
        $i++;
    }
    if($idp != 0){
        $sh = $h->query("select id,name_vn,name_en from monhoc where pr_id=$idp order by sort asc,id asc");
        $nh = $h->num_rows($sh);
        if($nh){
            $ii = 0;
            while($rh = $h->fetch_array($sh)){
                if($ii==0){
                    $idh = $rh['id'];
                    $acth = ' act';
                } else $acth = '';
                $mh .= '<a class="chonbh'.$acth.'" rel="'.$rh['id'].'">'.$rh["name_$lang"].'</a>';
                $ii++;
            }
            $sn = $h->query("select id,detail_vn,detail_en,week from lessons where lesson_id=$idh and year=$yr and month=".$_SESSION['mnnn']." order by week asc,day asc,id asc");
            $iii = 0;
            $nd = $h->num_rows($sn);
            if($nd){
                while($rn = $h->fetch_array($sn)){
                    if($iii == 0) {
                        $we = $rn['week'];
                        $cln = ' act';
                    } else $cln = '';
                    //$mn .= '<a class="chonnd'.$cln.'" rel="'.$rn['id'].'">'.$rn["detail_$lang"].'</a>';
                    $mn .= '<p>'.$rn["detail_$lang"].'</p>';
                    $iii++; 
                }
            }
        }    
    }
    $mw = array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5");
    foreach($mw as $kw=>$vw){
        #if($vw == $we) $clw = ' act';
        #else $clw = '';
        $mww .= '<a class="chontuan" rel="'.$vw.'">'._lessweek.' '.$vw.'</a>';
    }
    $mww .= '<p class="th">'._cuoithang.$_SESSION['thanghtt'].'</p>';
    echo $msg.';;;'.$mh.';;;'.$mn.';;;'.$mww;
?>
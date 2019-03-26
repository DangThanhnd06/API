<?php
    include("../../require_inc.php");
    $age = $_POST['age'];
    $yr = date("Y");
    $sp = $h->query("select id,name_vn,name_en from practise where clg='$age' and hide=1 order by sort asc,id asc");
    $np = $h->num_rows($sp);
    $msg = "";
    $msm = "";
    $msd = "";
    
    if($np){
        $nc = 0;
        while($rc = $h->fetch_array($sp)) {
            $idd = $rc['id'];
            if($nc%2!=0) $cl = ' odd';
            else $cl = ' even';
            if($nc == 0) {
              $ca = ' act';
              $idp = $rc['id'];  
            } 
            else $ca = '';
            $name = $rc["name_$lang"];
            $msg .= '<div class="cten'.$cl.$ca.'"><a class="cp" rel="'.$idd.'">'.$name.'</a><a class="editpr" rel="'.$idd.'">&nbsp;</a><a class="delpr" rel="'.$idd.'">&nbsp;</a></div>';
            $nc++;
        }
        
        // mon hoc
    
        #$spp = $h->query("select id,name_vn,name_en from practise where age=$age and hide=1");
        #$rpp = $h->fetch_array($spp);
        #$idp = $rpp['id'];
        $sm = $h->query("select id,name_vn,name_en,thang from monhoc where pr_id=".$idp." and hide=1 order by sort asc,id asc");
        $nm = $h->num_rows($sm);
        if($nm){
            $i = 0;            
            while($rm = $h->fetch_array($sm)) {
                if($i==0) $thang = $rm['thang'];
                $idm = $rm['id'];
                if($i%2!=0) $clm = ' odd';
                else $clm = ' even';
                if($i == 0) {
                 $cam = ' act';
                 $idmm = $rm['id'];   
                }
                else $cam = '';
                $namem = $rm["name_$lang"];
                $msm .= '<div class="cten'.$clm.$cam.'"><a class="cle" rel="'.$idm.'">'.$namem.'</a><a class="editles" rel="'.$idm.'">&nbsp;</a><a class="delles" rel="'.$idm.'">&nbsp;</a></div>';
                $i++;
            }
            
            
            $sd = $h->query("select id,detail_vn,detail_en,week,day,mota_vn,mota_en from lessons where lesson_id=$idmm order by week asc,day asc,id asc"); # and year=$yr and month=".$_SESSION['mnn']."
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
            $msd .= '<a class="edit"  rel="'.$idmm.'">'._addnew.'</a>';
        }
        
    }
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
    $msm .= '<a class="add" rel="'.$idp.'">'._addnew.'</a>';
    $msg .= '<a class="addp">'._addnew.'</a>';
    
    echo $msg.';;;'.$msm.';;;'.$msd.';;;'.$mww.';;;'.$mdd;
?>
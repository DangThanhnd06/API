<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $msd = "";
    $sd = $h->query("select week,day from lessons where id=$id");
    $rd = $h->fetch_array($sd);
    $dayy = $rd['day'];
    $we = $rd['week'];
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
    echo $mww.';;;'.$mdd;
?>
<?php
    include("../../require_inc.php");
    $th = $_POST['th'];
    $_SESSION['mnn'] = $_POST['th'];
    $yr = date("Y");
    switch($th){
        case "1":
            $_SESSION['thanght'] = _thang1;
            break;
        case "2":
            $_SESSION['thanght'] = _thang2;
            break;
        case "3":
            $_SESSION['thanght'] = _thang3;
            break;
        case "4":
            $_SESSION['thanght'] = _thang4;
            break;
        case "5":
            $_SESSION['thanght'] = _thang5;
            break;
        case "6":
            $_SESSION['thanght'] = _thang6;
            break;
        case "7":
            $_SESSION['thanght'] = _thang7;
            break;
        case "8":
            $_SESSION['thanght'] = _thang8;
            break;
        case "9":
            $_SESSION['thanght'] = _thang9;
            break;
        case "10":
            $_SESSION['thanght'] = _thang10;
            break;
        case "11":
            $_SESSION['thanght'] = _thang11;
            break;
        case "12":
            $_SESSION['thanght'] = _thang12;
            break;
    }
    $mthn = $_SESSION['thanght'];
    $s = $h->query("select id,lesson_id,detail_vn,detail_en from lessons where year=$yr and month=$th order by id asc");
    $ms = "";
    $i = 0;
    while($r = $h->fetch_array($s)){
        $iddd = $r['id'];
        $dell = $r["detail_$lang"];
        if($i==0) {
            $dayy = $rd['day'];
            $we = $rd['week'];
            $cla = ' act';
        } else $cla = '';
        if($i%2==0) $cld = ' even';
        else $cld = ' odd';
        $ms .= '<p class="cten'.$cld.$cla.'"><a class="dell" rel="'.$iddd.'">'.$dell.'</a><a class="editde" rel="'.$iddd.'">&nbsp;</a><a class="delde" rel="'.$iddd.'">&nbsp;</a></p>';
        $i++;
    }
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
    echo $mthn.';;;'.$ms.';;;'.$mww.';;;'.$mdd;
?>

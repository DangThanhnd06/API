<?php
    include("../../require_inc.php");
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    function weekOfMonth($date) {
        // estract date parts
        list($y, $m, $d) = explode('-', date('Y-m-d', strtotime($date)));
    
        // current week, min 1
        $w = 1;
    
        // for each day since the start of the month
        for ($i = 1; $i <= $d; ++$i) {
            // if that day was a sunday and is not the first day of month
            if ($i > 1 && date('w', strtotime("$y-$m-$i")) == 0) {
                // increment current week
                ++$w;
            }
        }
    
        // now return
        return $w;
    }
    $id = $_POST['id'];
    $data['detail_vn'] = str_replace("'","\'",trim($_POST['detail_vn']));
    $data['detail_en'] = str_replace("'","\'",trim($_POST['detail_en']));
    $data['ngaythang'] = $_POST['ngaynd'];
    $ngaynd = $_POST['ngaynd'];
    $m = explode("-",$ngaynd);
    $data['year'] = $m[0];
    $data['month'] = $m[1];
    $data['week'] = weekOfMonth($ngaynd);
    $da = date("l",strtotime($ngaynd));
    switch($da){
        case "Monday":
            $data['day'] = 1;
            break;
        case "Tuesday":
            $data['day'] = 2;
            break;
        case "Wednesday":
            $data['day'] = 3;
            break;
        case "Thursday":
            $data['day'] = 4;
            break;
        case "Friday":
            $data['day'] = 5;
            break;
        case "Saturday":
            $data['day'] = 6;
            break;
        case "Sunday":
            $data['day'] = 7;
            break;
    }
    $s = $h->update($data,"lessons"," where id=$id");
    $sl = $h->query("select lesson_id from lessons where id=$id");
    $rl = $h->fetch_array($sl);
    $l_id = $rl['lesson_id'];
    $ss = $h->query("select * from lessons where year=".date("Y")." and month=".$_SESSION['mnn']." and lesson_id=$l_id order by week asc,day asc,id asc");
    $i = 0;
    $ms = "";
    while($r = $h->fetch_array($ss)) {
        $idd = $r['id'];
        if($i==0){
            $dayy = $rd['day'];
            $we = $rd['week'];
            $cla = ' act';
        } else $cla = '';
        if($i%2==0) $cld = ' even';
        else $cld = ' odd';
        $dell = $r["detail_$lang"];
        $ms .= '<p class="cten'.$cld.$cla.'"><a class="dell" rel="'.$idd.'">'.$dell.'</a><a class="editde" rel="'.$idd.'">&nbsp;</a><a class="delde" rel="'.$idd.'">&nbsp;</a></p>';
        $i++;
    }
    $ms .= '<a class="edit" rel="'.$l_id.'">'._addnew.'</a>';
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
    echo $ms.';;;'.$mww.';;;'.$mdd;
?>

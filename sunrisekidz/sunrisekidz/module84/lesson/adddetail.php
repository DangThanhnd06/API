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
    $data['lesson_id'] = $_POST['id'];
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
    $s = $h->insert($data,"lessons");
    $ss = $h->query("select * from lessons where year=".date("Y")." and month=".$_SESSION['mnn']." order by id desc");
    $r = $h->fetch_array($ss);
    $n = $h->num_rows($ss);
    if($n){
        $idd = $r['id'];
        $cld = ' even';
        $dell = $r["detail_$lang"];
        echo '<p class="cten'.$cld.$cla.'"><a class="dell" rel="'.$idd.'">'.$dell.'</a><a class="editde" rel="'.$idd.'">&nbsp;</a><a class="delde" rel="'.$idd.'">&nbsp;</a></p>';
    }
    
?>

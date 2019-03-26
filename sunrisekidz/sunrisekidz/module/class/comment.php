<?php
    include("../../require_inc.php");
    if($_SESSION['quyenper'] == 1){
        $data['school_id'] = $_POST['sci'];
        $data['class_id'] = $_POST['cl'];
    } else {
        $data['school_id'] = $_SESSION['schoolgvcn'];
        $data['class_id'] = $_SESSION['classgvcn'];
    }
    $data['child_id'] = $_POST['child_id'];
    $data['month'] = $_POST['mon'];
    $thang = $_POST['mon'];
    $data['practice'] = $_POST['pr'];
    $data['week'] = $_POST['w'];
    //if($data['mo']=='6')
    $data['cmt_month'] = str_replace("'","\'",trim($_POST['cmtt']));
    /*else
        $data['cmt_week'] = str_replace("'","\'",trim($_POST['cmtt']));*/
    $data['year'] = date("Y");
    $data['approve'] = 1;
    /*$ss = $h->query("select id from comment where school_id=".$data['school_id']." and class_id='".$data['class_id']."' and child_id=".$data['child_id']." and year=".$data['year']." and month=".$data['month']." and practice=".$data['practice']." and cmt_week!='' and approve=1");
    $ns = $h->num_rows($ss);
    if($data['week']=='6'){
        if($ns < 4) echo '2';
        else {
            $ss = $h->query("select id from comment where school_id=".$data['school_id']." and class_id='".$data['class_id']."' and child_id=".$data['child_id']." and year=".$data['year']." and month=".$data['month']." and practice=".$data['practice']." and cmt_month!='' and week=6");
            $nss = $h->num_rows($ss);
            if(!$nss)
                $s = $h->insert($data,"comment");
        }
    } else {*/
        $ss = $h->query("select id from comment where school_id=".$data['school_id']." and class_id='".$data['class_id']."' and child_id=".$data['child_id']." and year=".$data['year']." and month=".$data['month']." and practice=".$data['practice']." and cmt_month!=''");
        $nss = $h->num_rows($ss);
        if(!$nss) $s = $h->insert($data,"comment");
    //}        
    echo $thang;
?>
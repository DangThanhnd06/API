<?php
    include("../../require_inc.php");
    $data['school_id'] = $_POST['sci'];
    $data['class_id'] = $_POST['cl'];
    $data['child_id'] = $_POST['child_id'];
    $data['month'] = $_POST['mon'];
    $data['practice'] = $_POST['pr'];
    $data['cmt_month'] = str_replace("'","\'",trim($_POST['cmtt']));
    $data['year'] = date("Y");
    $data['approve'] = 1;
    
    $ss = $h->query("select id from comment where school_id=".$data['school_id']." and class_id='".$data['class_id']."' and child_id=".$data['child_id']." and year=".$data['year']." and month=".$data['month']." and practice=".$data['practice']." and cmt_month!=''");
    $nss = $h->num_rows($ss);
    if(!$nss) $s = $h->insert($data,"comment");
?>
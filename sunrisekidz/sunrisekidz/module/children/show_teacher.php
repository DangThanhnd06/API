<?php
    include("../../require_inc.php");
    $id = $_POST['csee'];
    $stc = $h->query("select id,fname,mname from teacher where school_id=$id and hide=1");
    echo '<option value="0">'._choseteacher.'</option>';
    while($rtc = $h->fetch_array($stc)){
        if($lang == 'vn' || $lang == '')
            $tcc = $rtc['fname'].' '.$rtc['mname'];
        else
            $tcc = change($rtc['fname'].' '.$rtc['mname']);
        echo '<option value="'.$rtc['id'].'">'.$tcc.'</option>';
    }
?>
<?php
    include("../../require_inc.php");
    $sc_id = $_POST['sc_id'];
    $ig = 0;
    $tid = 0;
    $mh = '';
    $sg = $h->query("select id,fname,mname from teacher where school_id=$sc_id and hide=1 order by fname");
    //$mg = '<option value="0">'._choseteacher.'</option>';
    while($rg = $h->fetch_array($sg)){
        if($lang == 'vn') $sc = $rg['fname'].' '.$rg['mname'];
        else $sc = change($rg['fname'].' '.$rg['mname']);
        if($ig == 0) $tid = $rg['id'];
        $mg .= '<option value="'.$rg['id'].'">'.$sc.'</option>';
        $ig ++;
    }
    if($tid != 0){
        $sh = $h->query("select id,fname,mname from children where teacher_id=$tid and hide=1 order by fname");
        while($rh = $h->fetch_array($sh)){
            if($lang == 'vn') $cc = $rh['fname'].' '.$rh['mname'];
            else $cc = change($rh['fname'].' '.$rh['mname']);
            $mh .= '<option value="'.$rh['id'].'">'.$cc.'</option>';
        }
    }
    echo $mg.';;;;;'.$mh;
?>
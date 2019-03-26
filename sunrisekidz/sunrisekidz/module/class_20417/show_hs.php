<?php
    include("../../require_inc.php");
    $cl = $_POST['cl'];
    $sci = $_POST['sci'];
    $s = $h->query("select id,fname,mname from children where class_gr='$cl' and school_id=$sci and hide=1 order by fname asc,id asc");
    $i = 1;
    $msg = "";
    while($r = $h->fetch_array($s)){
        if($i%2==0) $cls = ' class="odd"';
        else $cls = ' class="even"';
        if($lang == 'vn') $name = $r['fname'].' '.$r['mname'];
        else $name = change($r['fname'].' '.$r['mname']);
        $msg .= '<li'.$cls.'><a class="hss" rel="'.$r['id'].'">'.$i.'. '.$name.'</a></li>';
        $i++;
    }
    echo $msg;
?>
<?php
    include("../require_inc.php");
    $tk = str_replace("'","\'",trim($_POST['keyw']));
    if($tk != "") $wh = " where fname like '%".$tk."%' or mname like '%".$tk."%' or lname like '%".$tk."%'";
    else $wh = "";
    $sc = $h->query("select id,fname,mname from children $wh order by fname asc");
    $i = 0;
    while($rc = $h->fetch_array($sc)){
        if($i%2==0) $cl = 'class="even"';
        else $cl = 'class="odd"';
        ++$i;
        if($lang == 'vn') $fullname = $rc['fname'].' '.$rc['mname'];
        else $fullname = change($rc['fname'].' '.$rc['mname']);
        echo '<li '.$cl.'><a class="xemhs" rel="'.$rc['id'].'"><span class="numb">'.$i.'</span>'.$fullname.'</a></li>';
    }
?>  
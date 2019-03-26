<?php
    include("../../require_inc.php");
    $data['tenlop'] = str_replace("'","\'",trim($_POST['tenlop']));
    $sc = $h->query("select id from lop where tenlop='".$data['tenlop']."'");
    $n = $h->num_rows($sc);
    if($n) echo '2';
    else {
        $ss = $h->insert($data,"lop");
        $s = $h->query("select id from lop order by id desc");
        $r = $h->fetch_array($s);
        echo '<li id="'.$r['id'].'"><a class="agea" rel="'.$data['tenlop'].'">'.$data['tenlop'].'</a><a class="editclass" rel="'.$r['id'].';;,;;'.$data['tenlop'].'">&nbsp</a><a class="delclass" rel="'.$r['id'].'">&nbsp;</a></li>';
    }   
?>
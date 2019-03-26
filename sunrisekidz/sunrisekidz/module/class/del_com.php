<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select tuan from communication where id=$id");
    $r = $h->fetch_array($s);
    $tuan = $r['tuan'];
    echo $tuan.';;;cach;;;<a class="addcom" rel="'.$tuan.'">'._add.'</a>';
    $ss = $h->delete("communication"," where id=$id");
    $sss = $h->delete("communication"," where id_reply=$id");
?>
<?php
    include("../require_inc.php");
    $data['tieude_vn'] = str_replace("'","\'",trim($_POST['namesc_vn']));
    $data['tieude_en'] = str_replace("'","\'",trim($_POST['namesc_en']));
    $data['hide'] = 1;
    $ss = $h->query("select id from school_brand where tieude_vn='".$data['tieude_vn']."' or tieude_en='".$data['tieude_en']."'");
    $n = $h->num_rows($ss);
    if($n) echo '2';
    else {
        $h->insert($data,"school_brand");
        $s = $h->query("select id,tieude_vn,tieude_en from school_brand order by id desc");
        $r = $h->fetch_array($s);
        $id = $r['id'];
        $truongbr = $r["tieude_$lang"];
        echo '<p><a class="chontruong" rel="'.$id.'">'._school.' '.$truongbr.'</a><a class="editscb" rel="'.$id.'">&nbsp;</a><a class="delscb" rel="'.$id.'">&nbsp;</a></p>';
    }
?>
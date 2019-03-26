<?php
    include("../require_inc.php");
    $data['tieude'] = str_replace("'","\'",trim($_POST['namesc_vn']));
    //$data['tieude_en'] = str_replace("'","\'",trim($_POST['namesc_en']));
    $data['hide'] = 1;
    $ss = $h->query("select id from school_brand where tieude='".$data['tieude']."'");
    $n = $h->num_rows($ss);
    if($n) echo '2';
    else {
        $h->insert($data,"school_brand");
        $s = $h->query("select id,tieude from school_brand order by id desc");
        $r = $h->fetch_array($s);
        $id = $r['id'];
        if($lang == 'vn')
            $truongbr = $r["tieude"];
        else
            $truongbr = change($r["tieude"]);
        echo '<p><a class="chontruong" rel="'.$id.'">'._school.' '.$truongbr.'</a><a class="editscb" rel="'.$id.'">&nbsp;</a><a class="delscb" rel="'.$id.'">&nbsp;</a></p>';
    }
?>
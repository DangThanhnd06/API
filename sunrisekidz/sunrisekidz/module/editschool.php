<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $data['tieude'] = str_replace("'","\'",trim($_POST['namesc_vn']));
    //$data['tieude_en'] = str_replace("'","\'",trim($_POST['namesc_en']));
    $ss = $h->query("select id from school_brand where id!=$id and tieude='".$data['tieude']."' ");
    $n = $h->num_rows($ss);
    if($n) echo '2';
    else {
        $msg = "";
        $h->update($data,"school_brand"," where id=$id");
        $s = $h->query("select id,tieude from school_brand order by id desc");
        while($r = $h->fetch_array($s)){
            $id = $r['id'];
            if($lang == 'vn')
                $truongbr = $r["tieude"];
            else
                $truongbr = change($r["tieude"]);
            $msg .= '<p><a class="chontruong" rel="'.$id.'">'._school.' '.$truongbr.'</a><a class="editscb" rel="'.$id.'">&nbsp;</a><a class="delscb" rel="'.$id.'">&nbsp;</a></p>';
        }
        $msg .= '<p><a class="addsb">'._addnew.'</a></p>';
        echo $msg;
    }
?>
<?php
    include("../../require_inc.php");
    $cl = $_POST['cl'];
    if($cl == '') $cll = 'Blude Cylinder';
    else $cll = $cl;
    $id = $_POST['practise'];
    $s = $h->query("select id,name_vn,name_en from practise where clg='$cll' and hide=1 order by sort asc,id asc");
    while($r = $h->fetch_array($s)){
        if($r['id']!=$id){
            $pr = 0;
        } else { 
            $pr = 1;
            break;
        }
    }
    if($pr == 0) $msg .= '<p class="'.$lang.' act"><a class="monhocc act" rel="0">'._blc.'</a></p>';
    else $msg .= '<p class="'.$lang.'"><a class="monhocc" rel="0">'._blc.'</a></p>';
    /*$ss = $h->query("select id,name_vn,name_en from practise where clg='$cll' and hide=1 order by sort asc,id asc");
    while($rs = $h->fetch_array($ss)){
        if($rs['id']!=$id){
            $msg .= '<p class="'.$lang.'"><a class="monhocc" rel="'.$rs['id'].'">'.$rs["name_$lang"].'</a></p>';
        } else { 
            $msg .= '<p class="'.$lang.' act"><a class="monhocc act" rel="'.$rs['id'].'">'.$rs["name_$lang"].'</a></p>';
        }
    }*/
    echo $msg;
?>
<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select pr_id from monhoc where id=$id");
    $r = $h->fetch_array($s);
    $pridc = $r['pr_id'];
    //$pridc = $_POST['pridc'];
    //$data['pr_id'] = $_POST['pr_id'];
    $data['name_vn'] = str_replace("'","\'",trim($_POST['name_vn']));
    $data['name_en'] = str_replace("'","\'",trim($_POST['name_en']));
    
    $s = $h->query("select id from monhoc where pr_id=".$pridc." and (name_vn='".$data['name_vn']."' or name_en='".$data['name_vn']."') and id!=$id");
    $n = $h->num_rows($s);
    if($n) echo '2';
    else {
        $ss = $h->update($data,"monhoc"," where id=$id");
        $sc = $h->query("select id,name_vn,name_en from monhoc where pr_id=".$pridc." and hide=1 order by sort asc,id asc");
        $nc = 0;
        $msg = "";
        while($rc = $h->fetch_array($sc)) {
            $idd = $rc['id'];
            if($nc%2!=0) $cl = ' odd';
            else $cl = ' even';
            if($nc == 0) $ca = ' act';
            else $ca = '';
            $name = $rc["name_$lang"];
            $msg .= '<div class="cten'.$cl.$ca.'"><a class="cle" rel="'.$idd.'">'.$name.'</a><a class="editles" rel="'.$idd.'">&nbsp;</a><a class="delles" rel="'.$idd.'">&nbsp;</a></div>';
            $nc++;
        }
        $msg .= '<a class="add" rel="'.$pridc.'">'._addnew.'</a>';
        echo '1;;;'.$msg;        
    } 
?>
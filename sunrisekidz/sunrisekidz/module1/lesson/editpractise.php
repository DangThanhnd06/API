<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $age = $_POST['age'];
    $data['age'] = $_POST['cage'];
    $data['name_vn'] = str_replace("'","\'",trim($_POST['name_vn']));
    $data['name_en'] = str_replace("'","\'",trim($_POST['name_en']));
    $sm = $h->query("select max(sort) as maxsx from practise where age=".$data['age']);
    $rm = $h->fetch_array($sm);
    
    $s = $h->query("select id from practise where age=".$data['age']." and (name_vn='".$data['name_vn']."' or name_en='".$data['name_vn']."') and id!=$id");
    $n = $h->num_rows($s);
    if($n) echo '2';
    else {
        $ss = $h->update($data,"practise"," where id=$id");
        $sc = $h->query("select id,name_vn,name_en from practise where age=".$age." order by sort asc,id asc");
        $nc = 0;
        $msg = "";
        while($rc = $h->fetch_array($sc)) {
            $idd = $rc['id'];
            if($nc%2!=0) $cl = ' odd';
            else $cl = ' even';
            if($nc == 0) $ca = ' act';
            else $ca = '';
            $name = $rc["name_$lang"];
            $msg .= '<div class="cten'.$cl.$ca.'"><a class="cp" rel="'.$idd.'">'.$name.'</a><a class="editpr" rel="'.$idd.'">&nbsp;</a><a class="delpr" rel="'.$idd.'">&nbsp;</a></div>';
            $nc++;
        }
        echo '1;;;'.$msg;
        
    } 
?>